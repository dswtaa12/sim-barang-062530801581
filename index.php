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
    </header>

    <nav>
        <ul>
            <li><a href="#beranda">Beranda</a></li>
            <li><a href="#inventaris">Data Barang</a></li>
            <li><a href="#form-barang">Tambah Barang</a></li>
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
                            <th>Kondisi</th>
                        </tr>
                    </thead>
                    <tbody id="isi-tabel">
                        <tr>
                            <td>BRG-001</td>
                            <td>Proyektor</td>
                            <td>Elektronik</td>
                            <td>5</td>
                            <td>Baik</td>
                        </tr>
                        <tr>
                            <td>BRG-002</td>
                            <td>Komputer</td>
                            <td>Elektronik</td>
                            <td>30</td>
                            <td>Baik</td>
                        </tr>
                        <tr>
                            <td>BRG-003</td>
                            <td>Kursi Lab</td>
                            <td>Perabot</td>
                            <td>40</td>
                            <td>Rusak Ringan</td>
                        </tr>
                        <tr>
                            <td>BRG-004</td>
                            <td>Meja Dosen</td>
                            <td>Perabot</td>
                            <td>6</td>
                            <td>Baik</td>
                        </tr>
                        <tr>
                            <td>BRG-005</td>
                            <td>Switch Jaringan</td>
                            <td>Elektronik</td>
                            <td>4</td>
                            <td>Rusak Berat</td>
                        </tr>
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
                    <select id="kategori" name="kategori" required>
                        <option value="">-- Pilih Kategori --</option>
                        <option value="Elektronik">Elektronik</option>
                        <option value="Perabot">Perabot</option>
                        <option value="Alat Tulis">Alat Tulis</option>
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