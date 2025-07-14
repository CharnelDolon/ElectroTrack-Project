<?php
require_once 'includes/db_connect.php';
require_once 'includes/auth.php';
require_login();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ProductID = $_POST['ProductID'];
    $stmt = $conn->prepare("DELETE FROM InventoryTable WHERE ProductID = ?");
    $stmt->bind_param("i", $ProductID);
    $stmt->execute();
}
header('Location: dashboard.php');
exit();
?> 