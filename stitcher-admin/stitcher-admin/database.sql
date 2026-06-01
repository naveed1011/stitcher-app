-- ============================================
-- STITCHER DATABASE SCHEMA
-- FYP Project - AWKUM 2019-2023
-- ============================================

CREATE DATABASE IF NOT EXISTS stitcher_db;
USE stitcher_db;

-- ADMIN TABLE
CREATE TABLE IF NOT EXISTS admin (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert default admin (password: admin123)
INSERT INTO admin (username, password) VALUES 
('admin', MD5('admin123'));

-- USERS TABLE (Customers)
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    contact VARCHAR(20),
    city VARCHAR(100),
    country VARCHAR(100),
    status ENUM('Approved','Rejected','Pending') DEFAULT 'Pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- TAILORS TABLE
CREATE TABLE IF NOT EXISTS tailors (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    contact VARCHAR(20),
    city VARCHAR(100),
    country VARCHAR(100),
    latitude VARCHAR(50),
    longitude VARCHAR(50),
    status ENUM('Approved','Rejected','Pending') DEFAULT 'Pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- ORDERS TABLE
CREATE TABLE IF NOT EXISTS orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    customer_name VARCHAR(100),
    customer_email VARCHAR(150),
    tailor_name VARCHAR(100),
    tailor_email VARCHAR(150),
    order_details TEXT,
    status ENUM('Pending','In Progress','Completed','Cancelled') DEFAULT 'Pending',
    order_time TIME,
    order_date DATE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- EXPENSES TABLE
CREATE TABLE IF NOT EXISTS expenses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    amount DECIMAL(10,2) NOT NULL,
    expenser VARCHAR(100),
    details TEXT,
    expense_date DATE,
    status ENUM('Active','Inactive') DEFAULT 'Active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- MEASUREMENTS TABLE
CREATE TABLE IF NOT EXISTS measurements (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_email VARCHAR(150),
    cloth_type VARCHAR(100),
    measurements_data TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Sample data for testing
INSERT INTO users (name, email, password, contact, city, country, status) VALUES
('Naveed Ahmad', 'example@gmail.com', MD5('pass123'), '03219854216', 'Peshawar', 'Pakistan', 'Approved'),
('Fahad', 'fahadinsaf92@gmail.com', MD5('pass123'), '03482038906', 'Peshawar', 'Pakistan', 'Approved'),
('Bilal', 'pbilal460@gmail.com', MD5('pass123'), '03018763644', 'Peshawar', 'Pakistan', 'Rejected');

INSERT INTO tailors (name, email, password, contact, city, country, latitude, longitude, status) VALUES
('Waqar Ahmad', 'waqar@gmail.com', MD5('pass123'), '03345730213', 'Pabbi', 'Pakistan', '33.9844', '72.1277', 'Approved'),
('Rafeeq', 'rafeeq@gmail.com', MD5('pass123'), '03102889864', 'Peshawar', 'Pakistan', '34.0151', '71.5249', 'Rejected'),
('Shamoil Khattak', 'shamoil@gmail.com', MD5('pass123'), '03148147912', 'Dagbehsod', 'Pakistan', '34.0200', '71.5300', 'Approved');

INSERT INTO orders (customer_name, customer_email, tailor_name, tailor_email, order_details, status, order_time, order_date) VALUES
('Fahad', 'fahadinsaf92@gmail.com', 'Waqar Ahmad', 'waqar@gmail.com', 'Shalwar Qameez', 'Pending', '08:57:18', '2023-05-19'),
('Fahad', 'fahadinsaf92@gmail.com', 'Waqar Ahmad', 'waqar@gmail.com', 'Kurta', 'In Progress', '04:59:46', '2023-05-19'),
('Bilal', 'pbilal460@gmail.com', 'Waqar Ahmad', 'waqar@gmail.com', 'Panjabi', 'Completed', '04:54:24', '2023-05-20');

INSERT INTO expenses (amount, expenser, details, expense_date, status) VALUES
(2000, 'Ali', 'nice', '2023-01-08', 'Active'),
(5000, 'Ali', '2 suits', '2023-01-20', 'Active'),
(200, 'Bilal', '900', '2023-05-02', 'Active'),
(200, 'Bilal', '900', '2023-05-09', 'Active');
