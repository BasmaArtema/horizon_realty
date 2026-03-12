<?php
session_start();

if (!isset($_SESSION["user_email"])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Users - Horizon Realty</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<h1>User Administration</h1>
<p>Logged in as: <?php echo htmlspecialchars($_SESSION["user_email"]); ?></p>

<p>This page will allow an admin to manage user accounts.</p>

<table border="1" cellpadding="10">
<tr>
<th>Name</th>
<th>Email</th>
<th>Status</th>
<th>Action</th>
</tr>

<tr>
<td>Example User</td>
<td>example@email.com</td>
<td>Active</td>
<td><button>Disable</button></td>
</tr>

<tr>
<td>Test User</td>
<td>test@email.com</td>
<td>Disabled</td>
<td><button>Enable</button></td>
</tr>

</table>

</body>
</html>
