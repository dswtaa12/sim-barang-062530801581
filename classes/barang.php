<?php
class Barang {
    // propertinya
    public $kode;
    public $nama;
    public $jumlah;

    public function __construct($kode, $nama, $jumlah) {
        $this->kode = $kode;
        $this->nama = $nama;
        $this->jumlah = $jumlah;
    }

    // menampilkan informasi barang (method)
    public function tampilanInfo() {
        return $this->kode . ' - ' . $this->nama . ' (' . $this->jumlah . ' unit)';
    }
}