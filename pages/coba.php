<?php

include "../config/config.hotel.php";
require_once 'head-hotel.php';
?>

<div class="container-fluid py-4">
    <div class="row">
        <?php
        if (isset($_POST['cari'])) {
            $cari = $_POST['cari'];
            $query = mysqli_query($conn, "select * from pesamesanan where nama_kamar like '%" . $cari . "%'");
        } else {
            $query = mysqli_query($conn, "select * from pemesanan");
        }
        $ambil = mysqli_fetch_array($query);
        $idd = $ambil['id_kamar'];
        $sql = mysqli_query($conn, "SELECT nama_kamar from kamar_hotel where id_kamar = '$idd'");
        $candak = mysqli_fetch_array($sql);
        ?>
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header text-center">
                            <h3>Laporan Pesanan</h3>

                        </div>
                        <div class="row">
                            <div class="col-3">
                                <h6>Tanggal Pesan: <?= $ambil['tanggal_pesan'] ?></h6>
                                <h6>Nama Pemesan: <?= $ambil['nama_pemesan'] ?></h6>
                                <h6>Kamar Yang Dipesan: <?= $candak['nama_kamar'] ?></h6>
                                <h6>No Hp Pemesan: <?= $ambil['no_hp'] ?></h6>
                            </div>
                            <div class="col-4">
                                <h6>Nama Tamu: <?= $ambil['nama_tamu'] ?></h6>
                                <h6>Status: <?= $ambil['status_pemesan'] ?></h6>
                            </div>
                        </div>

                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7 ps-2">Nama Kamar</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal Chekin</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal Chekout</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jumlah Kamar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        while ($data = mysqli_fetch_array($query)) {
                                            $id = $data['id_kamar'];
                                            $sql = mysqli_query($conn, "SELECT nama_kamar FROM kamar_hotel where id_kamar = '$id'");
                                            $ambil = mysqli_fetch_array($sql)
                                        ?>
                                            <tr>
                                                <td class="text-center"><?= $ambil['nama_kamar']; ?></td>
                                                <td class="text-center"><?= $data['tanggal_chekin']; ?></td>
                                                <td class="text-center"><?= $data['tanggal_chekout']; ?></td>
                                                <td class="text-center"><?= $data['jumlah_pesan']; ?></td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                        <!-- <td class="align-middle text-center text-sm">
                            <span class="badge badge-sm bg-gradient-info">Online</span>
                          </td> -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>