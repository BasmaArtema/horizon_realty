-- Horizon Realty database bootstrap file.
-- Creates the core tables and demo data used by the site.

Hostname:
localhost
Database:
abouart_horizon_realty
Username:
abouart_horizon_realty
Password:
UDPKuK2uf3ZP97W2qXxS

USE abouart_horizon_realty;
-- Main property catalog used by the listing pages and admin listing management.
CREATE TABLE listings (
    id VARCHAR(10) PRIMARY KEY,
    title VARCHAR(255),
    category VARCHAR(100),
    price INT,
    address VARCHAR(255),
    image VARCHAR(255),
    option_one VARCHAR(255),
    option_two VARCHAR(255),
    beds INT,
    baths INT,
    sqft INT
);

USE abouart_horizon_realty;

-- Seed the catalog with 20 sample properties for testing and demonstrations.
INSERT INTO listings (id, title, category, price, address, image, option_one, option_two, beds, baths, sqft) VALUES
('L001','Maple Grove Family Home','single-family',789000,'124 Maple Grove Dr','RFH1.jpg','Garden View','Double Garage',4,3,2400),
('L002','Vintage Colonial Estate','single-family',925000,'88 Heritage Lane','RFH2.jpg','Heritage Street View','Triple Garage',5,4,3200),
('L003','Modern Prairie House','single-family',675000,'200 Sunset Blvd','RFH3.jpg','Sunset Prairie View','Open Concept Layout',3,2,2100),
('L004','Riverside Family Home','single-family',845000,'45 River Road','RFH4.jpg','River View','Finished Basement',4,3,2600),
('L005','Downtown Loft Condo','condos',485000,'501 City Tower','EN1.jpg','Downtown Skyline View','Balcony Suite',2,2,1200),
('L006','Skyline Penthouse','condos',1295000,'100 Skyline Ave','EN2.jpg','Penthouse Skyline View','Private Elevator Access',3,3,2800),
('L007','Platinum Harmony Townhome','townhomes',565000,'12 Harmony Way','SR1.jpg','Courtyard View','Attached Garage',3,2,1800),
('L008','Golden Eternity Townhome','townhomes',620000,'7 Eternity Lane','SR2.jpg','Garden View','End-Unit Layout',4,3,2200),
('L009','Celestial Pair Duplex','townhomes',598000,'33 Celestial Dr','SR3.jpg','Pool View','Dual Entrance Design',3,2,1900),
('L010','Titanium Sovereign Estate','luxury',2450000,'1 Sovereign Hill','RHIM1.jpg','Golf Course View','Four-Car Garage',6,5,5000),
('L011','Crystal Lake Mansion','luxury',3250000,'22 Crystal Lake Rd','RHIM2.jpg','Crystal Lake View','Wine Cellar',7,6,6200),
('L012','Downtown Office Complex','commercial',1850000,'450 Business Ave','N1.jpg','Downtown Core Location','Multi-Tenant Offices',0,4,9000),
('L013','Retail Plaza Investment','commercial',2100000,'78 Market Street','N2.jpg','Retail Frontage','High Traffic Corner Lot',0,6,11000),
('L014','Greenfield Development Land','land',350000,'Rural Route 6','L1.jpg','Open Greenfield View','Development Zoning',0,0,0),
('L015','Lakeside Expansion Parcel','land',475000,'Lakeview Drive','L2.jpg','Lakeside View','Expansion-Ready Parcel',0,0,0),
('L016','Urban Apartment Rental','rentals',2500,'10 Downtown St','N1.jpg','Urban Streetscape View','Move-In Ready Lease',2,1,900),
('L017','Suburban Family Rental','rentals',3200,'55 Maple Court','N2.jpg','Suburban Court View','Fenced Backyard',3,2,1500),
('L018','Duplex Investment Property','multi-family',780000,'120 Elm Street','SR2.jpg','Residential Street View','Income Property Layout',4,3,2800),
('L019','Triplex City Investment','multi-family',920000,'89 King Ave','SR3.jpg','City Investment Corridor','Three Self-Contained Units',6,4,3500),
('L020','Mountain View Vacation Home','vacation',425000,'77 Alpine Road','vac1.jpg','Mountain View','Vacation Rental Potential',3,2,1400);

-- User accounts table for registration, login, profile access, and admin permissions.
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role VARCHAR(20) NOT NULL DEFAULT 'user',
    status VARCHAR(20) NOT NULL DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Default admin account for first-time setup and project demonstration.
INSERT INTO users (full_name, email, password, role, status)
VALUES (
    'Admin User',
    'admin@horizonrealty.com',
    '$2y$10$MhEwWzxAjUP6Qbv6SFRWYuB0GqQWUzs75/c1rbCZjXxH/ZqBbh8NC',
    'admin',
    'active'
);
