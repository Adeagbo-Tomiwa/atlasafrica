<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  echo json_encode(['success' => false, 'message' => 'Invalid request method']);
  exit;
}

$email = trim($_POST['email'] ?? '');

if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
  echo json_encode(['success' => false, 'message' => 'Please enter a valid email address.']);
  exit;
}

// connect to database
require_once __DIR__ . '/../core/db.php';

try {
  // Create table if it doesn’t exist
  $pdo->exec("CREATE TABLE IF NOT EXISTS subscribers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) UNIQUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
  )");

  // Insert new email
  $stmt = $pdo->prepare("INSERT IGNORE INTO subscribers (email) VALUES (:email)");
  $stmt->execute(['email' => $email]);

  if ($stmt->rowCount() > 0) {
    echo json_encode(['success' => true, 'message' => 'Email saved successfully']);
  } else {
    echo json_encode(['success' => false, 'message' => 'This email is already subscribed.']);
  }
} catch (PDOException $e) {
  echo json_encode(['success' => false, 'message' => 'Database error: ' . $e->getMessage()]);
}
