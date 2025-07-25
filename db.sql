CREATE DATABASE uas_php;
USE uas_php;
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50),
    password VARCHAR(255)
);
INSERT INTO users (username, password) VALUES ('admin', MD5('admin123'));
CREATE TABLE kategori (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_kategori VARCHAR(100)
);
CREATE TABLE produk (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_produk VARCHAR(100),
    harga INT,
    kategori_id INT,
    FOREIGN KEY (kategori_id) REFERENCES kategori(id)
);