<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register - Horizon Realty</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<h1>Create Account</h1>

<form method="POST">
    <label>Full Name</label><br>
    <input type="text" name="full_name"><br><br>

    <label>Email</label><br>
    <input type="email" name="email"><br><br>

    <label>Password</label><br>
    <input type="password" name="password"><br><br>

    <button type="submit">Register</button>
</form>

</body>
</html>
