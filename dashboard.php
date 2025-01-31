<?php
session_start();

// Redirect if not logged in
if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

// Mock user data (replace with actual database data)
$user_name = $_SESSION["user_name"] ?? "User";
$user_balance = "$12,500.00"; // Replace with DB value

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Bank Management System</title>
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
            transition: 0.3s ease-in-out;
            opacity: 0;
            transform: translateY(30px);
            animation: slideIn 0.8s forwards;
        }

        @keyframes slideIn {
            0% {
                opacity: 0;
                transform: translateY(30px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .card:hover {
            transform: scale(1.05);
            box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.3);
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

        .navbar-brand {
            font-size: 1.5rem;
        }

        .footer {
            position: absolute;
            bottom: 10px;
            width: 100%;
            text-align: center;
            color: white;
            padding: 10px;
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

<!-- Dashboard Content -->
<div class="container">
    <h2 class="text-center mb-4" style="animation: fadeIn 1s ease-in-out;">Welcome, <?php echo $user_name; ?> 👋</h2>

    <div class="row mt-4">
        <!-- Balance Card -->
        <div class="col-md-4">
            <div class="card text-dark p-3">
                <h5 class="text-center">💰 Account Balance</h5>
                <p class="text-center fs-4 fw-bold"><?php echo $user_balance; ?></p>
            </div>
        </div>

        <!-- Transfer Money -->
        <div class="col-md-4">
            <div class="card text-dark p-3">
                <h5 class="text-center">📤 Transfer Money</h5>
                <p class="text-center">Send money to others securely.</p>
                <a href="transfer.php" class="btn btn-custom d-block mx-auto">Transfer Now</a>
            </div>
        </div>

        <!-- Transaction History -->
        <div class="col-md-4">
            <div class="card text-dark p-3">
                <h5 class="text-center">📊 Transactions</h5>
                <p class="text-center">View your recent transactions.</p>
                <a href="transactions.php" class="btn btn-custom d-block mx-auto">View History</a>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<div class="footer">
    <p>© 2025 Secure Bank. All Rights Reserved.</p>
</div>

</body>
</html>
