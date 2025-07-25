<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}
include "config/koneksi.php";
$kategori = mysqli_query($koneksi, "SELECT * FROM kategori");
if (isset($_POST['simpan'])) {
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $kategori_id = $_POST['kategori_id'];
    mysqli_query($koneksi, "INSERT INTO produk (nama_produk, harga, kategori_id) VALUES ('$nama', '$harga', '$kategori_id')");
    header("Location: produk.php");
}
?>
<h2>Tambah Produk</h2>
<form method="POST">
    <input type="text" name="nama" placeholder="Nama Produk" required><br>
    <input type="number" name="harga" placeholder="Harga" required><br>
    <select name="kategori_id" required>
        <option value="">Pilih Kategori</option>
        <?php while ($k = mysqli_fetch_assoc($kategori)) { ?>
        <option value="<?= $k['id'] ?>"><?= $k['nama_kategori'] ?></option>
        <?php } ?>
    </select><br>
    <button name="simpan">Simpan</button>
</form>
<a href="produk.php">Kembali</a>