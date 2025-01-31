<?php
include "db.php";
session_start();

$user_id = $_SESSION["user_id"];
$sql = "SELECT * FROM transactions WHERE sender_id='$user_id' OR receiver_id='$user_id' ORDER BY transaction_date DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction History | Bank Management System</title>
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

        .transaction-card {
            border-radius: 10px;
            margin-bottom: 20px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .transaction-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .transaction-title {
            font-weight: bold;
        }

        .btn-custom {
            background-color: #ffcc00;
            color: #000;
            font-weight: bold;
            transition: all 0.3s ease-in-out;
        }

        .btn-custom:hover {
            background-color: #e6b800;
            transform: scale(1.1);
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

<!-- Transaction History Content -->
<div class="container">
    <h2 class="text-center mb-4" style="animation: fadeIn 1s ease-in-out;">Your Transaction History</h2>

    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $sender = $row['sender_id'] == $user_id ? 'You' : 'Someone';
            $receiver = $row['receiver_id'] == $user_id ? 'You' : 'Someone';

            echo '
                <div class="card transaction-card p-3">
                    <div class="card-body">
                        <h5 class="transaction-title">Transaction ID: ' . $row["transaction_id"] . '</h5>
                        <p><strong>Sender:</strong> ' . $sender . '</p>
                        <p><strong>Receiver:</strong> ' . $receiver . '</p>
                        <p><strong>Amount:</strong> ' . $row["amount"] . '</p>
                        <p><strong>Date:</strong> ' . $row["transaction_date"] . '</p>
                    </div>
                </div>
            ';
        }
    } else {
        echo "<p class='text-center'>No transactions found.</p>";
    }
    ?>
</div>

<!-- Footer -->
<div class="footer text-center">
    <p>© 2025 Secure Bank. All Rights Reserved.</p>
</div>

</body>
</html>
