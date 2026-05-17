<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

$conn = mysqli_connect("localhost", "root", "", "petshop");

if (!$conn) {
    echo json_encode(["status" => "error", "message" => "DB failed"]);
    exit();
}

$fname    = isset($_POST['fname'])    ? trim($_POST['fname'])    : "";
$lname    = isset($_POST['lname'])    ? trim($_POST['lname'])    : "";
$email    = isset($_POST['email'])    ? trim($_POST['email'])    : "";
$password = isset($_POST['password']) ? trim($_POST['password']) : "";
$uname    = $fname . " " . $lname;

$check = mysqli_query($conn, "SELECT id FROM user WHERE email='$email'");
if (mysqli_num_rows($check) > 0) {
    echo json_encode(["status" => "error", "message" => "Email already registered."]);
    exit();
}

$sql = "INSERT INTO user (uname, email, password) VALUES ('$uname', '$email', '$password')";

if (mysqli_query($conn, $sql)) {
    echo json_encode([
        "status" => "success",
        "id"     => mysqli_insert_id($conn),
        "uname"  => $uname,
        "email"  => $email
    ]);
} else {
    echo json_encode(["status" => "error", "message" => mysqli_error($conn), "sql" => $sql, "uname" => $uname, "email" => $email, "password" => $password]);

mysqli_close($conn);}
?>