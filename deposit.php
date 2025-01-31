<?php
include "db.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION["user_id"];
    $amount = $_POST["amount"];

    $sql = "UPDATE accounts SET balance = balance + $amount WHERE user_id='$user_id'";
    
    if ($conn->query($sql) === TRUE) {
        echo "Amount deposited successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<form method="post">
    <input type="number" name="amount" placeholder="Enter amount" required>
    <button type="submit">Deposit</button>
</form>
