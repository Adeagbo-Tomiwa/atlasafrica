<?php
// api/track.php
header('Content-Type: application/json');
require_once __DIR__ . '/../config/db.php'; // your PDO $pdo

// allow POST only
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  http_response_code(405);
  echo json_encode(['success'=>false,'message'=>'Method not allowed']);
  exit;
}

// read body (supports sendBeacon / fetch)
$raw = file_get_contents('php://input');
if (empty($raw)) {
  echo json_encode(['success'=>false,'message'=>'No payload']);
  exit;
}

$data = json_decode($raw, true);
if (!$data || empty($data['type'])) {
  echo json_encode(['success'=>false,'message'=>'Invalid payload']);
  exit;
}

$type = $data['type'];
$path = $data['path'] ?? $_SERVER['REQUEST_URI'];
$title = $data['title'] ?? null;
$ref = $data['referrer'] ?? ($_SERVER['HTTP_REFERER'] ?? null);
$ua = $data['user_agent'] ?? ($_SERVER['HTTP_USER_AGENT'] ?? null);
$ip = $_SERVER['REMOTE_ADDR'] ?? null;

try {
  // insert visitor snapshot
  $stmt = $pdo->prepare("INSERT INTO visitors (ip, user_agent, referer, path) VALUES (:ip, :ua, :ref, :path)");
  $stmt->execute([':ip'=>$ip, ':ua'=>$ua, ':ref'=>$ref, ':path'=>$path]);
  $visitorId = $pdo->lastInsertId();

  if ($type === 'page_view') {
    $stmt = $pdo->prepare("INSERT INTO page_views (visitor_id, path, title, meta_json) VALUES (:vid,:path,:title,:meta)");
    $stmt->execute([':vid'=>$visitorId, ':path'=>$path, ':title'=>$title, ':meta'=>json_encode($data)]);
  } else {
    // store generic event
    $stmt = $pdo->prepare("INSERT INTO events (type, payload, visitor_id, path) VALUES (:type,:payload,:vid,:path)");
    $stmt->execute([':type'=>$type, ':payload'=>json_encode($data), ':vid'=>$visitorId, ':path'=>$path]);
  }

  echo json_encode(['success'=>true]);
} catch (Exception $e) {
  if (getenv('APP_ENV') === 'local') {
    echo json_encode(['success'=>false,'error'=>$e->getMessage()]);
  } else {
    echo json_encode(['success'=>false,'message'=>'Server error']);
  }
}
