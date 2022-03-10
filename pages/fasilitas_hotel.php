<?php
session_start();
include "../config/config.hotel.php";
$sql = mysqli_query($conn, "SELECT * from kamar");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>
        User Admin - Hotel Serasa
    </title>
    <?php require_once "head-hotel.php"; ?>
</head>

<body class="g-sidenav-show  bg-gray-100">
    <?php
    require_once "navbar_admin.php";
    ?>
    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
        <!-- Navbar -->
        <?php
        require_once "atas_admin.php";
        ?>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="container-fluid py-4">
                    <!-- Button trigger modal -->
                    <div class="">
                        <button class="badge badge-sm bg-gradient-info mb-3" data-bs-target="#mymodal" data-bs-toggle="modal">Tambah Fasilitas</button>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="mymodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Tambah Fasilitas</h5>
                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="../controller/admin/fasilitasController.php" enctype="multipart/form-data" method="post">

                                        <div class="form-group">
                                            <label for="exampleInputText1">Nama Fasilitas</label>
                                            <input type="text" class="form-control" name="nama" id="exampleInputText1" aria-describedby="textHelp" placeholder="Masukan Nama Pasilitas" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputText1">foto Fasilitas</label>
                                            <input type="file" class="form-control" name="foto" id="exampleInputText1" aria-describedby="textHelp"  required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputText1">Deskripsi Fasilitas</label>
                                            <textarea name="deskripsi" id="" class="form-control" placeholder="Masukan Deskripsi Fasilitas" required></textarea>
                                        </div>
                                        <!-- <div class="form-group">
                                            <label for="exampleInputText1">Nama Kamar</label>
                                            <select class="form-control" name="kamar" required>
                                                <option selected>Masukan nama</option>
                                                <?php while ($ambil = mysqli_fetch_array($sql)) { ?>
                                                    <option>
                                                        <?= $ambil['nama_kamar'] ?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                        </div> -->


                                </div>
                                <div class="modal-footer">
                                    <span type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</span>
                                    <input type="submit" class="btn btn-primary" value="Save changes"></input>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- end modal -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card mb-4">
                                <div class="card-header pb-0">
                                    <?php

                                    $no = 1;
                                    if (isset($_POST['cari'])) {
                                        $cari = $_POST['cari'];
                                        $query = mysqli_query($conn, "select * from fasilitas_hotel where nama_fasilitas like '%" . $cari . "%'");
                                    } else {
                                        $query = mysqli_query($conn, "select * from fasilitas_hotel");
                                    }

                                    if (isset($_GET['status'])) {
                                        if ($_GET['status'] == 'sukses') {
                                          echo '<script language="javascript">';
                                          echo 'alert("Fasilitas Berhasil Ditambahkan")';
                                          echo '</script>';
                                        }
                                        if ($_GET['status'] == 'salah') {
                                          echo '<script language="javascript">';
                                          echo 'alert("Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.")';
                                          echo '</script>';
                                        }
                                        if ($_GET['status'] == 'gagal') {
                                          echo '<script language="javascript">';
                                          echo 'alert("Maaf, Gambar gagal untuk diupload.")';
                                          echo '</script>';
                                        }
                                        if ($_GET['status'] == 'gambar') {
                                          echo '<script language="javascript">';
                                          echo 'alert("Maaf, Ukuran gambar yang diupload tidak boleh lebih dari 5MB")';
                                          echo '</script>';
                                        }
                                        if ($_GET['status'] == 'type') {
                                          echo '<script language="javascript">';
                                          echo 'alert("Maaf, Tipe gambar yang diupload harus JPG / JPEG / PNG.")';
                                          echo '</script>';
                                        }
                                      }
                
                                      if (isset($_GET['ket'])) {
                                        if ($_GET['ket'] == 'sukses') {
                                          echo '<script language="javascript">';
                                          echo 'alert("Failitas Berhasil Diedit")';
                                          echo '</script>';
                                        }
                                        elseif ($_GET['ket'] == 'salah') {
                                          echo '<script language="javascript">';
                                          echo 'alert("Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.")';
                                          echo '</script>';
                                        }
                                        elseif ($_GET['ket'] == 'gagal') {
                                          echo '<script language="javascript">';
                                          echo 'alert("Maaf, Gambar gagal untuk diupload.")';
                                          echo '</script>';
                                        }
                                        elseif ($_GET['ket'] == 'gambar') {
                                          echo '<script language="javascript">';
                                          echo 'alert("Maaf, Ukuran gambar yang diupload tidak boleh lebih dari 5MB")';
                                          echo '</script>';
                                        }
                                        elseif ($_GET['ket'] == 'type') {
                                          echo '<script language="javascript">';
                                          echo 'alert("Maaf, Tipe gambar yang diupload harus JPG / JPEG / PNG.")';
                                          echo '</script>';
                                        }
                                      }
                                      elseif (isset($_GET['pesan'])) {
                                        if ($_GET['pesan'] == 'sukses') {
                                          echo '<script language="javascript">';
                                          echo 'alert("Fasilitas Berhasil Dihapus")';
                                          echo '</script>';
                                        }
                                        elseif ($_GET['pesan'] == 'gagal') {
                                          echo '<script language="javascript">';
                                          echo 'alert("Fasilitas Gagal Dihapus")';
                                          echo '</script>';
                                        }
                                      }
                                    ?>
                                    <h6>Fasilitas Hotel</h6>
                                </div>
                                <div class="card-body px-0 pt-0 pb-2">
                                    <div class="table-responsive p-0">
                                        <table class="table align-items-center mb-0">
                                            <thead>
                                                <tr>
                                                    <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">No</th>
                                                    <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7 ps-2">Nama Fasilitas</th>
                                                    <th class="text-secondary opacity-7">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                while ($data = mysqli_fetch_array($query)) {
                                                ?>
                                                    <tr>
                                                        <th class="text-center"><?= $no++; ?></th>
                                                        <td class="text-center"><?= $data['nama_fasilitas']; ?></td>
                                                        <td class="align-middle">
                                                        <a class="btn btn-link text-info text-gradient px-1 mb-0" href="viesw_h.php?id=<?= $data['id_fasilitas']?>"><i class="fas fa-eye"></i> View |</a>
                                                            <a class="btn btn-link text-dark px-1 mb-0" href="edit_h.php?id=<?= $data['id_fasilitas'] ?>"><i class="fas fa-pencil-alt text-dark me-1" aria-hidden="true"></i>Edit |</a>
                                                            <a class="btn btn-link text-danger text-gradient px-1 mb-0" href="../controller/admin/delete_hController.php?id=<?= $data['id_fasilitas'] ?>"><i class="far fa-trash-alt me-2"></i>Delete</a>

                                                        </td>
                                                    </tr>
                                                <?php
                                                }
                                                ?>
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
    </main>

    <!--   Core JS Files   -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="../assets/js/core/popper.min.js"></script>
    <script src="../assets/js/core/bootstrap.min.js"></script>
    <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script src="../assets/js/plugins/chartjs.min.js"></script>
    <!-- <script src="../assets/js/custom.js"></script> -->

    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="../assets/js/soft-ui-dashboard.min.js?v=1.0.3"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
</body>

</html>