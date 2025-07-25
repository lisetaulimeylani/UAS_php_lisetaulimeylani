<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}
include "config/koneksi.php";
$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM produk WHERE id='$id'"));
$kategori = mysqli_query($koneksi, "SELECT * FROM kategori");

if (isset($_POST['update'])) {
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $kategori_id = $_POST['kategori_id'];
    mysqli_query($koneksi, "UPDATE produk SET nama_produk='$nama', harga='$harga', kategori_id='$kategori_id' WHERE id='$id'");
    header("Location: produk.php");
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #121212;
            color: #f1f1f1;
        }
        .form-container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #1f1f1f;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.6);
        }
        label {
            font-weight: 500;
        }
        .btn-primary, .btn-secondary {
            width: 100px;
        }
    </style>
</head>
<body>
<div class="form-container">
    <h2 class="text-center mb-4">Edit Produk</h2>
    <form method="POST">
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Produk</label>
            <input type="text" class="form-control" id="nama" name="nama" value="<?= $data['nama_produk'] ?>" required>
        </div>
        <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="number" class="form-control" id="harga" name="harga" value="<?= $data['harga'] ?>" required>
        </div>
        <div class="mb-3">
            <label for="kategori" class="form-label">Kategori</label>
            <select class="form-select" id="kategori" name="kategori_id" required>
                <?php while ($k = mysqli_fetch_assoc($kategori)) { ?>
                    <option value="<?= $k['id'] ?>" <?= $k['id'] == $data['kategori_id'] ? 'selected' : '' ?>>
                        <?= $k['nama_kategori'] ?>
                    </option>
                <?php } ?>
            </select>
        </div>
        <div class="d-flex justify-content-between">
            <a href="produk.php" class="btn btn-secondary">Kembali</a>
            <button type="submit" name="update" class="btn btn-primary">Update</button>
        </div>
    </form>
</div>
</body>
</html>
