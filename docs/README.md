# Horizon Realty

Horizon Realty is a PHP and MySQL real estate website built for a course project. The site includes public property browsing, user registration and login, private user profiles, admin management pages, multimedia content, and support documentation.

## Live Site

- Production URL: `https://abouart.myweb.cs.uwindsor.ca/index.php`

## Repository

- GitHub repository: `https://github.com/BasmaArtema/horizon_realty`
- The repository is used to store the project source code, branches, and pull request workflow for development and submission tracking.

## Main Features

- Public listing pages for multiple property categories
- User registration, login, logout, and profile pages
- Admin tools for user management, listing management, and service monitoring
- Shared responsive layout with seasonal themes
- Images and video content stored in `assets/media`
- End-user and admin help/wiki pages
- 20 property listings, each with two explicit options shown on listing cards

## Front-End Documentation

The Horizon Realty front end is built with shared, reusable assets so the site stays consistent and is easier to maintain.

- HTML/PHP pages provide the page structure and session-aware navigation.
- `assets/css/styles.css` contains the shared site theme, layout, responsive rules, admin styling, and page-specific UI styling.
- `assets/js/scripts.js` controls seasonal themes, logged-in theme switching, mobile navigation, and featured listing filters.
- `assets/js/market-stats-script.js` powers the market stats tools, currency converter, and chart visualization.
- `assets/media/` stores the visual assets used by the front end, including listing images, branding, and videos.

The front end includes:

- responsive navigation and dropdown menus
- public and logged-in header states
- listing category pages rendered through shared PHP includes
- multimedia sections with images and videos
- interactive UI features such as the mortgage calculator, market stats tools, chart, and map

For user-facing front-end help pages, see:

- `help.php`
- `wiki-welcome.php`
- `wiki-listings.php`
- `wiki-calculator.php`
- `wiki-api.php`

## Project Structure

- `index.php`: Homepage
- `assets/css/`: Shared stylesheet files
- `assets/js/`: Shared JavaScript files
- `assets/media/`: Images, videos, logo, and favicon
- `includes/`: Reusable PHP includes such as the database connection
- `database/`: MySQL setup script
- `docs/`: Project documentation
- Root `.php` and `.html` files: Site pages, admin pages, and help pages

## Installation Guide

### Requirements

- PHP-enabled hosting or a local PHP server
- MySQL or MariaDB
- A web server such as Apache
- A browser for testing
- Git if you want to clone from the repository

### Step 1. Download The Project

Clone the repository:

```bash
git clone https://github.com/BasmaArtema/horizon_realty.git
```

Or copy the project folder into your web server directory manually.

### Step 2. Create A Database

Create a MySQL database and a database user that has permission to read and write to that database.

### Step 3. Import The Schema And Demo Data

Use [`database/db_int.sql`](/c:/Users/smile/OneDrive/Documents/COMP3300_prject/horizon_realty/database/db_int.sql) to create the required tables and load the starter data.

phpMyAdmin method:

1. Open phpMyAdmin.
2. Select your database.
3. Click `Import`.
4. Choose `database/db_int.sql`.
5. Run the import.

Command-line method:

```bash
mysql -u YOUR_USERNAME -p YOUR_DATABASE_NAME < database/db_int.sql
```

This import creates:

- a `listings` table with 20 sample records
- two option fields (`option_one` and `option_two`) for every listing
- a `users` table with a default admin account

### Step 4. Configure PHP Database Access

Open [`includes/db.php`](/c:/Users/smile/OneDrive/Documents/COMP3300_prject/horizon_realty/includes/db.php) and update these values:

- `$host`
- `$username`
- `$password`
- `$database`

These must match the MySQL credentials for the environment where you are deploying the project.

### Step 5. Upload The Files

Upload the complete project to your PHP-enabled host. Keep these folders and files together:

- `assets/`
- `includes/`
- `database/`
- `docs/`
- all root `.php` and `.html` pages

