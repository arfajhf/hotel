<?php

include "../../config/config.hotel.php";

$id = $_POST['id'];
$kamar = $_POST['kamar'];
$nama = $_POST['nama'];
$chekin = $_POST['chekin'];
$chekout = $_POST['chekout'];
$jumlah = $_POST['jumlah'];
$pemesan = $_POST['pemesan'];
$email = $_POST['email'];
$hp = $_POST['hp'];
$tamu = $_POST['tamu'];
$status = "batal";
$tanggal =$_POST['tanggal'];

$sql = mysqli_query($conn, "UPDATE pemesanan set status_pemesan='$status' where id_pemesanan = '$id'");

if($sql){
    header("location: ../../pages/pesan.php?status=berhasil");
}else{
    header("location: ../../pages/pesan.php?status=ggl");
}