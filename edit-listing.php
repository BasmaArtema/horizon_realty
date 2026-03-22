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

if (!isset($_GET["id"])) {
    die("Listing ID missing.");
}

$id = $_GET["id"];
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = trim($_POST["title"]);
    $category = trim($_POST["category"]);
    $price = (int) $_POST["price"];
    $address = trim($_POST["address"]);
    $image = trim($_POST["image"]);
    $beds = (int) $_POST["beds"];
    $baths = (int) $_POST["baths"];
    $sqft = (int) $_POST["sqft"];

    $stmt = $conn->prepare("UPDATE listings SET title=?, category=?, price=?, address=?, image=?, beds=?, baths=?, sqft=? WHERE id=?");
    $stmt->bind_param("ssissiiis", $title, $category, $price, $address, $image, $beds, $baths, $sqft, $id);

    if ($stmt->execute()) {
        $message = "Listing updated successfully.";
    } else {
        $message = "Error updating listing.";
    }

    $stmt->close();
}

$stmt = $conn->prepare("SELECT * FROM listings WHERE id=?");
$stmt->bind_param("s", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    die("Listing not found.");
}

$row = $result->fetch_assoc();
$stmt->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Edit listing for Horizon Realty">
    <meta name="keywords" content="admin, edit listing, Horizon Realty">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assets/media/favicon.ico">
    <title>Horizon Realty - Edit Listing</title>
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
            <h1>Edit Listing</h1>
            <p>Update property details, pricing, and media information while keeping the catalog accurate.</p>
        </div>
        <div class="admin-hero-actions">
            <a href="admin-listings.php" class="profile-button primary"><i class="fas fa-arrow-left"></i> Back to Listings</a>
        </div>
    </section>

    <section class="admin-panel admin-form-panel">
        <?php if ($message != "") { ?>
            <p class="admin-message <?php echo strpos($message, 'successfully') !== false ? 'success-message' : 'error-message'; ?>">
                <?php echo htmlspecialchars($message); ?>
            </p>
        <?php } ?>

        <form method="POST" class="admin-form-grid">
            <div class="admin-form-field">
                <label for="title">Title</label>
                <input id="title" type="text" name="title" value="<?php echo htmlspecialchars($row["title"]); ?>" required>
            </div>

            <div class="admin-form-field">
                <label for="category">Category</label>
                <input id="category" type="text" name="category" value="<?php echo htmlspecialchars($row["category"]); ?>" required>
            </div>

            <div class="admin-form-field">
                <label for="price">Price</label>
                <input id="price" type="number" name="price" value="<?php echo htmlspecialchars($row["price"]); ?>" required>
            </div>

            <div class="admin-form-field">
                <label for="address">Address</label>
                <input id="address" type="text" name="address" value="<?php echo htmlspecialchars($row["address"]); ?>" required>
            </div>

            <div class="admin-form-field admin-form-field-full">
                <label for="image">Image Path</label>
                <input id="image" type="text" name="image" value="<?php echo htmlspecialchars($row["image"]); ?>" required>
            </div>

            <div class="admin-form-field">
                <label for="beds">Beds</label>
                <input id="beds" type="number" name="beds" value="<?php echo htmlspecialchars($row["beds"]); ?>" required>
            </div>

            <div class="admin-form-field">
                <label for="baths">Baths</label>
                <input id="baths" type="number" name="baths" value="<?php echo htmlspecialchars($row["baths"]); ?>" required>
            </div>

            <div class="admin-form-field admin-form-field-full">
                <label for="sqft">Square Feet</label>
                <input id="sqft" type="number" name="sqft" value="<?php echo htmlspecialchars($row["sqft"]); ?>" required>
            </div>

            <div class="admin-form-actions">
                <button type="submit" class="profile-button primary"><i class="fas fa-floppy-disk"></i> Save Changes</button>
                <a href="profile.php" class="admin-inline-link">Back to Profile</a>
            </div>
        </form>
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
