<?php
include "../../config/config.hotel.php";
date_default_timezone_set('Asia/Jakarta');

$cekin = $_POST['cekin'];
$cekout = $_POST['cekout'];
$jumlah = $_POST['jumlah'];
$pemesan = $_POST['pemesan'];
$email = $_POST['email'];
$hp = $_POST['nohp'];
$tamu = $_POST['tamu'];
$kamar = $_POST['kamar'];
$date = date('Y-m-d H:i:s');
$status = 'peroses';

$data = mysqli_query($conn, "SELECT id_kamar FROM kamar_hotel where nama_kamar = '$kamar'");
$ambil = mysqli_fetch_array($data);
$id = $ambil['id_kamar'];

$sql = mysqli_query($conn, "INSERT INTO pemesanan (id_kamar, tanggal_chekin, tanggal_chekout, jumlah_pesan, nama_pemesan, email_pemesan, no_hp, nama_tamu, status_pemesan, tanggal_pesan) values ('$id', '$cekin', '$cekout', '$jumlah', '$pemesan', '$email', '$hp', '$tamu', '$status', '$date')");

if ($sql) {
    header("location: ../../halUser/pesan.php?status=sukses");
} else {
    header("location: ../../halUser/pesan.php?status=gagal");
}
