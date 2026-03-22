<?php
session_start();
$category = "single-family";
?>

<!--
  Project: Horizon Realty
  Purpose: Real estate website
  Authors: Parmida Khashayar, Haleema Bibi, and Basma Abou Artema
  Date: 2026-03-26
  Notes:
    - This is the Single Family listings page for Horizon Realty, featuring homes with garden, street, and water views, as well as various garage and driveway options.
-->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Horizon Realty - Single family homes for sale. Browse listings with garden, street, and water views.">
    <meta name="keywords" content="single family homes, houses for sale, real estate, Horizon Realty">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assets/media/favicon.ico">
    <title>Horizon Realty - Single Family Homes</title>
    <link rel="stylesheet" href="assets/css/styles.css">
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
                        <li><a href="single-family.php" class="active">SINGLE FAMILY</a></li>
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
                <li><a href="help.php">HELP</a></li>


            </ul>
        </nav>
        </div>
    </header>

    <main>
        <section class="house-collection">
            <h2>SINGLE FAMILY HOMES</h2>
            <div class="product-grid">
                <?php include 'includes/listings-by-category.php'; ?>
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
