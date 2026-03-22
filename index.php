<!--
  Project: Horizon Realty
  Purpose: Real estate website
  Authors: Parmida Khashayar, Haleema Bibi, and Basma Abou Artema
  Date: 2026-03-26
  Notes:
    - This is the main homepage for Horizon Realty and now acts as a full showcase page for the site's catalog, tools, documentation, and admin features.
-->

<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description"
        content="Horizon Realty - Browse homes, market tools, help guides, admin features, and real estate listings from one polished platform.">
    <meta name="keywords" content="real estate, homes for sale, condos, townhomes, property listings, Horizon Realty">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assets/media/favicon.ico">
    <title>Horizon Realty - Find Your Home</title>
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
                    <li><a href="help.php">HELP</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main class="home-page">
        <section class="home-hero">
            <div class="home-hero-backdrop"></div>
            <div class="home-hero-content">
                <span class="home-eyebrow">Complete Real Estate Experience</span>
                <h1>Browse, compare, calculate, manage, and learn from one polished property platform.</h1>
                <p>Horizon Realty brings together property categories, live market tools, admin controls, help guides, user accounts, themes, and multimedia pages into one cohesive real estate website.</p>
                <div class="home-hero-actions">
                    <a href="featured.php" class="home-cta primary">Explore Featured Homes</a>
                    <a href="market-stats.php" class="home-cta secondary">View Live Market Tools</a>
                </div>
            </div>
            <div class="home-hero-card">
                <h2>What This Site Includes</h2>
                <ul class="home-highlight-list">
                    <li><i class="fas fa-house"></i><span>11 property categories with shared listing rendering</span></li>
                    <li><i class="fas fa-user-lock"></i><span>Public, private, and admin experiences</span></li>
                    <li><i class="fas fa-chart-column"></i><span>Weather, exchange-rate tools, and live charting</span></li>
                    <li><i class="fas fa-circle-question"></i><span>Help center, wiki pages, and guided support</span></li>
                </ul>
            </div>
        </section>

        <section class="home-overview">
            <article class="home-section-intro">
                <span class="home-section-label">Site Overview</span>
                <h2>A homepage that introduces the full project, not just one feature.</h2>
                <p>This landing page highlights the catalog, user account flow, market tools, help and training pages, admin controls, multimedia content, and responsive design so visitors immediately understand the depth of the platform.</p>
            </article>

            <div class="home-stat-grid">
                <div class="home-stat-card">
                    <strong>20</strong>
                    <span>Database-backed property records</span>
                </div>
                <div class="home-stat-card">
                    <strong>3</strong>
                    <span>Switchable site themes for logged-in users</span>
                </div>
                <div class="home-stat-card">
                    <strong>5+</strong>
                    <span>Help and wiki pages for guided support</span>
                </div>
                <div class="home-stat-card">
                    <strong>10+</strong>
                    <span>Dynamic PHP pages across the site</span>
                </div>
            </div>
        </section>

        <section class="home-category-section">
            <div class="home-section-header">
                <div>
                    <span class="home-section-label">Listing Catalog</span>
                    <h2>Browse the property catalog by lifestyle, investment type, or destination.</h2>
                </div>
                <a href="single-family.php" class="home-inline-link">Start Browsing</a>
            </div>
            <div class="home-category-grid">
                <a href="single-family.php" class="home-category-card">
                    <i class="fas fa-home"></i>
                    <strong>Single Family</strong>
                    <span>Family homes, neighborhood properties, and traditional layouts.</span>
                </a>
                <a href="condos.php" class="home-category-card">
                    <i class="fas fa-city"></i>
                    <strong>Condos</strong>
                    <span>Urban condo living with downtown and skyline appeal.</span>
                </a>
                <a href="luxury-estates.php" class="home-category-card">
                    <i class="fas fa-gem"></i>
                    <strong>Luxury Estates</strong>
                    <span>High-end showcase homes with premium features.</span>
                </a>
                <a href="new-developments.php" class="home-category-card">
                    <i class="fas fa-building-circle-check"></i>
                    <strong>New Developments</strong>
                    <span>Fresh inventory for buyers exploring new communities.</span>
                </a>
                <a href="vacation-properties.php" class="home-category-card">
                    <i class="fas fa-umbrella-beach"></i>
                    <strong>Vacation</strong>
                    <span>Getaway properties for leisure, rental, or seasonal use.</span>
                </a>
                <a href="waterfront.php" class="home-category-card">
                    <i class="fas fa-water"></i>
                    <strong>Waterfront</strong>
                    <span>Scenic homes and premium lots near the water.</span>
                </a>
            </div>
        </section>

        <section class="home-feature-grid">
            <article class="home-feature-panel">
                <span class="home-section-label">Interactive Tools</span>
                <h2>Live data and buyer tools</h2>
                <p>Use the mortgage calculator, exchange-rate converter, market chart, and weather widget to make more informed decisions.</p>
                <div class="home-feature-links">
                    <a href="market-stats.php">Market Stats</a>
                    <a href="mortgage-calculator.php">Mortgage Calculator</a>
                    <a href="contact.php">Interactive Map</a>
                </div>
            </article>

            <article class="home-feature-panel">
                <span class="home-section-label">User Experience</span>
                <h2>Accounts, themes, and private pages</h2>
                <p>Registered users can log in, view their profile, and personalize the site with Spring, Christmas, Classic, or Auto theme settings.</p>
                <div class="home-feature-links">
                    <a href="register.php">Register</a>
                    <a href="login.php">Login</a>
                    <a href="profile.php">Profile</a>
                </div>
            </article>

            <article class="home-feature-panel">
                <span class="home-section-label">Documentation</span>
                <h2>Help center and guided wiki</h2>
                <p>The site includes an end-user help center and topic-based wiki pages that explain listings, tools, live APIs, and admin workflows.</p>
                <div class="home-feature-links">
                    <a href="help.php">Help Center</a>
                    <a href="wiki-welcome.php">Wiki Welcome</a>
                    <a href="wiki-admin.php">Admin Guide</a>
                </div>
            </article>

            <article class="home-feature-panel">
                <span class="home-section-label">Admin Area</span>
                <h2>Management and monitoring</h2>
                <p>Admins can manage users, edit listings, and verify the status of core website services through the monitoring dashboard.</p>
                <div class="home-feature-links">
                    <a href="admin-users.php">Admin Users</a>
                    <a href="admin-listings.php">Admin Listings</a>
                    <a href="monitor.php">Monitor</a>
                </div>
            </article>
        </section>

        <section class="home-media-strip">
            <div class="home-media-copy">
                <span class="home-section-label">Multimedia</span>
                <h2>Video, imagery, and immersive presentation</h2>
                <p>The project uses rich listing imagery, video content, and a modern visual identity to present the catalog in a more polished and engaging way.</p>
                <a href="virtual-tour.php" class="home-inline-link">Watch Virtual Tour</a>
            </div>
            <div class="home-media-grid">
                <img src="assets/media/interior.jpg" alt="Interior showcase">
                <img src="assets/media/RHIM1.jpg" alt="Luxury estate exterior">
                <img src="assets/media/vac1.jpg" alt="Vacation property view">
            </div>
        </section>

        <section class="weather-widget" id="weatherSection">
            <h2>Local Weather</h2>
            <div id="weatherContent">Loading weather...</div>
        </section>
    </main>

    <footer>
        <div class="footer-container">
            <p>&copy; 2026 Horizon Realty. All rights reserved.</p>
            <p>Find your dream home with us.</p>
        </div>
    </footer>

    <script src="assets/js/scripts.js"></script>
    <script>
        // API #2: Open-Meteo Weather (free, no API key) - for local weather on home page
        (function() {
            var lat = 42.3149, lon = -83.0364;
            fetch('https://api.open-meteo.com/v1/forecast?latitude=' + lat + '&longitude=' + lon + '&current=temperature_2m,weather_code&timezone=America/Toronto')
                .then(function(r) { return r.json(); })
                .then(function(data) {
                    var cur = data.current;
                    var temp = cur ? cur.temperature_2m : null;
                    var el = document.getElementById('weatherContent');
                    if (el && temp != null) {
                        el.innerHTML = '<p>Temperature: ' + temp + ' &deg;C</p><p>Windsor area</p>';
                    }
                })
                .catch(function() {
                    var el = document.getElementById('weatherContent');
                    if (el) el.innerHTML = '<p>Weather unavailable.</p>';
                });
        })();
    </script>
</body>

</html>
