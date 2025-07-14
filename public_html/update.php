<?php
require_once 'includes/db_connect.php';
require_once 'includes/auth.php';
require_login();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ProductID = $_POST['ProductID'];
    $Quantity = $_POST['Quantity'];
    $Price = $_POST['Price'];
    $stmt = $conn->prepare("UPDATE InventoryTable SET Quantity = ?, Price = ? WHERE ProductID = ?");
    $stmt->bind_param("idi", $Quantity, $Price, $ProductID);
    $stmt->execute();
}
header('Location: dashboard.php');
exit();
?> 