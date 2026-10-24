<?php
session_start();

// Kalau sudah login, tidak perlu ke halaman login lagi
if (isset($_SESSION['login'])) {
    header('Location: index.php');
    exit;
}

// Data pengguna dalam array asosiatif (username => password)
$users = [
    'Deswita' => 'password123'
    // tambah pengguna lain kalau mau
];

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    if (isset($users[$username]) && $users[$username] === $password) {
        session_regenerate_id(true);
        $_SESSION['login'] = true;
        $_SESSION['username'] = $username;
        header('Location: index.php');
        exit;
    } else {
        $error = 'Username atau password salah';
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - SIM-Barang</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <header>
        <h1>SIM-Barang</h1>
        <p>Silakan login untuk melanjutkan</p>
    </header>

    <main class="satu-kolom">
        <section class="login-box">
            <h2>Login</h2>

            <?php if ($error !== ''): ?>
                <p class="error"><?php echo htmlspecialchars($error); ?></p>
            <?php endif; ?>

            <form action="login.php" method="post">
                <div>
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" required>
                </div>
                <div>
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <button type="submit">Masuk</button>
            </form>
        </section>
    </main>

    <footer>
        <p>&copy; 2026 SIM-Barang</p>
        <p>Deswita Tri Melita - 062530801581 - 3IB</p>
    </footer>

</body>
</html>