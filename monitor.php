<?php
session_start();
include 'includes/db.php';

$services = [];

/* Database connection check */
if ($conn && !$conn->connect_error) {
    $services[] = ["name" => "Database Connection", "status" => "Online"];
} else {
    $services[] = ["name" => "Database Connection", "status" => "Offline"];
}

/* Listings table check */
$listings_check = $conn->query("SHOW TABLES LIKE 'listings'");
if ($listings_check && $listings_check->num_rows > 0) {
    $services[] = ["name" => "Listings Table", "status" => "Online"];
} else {
    $services[] = ["name" => "Listings Table", "status" => "Offline"];
}

/* Users table check */
$users_check = $conn->query("SHOW TABLES LIKE 'users'");
if ($users_check && $users_check->num_rows > 0) {
    $services[] = ["name" => "Users Table", "status" => "Online"];
} else {
    $services[] = ["name" => "Users Table", "status" => "Offline"];
}

/* Listings query check */
$listings_query = $conn->query("SELECT COUNT(*) AS total FROM listings");
if ($listings_query) {
    $row = $listings_query->fetch_assoc();
    $services[] = ["name" => "Listings Query", "status" => "Online (" . $row["total"] . " records)"];
} else {
    $services[] = ["name" => "Listings Query", "status" => "Offline"];
}

/* Core PHP pages check */
$pages = [
    "register.php" => "Registration Page",
    "login.php" => "Login Page",
    "profile.php" => "Profile Page",
    "admin-users.php" => "Admin Users Page",
    "townhomes.php" => "Townhomes Page",
    "single-family.php" => "Single Family Page",
    "condos.php" => "Condos Page",
    "luxury-estates.php" => "Luxury Estates Page"
];

foreach ($pages as $file => $label) {
    if (file_exists($file)) {
        $services[] = ["name" => $label, "status" => "Online"];
    } else {
        $services[] = ["name" => $label, "status" => "Offline"];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Horizon Realty website monitoring page">
    <meta name="keywords" content="monitoring, website status, Horizon Realty">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assets/media/favicon.ico">
    <title>Horizon Realty - Monitoring Page</title>
    <link rel="stylesheet" href="assets/css/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body class="spring-theme">
    <div class="top-auth-bar">
        <div class="top-auth-inner">
            <?php if (isset($_SESSION["user_id"])) { ?>
                <a href="profile.php" class="top-auth-link"><i class="fas fa-user-circle"></i> <?php echo htmlspecialchars($_SESSION["user_name"]); ?></a>
                <a href="logout.php" class="top-auth-link"><i class="fas fa-right-from-bracket"></i> Logout</a>
            <?php } else { ?>
                <a href="login.php" class="top-auth-link"><i class="fas fa-right-to-bracket"></i> Login</a>
                <a href="register.php" class="top-auth-link"><i class="fas fa-user-plus"></i> Register</a>
            <?php } ?>
        </div>
    </div>
    <header>
        <div class="header-container">
            <div class="logo">
                <img src="assets/media/logo.png" alt="Horizon Realty Logo">
            </div>
            <button class="mobile-menu-toggle" aria-label="Toggle navigation menu">
                <span></span>
                <span></span>
                <span></span>
            </button>
            <nav>
                <ul class="nav-menu">
                    <li><a href="index.php">HOME</a></li>
                    <li class="dropdown">
                        <a href="#" aria-haspopup="true" aria-expanded="false">LISTINGS</a>
                        <ul class="dropdown-content" aria-label="Listing categories">
                            <li><a href="single-family.php">SINGLE FAMILY</a></li>
                            <li><a href="condos.php">CONDOS</a></li>
                            <li><a href="townhomes.php">TOWNHOMES</a></li>
                            <li><a href="luxury-estates.php">LUXURY ESTATES</a></li>
                            <li><a href="commercial.php">COMMERCIAL</a></li>
                            <li><a href="land.php">LAND</a></li>
                            <li><a href="rentals.php">RENTALS</a></li>
                            <li><a href="multi-family.php">MULTI-FAMILY</a></li>
                            <li><a href="new-developments.php">NEW DEVELOPMENTS</a></li>
                            <li><a href="vacation-properties.php">VACATION</a></li>
                            <li><a href="waterfront.php">WATERFRONT</a></li>
                        </ul>
                    </li>
                    <li><a href="featured.php">FEATURED</a></li>
                    <li><a href="market-stats.php">MARKET STATS</a></li>
                    <li><a href="mortgage-calculator.php">MORTGAGE CALCULATOR</a></li>
                    <li><a href="virtual-tour.php">VIRTUAL TOUR</a></li>
                    <li><a href="buying-guide.php">BUYING GUIDE</a></li>
                    <li><a href="contact.php">CONTACT</a></li>
                    <li><a href="about.php">ABOUT US</a></li>
                    <li><a href="help.html">HELP</a></li>
                    <li><a href="monitor.php" class="active">MONITOR</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main class="admin-page">
        <section class="admin-hero">
            <div>
                <span class="admin-eyebrow">System Overview</span>
                <h1>Website Monitoring</h1>
                <p>This dashboard reports the current status of the major Horizon Realty services and critical site pages.</p>
            </div>
            <div class="admin-hero-actions">
                <a href="profile.php" class="profile-button primary"><i class="fas fa-arrow-left"></i> Back to Profile</a>
            </div>
        </section>

        <section class="admin-panel">
            <div class="admin-section-heading">
                <div>
                    <h2>Service Status</h2>
                    <p><?php echo count($services); ?> checks completed.</p>
                </div>
            </div>

            <div class="admin-table-wrap">
                <table class="admin-table">
                    <tr>
                        <th>Service</th>
                        <th>Status</th>
                    </tr>

                    <?php foreach ($services as $service) { ?>
                        <tr>
                            <td><?php echo htmlspecialchars($service["name"]); ?></td>
                            <td>
                                <span class="admin-status-badge <?php echo stripos($service["status"], 'Online') === 0 ? 'status-online' : 'status-offline'; ?>">
                                    <?php echo htmlspecialchars($service["status"]); ?>
                                </span>
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
