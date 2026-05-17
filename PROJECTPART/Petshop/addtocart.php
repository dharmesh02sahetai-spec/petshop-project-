<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header('Access-Control-Allow-Headers: X-Requested-With');
header('Content-Type: application/json');

$con = new mysqli("localhost", "root", "", "petshop");

if ($con->connect_error) {
    echo json_encode(["status" => "error", "msg" => "DB connection failed: " . $con->connect_error]);
    exit;
}

// Accept both GET and POST
$uid      = isset($_REQUEST['uid'])      ? intval($_REQUEST['uid'])      : 0;
$pid      = isset($_REQUEST['pid'])      ? intval($_REQUEST['pid'])      : 0;
$quantity = isset($_REQUEST['quantity']) ? intval($_REQUEST['quantity']) : 1;

if ($uid == 0 || $pid == 0) {
    echo json_encode(["status" => "error", "msg" => "uid and pid required. Got uid=$uid pid=$pid"]);
    exit;
}

// Check: Is item already in cart?
$check = $con->query("SELECT cart_id, quantity FROM cart WHERE uid='$uid' AND pid='$pid'");

if ($check && $check->num_rows > 0) {
    // Already exists — increase quantity
    $row     = $check->fetch_object();
    $newQty  = $row->quantity + $quantity;
    $cart_id = $row->cart_id;
    $update  = $con->query("UPDATE cart SET quantity='$newQty' WHERE cart_id='$cart_id'");
    if ($update) {
        echo json_encode(["status" => "updated", "msg" => "Quantity updated to $newQty", "cart_id" => $cart_id]);
    } else {
        echo json_encode(["status" => "error", "msg" => $con->error]);
    }
} else {
    // New item — insert
    $insert = $con->query("INSERT INTO cart (pid, quantity, uid) VALUES ('$pid', '$quantity', '$uid')");
    if ($insert) {
        $newId = $con->insert_id;
        echo json_encode(["status" => "added", "msg" => "Added to cart", "cart_id" => $newId]);
    } else {
        echo json_encode(["status" => "error", "msg" => $con->error]);
    }
}

$con->close();
?>