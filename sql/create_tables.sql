CREATE DATABASE IF NOT EXISTS electrotrack;
USE electrotrack;

CREATE TABLE IF NOT EXISTS SupplierTable (
    SupplierID INT AUTO_INCREMENT PRIMARY KEY,
    SupplierName VARCHAR(100) NOT NULL,
    Phone VARCHAR(20),
    Email VARCHAR(100)
);

CREATE TABLE IF NOT EXISTS ProductTable (
    ProductID INT AUTO_INCREMENT PRIMARY KEY,
    ProductName VARCHAR(100) NOT NULL,
    Category VARCHAR(100),
    Grade VARCHAR(50),
    SupplierID INT,
    FOREIGN KEY (SupplierID) REFERENCES SupplierTable(SupplierID)
);

CREATE TABLE IF NOT EXISTS InventoryTable (
    ProductID INT PRIMARY KEY,
    Quantity INT NOT NULL,
    Price DECIMAL(10,2) NOT NULL,
    FOREIGN KEY (ProductID) REFERENCES ProductTable(ProductID)
);

CREATE TABLE IF NOT EXISTS Users (
    userID INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    passwordHash VARCHAR(255) NOT NULL
); 