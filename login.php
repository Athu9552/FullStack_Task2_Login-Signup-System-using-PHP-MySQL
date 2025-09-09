<?php
include 'db.php';
session_start();
$msg = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT id,password FROM users WHERE username=? OR email=?");
    $stmt->bind_param("ss", $username, $username);
    $stmt->execute();
    $stmt->bind_result($id, $hash);

    if ($stmt->fetch() && password_verify($password, $hash)) {
        $_SESSION['user_id'] = $id;
        header("Location: dashboard.php");
        exit;
    } else {
        $msg = "Invalid login!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="box">
    <h2>Login</h2>
    <p style="color:red;"><?= $msg ?></p>
    <form method="post">
        <input type="text" name="username" placeholder="Username or Email" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <button type="submit">Login</button>
    </form>
    <p><a href="register.php">New user? Signup</a></p>
</div>
</body>
</html>