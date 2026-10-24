CREATE DATABASE IF NOT EXISTS sim_barang
    CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE sim_barang;

-- ===== DDL (membuat tabel) =====
CREATE TABLE users (
    id_user INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE kategori (
    id_kategori INT AUTO_INCREMENT PRIMARY KEY,
    nama_kategori VARCHAR(50) NOT NULL
);

CREATE TABLE barang (
    id_barang INT AUTO_INCREMENT PRIMARY KEY,
    kode VARCHAR(20) NOT NULL UNIQUE,
    nama VARCHAR(100) NOT NULL,
    id_kategori INT NOT NULL,
    jumlah INT NOT NULL,
    harga INT NOT NULL,
    kondisi VARCHAR(20) NOT NULL,
    FOREIGN KEY (id_kategori) REFERENCES kategori(id_kategori)
);

-- ===== DML (data awal) =====
INSERT INTO kategori (nama_kategori) VALUES
    ('Elektronik'),
    ('Perabot'),
    ('Alat Tulis');

INSERT INTO barang (kode, nama, id_kategori, jumlah, harga, kondisi) VALUES
    ('BRG-001', 'Proyektor', 1, 5, 4500000, 'Baik'),
    ('BRG-002', 'Komputer', 1, 30, 7000000, 'Baik'),
    ('BRG-003', 'Kursi Lab', 2, 40, 350000, 'Rusak Ringan'),
    ('BRG-004', 'Meja Dosen', 2, 6, 1200000, 'Baik'),
    ('BRG-005', 'Switch Jaringan', 1, 4, 850000, 'Rusak Berat');

INSERT INTO users (username, password) VALUES
    ('Deswita', '$2y$10$hYil5Y547MZFBmx31Yx3fOZ/v8oVqFPIIAJWrQCNkMH22cQnFjE9m');