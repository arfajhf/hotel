<?php
include "../../config/config.hotel.php";

$id = $_GET['id'];
$sql = mysqli_query($conn, "DELETE FROM fasilitas_hotel where id_fasilitas = '$id'");

if($sql){
    header("location: ../../pages/fasilitas_hotel.php?pesan=sukses");
}else{
    header("location: ../../pages/fasilitas_hotel.php?pesan=gagal");
}