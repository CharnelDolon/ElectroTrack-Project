<?php
require_once 'includes/db_connect.php';
session_start();
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    $stmt = $conn->prepare("SELECT userID, passwordHash FROM Users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows === 1) {
        $stmt->bind_result($userID, $passwordHash);
        $stmt->fetch();
        if (password_verify($password, $passwordHash)) {
            $_SESSION['user_id'] = $userID;
            $_SESSION['username'] = $username;
            header('Location: dashboard.php');
            exit();
        } else {
            $error = "Invalid credentials.";
        }
    } else {
        $error = "Invalid credentials.";
    }
    $stmt->close();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>ElectroTrack Login</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h2>Login</h2>
    <form method="post">
        <label>Username: <input type="text" name="username" required></label><br>
        <label>Password: <input type="password" name="password" required></label><br>
        <button type="submit">Login</button>
    </form>
    <div class="error"><?= htmlspecialchars($error) ?></div>
</body>
</html> 