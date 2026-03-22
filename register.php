<?php
session_start();

if (isset($_SESSION["user_id"])) {
    header("Location: profile.php");
    exit();
}

include 'php/db.php';

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $full_name = trim($_POST["full_name"]);
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    if ($full_name == "" || $email == "" || $password == "") {
        $message = "Please fill in all fields.";
    } else {

        $check = $conn->prepare("SELECT id FROM users WHERE email = ?");
        $check->bind_param("s", $email);
        $check->execute();
        $check->store_result();

        if ($check->num_rows > 0) {
            $message = "An account with this email already exists.";
        } else {

            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            $stmt = $conn->prepare("INSERT INTO users (full_name, email, password) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $full_name, $email, $hashed_password);

            if ($stmt->execute()) {
                $message = "Registration successful. You can now log in.";
            } else {
                $message = "Something went wrong. Please try again.";
            }

            $stmt->close();
        }

        $check->close();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register - Horizon Realty</title>
    <meta charset="UTF-8">
    <meta name="description" content="Register for Horizon Realty admin access.">
    <meta name="keywords" content="register, admin, Horizon Realty">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="media/favicon.ico">
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="spring-theme">

<div style="max-width: 400px; margin: 5rem auto; padding: 2rem; background: rgba(255,255,255,0.95); border-radius: 12px; box-shadow: 0 4px 20px rgba(0,0,0,0.1); text-align: center;">

<h1>Create Account</h1>

<?php if ($message != "") echo "<p style='color: " . (strpos($message, 'successful') !== false ? 'green' : 'red') . ";'>$message</p>"; ?>

<form method="POST" style="text-align: left;">

    <label>Full Name</label><br>
    <input type="text" name="full_name" required style="width: 100%; padding: 0.6rem; margin-top: 0.3rem; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box;"><br><br>

    <label>Email</label><br>
    <input type="email" name="email" required style="width: 100%; padding: 0.6rem; margin-top: 0.3rem; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box;"><br><br>

    <label>Password</label><br>
    <input type="password" name="password" required style="width: 100%; padding: 0.6rem; margin-top: 0.3rem; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box;"><br><br>

    <button type="submit" style="width: 100%; padding: 0.8rem; background: var(--primary-color); color: #fff; border: none; border-radius: 5px; cursor: pointer; font-size: 1rem;">Register</button>

    <br><br>
    <p>Already have an account? <a href="login.php">Login here</a></p>

</form>

<p style="text-align: center; margin-top: 1rem;"><a href="login.php" style="color: var(--primary-color); text-decoration: none;">Already have an account? Login</a></p>

</div>

<script src="scripts.js"></script>
</body>
</html>
