<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === 'fang' && $password === '1234') {
        $_SESSION['username'] = $username;

        if (isset($_POST['remember'])) {
            setcookie('username', $username, time() + 300, '/');
            setcookie('password', $password, time() + 300, '/');
        }

        header("Location: home.php");
        exit();
    } else {
        echo "Invalid username or password. Please try again.";
    }
}
?>

<div class="container">
    <h2>Login Page</h2>
    <form action="login.php" method="post">
        <label for="username">Username/Email/ID:</label>
        <input type="text" name="username" required>

        <label for="password">Password:</label>
        <input type="password" name="password" required>

        <label for="remember">Remember me:</label>
        <input type="checkbox" name="remember">

        <button type="submit">Login</button>
    </form>
</div>

</body>
</html>
