<?php
include "../../config/config.hotel.php";

$id = $_GET['id'];
$sql = "DELETE from fasilitas_kamar where id_fasilitas_k='$id'";
if ( mysqli_query($conn, $sql)){
    header("location: ../../pages/kamar.php?pesan=bnr");
}else{
    header("location: ../../pages/kamar.php?pesan=ggl");
}