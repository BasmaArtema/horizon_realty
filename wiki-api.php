<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Learn how Horizon Realty uses live data APIs for weather and exchange-rate tools.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Live Data APIs - Help</title>
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="icon" href="assets/media/favicon.ico">
    <link href="https://fonts.googleapis.com/css2?family=Didot&display=swap" rel="stylesheet">
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
            <a href="index.php"><img src="assets/media/logo.png" alt="Horizon Realty Logo"></a>
        </div>
        <button class="mobile-menu-toggle" aria-label="Toggle navigation menu">
            <span></span><span></span><span></span>
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
                <li><a href="help.php" class="active">HELP</a></li>
            </ul>
        </nav>
    </div>
</header>
<main>
<h2 class="help-title">Help Wiki</h2>
<div class="help-container">
    <aside class="help-sidebar">
        <h3>Help Topics</h3>
        <ul class="help-menu">
            <li><a href="wiki-welcome.php">Welcome</a></li>
            <li><a href="wiki-listings.php">Browsing Listings</a></li>
            <li><a href="wiki-calculator.php">Financial Tools</a></li>
            <li><a href="wiki-api.php" class="active">Live Data APIs</a></li>
            <li><a href="wiki-admin.php">Admin Guide</a></li>
        </ul>
    </aside>
    <section class="help-section">
        <h2>Live Data Integrations</h2>
        <h3>Weather API</h3>
        <p>The website uses the Open-Meteo API on the homepage to show current Windsor-area weather conditions.</p>
        <h3>Currency Exchange API</h3>
        <p>The Frankfurter API provides live exchange-rate data for CAD, USD, EUR, and GBP on the market stats page.</p>
        <p>API behavior is handled in the shared JavaScript files, especially <code>assets/js/market-stats-script.js</code>.</p>
    </section>
</div>
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
