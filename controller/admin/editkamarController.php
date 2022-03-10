<?php
include "../../config/config.hotel.php";

$id = $_POST['id'];
$nama = $_POST['nama'];
$jumlah = $_POST['jumlah'];
$harga = $_POST['harga'];
$deskripsi = $_POST['deskripsi'];

$nama_file = $_FILES['foto']['name'];
$ukuran_file = $_FILES['foto']['size'];
$tipe_file = $_FILES['foto']['type'];
$tmp_file = $_FILES['foto']['tmp_name'];
// Set path folder tempat menyimpan gambarnya
$path = "../../image/" . $nama_file;
if ($tipe_file == "image/jpeg" || $tipe_file == "image/png" || $tipe_file == "image/jpg") { // Cek apakah tipe file yang diupload adalah JPG / JPEG / PNG
    // Jika tipe file yang diupload JPG / JPEG / PNG, lakukan :
    if ($ukuran_file <= 5000000) { // Cek apakah ukuran file yang diupload kurang dari sama dengan 1MB
        // Jika ukuran file kurang dari sama dengan 2MB, lakukan :
        // Proses upload
        if (move_uploaded_file($tmp_file, $path)) { // Cek apakah gambar berhasil diupload atau tidak
            // Jika gambar berhasil diupload, Lakukan :  
            // Proses simpan ke Database
            $query = "UPDATE kamar_hotel SET nama_kamar='$nama', foto_kamar='$nama_file', jumlah_kamar='$jumlah', harga_kamar='$harga', deskripsi_kamar='$deskripsi' WHERE id_kamar='$id'";
            $sql = mysqli_query($conn, $query); // Eksekusi/ Jalankan query dari variabel $query

            if ($sql) { // Cek jika proses simpan ke database sukses atau tidak
                // Jika Sukses, Lakukan :
                header("location: ../../pages/kamar.php?status=sukses"); // Redirectke halaman index.php
            } else {
                // Jika Gagal, Lakukan :
                header("location: ../../pages/kamar.php?ket=salah"); // Redirectke halaman index.php
                echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
            }
        } else {
            // Jika gambar gagal diupload, Lakukan :
            header("location: ../../pages/kamar.php?ket=gagal"); // Redirectke halaman index.php
            echo "Maaf, Gambar gagal untuk diupload.";
        }
    } else {
        // Jika ukuran file lebih dari 5MB, lakukan :
        header("location: ../../pages/kamar.php?ket=ukuran"); // Redirectke halaman index.php
        echo "Maaf, Ukuran gambar yang diupload tidak boleh lebih dari 5MB";
    }
} else {
    // Jika tipe file yang diupload bukan JPG / JPEG / PNG, lakukan :
    header("location: ../../pages/kamar.php?ket=type"); // Redirectke halaman index.php
    echo "Maaf, Tipe gambar yang diupload harus JPG / JPEG / PNG.";
}
