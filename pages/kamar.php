<?php
session_start();
include "../config/config.hotel.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Kamar | Hotel Serasa</title>

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
            <button class="badge badge-sm bg-gradient-info mb-3" data-bs-target="#mymodal" data-bs-toggle="modal">Tambah Kamar</button>
          </div>

          <!-- Modal -->
          <div class="modal fade" id="mymodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                  <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form action="../controller/admin/kamarController.php" enctype="multipart/form-data" method="post">

                    <div class="form-group">
                      <label for="exampleInputText1">Nama Kamar</label>
                      <input type="text" class="form-control" name="nama" id="exampleInputText1" aria-describedby="textHelp" placeholder="Masukan Nama Kamar" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlFile1" name="file">Foto Kamar</label><br>
                      <input type="file" class="form-control-file" name="foto" id="exampleFormControlFile1" value="Tambah Foto Kamar" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputNumber1">Jumlah Kamar</label>
                      <input type="number" class="form-control" name="jumlah" id="exampleInputNumbe1" aria-describedby="numberHelp" placeholder="Masukan Jumlah Kamar" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputNumber1">Harga Kamar</label>
                      <input type="number" class="form-control" name="harga" id="exampleInputNumber1" aria-describedby="numberHelp" placeholder="Masukan Harga Kamar" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputText1">Deskripsi</label>
                      <input type="text" class="form-control" name="deskrip" id="exampleInputText1" aria-describedby="TextHelp" placeholder="Masukan Deskripsi Kamar" required>
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
                  <h6>Data Kamar</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                  <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                      <?php
                      $no = 1;
                      if (isset($_POST['cari'])) {
                        $cari = $_POST['cari'];
                        $query = mysqli_query($conn, "select * from kamar_hotel where nama_kamar like '%" . $cari . "%'");
                      } else {
                        $query = mysqli_query($conn, "select * from kamar_hotel");
                      }

                      if (isset($_GET['status'])) {
                        if ($_GET['status'] == 'sukses') {
                          echo '<script language="javascript">';
                          echo 'alert("Kamar Berhasil Ditambahkan")';
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
                          echo 'alert("Kamar Berhasil Ditambahkan")';
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
                          echo 'alert("Kamar Berhasil Dihapus")';
                          echo '</script>';
                        }
                        elseif ($_GET['pesan'] == 'gagal') {
                          echo '<script language="javascript">';
                          echo 'alert("Kamar Gagal Dihapus")';
                          echo '</script>';
                        }
                        elseif ($_GET['pesan'] == 'bnr') {
                          echo '<script language="javascript">';
                          echo 'alert("Fasilitas Berhasil Dihapus")';
                          echo '</script>';
                        }
                        elseif ($_GET['pesan'] == 'ggl') {
                          echo '<script language="javascript">';
                          echo 'alert("Fasilitas Gagal Dihapus")';
                          echo '</script>';
                        }
                      }
                      elseif (isset($_GET['ketra'])) {
                        if ($_GET['ketra'] == 'sukses') {
                          echo '<script language="javascript">';
                          echo 'alert("Fasilitas Berhasil Ditambahkan")';
                          echo '</script>';
                        }
                        elseif ($_GET['ketra'] == 'gagal') {
                          echo '<script language="javascript">';
                          echo 'alert("Fasilitas Gagal Ditambahkan")';
                          echo '</script>';
                        }
                      }
                      elseif (isset($_GET['kt'])) {
                        if ($_GET['kt'] == 'sukses') {
                          echo '<script language="javascript">';
                          echo 'alert("Fasilitas Berhasil Diedit")';
                          echo '</script>';
                        }
                        elseif ($_GET['kt'] == 'gagal') {
                          echo '<script language="javascript">';
                          echo 'alert("Fasilitas Gagal Diedit")';
                          echo '</script>';
                        }
                      }
                      ?>
                      <thead>
                        <tr>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                          <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7 ps-2">Nama Kamar</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jumlah Kamar</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Harga Kamar</th>
                          <th class="text-secondary opacity-7">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        while ($data = mysqli_fetch_array($query)) {
                        ?>
                          <tr>
                            <th class="text-center"><?= $no++; ?></th>
                            <td class="text-center"><?= $data['nama_kamar']; ?></td>
                            <td class="text-center"><?= $data['jumlah_kamar']; ?></td>
                            <td class="text-center"><?= $data['harga_kamar']; ?></td>
                            <td class="align-middle">
                              <a href="fasilitas-kamar.php?id=<?= $data['id_kamar']; ?>" id='m-view' class="badge badge-sm bg-gradient-success"><i class="fas fa-eye"></i>
                                fasilitas
                              </a>
                              <a href="viewkamar.php?id=<?= $data['id_kamar']; ?>" id='m-view' class="btn btn-link text-info text-gradient px-1 mb-0"><i class="fas fa-eye"></i>
                                View |
                              </a>
                              <a href="editkamar.php?id=<?= $data['id_kamar']; ?>" id='m-edit' class="btn btn-link text-dark text-gradient px-1 mb-0"><i class="fas fa-pencil-alt text-dark me-1" aria-hidden="true"></i>
                                Edit |
                              </a>
                              <a href="../controller/admin/deletekamarController.php?id=<?php echo $data['id_kamar']; ?>" class="btn btn-link text-danger text-gradient px-1 mb-0" id="delete"><i class="far fa-trash-alt me-2"></i>
                                Delete
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
                  <label for="namae">Nama Kamar</label>
                  <input type="hidden" class="form-control" name="namae" id="id" aria-describedby="textHelp" placeholder="Masukan Nama Kamar">
                  <input type="text" class="form-control" name="namae" id="namae" aria-describedby="textHelp" placeholder="Masukan Nama Kamar">
                </div>
                <div class="form-group">
                  <label for="foto" name="file">Foto Kamar</label><br>
                  <input type="file" class="form-control-file" name="fotoe" id="foto" value="Tambah Foto Kamar" required>
                </div>
                <div class="form-group">
                  <label for="jumlah">Jumlah Kamar</label>
                  <input type="number" class="form-control" name="jumlahe" id="jumlah" aria-describedby="numberHelp" placeholder="Masukan Jumlah Kamar">
                </div>
                <div class="form-group">
                  <label for="harga">Harga Kamar</label>
                  <input type="number" class="form-control" name="hargae" id="harga" aria-describedby="numberHelp" placeholder="Masukan Harga Kamar">
                </div>
                <div class="form-group">
                  <label for="deskripsi">Deskripsi</label>
                  <input type="text" class="form-control" name="deskripe" id="deskripsi" aria-describedby="TextHelp" placeholder="Masukan Deskripsi Kamar">
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

                <div class="form-group">
                  <label for="foto" name="file">Foto Kamar</label><br>
                  <!-- <input type="file" class="form-control-file" name="fotoe" id="fotov" value="Tambah Foto Kamar" required> -->
                  <img name='fotov' id='fotov' width='150' height='170' />
                </div>
                <div class="row">
                  <div class="col-sm">
                    <div class="form-group">
                      <label for="namae">Nama Kamar</label>
                      <input type="text" class="form-control" name="namae" id="namaev" aria-describedby="textHelp" placeholder="Masukan Nama Kamar" disabled>
                    </div>
                    <div class="form-group">
                      <label for="jumlah">Jumlah Kamar</label>
                      <input type="number" class="form-control" name="jumlahe" id="jumlahv" aria-describedby="numberHelp" placeholder="Masukan Jumlah Kamar" disabled>
                    </div>
                  </div>
                  <div class="col-sm">
                    <div class="form-group">
                      <label for="harga">Harga Kamar</label>
                      <input type="number" class="form-control" name="hargae" id="hargav" aria-describedby="numberHelp" placeholder="Masukan Harga Kamar" disabled>
                    </div>
                    <div class="form-group">
                      <label for="deskripsi">Deskripsi</label>
                      <input type="text" class="form-control" name="deskripe" id="deskripsiv" aria-describedby="TextHelp" placeholder="Masukan Deskripsi Kamar" disabled>
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
      let jumlah = $('#m-edit').attr('data-jumlah')
      let harga = $('#m-edit').attr('data-harga')
      let deskripsi = $('#m-edit').attr('data-deskripsi')

      $('input#id').val(id)
      $('input#namae').val(nama)
      $('input#jumlah').val(jumlah)
      $('input#harga').val(harga)
      $('input#deskripsi').val(deskripsi)

      console.log('oke clicked!')
      console.log(nama)
    })

    $('.m-view').on('click', function() {
      $('#myview').modal(show);
      var [id, nama, foto, jumlah, harga, deskrip] = [$(this).attr('data-id'), $(this).attr('data-nama'), $('#fotov').attr('data-foto'), $(this).attr('data-jumlah'), $(this).attr('data-harga'), $(this).attr('data-deskripsi')];

      var path_photo = `${window.location.origin}/hotel-serasa/image/${foto}`
      $('input#idv').val(id);
      $('input#namaev').val(nama);
      $('img#fotov').attr('src', path_photo);
      $('input#jumlahv').val(jumlah);
      $('input#hargav').val(harga);
      $('input#deskripsiv').val(deskrip);
    })
  </script>
</body>

</html>