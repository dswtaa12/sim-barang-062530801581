<?php
session_start();

if (!isset($_SESSION['login'])) {
    header ('Location: login.php');
    exit;
}

require 'koneksi.php';
$stmt = $pdo->query(
    "SELECT b.*, k.nama_kategori
    FROM barang b
    JOIN kategori k ON b.id_kategori = k.id_kategori
    ORDER BY b.id_barang"
);
$daftarBarang = $stmt->fetchAll();
$daftarKategori = $pdo->query("SELECT * FROM kategori ORDER BY nama_kategori")->fetchAll();
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIM-Barang</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header id="beranda">
        <h1>SIM-Barang</h1>
        <p>Sistem Pengelolaan Inventaris Barang Jurusan</p>
        <p>Halo <?php echo htmlspecialchars($_SESSION['username']); ?></p>
    </header>

    <nav>
        <ul>
            <li><a href="#beranda">Beranda</a></li>
            <li><a href="#inventaris">Data Barang</a></li>
            <li><a href="#form-barang">Tambah Barang</a></li>
            <li><a href="Logout.php">Logout</a></li>
        </ul>
    </nav>

    <main>
        <section id="inventaris">
            <h2>Inventaris Barang</h2>
            <input type="text" id="cari" placeholder="Cari barang...">
            <div class="tabel-wrap">
                <table>
                    <thead>
                        <tr>
                            <th>Kode</th>
                            <th>Nama Barang</th>
                            <th>Kategori</th>
                            <th>Jumlah</th>
                            <th>Harga Satuan</th>
                            <th>Kondisi</th>
                        </tr>
                    </thead>
                    <tbody id="isi-tabel">
                         <?php foreach ($daftarBarang as $b): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($b['kode']); ?></td>
                                <td><?php echo htmlspecialchars($b['nama']); ?></td>
                                <td><?php echo htmlspecialchars($b['nama_kategori']); ?></td>
                                <td><?php echo $b['jumlah']; ?></td>
                                <td>Rp <?php echo number_format($b['harga'], 0, ',', '.'); ?></td>
                                <td><?php echo htmlspecialchars($b['kondisi']); ?></td>
                            </tr>
                            <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </section>

        <section id="form-barang">
            <h2>Tambah Barang</h2>
            <form id="form-barang-input" action="simpan.php" method="post">
                <div>
                    <label for="kode">Kode Barang</label>
                    <input type="text" id="kode" name="kode" placeholder="Contoh: BRG-006" required>
                    <small class="error" id="error-kode"></small>
                </div>
                <div>
                    <label for="nama">Nama Barang</label>
                    <input type="text" id="nama" name="nama" placeholder="Contoh: Printer" required>
                </div>
                <div>
                    <label for="kategori">Kategori</label>
                    <select id="kategori" name="id_kategori" required>
                        <option value="">-- Pilih Kategori --</option>
                        <?php foreach ($daftarKategori as $k): ?>
                            <option value="<?php echo $k['id_kategori']; ?>">
                                <?php echo htmlspecialchars($k['nama_kategori']); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div>
                    <label for="jumlah">Jumlah</label>
                    <input type="number" id="jumlah" name="jumlah" placeholder="Contoh: 10" required>
                    <small class="error" id="error-jumlah"></small>
                </div>
                <div>
                    <label for="harga">Harga Satuan (Rp)</label>
                    <input type="number" id="harga" name="harga" placeholder="Contoh: 2500000" min="1" required>
                </div>
                <div>
                    <label for="kondisi">Kondisi</label>
                    <select id="kondisi" name="kondisi" required>
                        <option value="">-- Pilih Kondisi --</option>
                        <option value="Baik">Baik</option>
                        <option value="Rusak Ringan">Rusak Ringan</option>
                        <option value="Rusak Berat">Rusak Berat</option>
                    </select>
                </div>
                <button type="submit">Simpan</button>
            </form>
        </section>

    </main>
    <footer>
        <p>&copy; 2026 SIM-Barang</p>
        <p>Deswita Tri Melita - 062530801581 - 3IB</p>
    </footer>
    <div id="toast"></div>
    <script src="main.js"></script>
</body>

</html>