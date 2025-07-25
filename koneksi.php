<?php
/**
* NIM   : 2357401017
* Nama  : Ervin Alvian
* Kelas : MI23
*/
$host = 'localhost';
$user = 'root';
$pass = '';
$db   = 'uas_php';
$koneksi = mysqli_connect($host, $user, $pass, $db);
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>