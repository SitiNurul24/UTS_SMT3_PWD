<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $kode_barang = $_POST['kode_barang'];
    $warna = $_POST['warna'];
    $jumlah_beli = $_POST['jumlah_beli'];

    // Fungsi untuk menghitung total bayar
    function hitungTotalBayar($jumlahBeli, $harga) {
        return $jumlahBeli * $harga;
    }

    // Fungsi untuk menentukan bonus
    function beriBonus($totalBayar) {
        if ($totalBayar >= 300000) {
            return "Selamat! Anda mendapatkan bonus.";
        } else {
            return "Maaf, Anda tidak mendapatkan bonus.";
        }
    }

    // Input
    $kodeBarang = $kode_barang; 
    $namaBarang = "";
    $hargaBarang = 0;

   
    switch ($kodeBarang) {
        case "CK01":
            $namaBarang = "Bucket Hat";
            $hargaBarang = 80000;
            break;
        case "FL01":
            $namaBarang = "Flysheet";
            $hargaBarang = 180000;
            break;
        case "HM01":
            $namaBarang = "Hammock Single";
            $hargaBarang = 95000;
            break;
        case "HM02":
            $namaBarang = "Hammock Double";
            $hargaBarang = 320000;
            break;
        default:
            echo "Kode barang tidak valid.";
    }

    // Input jumlah beli
    $jumlahBeli = $jumlah_beli; // Menggunakan input dari form

    // Menghitung total bayar
    $totalBayar = hitungTotalBayar($jumlahBeli, $hargaBarang);

    // Menampilkan hasil
    echo "Kode Barang: " . $kodeBarang . "<br>";
    echo "Nama Barang: " . $namaBarang . "<br>";
    echo "Harga Barang: Rp. " . $hargaBarang . "<br>";
    echo "Warna: " . $warna . "<br>";
    echo "Jumlah Beli: " . $jumlahBeli . "<br>";
    echo "Total Bayar: Rp. " . $totalBayar . "<br>";
    echo beriBonus($totalBayar);
}

?>