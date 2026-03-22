<?php session_start(); ?>

<!--
  Project: Horizon Realty
  Purpose: Real estate website
  Authors: Parmida Khashayar, Haleema Bibi, and Basma Abou Artema
  Date: 2026-03-26
  Notes:
    - This page shows exchange-rate tools and a visual market comparison chart for international buyers.
-->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Horizon Realty - Market stats with exchange rates, a currency converter, and a visual comparison chart for international buyers.">
    <meta name="keywords" content="exchange rates, currency converter, market stats, chart, Horizon Realty">
    <link rel="icon" href="assets/media/favicon.ico">
    <title>Market Stats - Horizon Realty</title>
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
                    <li><a href="market-stats.php" class="active">MARKET STATS</a></li>
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

    <main class="house-price-container">
        <h2 class="house-price-title">MARKET STATS &mdash; EXCHANGE RATES</h2>
        <div class="house-price-content">
            <div class="price-card">
                <div class="price-header">
                    <h3>CAD Reference Rate</h3>
                </div>
                <div class="price-display" id="housePrice">Loading...</div>
                <div class="price-meta">
                    <p>1 CAD vs USD (from API)</p>
                    <p>Updated: <span id="lastUpdated">&mdash;</span></p>
                </div>
                <button class="refresh-button" id="refreshButton">Refresh</button>
            </div>
            <div class="converter-section">
                <div class="converter-card">
                    <h3>Currency Converter</h3>
                    <div class="form-group">
                        <input type="number" id="amount" placeholder="Enter amount" class="form-input" value="100000" step="1000">
                    </div>
                    <div class="form-group">
                        <select id="baseCurrency" class="form-input">
                            <option value="USD">USD</option>
                            <option value="CAD" selected>CAD</option>
                            <option value="EUR">EUR</option>
                            <option value="GBP">GBP</option>
                        </select>
                    </div>
                    <button class="form-button" id="convertButton">Convert</button>
                    <div class="conversion-result" id="conversionResult">Convert to see equivalent in other currencies.</div>
                </div>
                <div class="converter-card">
                    <h3>Common Conversions (1 unit)</h3>
                    <div class="common-conversions" id="commonConversions">
                        <div class="conversion-item"><span>CAD to USD</span><span id="cadUsd">&mdash;</span></div>
                        <div class="conversion-item"><span>CAD to EUR</span><span id="cadEur">&mdash;</span></div>
                        <div class="conversion-item"><span>CAD to GBP</span><span id="cadGbp">&mdash;</span></div>
                    </div>
                </div>
            </div>
        </div>

        <section class="market-chart-card">
            <div class="market-chart-heading">
                <div>
                    <h3>Currency Comparison Chart</h3>
                    <p id="chartSummary">Loading chart data...</p>
                </div>
            </div>
            <div class="market-chart-stage">
                <svg id="currencyChart" class="currency-chart" viewBox="0 0 760 320" role="img" aria-labelledby="chartTitle chartDesc">
                    <title id="chartTitle">Currency comparison chart</title>
                    <desc id="chartDesc">Bar chart showing converted values across supported currencies.</desc>
                </svg>
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
    <script src="assets/js/market-stats-script.js"></script>
</body>

</html>
