<?php
session_start();
include "../config/config.hotel.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Pemesanan| Hotel Serasa</title>

  <?php require_once "head-hotel.php"; ?>
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
          <div class="row">
            <div class="col-12">
              <div class="card mb-4">
                <div class="card-header pb-0">
                  <h6>Data Pesanan</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                  <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                      <?php
                      $no = 1;
                      if (isset($_POST['cari'])) {
                        $cari = $_POST['cari'];
                        $query = mysqli_query($conn, "select * from pesamesanan where nama_kamar like '%" . $cari . "%'");
                      } else {
                        $query = mysqli_query($conn, "select * from pemesanan");
                      }

                      if (isset($_GET['status'])) {
                        if ($_GET['status'] == 'sukses') {
                          echo '<script language="javascript">';
                          echo 'alert("Berhasil Dipesan")';
                          echo '</script>';
                        } elseif ($_GET['status'] == 'gagal') {
                          echo '<script language="javascript">';
                          echo 'alert("Gagal Dipesan")';
                          echo '</script>';
                        } elseif ($_GET['status'] == 'berhasil') {
                          echo '<script language="javascript">';
                          echo 'alert("Berhasil Dibatalkan")';
                          echo '</script>';
                        } elseif ($_GET['status'] == 'ggl') {
                          echo '<script language="javascript">';
                          echo 'alert("Gagal Dibatalkan")';
                          echo '</script>';
                        }
                      }
                      ?>
                      <thead>
                        <tr>
                          <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">No</th>
                          <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7 ps-2">Nama Kamar</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal Chekin</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal Chekout</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jumlah Kamar</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Pemesan</th>
                          <th class="text-secondary opacity-7">Action</th>
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
                            <th class="text-center"><?= $no++; ?></th>
                            <td class="text-center"><?= $ambil['nama_kamar']; ?></td>
                            <td class="text-center"><?= $data['tanggal_chekin']; ?></td>
                            <td class="text-center"><?= $data['tanggal_chekout']; ?></td>
                            <td class="text-center"><?= $data['jumlah_pesan']; ?></td>
                            <td class="text-center"><?= $data['nama_pemesan']; ?></td>
                            <td class="align-middle">
                              <a href="view_pesan_r.php?id=<?= $data['id_pemesanan']; ?>" id='m-view' class="btn btn-link text-info text-gradient px-1 mb-0">
                                Peroses
                              </a>
                              <a href="batal_pesan_r.php?id=<?= $data['id_pemesanan']; ?>" id='m-view' class="btn btn-link text-danger text-gradient px-1 mb-0">
                                Batal
                              </a>
                            </td>
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
  </main>

  <!--   Core JS Files   -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


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



    // $('#m-view').on('click', function() {

    //   var id = $('#m-view').attr('data-id')
    //   var nama = $('#m-view').attr('data-nama')
    //   var foto = $('#m-view').attr('data-foto')
    //   var jumlah = $('#m-view').attr('data-jumlah')
    //   var harga = $('#m-view').attr('data-harga')
    //   var deskripsi = $('#m-view').attr('data-deskripsi')

    //   var path_photo = `${window.location.origin}/hotel-serasa/image/${foto}`
    //   console.log('id', id)
    //   console.log(path_photo)
    //   $('input#idv').val(id)
    //   $('input#namaev').val(nama)
    //   $('img#fotov').attr('src', path_photo)
    //   $('input#jumlahv').val(jumlah)
    //   $('input#hargav').val(harga)
    //   $('input#deskripsiv').val(deskripsi)

    //   console.log('oke clicked!')
    //   console.log(nama)
    // })
  </script>
</body>

</html>