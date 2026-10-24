<?php
// ===== Fungsi perhitungan =====
function hitungTotal($jumlah, $harga) {
    return $jumlah * $harga;
}

// ===== Cegah akses langsung lewat URL =====
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

// ===== Tangkap data dari form =====
$kode     = trim($_POST['kode'] ?? '');
$nama     = trim($_POST['nama'] ?? '');
$kategori = $_POST['kategori'] ?? '';
$kondisi  = $_POST['kondisi'] ?? '';
$jumlah   = (int) ($_POST['jumlah'] ?? 0);
$harga    = (int) ($_POST['harga'] ?? 0);

// ===== Validasi sederhana di sisi server =====
$dataValid = ($kode !== '' && $nama !== '' && $jumlah > 0 && $harga > 0);

// ===== Hitung total estimasi nilai aset =====
$total = 0;
if ($dataValid) {
    $total = hitungTotal($jumlah, $harga);
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ringkasan Barang - SIM-Barang</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <header>
        <h1>SIM-Barang</h1>
        <p>Ringkasan Data Barang</p>
    </header>

    <main class="satu-kolom">

        <section>
            <?php if ($dataValid): ?>

                <h2>Barang Berhasil Diinput</h2>

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
                                <th>Total Estimasi Nilai Aset</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?php echo htmlspecialchars($kode); ?></td>
                                <td><?php echo htmlspecialchars($nama); ?></td>
                                <td><?php echo htmlspecialchars($kategori); ?></td>
                                <td><?php echo $jumlah; ?></td>
                                <td>Rp <?php echo number_format($harga, 0, ',', '.'); ?></td>
                                <td><?php echo htmlspecialchars($kondisi); ?></td>
                                <td>Rp <?php echo number_format($total, 0, ',', '.'); ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            <?php else: ?>

                <h2>Data Tidak Valid</h2>
                <p>Pastikan kode, nama, jumlah, dan harga satuan sudah diisi dengan benar.</p>

            <?php endif; ?>

            <p><a href="index.php">Kembali ke Form</a></p>
        </section>

    </main>

    <footer>
        <p>&copy; 2026 SIM-Barang</p>
        <p>Deswita Tri Melita - 062530801581 - 3IB</p>
    </footer>

</body>
</html>