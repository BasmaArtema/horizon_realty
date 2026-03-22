<?php
session_start();

if (isset($_SESSION["user_id"])) {
    header("Location: profile.php");
    exit();
}

include 'php/db.php';

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    if ($email == "" || $password == "") {
        $message = "Please fill in all fields.";
    } else {
        $stmt = $conn->prepare("SELECT id, full_name, email, password, role, status FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($user = $result->fetch_assoc()) {
            if ($user["status"] !== "active") {
                $message = "Your account is disabled.";
            } elseif (password_verify($password, $user["password"])) {
                $_SESSION["user_id"] = $user["id"];
                $_SESSION["user_name"] = $user["full_name"];
                $_SESSION["user_email"] = $user["email"];
                $_SESSION["user_role"] = $user["role"];

                header("Location: profile.php");
                exit();
            } else {
                $message = "Invalid email or password.";
            }
        } else {
            $message = "Invalid email or password.";
        }

        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login - Horizon Realty</title>
    <meta charset="UTF-8">
    <meta name="description" content="Admin login for Horizon Realty.">
    <meta name="keywords" content="login, admin, Horizon Realty">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="media/favicon.ico">
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="spring-theme">

<div style="max-width: 400px; margin: 5rem auto; padding: 2rem; background: rgba(255,255,255,0.95); border-radius: 12px; box-shadow: 0 4px 20px rgba(0,0,0,0.1); text-align: center;">

<h1>Admin Login</h1>

<?php if ($message != "") echo "<p style='color: red;'>$message</p>"; ?>

<form method="POST" style="text-align: left;">

    <label>Email</label><br>
    <input type="email" name="email" required style="width: 100%; padding: 0.6rem; margin-top: 0.3rem; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box;"><br><br>

    <label>Password</label><br>
    <input type="password" name="password" required style="width: 100%; padding: 0.6rem; margin-top: 0.3rem; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box;"><br><br>

    <button type="submit" style="width: 100%; padding: 0.8rem; background: var(--primary-color); color: #fff; border: none; border-radius: 5px; cursor: pointer; font-size: 1rem;">Login</button>

    <br><br>
    <p>Don't have an account? <a href="register.php">Register here</a></p>

</form>

</div>

<script src="scripts.js"></script>
</body>
</html>
