<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json");

$conn = mysqli_connect("localhost", "root", "", "petshop");

if (!$conn) {
    echo json_encode(["status" => "error", "message" => "DB connection failed"]);
    exit();
}

$email    = isset($_POST['email'])    ? trim($_POST['email'])    : "";
$password = isset($_POST['password']) ? trim($_POST['password']) : "";

$sql    = "SELECT * FROM user WHERE email='$email' AND password='$password'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    echo json_encode([
        "status" => "success",
        "id"     => $row['id'],
        "name"   => $row['uname'],
        "email"  => $row['email']
    ]);
} else {
    echo json_encode(["status" => "error", "message" => "Invalid email or password"]);
}

mysqli_close($conn);
?>