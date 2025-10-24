<?php
header('Content-Type: application/json');
require_once __DIR__ . '/../core/db.php';

try {
  $stmt = $pdo->query("SELECT email, created_at FROM subscribers ORDER BY id DESC");
  $subscribers = $stmt->fetchAll(PDO::FETCH_ASSOC);

  echo json_encode([
    'success' => true,
    'subscribers' => $subscribers
  ]);
} catch (PDOException $e) {
  echo json_encode([
    'success' => false,
    'message' => 'Database error: ' . $e->getMessage()
  ]);
}
