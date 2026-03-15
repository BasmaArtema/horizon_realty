<?php
session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>My Profile - Horizon Realty</title>
    <meta charset="UTF-8">
    <meta name="description" content="Admin profile for Horizon Realty.">
    <meta name="keywords" content="profile, admin, Horizon Realty">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="media/favicon.ico">
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="spring-theme">

<div style="max-width: 600px; margin: 5rem auto; padding: 2rem; background: rgba(255,255,255,0.95); border-radius: 12px; box-shadow: 0 4px 20px rgba(0,0,0,0.1); text-align: center;">

<h1>My Profile</h1>

<p>Welcome to your private account area.</p>
<p><strong>Name:</strong> <?php echo htmlspecialchars($_SESSION["user_name"]); ?></p>
<p><strong>Email:</strong> <?php echo htmlspecialchars($_SESSION["user_email"]); ?></p>
<p><strong>Role:</strong> <?php echo htmlspecialchars($_SESSION["user_role"]); ?></p>

<p><a href="logout.php" style="display: inline-block; margin: 1rem; padding: 0.5rem 1rem; background: var(--primary-color); color: #fff; text-decoration: none; border-radius: 5px;">Logout</a></p>

<?php if ($_SESSION["user_role"] === "admin") { ?>
    <p><a href="admin-users.php" style="display: inline-block; margin: 0.5rem; padding: 0.5rem 1rem; background: var(--secondary-color); color: #fff; text-decoration: none; border-radius: 5px;">Manage Users</a></p>
    <p><a href="admin-listings.php" style="display: inline-block; margin: 0.5rem; padding: 0.5rem 1rem; background: var(--secondary-color); color: #fff; text-decoration: none; border-radius: 5px;">Manage Listings</a></p>
<?php } ?>

</div>

<script src="scripts.js"></script>
</body>
</html>
