<?php
include "../../config/config.hotel.php";

$nama = $_POST['nama'];
$user = $_POST['username'];
$password = $_POST['password'];
$level = $_POST['level'];

$sql = "INSERT INTO admin (nama_admin, username, password, level) values ('$nama', '$user', '$password', '$level')";

if(mysqli_query($conn, $sql)){
    header('location: ../../pages/admin.php?status=sukses');
}else{
    header('location: ../../pages/admin.php?status=gagal');
}
