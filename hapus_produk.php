<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}
include "config/koneksi.php";
$id = $_GET['id'];
mysqli_query($koneksi, "DELETE FROM produk WHERE id='$id'");
header("Location: produk.php");
?>