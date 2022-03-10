<?php

use function PHPSTORM_META\type;

include "../../config/config.hotel.php";

$id = $_POST['id'];
$nama = $_POST['nama'];
$deskripsi = $_POST['deskripsi'];

$nama_file = $_FILES['foto']['name'];
$ukuran_file = $_FILES['foto']['size'];
$tipe_file = $_FILES['foto']['type'];
$tmp_file = $_FILES['foto']['tmp_name'];

$path = '../../image/'. $nama_file;

if($tipe_file == 'image/jpeg' || $tipe_file == 'image/png' || $tipe_file == 'image/jpg'){
    if($ukuran_file <= 5000000){
        if(move_uploaded_file($tmp_file, $path)){
            $sql = mysqli_query($conn, "UPDATE fasilitas_hotel set nama_fasilitas='$nama', foto_fasilitas='$nama_file', deskripsi_fasilitas='$deskripsi' where id_fasilitas='$id'");
            if($sql){
                header("location: ../../pages/fasilitas_hotel.php?ket=sukses");
            }else{
                header("location: ../../pages/fasilitas_hotel.php?ket=salah");
            }
        }else{
            header("location: ../../pages/fasilitas_hotel.php?ket=gagal");
        }
    }else{
        header("location: ../../pages/fasilitas_hotel.php?ket=gambar");
    }
}else{
    header("location: ../../pages/fasilitas_hotel.php?ket=type");
}