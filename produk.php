<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}
include "config/koneksi.php";
$data = mysqli_query($koneksi, "SELECT produk.*, kategori.nama_kategori FROM produk JOIN kategori ON produk.kategori_id = kategori.id");
?>
<h2>Data Produk</h2>
<a href="dashboard.php">Kembali ke Dashboard</a> | 
<a href="tambah_produk.php">Tambah Produk</a> | 
<a href="logout.php">Logout</a>
<table border="1" cellpadding="10" cellspacing="0">
    <tr>
        <th>ID</th>
        <th>Nama Produk</th>
        <th>Harga</th>
        <th>Kategori</th>
        <th>Aksi</th>
    </tr>
    <?php while ($row = mysqli_fetch_assoc($data)) { ?>
    <tr>
        <td><?= $row['id'] ?></td>
        <td><?= $row['nama_produk'] ?></td>
        <td><?= $row['harga'] ?></td>
        <td><?= $row['nama_kategori'] ?></td>
        <td>
            <a href="edit_produk.php?id=<?= $row['id'] ?>">Edit</a> |
            <a href="hapus_produk.php?id=<?= $row['id'] ?>" onclick="return confirm('Hapus?')">Hapus</a>
        </td>
    </tr>
    <?php } ?>
</table>