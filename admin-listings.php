<?php
session_start();
include 'includes/db.php';

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

if ($_SESSION["user_role"] !== "admin") {
    die("Access denied.");
}

$result = $conn->query("SELECT id, title, category, price FROM listings ORDER BY id ASC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Admin listing management for Horizon Realty">
    <meta name="keywords" content="admin, listings, edit listings, Horizon Realty">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assets/media/favicon.ico">
    <title>Horizon Realty - Admin Listings</title>
    <link rel="stylesheet" href="assets/css/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="spring-theme">
<div class="top-auth-bar">
    <div class="top-auth-inner">
        <a href="profile.php" class="top-auth-link"><i class="fas fa-user-circle"></i> <?php echo htmlspecialchars($_SESSION["user_name"]); ?></a>
        <a href="logout.php" class="top-auth-link"><i class="fas fa-right-from-bracket"></i> Logout</a>
    </div>
</div>

<header>
    <div class="header-container">
        <div class="logo">
            <a href="index.php">
                <img src="assets/media/logo.png" alt="Horizon Realty Logo">
            </a>
        </div>
        <button class="mobile-menu-toggle" aria-label="Toggle navigation menu">
            <span></span>
            <span></span>
            <span></span>
        </button>
        <nav>
            <ul class="nav-menu">
                <li><a href="index.php">HOME</a></li>
                <li><a href="profile.php">PROFILE</a></li>
                <li><a href="admin-users.php">ADMIN USERS</a></li>
                <li><a href="admin-listings.php">ADMIN LISTINGS</a></li>
                <li><a href="monitor.php">MONITOR</a></li>
                <li><a href="help.html">HELP</a></li>
            </ul>
        </nav>
    </div>
</header>

<main class="admin-page">
    <section class="admin-hero">
        <div>
            <span class="admin-eyebrow">Administration</span>
            <h1>Listings Management</h1>
            <p>Review listing inventory, verify pricing, and jump directly into editing property details.</p>
        </div>
        <div class="admin-hero-actions">
            <a href="profile.php" class="profile-button primary"><i class="fas fa-arrow-left"></i> Back to Profile</a>
        </div>
    </section>

    <section class="admin-panel">
        <div class="admin-section-heading">
            <div>
                <h2>All Listings</h2>
                <p><?php echo $result->num_rows; ?> listing(s) available.</p>
            </div>
        </div>

        <div class="admin-table-wrap">
            <table class="admin-table">
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>

                <?php while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row["id"]); ?></td>
                        <td><?php echo htmlspecialchars($row["title"]); ?></td>
                        <td><?php echo htmlspecialchars($row["category"]); ?></td>
                        <td>$<?php echo number_format((float) $row["price"]); ?> CAD</td>
                        <td>
                            <a class="admin-inline-link" href="edit-listing.php?id=<?php echo urlencode($row["id"]); ?>">
                                Edit Listing
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </section>
</main>

<footer>
    <div class="footer-container">
        <p>&copy; 2026 Horizon Realty. All rights reserved.</p>
        <p>Find your dream home with us.</p>
    </div>
</footer>

<script src="assets/js/scripts.js"></script>
</body>
</html>
