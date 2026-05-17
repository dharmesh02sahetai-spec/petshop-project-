<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: X-Requested-With, Content-Type');
header('Content-Type: application/json');

// Handle preflight
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit;
}

$con = new mysqli("localhost", "root", "", "petshop");

if ($con->connect_error) {
    echo json_encode(["error" => "DB connection failed: " . $con->connect_error]);
    exit;
}

$uid = isset($_REQUEST['uid']) ? intval($_REQUEST['uid']) : 0;

if ($uid == 0) {
    echo json_encode([]);
    exit;
}

// ── Prepared statement — safe + returns quantity properly ──
$stmt = $con->prepare(
    "SELECT 
        c.cart_id,
        c.pid,
        c.quantity,
        p.pname,
        p.price,
        p.image
     FROM cart c
     INNER JOIN product p ON c.pid = p.id
     WHERE c.uid = ?
     ORDER BY c.cart_id DESC"
);

$stmt->bind_param("i", $uid);
$stmt->execute();
$result = $stmt->get_result();

$rows = [];
while ($row = $result->fetch_assoc()) {
    // Cast types so JSON is correct (not everything as string)
    $rows[] = [
        "cart_id"  => (int)$row['cart_id'],
        "pid"      => (int)$row['pid'],
        "quantity" => (int)$row['quantity'],
        "pname"    => $row['pname'],
        "price"    => (float)$row['price'],
        "image"    => $row['image'],
    ];
}

echo json_encode($rows);

$stmt->close();
$con->close();
?>