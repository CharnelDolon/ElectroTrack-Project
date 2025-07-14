<?php
require_once 'includes/db_connect.php';
require_once 'includes/auth.php';
require_login();

$query = $_GET['query'] ?? '';
$like = "%$query%";
$stmt = $conn->prepare(
    "SELECT ProductTable.ProductID, ProductTable.ProductName, ProductTable.Category, ProductTable.Grade, 
            SupplierTable.SupplierName, SupplierTable.Phone, SupplierTable.Email, 
            InventoryTable.Quantity, InventoryTable.Price
     FROM ProductTable
     JOIN SupplierTable ON ProductTable.SupplierID = SupplierTable.SupplierID
     JOIN InventoryTable ON ProductTable.ProductID = InventoryTable.ProductID
     WHERE ProductTable.ProductName LIKE ?
        OR ProductTable.Category LIKE ?
        OR ProductTable.Grade LIKE ?
        OR SupplierTable.SupplierName LIKE ?
     ORDER BY ProductTable.ProductID ASC"
);
$stmt->bind_param("ssss", $like, $like, $like, $like);
$stmt->execute();
$result = $stmt->get_result();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Search Results</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h2>Search Results for "<?= htmlspecialchars($query) ?>"</h2>
    <a href="dashboard.php">Back to Dashboard</a>
    <table>
        <tr>
            <th>Product ID</th><th>Product Name</th><th>Category</th><th>Grade</th><th>Supplier</th><th>Phone</th><th>Email</th><th>Quantity</th><th>Price</th><th>Actions</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= htmlspecialchars($row['ProductID']) ?></td>
            <td><?= htmlspecialchars($row['ProductName']) ?></td>
            <td><?= htmlspecialchars($row['Category']) ?></td>
            <td><?= htmlspecialchars($row['Grade']) ?></td>
            <td><?= htmlspecialchars($row['SupplierName']) ?></td>
            <td><?= htmlspecialchars($row['Phone']) ?></td>
            <td><?= htmlspecialchars($row['Email']) ?></td>
            <td><?= htmlspecialchars($row['Quantity']) ?></td>
            <td><?= htmlspecialchars($row['Price']) ?></td>
            <td>
                <form method="post" action="update.php" style="display:inline;">
                    <input type="hidden" name="ProductID" value="<?= $row['ProductID'] ?>">
                    <input type="number" name="Quantity" min="0" value="<?= $row['Quantity'] ?>">
                    <input type="number" name="Price" min="0" step="0.01" value="<?= $row['Price'] ?>">
                    <button type="submit">Update</button>
                </form>
                <form method="post" action="delete.php" style="display:inline;">
                    <input type="hidden" name="ProductID" value="<?= $row['ProductID'] ?>">
                    <button type="submit" onclick="return confirm('Delete this record?')">Delete</button>
                </form>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html> 