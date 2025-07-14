USE electrotrack;

INSERT INTO SupplierTable (SupplierName, Phone, Email) VALUES
('ElectroParts Inc.', '123-456-7890', 'contact@electroparts.com'),
('Component World', '555-123-4567', 'info@componentworld.com');

INSERT INTO ProductTable (ProductName, Category, Grade, SupplierID) VALUES
('Resistor', 'Passive', 'A', 1),
('Capacitor', 'Passive', 'B', 2),
('Transistor', 'Active', 'A', 1);

INSERT INTO InventoryTable (ProductID, Quantity, Price) VALUES
(1, 100, 0.10),
(2, 200, 0.25),
(3, 150, 0.50);

-- Add a default user: username 'admin', password 'password' (replace hash with real one)
INSERT INTO Users (username, passwordHash) VALUES
('admin', '$2y$12$sUecbvRvJJ4zfuGg3oQOWeR8LUG7AnDe61MS91fuBukNXQ1LpPecO'); 