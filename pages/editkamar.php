<?php
session_start();
include "../config/config.hotel.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>
        Edit Kamar - Hotel Serasa
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
                    <div class="row justify-content-center">
                        <div class="col-8">
                            <div class="card mb-3">
                                <div class="card-header mt-1 text-center">
                                    <?php
                                    $id = $_GET['id'];
                                    if (isset($_POST['cari'])) {
                                        $cari = $_POST['cari'];
                                        $query = mysqli_query($conn, "select * from kamar_hotel where id_kamar='$id' like '%" . $cari . "%'");
                                    } else {
                                        $query = mysqli_query($conn, "select * from kamar_hotel where id_kamar='$id'");
                                    }
                                    $data = mysqli_fetch_array($query);
                                    ?>
                                    <h4>Edit Kamar <?= $data['nama_kamar'] ?></h4>
                                </div>
                                <div class="card-body px-0 pt-0 pb-2">
                                    <div class="form-responsive p-0">

                                        <form action="../controller/admin/editkamarController.php" enctype="multipart/form-data" method="post">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="hidden" class="form-control" name="id" id="exampleFormControlInput1" value="<?= $data['id_kamar'] ?>">
                                                        <input type="nama" class="form-control" name="nama" id="exampleFormControlInput1" value="<?= $data['nama_kamar'] ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="number" class="form-control" name="jumlah" id="exampleFormControlInput1" value="<?= $data['jumlah_kamar'] ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="number" class="form-control" name="harga" id="exampleFormControlInput1" value="<?= $data['harga_kamar'] ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <!-- <input type="" class="form-control" name="deskrip" id="exampleFormControlInput1"> -->
                                                        <textarea name="deskripsi" id="" class="form-control"><?= $data['deskripsi_kamar'] ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group text-center">
                                                        <img src="../image/<?= $data['foto_kamar'] ?>" alt="" width="300" class="item-center" height="170">
                                                    </div>
                                                    <div class="form-group text-center">
                                                        <input type="file" class="form-control" name="foto" id="exampleFormControlInput1">
                                                    </div>
                                                </div>
                                                <div class="form-group mb-1 ml-3">
                                                    <a href="kamar.php" class="btn btn-secondary ">Close</a>
                                                    <input type="submit" class="btn bg-gradient-info " name="foto" value="Edit Data Kamar">
                                                </div>
                                            </div>
                                        </form>

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