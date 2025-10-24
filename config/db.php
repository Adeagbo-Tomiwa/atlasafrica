<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Load environment variables from .env file
$envPath = __DIR__ . '/.env';
if (!file_exists($envPath)) {
    die(json_encode(['success' => false, 'message' => '.env file missing in config directory']));
}

$lines = file($envPath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
foreach ($lines as $line) {
    if (strpos(trim($line), '#') === 0) continue; // skip comments
    list($key, $value) = explode('=', $line, 2);
    $_ENV[trim($key)] = trim($value);
}

// Retrieve values
$host = $_ENV['DB_HOST'] ?? 'localhost';
$dbname = $_ENV['DB_NAME'] ?? 'atlasafr_atlasafrica';
$username = $_ENV['DB_USER'] ?? 'atlasafr_atlasafrica';
$password = $_ENV['DB_PASS'] ?? 'Saa1366shift+';
$app_env = $_ENV['APP_ENV'] ?? 'production';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    if ($app_env === 'local') {
        // Show detailed error in development
        die(json_encode(['success' => false, 'message' => 'DB Connection failed: ' . $e->getMessage()]));
    } else {
        // Hide details in production
        die(json_encode(['success' => false, 'message' => 'Database connection error.']));
    }
}
?>
