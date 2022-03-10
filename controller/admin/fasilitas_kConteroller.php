<?php
include "../../config/config.hotel.php";
$nama = $_POST['nama'];
$kamar = $_POST['kamar'];

$sql1 = mysqli_query($conn, "SELECT id_kamar from kamar_hotel where nama_kamar='$kamar'");
$namak = mysqli_fetch_array($sql1);
$id = $namak['id_kamar'];

$sql = mysqli_query($conn, "INSERT INTO fasilitas_kamar (id_kamar, nama_fasilitas) values ('$id', '$nama')");

if ($sql){
    header("location: ../../pages/kamar.php?ketra=sukses");
}else{
    header("location: ../../pages/kamar.php?ketra=gagal");
}