<?php
include "../../config/config.hotel.php";

$id = $_GET['id'];

$sql = "DELETE FROM admin where id_admin='$id'";
$query = mysqli_query($conn, $sql);

if($query){
    header("location: ../../pages/admin.php?ket=sukses");
}else{
    header("location: ../../pages/admin.php?ket=gagal");
}