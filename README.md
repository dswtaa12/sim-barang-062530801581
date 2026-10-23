# SIM-Barang

Sistem Pengelolaan Inventaris Barang Jurusan.

## Identitas
- Nama   : Deswita Tri Melita
- NPM    : 062530801581
- Kelas  : 3IB
- Matkul : Pemrograman Web
- Dosen  : Agus Setiawan, M.Kom.

## Gabaran Proyek
SIM-Barang adalah Sistem Pengelolaan Inventaris Barang Jurusan, yaitu aplikasi web untuk mencatat, mengelola, dan memantau barang atau aset laboratorium dan jurusan. Lewat aplikasi ini, data barang seperti kode, nama, kategori, jumlah, dan kondisi bisa tersimpan rapi dan mudah dicari. Proyek ini dikembangkan bertahap selama pertemuan 1 sampai ke pertemuan 7, mulai dari setup lingkungan kerja, HTML, CSS, JavaScript, PHP, sampai database MySQL.

## Konsep HTTP Request dan Response
### Apa itu HTTP
HTTP (HyperText Transfer Protocol) adalah aturan komunikasi antara klien (browser) dan server yang di web. Browser meminta sesuatu, dan server akan membalasnya.
### HTTP Request
HTTP Request adalah permintaan yang dikirim browser ke server. 
Isi request dan method utama : method (GET untuk meminta halaman, POST untuk mengirim data seperti isi form), URL tujuan, header (informasi tambahan seperti jenis browser), dan body (data yang dikirim, biasanya pada POST).
### HTTP Response
HTTP Response adalah balasan server ke browser.
Isinya : status code (200 OK berarti berhasil, 404 Not Found berarti halaman tidak ada, 500 berarti eror di server), header, dan body berupa HTML, CSS, atau JavaScript yang ditampilkan browser.

### Alur Keja
1. Pengguna mengetik URL atau mengetik link di browser.
2. Browser mengirim HTTP Request ke server untuk meminta halaman (Apache di Laragon/XAMPP).
3. Server mencari file yang diminta. Kalau file PHP, server menjalankan kodenya dulu.
4. Server mengirim HTTP Response berisi hasilnya (HTML) beserta status code.
5. Browser membaca response tersebut dan menampilkannya sebagai halaman web.

### kaitannya dengan SIM-Barang
- Membuka halaman : saat pengguna membuka 'http://localhost/sim-barang-062530801581/', browser mengirim request GET. Server membalas dengan halaman daftar inventaris barang.
- Menambah barang : saat pengguna mengisi form lalu menekan tombol simpan, browser mengirim request POST berisi data barang ke 'simpan.php'. Server memproses data itu dan membalas dengan ringkasan barang yang diinput.
- Login : saat pengguna login, data username dan password dikirim lewat POST ke 'login.php'. Server memeriksanya, lalu membalas dengan mengizinkan akses atau menampilkan pesan error.
- Halaman tidak ada: kalau pengguna membuka file yang tidak ada, server membalas dengan status 404.
## Rencana Pengembangan
- Pertemuan 1: Setup lingkungan dan Git
- Pertemuan 2: HTML5 semantik dan form
- Pertemuan 3: CSS3 responsif
- Pertemuan 4: JavaScript (validasi dan DOM)
- Pertemuan 5: PHP native
- Pertemuan 6: Login, session, dan OOP
- Pertemuan 7: Database MySQL

## Teknologi
Teknologi yang digunakan dalam pengembangan SIM-Barang:
- *HTML5:* Membuat struktur halaman web.
- *CSS3:* Mengatur tampilan dan tata letak halaman.
- *JavaScript:* Menambahkan interaksi pada halaman web.
- *PHP:* Memproses data dan logika aplikasi di sisi server.
- *MySQL:* Menyimpan dan mengelola data inventaris barang.
- *Git:* Mengelola versi kode program.
