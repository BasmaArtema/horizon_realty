# Admin User Documentation

## Overview
This document provides detailed information about the admin user setup and functionality for the Horizon Realty website.

## Admin User Setup
The database includes a default admin user for managing the website's backend functionality. This user is created during the database initialization process using the `database/db_int.sql` script.

### Default Admin Credentials
- **Email**: admin@horizonrealty.com
- **Password**: admin123 (Note: The password is stored as a bcrypt hash in the database for security)
- **Role**: admin
- **Status**: active

### Password Hash
The password "admin123" is hashed using bcrypt with the following hash:
```
$2y$10$N9qo8uLOickgx2ZMRZoMyeIjZAgcfl7p92ldGxad68LJZdL17lhWy
```

## Accessing Admin Features
1. Navigate to the login page (`login.php`) or directly to admin-specific pages.
2. Log in using the admin credentials provided above.
3. Admin users have elevated privileges to:
   - Manage user accounts (view, edit, delete)
   - Manage property listings (add, edit, remove)
   - Access system monitoring and configuration
   - View and manage database records

## Admin Pages
The following PHP files provide admin functionality:
- `admin-listings.php`: Manage property listings
- `admin-users.php`: Manage user accounts
- `login.php`: Admin login page
- `register.php`: User registration (admin oversight)
- `monitor.php`: System monitoring
- `edit-listing.php`: Edit individual listings
- `profile.php`: Admin profile management

## Security Best Practices
- **Change Default Password**: Immediately change the default admin password after initial setup.
- **Secure Database**: Ensure database connection details in `includes/db.php` are protected and not exposed in version control.
- **HTTPS**: Use HTTPS in production environments to secure admin sessions.
- **Logging**: Implement logging for admin actions for audit trails.
- **Access Control**: Regularly review and update user roles and permissions.
- **Backup**: Maintain regular database backups, especially before making admin changes.

## Database Initialization
To set up the admin user:
1. Run the `database/db_int.sql` script on your MySQL database.
2. This will create the necessary tables and insert the default admin user.
3. Verify the user exists by checking the `users` table.

## Deployment Checklist
Before demonstrating admin features on a new server:
1. Upload the full project, including the `assets`, `includes`, `database`, and `docs` folders.
2. Import `database/db_int.sql` into the target MySQL database.
3. Update `includes/db.php` with the correct host, username, password, and database name.
4. Confirm `login.php`, `profile.php`, `admin-users.php`, `admin-listings.php`, `edit-listing.php`, and `monitor.php` load correctly.
5. Log in as admin and test user toggling, listing editing, and the monitoring page.

## Live Deployment
- Live URL: `https://abouart.myweb.cs.uwindsor.ca/index.php`
- Recommended smoke test after deployment:
  - Log in as admin
  - Open `profile.php`
  - Open `admin-users.php`
  - Open `admin-listings.php`
  - Open `monitor.php`

## Troubleshooting
- If login fails, verify the email and password hash in the database.
- Ensure the database connection is working (check `includes/db.php`).
- Confirm that PHP sessions are enabled on the server.
- Check server error logs for any PHP or database errors.

## Contact
For technical support or questions about admin functionality, contact the development team.
