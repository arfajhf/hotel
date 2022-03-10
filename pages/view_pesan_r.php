<?php
session_start();
include "../config/config.hotel.php";
?>
<?php
$id = $_GET['id'];
if (isset($_POST['cari'])) {
    $cari = $_POST['cari'];
    $query = mysqli_query($conn, "SELECT * from pemesanan where nama_pemesan like '%" . $cari . "%'");
} else {
    $query = mysqli_query($conn, "SELECT * from pemesanan where id_pemesanan='$id'");
}
$data = mysqli_fetch_array($query);
$id = $data['id_kamar'];
$sql = mysqli_query($conn, "SELECT nama_kamar FROM kamar_hotel where id_kamar = '$id'");
$nama = mysqli_fetch_array($sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>
        View Pemesanan - Hotel Serasa
    </title>
    <?php require_once "head-hotel.php" ?>
</head>

<body class="g-sidenav-show  bg-gray-100">
    <?php
    require_once "navbar_user.php";
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
                        <div class="col-8" style="overflow: hidden;">
                            <div class="card mb-4">
                                <div class="card-header  mt-1 text-center ">
                                    <h4>Data Pemesanan</h4>
                                </div>
                                <div class="card-body px-0 pt-0 pb-2 ">
                                    <div class="table-responsive p-0">

                                        <form action="../controller/user/pros_pesanController.php" method="post">
                                            <div class="container">
                                                <div class="row  ">
                                                    <div class="col-md-6 ps-lg-5">
                                                        <div class="form-group">
                                                            <input type="hidden" class="form-control" name="id" id="exampleFormControlInput1" value="<?= $data['id_pemesanan'] ?>">
                                                            <input type="hidden" class="form-control" name="kamar" id="exampleFormControlInput1" value="<?= $data['id_kamar'] ?>">
                                                            <input type="nama" class="form-control" name="nama" id="exampleFormControlInput1" value="<?= $nama['nama_kamar'] ?>" disabled>
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="date" name="chekin" id="" class="form-control" disabled value="<?= $data['tanggal_chekin'] ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="date" name="chekout" id="" class="form-control" disabled value="<?= $data['tanggal_chekout'] ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="text" name="jumlah" id="" class="form-control" disabled value="<?= $data['jumlah_pesan'] ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="text" name="pemesan" id="" class="form-control" disabled value="<?= $data['nama_pemesan'] ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 pe-lg-5">
                                                        <div class="form-group">
                                                            <input type="text" name="email" id="" class="form-control" disabled value="<?= $data['email_pemesan'] ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="text" name="hp" id="" class="form-control" disabled value="<?= $data['no_hp'] ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="text" name="tamu" id="" class="form-control" disabled value="<?= $data['nama_tamu'] ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="text" name="status" id="" class="form-control" disabled value="<?= $data['status_pemesan'] ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <input name="tanggal" class="form-control" disabled value="<?= $data['tanggal_pesan'] ?>">
                                                        </div>
                                                    </div>
                                                    <div class=" col-12 justify-content-center d-flex">
                                                        <a href="kamar_resepsionis.php" class="btn me-3 btn-danger text-center ps-5 pe-5">Batal</a>
                                                        <button class="btn btn-success text-center  ps-5 pe-5">Pesan</button>
                                                    </div>
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