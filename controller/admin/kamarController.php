<?php
include "../../config/config.hotel.php";

$kamar = $_POST['nama'];
// $foto = $_POST['foto'];
$jumlah = $_POST['jumlah'];
$harga = $_POST['harga'];
$deskrip = $_POST['deskrip'];

// if($_POST['foto']){
//     $ekstensi_diperbolehkan	= ['jpg', 'jpeg', 'png'];
//     $nama = $_FILES['gambar']['name'];
//     $x = explode('.', $nama);
//     $ekstensi = strtolower(end($x));
//     $ukuran	= $_FILES['gambar']['size'];
//     $file_tmp = $_FILES['gamabar']['tmp_name'];	

//     if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
//         if($ukuran < 1044070){			
//             move_uploaded_file($file_tmp, 'image/'.$nama);
//             $query = mysqli_query($conn, "INSERT INTO kamar (nama_kamar, foto_kamar, jumlah_kamar, harga_kamar, deskripsi)values('$kamar', '$nama', '$jumlah', '$harga', '$deskrip')");
//             if($query){
//                 echo 'FILE BERHASIL DI UPLOAD';
//             }else{
//                 echo 'GAGAL MENGUPLOAD GAMBAR';
//             }
//         }else{
//             echo 'UKURAN FILE TERLALU BESAR';
//         }
//     }else{
//         echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
//     }
// }

// Ambil Data yang Dikirim dari Form
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
                $query = "INSERT INTO kamar_hotel(nama_kamar, foto_kamar, jumlah_kamar, harga_kamar, deskripsi_kamar) VALUES('" . $kamar . "','" . $nama_file . "','" . $jumlah . "','" . $harga . "','" . $deskrip . "')";
                $sql = mysqli_query($conn, $query); // Eksekusi/ Jalankan query dari variabel $query

                if ($sql) { // Cek jika proses simpan ke database sukses atau tidak
                    // Jika Sukses, Lakukan :
                    header("location: ../../pages/kamar.php?status=sukses"); // Redirectke halaman index.php
                } else {
                    // Jika Gagal, Lakukan :
                    header("location: ../../pages/kamar.php?status=salah"); // Redirectke halaman index.php
                    echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
                }
            } else {
                // Jika gambar gagal diupload, Lakukan :
                header("location: ../../pages/kamar.php?status=gagal"); // Redirectke halaman index.php
                echo "Maaf, Gambar gagal untuk diupload.";
            }
        } else {
            // Jika ukuran file lebih dari 5MB, lakukan :
            header("location: ../../pages/kamar.php?status=gambar"); // Redirectke halaman index.php
            echo "Maaf, Ukuran gambar yang diupload tidak boleh lebih dari 5MB";
        }
    } else {
        // Jika tipe file yang diupload bukan JPG / JPEG / PNG, lakukan :
        header("location: ../../pages/kamar.php?status=type"); // Redirectke halaman index.php
        echo "Maaf, Tipe gambar yang diupload harus JPG / JPEG / PNG.";
    }
