<?php
// Test script to verify password hash
$password = 'admin123';
$hash = '$2y$10$N9qo8uLOickgx2ZMRZoMyeIjZAgcfl7p92ldGxad68LJZdL17lhWy';

echo "Testing password: $password\n";
echo "Stored hash: $hash\n\n";

if (password_verify($password, $hash)) {
    echo "✅ SUCCESS: Password matches the hash!\n";
    echo "The login should work with password 'admin123'\n";
} else {
    echo "❌ FAILED: Password does not match the hash\n";
    echo "Generating a new hash for '$password':\n";
    echo password_hash($password, PASSWORD_DEFAULT) . "\n";
}
?>