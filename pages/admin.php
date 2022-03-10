<?php
session_start();
include "../config/config.hotel.php";
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
            <button class="badge badge-sm bg-gradient-info mb-3" data-bs-target="#mymodal" data-bs-toggle="modal">Tambah User Admin</button>
          </div>

          <!-- Modal -->
          <div class="modal fade" id="mymodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLongTitle">Tambah User Admin</h5>
                  <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form action="../controller/admin/adminController.php" enctype="multipart/form-data" method="post">

                    <div class="form-group">
                      <label for="exampleInputText1">Nama Pengguna</label>
                      <input type="text" class="form-control" name="nama" id="exampleInputText1" aria-describedby="textHelp" placeholder="Masukan Nama Pengguna" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputNumber1">Username</label>
                      <input type="text" class="form-control" name="username" id="exampleInputNumbe1" aria-describedby="numberHelp" placeholder="Masukan Username" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputNumber1">Password</label>
                      <input type="password" class="form-control" name="password" id="exampleInputNumber1" aria-describedby="numberHelp" placeholder="Masukan Password" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputText1">Level</label>
                      <!-- <input type="text" class="form-control" name="deskrip" id="exampleInputText1" aria-describedby="TextHelp" placeholder="Masukan Deskripsi Kamar" required> -->
                      <select class="form-control" name="level" required>
                        <option selected>Masukan Level</option>
                        <option>administrator</option>
                        <option>resepsionis</option>
                      </select>
                    </div>


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
                  <h6>Data User Admin</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                  <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                      <?php

                      $no = 1;
                      if (isset($_POST['cari'])) {
                        $cari = $_POST['cari'];
                        $query = mysqli_query($conn, "select * from admin where nama_admin like '%" . $cari . "%'");
                      } else {
                        $query = mysqli_query($conn, "SELECT * from admin order by nama_admin asc");
                      }

                      if (isset($_GET['status'])) {
                        if ($_GET['status'] == 'sukses') {
                          echo '<script language="javascript">';
                          echo 'alert("Data Berhasil Ditambahkan")';
                          echo '</script>';
                        }

                        if ($_GET['status'] == 'gagal') {
                          echo '<script language="javascript">';
                          echo 'alert("Data Gagal Ditambahkan")';
                          echo '</script>';
                        }
                        if ($_GET['status'] == 'berhasil') {
                          echo '<script language="javascript">';
                          echo 'alert("Data Berhasil Diedit")';
                          echo '</script>';
                        }
                        if ($_GET['status'] == 'gal') {
                          echo '<script language="javascript">';
                          echo 'alert("Data Gagal Diedit")';
                          echo '</script>';
                        }
                      }
                      if (isset($_GET['ket'])) {
                        if($_GET['ket'] == 'sukses'){
                          echo '<script language="javascript">';
                          echo 'alert("Data Berhasil Dihapus")';
                          echo '</script>';
                        }
                        if($_GET['ket'] == 'gagal'){
                          echo '<script language="javascript">';
                          echo 'alert("Data Gagal Dihapus")';
                          echo '</script>';
                        }
                      }
                      ?>
                      <thead>
                        <tr>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                          <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7 ps-2">Nama</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Username</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Level</th>
                          <th class="text-secondary opacity-7">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        while ($data = mysqli_fetch_array($query)) {
                        ?>
                          <tr>
                            <th class="text-center"><?= $no++; ?></th>
                            <td class="text-center"><?= $data['nama_admin']; ?></td>
                            <td class="text-center"><?= $data['username']; ?></td>
                            <td class="text-center"><?= $data['level']; ?></td>
                            <td class="align-middle">
                              <a class="btn btn-link text-info text-gradient px-1 mb-0" href="viewadmin.php?id=<?= $data['id_admin'] ?>"><i class="fas fa-eye"></i> View |</a>
                              <!-- <a href="" id='m-view' class="text-secondary font-weight-bold text-xs editkamar" >
                              View |
                            </a> -->
                              <a class="btn btn-link text-dark px-1 mb-0" href="editadmin.php?id=<?= $data['id_admin'] ?>"><i class="fas fa-pencil-alt text-dark me-1" aria-hidden="true"></i>Edit |</a>
                              <!-- <a href="editadmin.php?id=" id='m-edit' class="text-secondary font-weight-bold text-xs editkamar"  >
                              Edit |
                            </a> -->
                              <a class="btn btn-link text-danger text-gradient px-1 mb-0" href="../controller/admin/deleteuserController.php?id=<?= $data['id_admin'] ?>"><i class="far fa-trash-alt me-2"></i>Delete</a>
                              <!-- <a href="" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                Delete
                              </a> -->
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
      <!-- modal edit -->
      <div class="modal fade" id="myedit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
              <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="../controller/admin/editkamarController.php" enctype="multipart/form-data" method="post">

                <div class="form-group">
                  <label for="namae">Nama pengguna</label>
                  <input type="hidden" class="form-control" name="namae" id="id" aria-describedby="textHelp" placeholder="Masukan Nama Kamar">
                  <input type="text" class="form-control" name="namae" id="nama" aria-describedby="textHelp" placeholder="Masukan Nama Kamar">
                </div>
                <div class="form-group">
                  <label for="jumlah">Username</label>
                  <input type="text" class="form-control" name="jumlahe" id="username" aria-describedby="numberHelp" placeholder="Masukan Jumlah Kamar">
                </div>
                <div class="form-group">
                  <label for="harga">Password</label>
                  <input type="text" class="form-control" name="hargae" id="password" aria-describedby="numberHelp" placeholder="Masukan Harga Kamar">
                </div>
                <div class="form-group">
                  <label for="deskripsi">Level</label>
                  <!-- <input type="text" class="form-control" name="deskripe" id="leve" aria-describedby="TextHelp" placeholder="Masukan Deskripsi Kamar"> -->
                  <select name="" id="level" class="form-control">
                    <option selected>Masukan level </option>
                    <option>administrator</option>
                    <option>resepsionis</option>
                  </select>
                </div>


            </div>
            <div class="modal-footer">
              <span type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</span>
              <input type="submit" class="btn btn-primary" value="Save changes"></input>
            </div>
            </form>
          </div>
        </div>
      </div>
      <!-- end modal edit -->

      <!-- modal view -->
      <div class="modal fade" id="myview" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
              <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="../controller/admin/editkamarController.php" enctype="multipart/form-data" method="post">


                <div class="row">
                  <div class="col-sm">
                    <div class="form-group">
                      <label for="namae">Nama Pengguna</label>
                      <input type="text" class="form-control" name="namae" id="namav" aria-describedby="textHelp" placeholder="Masukan Nama Kamar" disabled>
                    </div>
                    <div class="form-group">
                      <label for="jumlah">Username</label>
                      <input type="text" class="form-control" name="usernamev" id="user" aria-describedby="numberHelp" placeholder="Masukan Jumlah Kamar" disabled>
                    </div>
                  </div>
                  <div class="col-sm">
                    <div class="form-group">
                      <label for="deskripsi">Level</label>
                      <input type="text" class="form-control" name="levelv" id="levelv" aria-describedby="TextHelp" placeholder="Masukan Deskripsi Kamar" disabled>
                    </div>
                  </div>
                </div>


            </div>
            <div class="modal-footer">
              <span type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</span>
            </div>
            </form>
          </div>
        </div>
      </div>
      <!-- end modal view -->

    </div>
  </main>

  <!--   Core JS Files   -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js">
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
    $('#m-edit').on('click', function() {
      let id = $('#m-edit').attr('data-id')
      let nama = $('#m-edit').attr('data-nama')
      let username = $('#m-edit').attr('data-username')
      let password = $('#m-edit').attr('data-password')
      let level = $('#m-edit').attr('data-level')

      $('input#id').val(id)
      $('input#nama').val(nama)
      $('input#username').val(username)
      $('input#password').val(password)
      $('option#level').val(level)

      console.log('oke clicked!')
      console.log(nama)
    })
    $('#m-view').on('click', function() {

      let id = $('#m-view').attr('data-id')
      let nama = $('#m-view').attr('data-nama')
      let username = $('#m-view').attr('data-username')
      let password = $('#m-view').attr('data-password')
      let level = $('#m-view').attr('data-level')

      $('input#idv').val(id)
      $('input#namav').val(nama)
      $('input#user').val(username)
      $('input#passwordv').val(password)
      $('input#levelv').val(level)

      console.log('oke clicked!')
      console.log(username)
    })
  </script>
</body>

</html>