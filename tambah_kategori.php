<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}
include "config/koneksi.php";
if (isset($_POST['simpan'])) {
    $nama = $_POST['nama'];
    mysqli_query($koneksi, "INSERT INTO kategori (nama_kategori) VALUES ('$nama')");
    header("Location: kategori.php");
}
?>
<h2>Tambah Kategori</h2>
<form method="POST">
    <input type="text" name="nama" placeholder="Nama Kategori" required>
    <button name="simpan">Simpan</button>
</form>
<a href="kategori.php">Kembali</a>