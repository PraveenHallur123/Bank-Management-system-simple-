<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome | Bank Management System</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            background: linear-gradient(to right, #0f2027, #203a43, #2c5364);
            color: white;
            font-family: 'Arial', sans-serif;
        }
        .navbar {
            background: rgba(0, 0, 0, 0.9);
            padding: 15px;
        }
        .hero-section {
            height: 90vh;
            display: flex;
            align-items: center;
            text-align: center;
            justify-content: center;
            flex-direction: column;
            padding: 20px;
        }
        .hero-section h1 {
            font-size: 3.5rem;
            font-weight: bold;
            animation: fadeInDown 1s ease-in-out;
        }
        .hero-section p {
            font-size: 1.3rem;
            margin-top: 10px;
            animation: fadeInUp 1s ease-in-out;
        }
        .btn-custom {
            background-color: #ffcc00;
            color: #000;
            font-weight: bold;
            padding: 12px 25px;
            font-size: 1.2rem;
            border-radius: 50px;
            transition: all 0.3s ease-in-out;
            animation: fadeIn 1.2s ease-in-out;
        }
        .btn-custom:hover {
            background-color: #e6b800;
            transform: scale(1.1);
        }
        .features {
            padding: 80px 20px;
            text-align: center;
        }
        .features .card {
            border-radius: 15px;
            padding: 20px;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            transition: transform 0.3s ease-in-out;
            color: white;
        }
        .features .card:hover {
            transform: translateY(-10px);
            box-shadow: 0px 5px 15px rgba(255, 255, 255, 0.2);
        }
        .footer {
            background: rgba(0, 0, 0, 0.9);
            padding: 15px;
            text-align: center;
            margin-top: 50px;
        }
        @keyframes fadeInDown {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
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
                <?php if (!isset($_SESSION["user_id"])) { ?>
                    <li class="nav-item"><a class="nav-link" href="register.php">Register</a></li>
                    <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
                    <li class="nav-item"><a class="nav-link" href="https://praveenhallur123.github.io/Praveen-Portfolio-/">Developer</a></li>
                <?php } else { ?>
                    <li class="nav-item"><a class="nav-link" href="dashboard.php">Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link btn btn-danger btn-sm text-white" href="logout.php">Logout</a></li>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>

<!-- Hero Section -->
<div class="hero-section">
    <h1>Welcome to Secure Bank 🚀</h1>
    <p>Manage your finances with ease and security</p>
    <a href="register.php" class="btn btn-custom">Get Started</a>
</div>

<!-- Features Section -->
<div class="container features">
    <h2 class="text-center mb-4">Why Choose Us?</h2>
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <h5 class="text-center">🔐 Secure Banking</h5>
                <p class="text-center">We use advanced encryption to protect your transactions.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <h5 class="text-center">💰 Easy Transfers</h5>
                <p class="text-center">Send and receive money in seconds with our smooth UI.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <h5 class="text-center">📊 Real-Time Updates</h5>
                <p class="text-center">Monitor your balance and transactions instantly.</p>
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
