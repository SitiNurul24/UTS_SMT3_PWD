<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Struk Pembayaran</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h1>BPJ STORE</h1>
<h2>Backpacker Jakarta</h2>

<form action="struk.php" method="post">
    <div class="form-group">
        <label for="kode_barang">Nama Barang</label>
        <select name="kode_barang" id="kode_barang" required>
            <option value="">Pilih-</option>
            <option value="CK01">Bucket Hat</option>
            <option value="FL01">Flysheet</option>
            <option value="HM01">Hammock Single</option>
            <option value="HM02">Hammock Double</option>
        </select>
    </div>
    <div class="form-group">
    <label for="warna">Warna</label>
    <label><input type="radio" name="warna" value="Merah" required> Merah</label>
    <label><input type="radio" name="warna" value="Biru" required> Biru</label><br><br>
</div>

    <div class="form-group">
        <label for="jumlah_beli">Jumlah Beli</label>
        <input type="number" name="jumlah_beli" id="jumlah_beli" min="1" required>
    </div>
    <input type="submit" name="submit" value="Simpan">
<input type="reset" name="reset" value="Batal">
    <a href="index.php" class="btn btn-secondary">Kembali</a>
</form>

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
            break;
        
    }

    
    $jumlahBeli = $jumlah_beli; 

    
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
</body>
</html>
