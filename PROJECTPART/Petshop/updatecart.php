<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: X-Requested-With, Content-Type');
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200); exit;
}

$con = new mysqli("localhost", "root", "", "petshop");
if ($con->connect_error) {
    echo json_encode(["status" => "error", "msg" => "DB failed"]);
    exit;
}

$uid = isset($_REQUEST['uid'])      ? intval($_REQUEST['uid'])      : 0;
$pid = isset($_REQUEST['pid'])      ? intval($_REQUEST['pid'])      : 0;
$qty = isset($_REQUEST['quantity']) ? intval($_REQUEST['quantity']) : 1;

if ($uid == 0 || $pid == 0) {
    echo json_encode(["status" => "error", "msg" => "uid and pid required"]);
    exit;
}

if ($qty <= 0) {
    // Quantity 0 ya negative — item delete karo
    $result = $con->query("DELETE FROM cart WHERE uid='$uid' AND pid='$pid'");
    echo json_encode(["status" => "deleted"]);
} else {
    $result = $con->query("UPDATE cart SET quantity='$qty' WHERE uid='$uid' AND pid='$pid'");
    if ($result) {
        echo json_encode(["status" => "updated", "quantity" => $qty]);
    } else {
        echo json_encode(["status" => "error", "msg" => $con->error]);
    }
}

$con->close();
?>