If your host uses a folder such as `public_html`, place the site there or in the assigned course web directory.

### Step 6. Serve The Site Through PHP

Because the project uses PHP sessions and MySQL, do not open the pages as plain local files. Access the site through a web server using a URL such as:

```text
http://localhost/horizon_realty/index.php
```

or your hosted URL.

### Step 7. Verify Core Functionality

After deployment, test these pages first:

- `index.php`
- `register.php`
- `login.php`
- `profile.php`
- `admin-users.php`
- `admin-listings.php`
- `monitor.php`

Also confirm that CSS, JavaScript, images, and videos load correctly from the `assets/` folder.

## Deployment Guide For myweb.cs.uwindsor.ca

To deploy on `myweb.cs.uwindsor.ca`:

1. Upload all project files to your assigned web space.
2. Create or confirm your MySQL database details.
3. Import `database/db_int.sql`.
4. Update [`includes/db.php`](/c:/Users/smile/OneDrive/Documents/COMP3300_prject/horizon_realty/includes/db.php) with the correct host, database name, username, and password.
5. Open the live site and test both public and admin pages.

Current live deployment:

- `https://abouart.myweb.cs.uwindsor.ca/index.php`

## Default Admin Account

The import script creates a demo admin account:

- Email: `admin@horizonrealty.com`
- Password: `admin123`

Change this password after deployment if the site will remain online.

## Updating Site Content

For non-programmers maintaining the site:

- Property records are stored in the MySQL `listings` table.
- Each listing includes `option_one` and `option_two` values that describe two visible product options on the catalog cards.
- Shared styles are in `assets/css/styles.css`.
- Shared site behavior is in `assets/js/scripts.js`.
- Market stats logic is in `assets/js/market-stats-script.js`.
- Images and videos live in `assets/media/`.

To add or replace media:

1. Upload the file to `assets/media/`.
2. Update the page markup or database record that points to that file.
3. Keep file names short and consistent.

## How To Use The Site

This section provides a simple step-by-step guide for end users.

### Public Users

1. Open `index.php` or the live homepage.
2. Use the main navigation to browse listing categories such as Single Family, Condos, Townhomes, and Waterfront.
3. Open `featured.php` to view highlighted listings.
4. Open `market-stats.php` to use the exchange-rate tools and comparison chart.
5. Open `mortgage-calculator.php` to estimate monthly payments.
6. Open `virtual-tour.php` or `about.php` to view multimedia content.
7. Open `contact.php` to send an inquiry or find the office on the interactive map.

### Registered Users

1. Open `register.php` to create an account.
2. Open `login.php` to sign in.
3. After login, use `profile.php` to view account information and quick links.
4. Use the theme switcher in the top bar to choose Auto, Spring, Christmas, or Classic themes.

### Admin Users

1. Log in with an admin account.
2. Open `profile.php`.
3. Use the Admin Controls section to access:
   - `admin-users.php` for enabling or disabling user accounts
   - `admin-listings.php` for reviewing listings
   - `edit-listing.php` for editing listing records
   - `monitor.php` for checking website service status

### Help And Training Pages

Users can access guided help from:

- `help.php` for the Help Center overview
- `wiki-welcome.php` for site introduction
- `wiki-listings.php` for browsing instructions
- `wiki-calculator.php` for mortgage tool guidance
- `wiki-api.php` for live data/API explanation
- `wiki-admin.php` for admin usage guidance

## Troubleshooting

- If the site loads without styling, verify `assets/css/styles.css` uploaded correctly.
- If login fails, verify the database import and `includes/db.php` credentials.
- If admin pages show access denied, make sure you are logged in as an admin user.
- If images or videos are missing, verify the filenames and folder paths in `assets/media/`.
- If database-driven pages fail, verify that MySQL is running and PHP can connect to it.

## Version Control

Suggested contribution flow:

```bash
git checkout -b feature-name
git add .
git commit -m "Describe your change"
git push origin feature-name
```

Then open a pull request and merge after review.
