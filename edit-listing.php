<?php
session_start();
include 'php/db.php';

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
    <link rel="icon" href="media/favicon.ico">
    <title>Horizon Realty - Edit Listing</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="spring-theme">

<div style="max-width: 600px; margin: 5rem auto; padding: 2rem; background: rgba(255,255,255,0.95); border-radius: 12px; box-shadow: 0 4px 20px rgba(0,0,0,0.1);">

<h1>Edit Listing</h1>

<?php if ($message != "") echo "<p style='color: " . (strpos($message, 'successfully') !== false ? 'green' : 'red') . ";'>$message</p>"; ?>

<form method="POST" style="text-align: left;">

    <label>Title</label><br>
    <input type="text" name="title" value="<?php echo htmlspecialchars($row["title"]); ?>" required style="width: 100%; padding: 0.6rem; margin-top: 0.3rem; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box;"><br><br>

    <label>Category</label><br>
    <input type="text" name="category" value="<?php echo htmlspecialchars($row["category"]); ?>" required style="width: 100%; padding: 0.6rem; margin-top: 0.3rem; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box;"><br><br>

    <label>Price</label><br>
    <input type="number" name="price" value="<?php echo htmlspecialchars($row["price"]); ?>" required style="width: 100%; padding: 0.6rem; margin-top: 0.3rem; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box;"><br><br>

    <label>Address</label><br>
    <input type="text" name="address" value="<?php echo htmlspecialchars($row["address"]); ?>" required style="width: 100%; padding: 0.6rem; margin-top: 0.3rem; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box;"><br><br>

    <label>Image</label><br>
    <input type="text" name="image" value="<?php echo htmlspecialchars($row["image"]); ?>" required style="width: 100%; padding: 0.6rem; margin-top: 0.3rem; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box;"><br><br>

    <label>Beds</label><br>
    <input type="number" name="beds" value="<?php echo htmlspecialchars($row["beds"]); ?>" required style="width: 100%; padding: 0.6rem; margin-top: 0.3rem; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box;"><br><br>

    <label>Baths</label><br>
    <input type="number" name="baths" value="<?php echo htmlspecialchars($row["baths"]); ?>" required style="width: 100%; padding: 0.6rem; margin-top: 0.3rem; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box;"><br><br>

    <label>Square Feet</label><br>
    <input type="number" name="sqft" value="<?php echo htmlspecialchars($row["sqft"]); ?>" required style="width: 100%; padding: 0.6rem; margin-top: 0.3rem; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box;"><br><br>

    <button type="submit" style="width: 100%; padding: 0.8rem; background: var(--primary-color); color: #fff; border: none; border-radius: 5px; cursor: pointer; font-size: 1rem;">Save Changes</button>
</form>

<p style="text-align: center; margin-top: 1rem;">
    <a href="admin-listings.php" style="color: var(--primary-color); text-decoration: none;">Back to Admin Listings</a> |
    <a href="profile.php" style="color: var(--primary-color); text-decoration: none;">Profile</a> |
    <a href="index.php" style="color: var(--primary-color); text-decoration: none;">Home</a> |
    <a href="logout.php" style="color: var(--primary-color); text-decoration: none;">Logout</a>
</p>

</div>

<script src="scripts.js"></script>
</body>
</html>
