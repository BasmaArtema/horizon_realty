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

if (isset($_GET["toggle"])) {

    $user_id = (int) $_GET["toggle"];

    $stmt = $conn->prepare("
        UPDATE users
        SET status = CASE
            WHEN status = 'active' THEN 'disabled'
            ELSE 'active'
        END
        WHERE id = ?
    ");

    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $stmt->close();

    header("Location: admin-users.php");
    exit();
}

$result = $conn->query("SELECT id, full_name, email, role, status FROM users ORDER BY id ASC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin - Manage Users</title>
    <meta charset="UTF-8">
    <meta name="description" content="Admin user management for Horizon Realty">
    <meta name="keywords" content="admin, manage users, Horizon Realty">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="media/favicon.ico">
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

<div style="max-width: 1000px; margin: 5rem auto; padding: 2rem; background: rgba(255,255,255,0.95); border-radius: 12px; box-shadow: 0 4px 20px rgba(0,0,0,0.1);">

<h1>User Administration</h1>

<<<<<<< HEAD
<table class="admin-table">
=======
<p>
<a href="profile.php">Back to Profile</a> |
<a href="index.php">Home</a> |
<a href="logout.php">Logout</a>
</p>

<hr>

<table border="1" cellpadding="10">
>>>>>>> haleema2001/main
<tr>
    <th>Name</th>
    <th>Email</th>
    <th>Role</th>
    <th>Status</th>
    <th>Action</th>
</tr>

<?php while ($row = $result->fetch_assoc()) { ?>

<tr>
    <td><?php echo htmlspecialchars($row["full_name"]); ?></td>
    <td><?php echo htmlspecialchars($row["email"]); ?></td>
    <td><?php echo htmlspecialchars($row["role"]); ?></td>
    <td><?php echo htmlspecialchars($row["status"]); ?></td>
    <td>
        <a href="admin-users.php?toggle=<?php echo $row["id"]; ?>">
            <?php echo $row["status"] === "active" ? "Disable" : "Enable"; ?>
        </a>
    </td>
</tr>

<?php } ?>

</table>

<<<<<<< HEAD
<p style="text-align: center; margin-top: 2rem;"><a href="profile.php" style="display: inline-block; padding: 0.5rem 1rem; background: var(--primary-color); color: #fff; text-decoration: none; border-radius: 5px;">Back to Profile</a></p>
=======
<p>
<a href="profile.php">Back to Profile</a> |
<a href="index.php">Home</a> |
<a href="logout.php">Logout</a>
</p>

<hr>
>>>>>>> haleema2001/main

</div>

<script src="scripts.js"></script>
</body>
</html>
