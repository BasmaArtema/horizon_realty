<?php
session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

$name = $_SESSION["user_name"];
$email = $_SESSION["user_email"];
$role = $_SESSION["user_role"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Profile - Horizon Realty</title>
    <meta name="description" content="User profile for Horizon Realty.">
    <meta name="keywords" content="profile, account, Horizon Realty">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assets/media/favicon.ico">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="spring-theme">
<div class="top-auth-bar">
    <div class="top-auth-inner">
        <a href="profile.php" class="top-auth-link"><i class="fas fa-user-circle"></i> <?php echo htmlspecialchars($name); ?></a>
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
            </ul>
        </nav>
    </div>
</header>

<main class="profile-page">
    <section class="profile-hero">
        <div class="profile-hero-copy">
            <span class="profile-eyebrow">My Account</span>
            <h1>Welcome back, <?php echo htmlspecialchars($name); ?></h1>
            <p>Manage your Horizon Realty account, jump back into listings, and access your tools from one place.</p>
        </div>
        <div class="profile-summary-card">
            <div class="profile-avatar">
                <i class="fas fa-user"></i>
            </div>
            <h2><?php echo htmlspecialchars($name); ?></h2>
            <p><?php echo htmlspecialchars($email); ?></p>
            <span class="profile-role-badge"><?php echo strtoupper(htmlspecialchars($role)); ?></span>
        </div>
    </section>

    <section class="profile-content-grid">
        <article class="profile-panel">
            <h2>Profile Details</h2>
            <div class="profile-detail-list">
                <div class="profile-detail-item">
                    <span>Name</span>
                    <strong><?php echo htmlspecialchars($name); ?></strong>
                </div>
                <div class="profile-detail-item">
                    <span>Email</span>
                    <strong><?php echo htmlspecialchars($email); ?></strong>
                </div>
                <div class="profile-detail-item">
                    <span>Role</span>
                    <strong><?php echo htmlspecialchars(ucfirst($role)); ?></strong>
                </div>
            </div>
            <div class="profile-action-row">
                <a href="logout.php" class="profile-button primary"><i class="fas fa-right-from-bracket"></i> Logout</a>
            </div>
        </article>

        <article class="profile-panel">
            <h2>Quick Links</h2>
            <div class="profile-link-list">
                <a href="index.php" class="profile-link-card">
                    <i class="fas fa-house"></i>
                    <div>
                        <strong>Home</strong>
                        <span>Return to the main homepage.</span>
                    </div>
                </a>
                <a href="townhomes.php" class="profile-link-card">
                    <i class="fas fa-building"></i>
                    <div>
                        <strong>Browse Listings</strong>
                        <span>Continue exploring available properties.</span>
                    </div>
                </a>
                <a href="featured.php" class="profile-link-card">
                    <i class="fas fa-star"></i>
                    <div>
                        <strong>Featured Homes</strong>
                        <span>See the highlighted listings of the week.</span>
                    </div>
                </a>
            </div>
        </article>

        <?php if ($role === "admin") { ?>
            <article class="profile-panel profile-panel-full">
                <h2>Admin Controls</h2>
                <div class="profile-link-list admin-link-list">
                    <a href="admin-users.php" class="profile-link-card">
                        <i class="fas fa-users-cog"></i>
                        <div>
                            <strong>Manage Users</strong>
                            <span>Review accounts and admin access.</span>
                        </div>
                    </a>
                    <a href="admin-listings.php" class="profile-link-card">
                        <i class="fas fa-list-check"></i>
                        <div>
                            <strong>Manage Listings</strong>
                            <span>Update, add, or remove property listings.</span>
                        </div>
                    </a>
                    <a href="monitor.php" class="profile-link-card">
                        <i class="fas fa-chart-line"></i>
                        <div>
                            <strong>System Monitor</strong>
                            <span>Check site activity and platform status.</span>
                        </div>
                    </a>
                </div>
            </article>
        <?php } ?>
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
