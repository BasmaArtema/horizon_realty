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

$result = $conn->query("SELECT id, title, category, price FROM listings ORDER BY id ASC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Admin listing management for Horizon Realty">
    <meta name="keywords" content="admin, listings, edit listings, Horizon Realty">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="media/favicon.ico">
    <title>Horizon Realty - Admin Listings</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .admin-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 2rem;
        }
        .admin-table th, .admin-table td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }
        .admin-table th {
            background-color: var(--primary-color);
            color: #fff;
        }
        .admin-table a {
            color: var(--secondary-color);
            text-decoration: none;
        }
        .admin-table a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body class="spring-theme">

<div style="max-width: 1200px; margin: 5rem auto; padding: 2rem; background: rgba(255,255,255,0.95); border-radius: 12px; box-shadow: 0 4px 20px rgba(0,0,0,0.1);">

<h1>Admin Listings Management</h1>

<p style="text-align: center;"><a href="profile.php" style="display: inline-block; padding: 0.5rem 1rem; background: var(--primary-color); color: #fff; text-decoration: none; border-radius: 5px;">Back to Profile</a></p>

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
        <td>$<?php echo number_format((float)$row["price"]); ?> CAD</td>
        <td>
            <a href="edit-listing.php?id=<?php echo urlencode($row["id"]); ?>">Edit</a>
        </td>
    </tr>
    <?php } ?>
</table>

</div>

<script src="scripts.js"></script>
</body>
</html>
