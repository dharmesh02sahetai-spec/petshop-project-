<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: X-Requested-With, Content-Type');
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit;
}

$con = new mysqli("localhost", "root", "", "petshop");
if ($con->connect_error) {
    echo json_encode(["status" => "error", "msg" => "DB failed"]);
    exit;
}

$pid = isset($_REQUEST['pid']) ? intval($_REQUEST['pid']) : 0;
$uid = isset($_REQUEST['uid']) ? intval($_REQUEST['uid']) : 0;

if ($pid == 0 || $uid == 0) {
    echo json_encode(["status" => "error", "msg" => "pid and uid required"]);
    exit;
}

$check = $con->query("SELECT cart_id, quantity FROM cart WHERE uid='$uid' AND pid='$pid'");

if ($check && $check->num_rows > 0) {
    $row    = $check->fetch_object();
    $newQty = $row->quantity + 1;
    $cid    = $row->cart_id;
    $con->query("UPDATE cart SET quantity='$newQty' WHERE cart_id='$cid'");
    echo json_encode(["status" => "updated", "quantity" => $newQty]);
} else {
    $con->query("INSERT INTO cart (pid, uid, quantity) VALUES ('$pid', '$uid', 1)");
    echo json_encode(["status" => "added", "cart_id" => $con->insert_id]);
}

$con->close();
?>