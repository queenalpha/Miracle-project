<?php
// Membuka Session
session_start();
// Prevent Session
if (isset($prevent)) {
    if ($prevent == 'authenticated' && isset($_SESSION['logged_in'])) {
        header('Location: ../pages/home.php');
    } else if ($prevent == 'guest' && !isset($_SESSION['logged_in'])) {
        header('Location: ../pages/login.php');
    }
}
// Koneksi Ke DB MySQL
$conn = mysqli_connect('localhost', 'root', '', 'miracle');
?>