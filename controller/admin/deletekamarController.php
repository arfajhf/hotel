<?php
include "../../config/config.hotel.php";
$id = $_GET['id'];

$query = "DELETE FROM kamar_hotel where id_kamar='$id'";
$pass = mysqli_query($conn, $query);

if($pass){
    header("location: ../../pages/kamar.php?pesan=sukses");
}else{
    header("location: ../../pages/kamar.php?pesan=gagal");
}