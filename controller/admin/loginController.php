<?php
session_start();
include "../../config/config.hotel.php";

$username = $_POST['username'];
$password = $_POST['password'];

$masuk = "SELECT * FROM admin where username='$username' and password='$password'";
$query = mysqli_query($conn, $masuk);

$data = mysqli_num_rows($query);

if (!$data) {
    header("Location: ../../pages/index.php?ket=gagal");
} else {
    $masukan = mysqli_fetch_assoc($query);

    if ($masukan['level'] == 'administrator') {
        $_SESSION['username'] = $username;
        $_SESSION['password'] = '$password';

        header("Location: ../../pages/kamar.php");
    }
    if ($masukan['level'] == 'resepsionis') {
        $_SESSION['username'] = $username;
        $_SESSION['password'] = '$password';
        header("Location: ../../pages/kamar_resepsionis.php");
    }
    if ($masukan['level'] == 'tamu') {
        $_SESSION['username'] = $username;
        $_SESSION['password'] = '$password';
        header("Location: ../../haluser/user.php");
    } 
}
