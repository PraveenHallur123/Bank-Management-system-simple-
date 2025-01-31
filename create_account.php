<?php
include "db.php";
session_start();

$user_id = $_SESSION["user_id"];
$sql = "INSERT INTO accounts (user_id, balance) VALUES ('$user_id', 0.00)";

if ($conn->query($sql) === TRUE) {
    echo "Bank account created successfully!";
} else {
    echo "Error: " . $conn->error;
}
?>
