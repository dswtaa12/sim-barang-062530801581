// ===== Ambil Element =====
const form = document.getElementById('form-barang-input');
const inputKode = document.getElementById('kode');
const inputNama = document.getElementById('nama');
const selectKategori = document.getElementById('kategori');
const inputJumlah = document.getElementById('jumlah');
const selectKondisi = document.getElementById('kondisi');
const errorKode = document.getElementById('error-kode');
const errorJumlah = document.getElementById('error-jumlah');
const inputCari = document.getElementById('cari');
const isiTabel = document.getElementById('isi-tabel');
const toast = document.getElementById('toast');

// ===== Fitur 2: toast pemberitahuan =====
function tampilkanToast(pesan) {
    toast.textContent = pesan;
    toast.classList.add('show');

    setTimeout(function () {
        toast.classList.remove('show');
    }, 3000);
}

// ===== Opsional: tambah baris baru ke tabel =====
function tambahBaris(kode, nama, kategori, jumlah, kondisi) {
    const tr = document.createElement('tr');
    const data = [kode, nama, kategori, jumlah, kondisi];

    data.forEach(function (isi) {
        const td = document.createElement('td');
        td.textContent = isi;
        tr.appendChild(td);
    });

    isiTabel.appendChild(tr);
}

// ===== Validasi formulir saat submit =====
form.addEventListener('submit', function (e) {
    let valid = true;

    // 1. Validasi kode: harus "BRG-" diikuti angka
    const kode = inputKode.value.trim();
    if (!/^BRG-\d+$/.test(kode)) {
        errorKode.textContent = 'Kode harus diawali "BRG-" diikuti angka, contoh: BRG-001';
        valid = false;
    } else {
        errorKode.textContent = '';
    }

    // 2. Validasi jumlah: angka dan lebih dari 0
    const jumlah = Number(inputJumlah.value);
    if (inputJumlah.value === '' || isNaN(jumlah) || jumlah <= 0) {
        errorJumlah.textContent = 'Jumlah harus berupa angka lebih dari 0';
        valid = false;
    } else {
        errorJumlah.textContent = '';
    }

    // 3. Kalau semua benar
    if (!valid) {
        e.preventDefault();
    }
});

// ===== Fitur 1: pencarian real-time =====
inputCari.addEventListener('input', function () {
    const kataKunci = inputCari.value.toLowerCase();
    const baris = isiTabel.getElementsByTagName('tr');

    for (let i = 0; i < baris.length; i++) {
        const teks = baris[i].textContent.toLowerCase();

        if (teks.includes(kataKunci)) {
            baris[i].style.display = '';
        } else {
            baris[i].style.display = 'none';
        }
    }
});