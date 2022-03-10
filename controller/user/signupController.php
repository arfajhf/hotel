<?php
include "../../config/config.hotel.php";

$nama = $_POST['nama'];
$user = $_POST['username'];
$pass = $_POST['password'];

$sql = mysqli_query($conn, "INSERT INTO admin (nama_admin, username, password, level) values ('$nama', '$user', '$pass', 'tamu')");

if($sql){
    header('location: ../../pages/index.php');
}else{
    header('location: ../../pages/sign-up.php');
}