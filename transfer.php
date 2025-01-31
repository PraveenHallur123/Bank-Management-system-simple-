<?php
include "db.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION["user_id"];
    $receiver_id = $_POST["receiver_id"];
    $amount = $_POST["amount"];

    // Check sender balance
    $balance_check = "SELECT balance FROM accounts WHERE user_id='$user_id'";
    $result = $conn->query($balance_check);
    $row = $result->fetch_assoc();

    if ($row["balance"] >= $amount) {
        // Deduct amount from sender
        $conn->query("UPDATE accounts SET balance = balance - $amount WHERE user_id='$user_id'");
        // Add amount to receiver
        $conn->query("UPDATE accounts SET balance = balance + $amount WHERE user_id='$receiver_id'");
        // Insert transaction record
        $conn->query("INSERT INTO transactions (sender_id, receiver_id, amount) VALUES ('$user_id', '$receiver_id', '$amount')");
        
        echo "<div class='alert alert-success'>Money transferred successfully!</div>";
    } else {
        echo "<div class='alert alert-danger'>Insufficient balance!</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transfer Money | Bank Management System</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            background: linear-gradient(135deg, #1a237e, #42a5f5);
            color: white;
            font-family: 'Arial', sans-serif;
            animation: fadeIn 1s ease-in-out;
        }

        @keyframes fadeIn {
            0% {
                opacity: 0;
            }
            100% {
                opacity: 1;
            }
        }

        .navbar {
            background-color: rgba(0, 0, 0, 0.9);
        }

        .container {
            margin-top: 50px;
        }

        .card {
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .btn-custom {
            background-color: #ffcc00;
            color: #000;
            font-weight: bold;
        }

        .btn-custom:hover {
            background-color: #e6b800;
        }

        .alert {
            margin-top: 20px;
        }

        .form-group input {
            margin-bottom: 15px;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="index.php">💳 Bank System</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                <li class="nav-item"><a class="nav-link btn btn-danger btn-sm text-white" href="logout.php">Logout</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- Money Transfer Form -->
<div class="container">
    <h2 class="text-center mb-4">💸 Transfer Money</h2>

    <div class="card p-4">
        <div class="card-body">
            <form method="post">
                <div class="form-group">
                    <input type="number" name="receiver_id" class="form-control" placeholder="Receiver Account ID" required>
                </div>
                <div class="form-group">
                    <input type="number" name="amount" class="form-control" placeholder="Amount" required>
                </div>
                <button type="submit" class="btn btn-custom d-block mx-auto">Transfer Now</button>
            </form>
        </div>
    </div>
</div>

</body>
</html>
