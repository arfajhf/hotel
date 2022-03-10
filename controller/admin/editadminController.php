<?php 
include "../../config/config.hotel.php";

$id = $_POST['id'];
$nama = $_POST['nama'];
$password = $_POST['password'];
$username = $_POST['username'];
$level = $_POST['level'];

$sql = "UPDATE admin set nama_admin='$nama', username='$username', password='$password', level='$level' where id_admin='$id'";

if(mysqli_query($conn, $sql)){
    header("location: ../../pages/admin.php?status=berhasil");
}else{
    header("location: ../../pages/admin.php?status=gal");
}
