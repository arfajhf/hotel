<?php

use function PHPSTORM_META\type;

include "../../config/config.hotel.php";

$nama = $_POST['nama'];
$deskripsi = $_POST['deskripsi'];

$nama_file = $_FILES['foto']['name'];
$ukuran_file = $_FILES['foto']['size'];
$type_file = $_FILES['foto']['type'];
$tmp_file = $_FILES['foto']['tmp_name'];

$path = "../../image/" . $nama_file;

if ($type_file == 'image/jpeg' || $type_file == 'image/png' || $type_file == 'image/jpg'){
    if ($ukuran_file <= 5000000){
        if (move_uploaded_file($tmp_file, $path)){
            $sql = "INSERT INTO fasilitas_hotel (nama_fasilitas, foto_fasilitas, deskripsi_fasilitas) values ('$nama', '$nama_file', '$deskripsi')";
            $query = mysqli_query($conn, $sql);

            if ($query){
                header("location: ../../pages/fasilitas_hotel.php?status=sukses");
            }else{
                header("location: ../../pages/fasilitas_hotel.php?status=salah");
            }
        }else{
            header("location: ../../pages/fasilitas_hotel.php?status=gagal");
        }
    }else{
        header("location: ../../pages/fasilitas_hotel.php?status=gambar");
    }
}else{
    header("location: ../../pages/fasilitas_hotel.php?status=type");
}