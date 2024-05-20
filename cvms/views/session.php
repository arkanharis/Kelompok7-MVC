<?php
// Manage sessions and related logic
session_start();
if (strlen($_SESSION['cvmsaid']) == 0) {
    header('location:logout.php');
    exit;
}
?>
