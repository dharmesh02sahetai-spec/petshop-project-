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

$uid = isset($_REQUEST['uid']) ? intval($_REQUEST['uid']) : 0;
$pid = isset($_REQUEST['pid']) ? intval($_REQUEST['pid']) : 0;

// Agar pid diya hai toh sirf woh item delete karo
// Agar sirf uid diya hai toh poora cart clear karo (checkout ke baad)
if ($pid > 0 && $uid > 0) {
    $result = $con->query("DELETE FROM cart WHERE uid='$uid' AND pid='$pid'");
    if ($result) {
        echo json_encode(["status" => "deleted", "pid" => $pid, "uid" => $uid]);
    } else {
        echo json_encode(["status" => "error", "msg" => $con->error]);
    }
} elseif ($uid > 0) {
    // Poora cart clear (checkout ke baad use hoga)
    $result = $con->query("DELETE FROM cart WHERE uid='$uid'");
    if ($result) {
        echo json_encode(["status" => "cleared", "uid" => $uid]);
    } else {
        echo json_encode(["status" => "error", "msg" => $con->error]);
    }
} else {
    echo json_encode(["status" => "error", "msg" => "uid required"]);
}

$con->close();
?>