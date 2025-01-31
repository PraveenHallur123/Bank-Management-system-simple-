<?php
include "db.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($sql);
    $user = $result->fetch_assoc();

    if ($user && password_verify($password, $user["password"])) {
        $_SESSION["user_id"] = $user["user_id"];
        echo "<div class='alert alert-success' role='alert'>Login successful! Redirecting...</div>";
        header("Location: dashboard.php");
        exit;
    } else {
        echo "<div class='alert alert-danger' role='alert'>Invalid username or password!</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Bank Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, #0f2027, #203a43, #2c5364);
            color: white;
            font-family: 'Arial', sans-serif;
        }
        .form-container {
            max-width: 400px;
            margin: 50px auto;
            padding: 30px;
            background: rgba(0, 0, 0, 0.7);
            border-radius: 15px;
            box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.3);
        }
        .form-container input,
        .form-container button {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border-radius: 8px;
            border: none;
        }
        .form-container input:focus,
        .form-container button:focus {
            outline: none;
        }
        .form-container input {
            background-color: #f7f7f7;
        }
        .form-container button {
            background-color: #ffcc00;
            color: #000;
            font-weight: bold;
            transition: all 0.3s;
        }
        .form-container button:hover {
            background-color: #e6b800;
            transform: scale(1.05);
        }
        .form-container h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .alert {
            margin-top: 20px;
            text-align: center;
        }
        .footer {
            text-align: center;
            margin-top: 50px;
            color: #fff;
        }
        .footer a {
            color: #ffcc00;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2>Login to Your Account</h2>
    <form method="post">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
    </form>
    <p class="text-center text-white">Don't have an account? <a href="register.php" class="text-info">Register here</a></p>
    <p class="text-center text-white">Home| <a href="index.php" class="text-info">Home</a></p>
</div>

<div class="footer">
    <p>© 2025 Secure Bank. All Rights Reserved.</p>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
