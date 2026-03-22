<?php
session_start();
session_unset();
session_destroy();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Logout - Horizon Realty</title>
    <meta charset="UTF-8">
    <meta name="description" content="Logging out from Horizon Realty.">
    <meta name="keywords" content="logout, Horizon Realty">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assets/media/favicon.ico">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="spring-theme">

<div style="max-width: 400px; margin: 5rem auto; padding: 2rem; background: rgba(255,255,255,0.95); border-radius: 12px; box-shadow: 0 4px 20px rgba(0,0,0,0.1); text-align: center;">

<h1>Logged Out</h1>

<p>You have been successfully logged out.</p>

<p><a href="login.php" style="display: inline-block; margin-top: 1rem; padding: 0.5rem 1rem; background: var(--primary-color); color: #fff; text-decoration: none; border-radius: 5px;">Login Again</a></p>

</div>

<script src="assets/js/scripts.js"></script>
<script>
    // Redirect after 3 seconds
    setTimeout(function() {
        window.location.href = 'login.php';
    }, 3000);
</script>
</body>
</html>
