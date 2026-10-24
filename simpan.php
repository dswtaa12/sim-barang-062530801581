<?php
session_start();

if (!isset($_SESSION['login'])) {
    header ('Location: login.php');
    exit;
}
require 'koneksi.php';
require_once 'classes/barang.php';

?>
<?php
// ===== fungsi perhitungan =====
function hitungTotal($jumlah, $harga) {
    return $jumlah * $harga;
}

// ===== untuk cegah akses langsung lewat URL =====
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

// ===== data dari form =====
$kode       = trim($_POST['kode'] ?? '');
$nama       = trim($_POST['nama'] ?? '');
$idKategori = (int) ($_POST['id_kategori'] ?? 0);
$kondisi    = $_POST['kondisi'] ?? '';
$jumlah     = (int) ($_POST['jumlah'] ?? 0);
$harga      = (int) ($_POST['harga'] ?? 0);

// ===== validasi sederhana =====
$dataValid    = ($kode !== '' && $nama !== '' && $idKategori > 0&& $jumlah > 0 && $harga > 0);
$pesanError   = '';
$namaKategori = '';
$total        = 0;
$barang       = null;

// ===== cari nama kategori untuk ditampilkan =====
if ($dataValid) {
    $stmt = $pdo->prepare("SELECT nama_kategori FROM kategori WHERE id_kategori = ?");
    $stmt->execute([$idKategori]);
    $namaKategori = $stmt->fetchColumn();

    if ($namaKategori === false) {
        $dataValid  = false;
        $pesanError = 'Kategori tidak ditemukan.';
    }
}

// ===== simpan ke database =====
if ($dataValid) {
    try {
        $stmt = $pdo->prepare(
            "INSERT INTO barang (kode, nama, id_kategori, jumlah, harga, kondisi)
             VALUES (?, ?, ?, ?, ?, ?)"
        );
        $stmt->execute([$kode, $nama, $idKategori, $jumlah, $harga, $kondisi]);

        $total  = hitungTotal($jumlah, $harga);
        $barang = new Barang($kode, $nama, $jumlah);
    } catch (PDOException $e) {
        $dataValid  = false;
        $pesanError = ($e->getCode() == 23000)
            ? 'Kode barang sudah dipakai.'
            : 'Gagal menyimpan data.';
    }
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

                <h2>Barang Berhasil Disimpan</h2>

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
                                <td><?php echo htmlspecialchars($namaKategori); ?></td>
                                <td><?php echo $jumlah; ?></td>
                                <td>Rp <?php echo number_format($harga, 0, ',', '.'); ?></td>
                                <td><?php echo htmlspecialchars($kondisi); ?></td>
                                <td>Rp <?php echo number_format($total, 0, ',', '.'); ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <p><?php echo htmlspecialchars($barang->tampilanInfo()); ?></p>

            <?php else: ?>

                <h2>Data Tidak Valid</h2>
                <p>
                    <?php
                    echo $pesanError !== ''
                        ? htmlspecialchars($pesanError)
                        : 'Pastikan kode, nama, kategori, jumlah, dan harga satuan sudah diisi dengan benar.';
                    ?>
                </p>

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