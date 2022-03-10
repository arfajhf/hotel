<?php
include "../../config/config.hotel.php";

$id = $_POST['id'];
$nama = $_POST['nama'];

if ( mysqli_query($conn, "UPDATE fasilitas_kamar set nama_fasilitas = '$nama' where id_fasilitas_k='$id'")){
    header("location: ../../pages/kamar.php?kt=sukses");
}else{
    header("location: ../../pages/kamar.php?kt=gagal");
}