<?php
include 'db.php';


$id = $_POST['id'];


$result = $conn->query("SELECT status FROM users WHERE id = $id");
$row = $result->fetch_assoc();
$current_status = $row['status'];


$new_status = $current_status == 1 ? 0 : 1;


$conn->query("UPDATE users SET status = $new_status WHERE id = $id");


echo json_encode(['new_status' => $new_status]);
?>