<?php session_start(); ?>

<!--
  Project: Horizon Realty
  Purpose: Real estate website
  Authors: Parmida Khashayar, Haleema Bibi, and Basma Abou Artema
  Date: 2026-03-26
  Notes:
    - This is the Featured Listings page for Horizon Realty, showcasing top properties in single family, condos, and luxury categories.
-->



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description"
        content="Horizon Realty - Featured listings. Top picks in single family, condos, and luxury.">
    <meta name="keywords" content="featured listings, top homes, real estate, Horizon Realty">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="media/favicon.ico">
    <title>Horizon Realty - Featured Listings</title>
    <link rel="stylesheet" href="styles.css">
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
                <img src="media/logo.png" alt="Horizon Realty Logo">
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
                    <li><a href="featured.php" class="active">FEATURED</a></li>
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
    <main>
        <section class="house-collection">
            <h2>Featured Listings</h2>
            <div class="featured-categories">
                <div class="category-tabs">
                    <button class="tab-button active" data-category="all">All Featured</button>
                    <button class="tab-button" data-category="single-family">Single Family</button>
                    <button class="tab-button" data-category="condos">Condos</button>
                    <button class="tab-button" data-category="luxury">Luxury</button>
                </div>
                <div class="product-grid">
                    <div class="product-card" data-categories="single-family">
                        <img src="media/g1.jpg" alt="Maple Grove Family Home">
                        <div class="gift-badge"><i class="fas fa-home"></i> Popular</div>
                        <h3>Maple Grove Family Home</h3>
                        <p class="product-type">4 bed • 3 bath • 2,400 sq ft • furnished or unfurnished</p>
                        <p class="product-price">$789,000 CAD</p>
                        <a href="virtual-tour.php?listing=L001" class="view-details">View Details</a>
                    </div>
                    <div class="product-card" data-categories="condos,luxury">
                        <img src="media/g2.jpg" alt="Skyline Penthouse">
                        <div class="gift-badge"><i class="fas fa-star"></i> Premium</div>
                        <h3>Skyline Penthouse</h3>
                        <p class="product-type">3 bed • 3 bath • 2,800 sq ft • with or without balcony</p>
                        <p class="product-price">$1,295,000 CAD</p>
                        <a href="virtual-tour.php?listing=L006" class="view-details">View Details</a>
                    </div>
                    <div class="product-card" data-categories="luxury">
                        <img src="media/RFH2.jpg" alt="Vintage Colonial Estate">
                        <h3>Vintage Colonial Estate</h3>
                        <p class="product-type">5 bed • 4 bath • 3,200 sq ft • historic or renovated</p>
                        <p class="product-price">$925,000 CAD</p>
                        <a href="virtual-tour.php?listing=L002" class="view-details">View Details</a>
                    </div>
                </div>
            </div>
        </section>
        <section class="buying-guide">
            <h3>Find Your Perfect Property</h3>
            <div class="guide-cards">
                <div class="guide-card">
                    <i class="fas fa-house-user"></i>
                    <h4>Single Family</h4>
                    <p>Spacious homes with yards, multiple view and parking options for growing families.</p>
                </div>
                <div class="guide-card">
                    <i class="fas fa-building"></i>
                    <h4>Condos & Townhomes</h4>
                    <p>Low-maintenance living with city or courtyard views and flexible finishes.</p>
                </div>
                <div class="guide-card">
                    <i class="fas fa-crown"></i>
                    <h4>Luxury Estates</h4>
                    <p>High-end properties with premium finishes, golf or water views, and multi-car garages.</p>
                </div>
            </div>
            <div class="buying-guide-cta">
                <p>Need help finding a property? Our agents are ready to assist you.</p>
                <a href="contact.php" class="cta-button">CONTACT AN AGENT</a>
            </div>
        </section>
    </main>
    <footer>
        <div class="footer-container">
            <p>&copy; 2026 Horizon Realty. All rights reserved.</p>
            <p>Find your dream home with us.</p>
        </div>
    </footer>
    <script src="scripts.js"></script>
</body>

</html>
