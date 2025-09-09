<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Welcome</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="box">
    <h2>Welcome to Task 2 Project</h2>

    <?php if (isset($_SESSION['user_id'])): ?>
        <p>You are logged in! Go to your <a href="dashboard.php">Dashboard</a></p>
        <p><a href="logout.php">Logout</a></p>
    <?php else: ?>
        <p><a href="register.php">Signup</a> if you are new.</p>
        <p><a href="login.php">Login</a> if you already have an account.</p>
    <?php endif; ?>
</div>
</body>
</html>