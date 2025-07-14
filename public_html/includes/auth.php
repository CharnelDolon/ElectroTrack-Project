<?php
session_start();
function is_logged_in() {
    return isset($_SESSION['user_id']);
}
function require_login() {
    if (!is_logged_in()) {
        header('Location: index.php');
        exit();
    }
}
?> 