<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Beranda</title>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
  
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
  </head>
  <body>
    <div class="container mb-5">
        <div class="row">
            <div class="col-1"></div>
            <div class="col">
                <h3 class="mt-4 text-center">DATA ANGGOTA PERPUSTAKAAN</h3>
                <?php 
                  if($_GET){
                    if ($_GET['berhasil']==1) {
                ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  Berhasil menambahkan data baru anggota! 
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php
                    }elseif($_GET['berhasil']==2){
                      echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                      Berhasil diHapus data anggota! 
                      <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>";
                    }elseif($_GET['berhasil']==3){
                      echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                      Berhasil diUbah data anggota! 
                      <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>";
                  }
                }
                ?>
                <a href="tambah.php" class="btn btn-primary mt-3 mb-3">Tambah Anggota</a>
                <table id="myTable" class=" display">
                  <thead>
                      <tr>
                          <th scope="col" class="text-center">No</th>
                          <th scope="col" class="text-center">Nama</th>
                          <th scope="col" class="text-center">Jenis Kelamin</th>
                          <th scope="col" class="text-center">Telepon</th>
                          <th scope="col" class="text-center">Email</th>
                          <th scope="col" class="text-center">Alamat</th>
                          <th scope="col" class="text-center">Aksi</th>
                      </tr>
                  </thead>
                  <tbody>
                    <?php 
                        include('koneksi.php');
                        $data_anggota = mysqli_query($conn, "SELECT id_anggota,nama, sex, telp, alamat, email FROM anggota");
                        $i=1;
                        while($anggota = mysqli_fetch_array($data_anggota)) {
                    ?>
                      <tr>
                          <th scope="row"><?= $i++; ?></th>
                          <td class="text-center"><?= $anggota['nama'] ?></td>
                          <td class="text-center"><?= $anggota['sex'] ?></td>
                          <td class="text-center"><?= $anggota['telp'] ?></td>
                          <td class="text-center"><?= $anggota['email'] ?></td>
                          <td class="text-center" width="200px"><?= $anggota['alamat'] ?></td>
                          <td class="text-center">
                            <a class="btn btn-warning" href="edit.php?id_anggota=<?php echo $anggota['id_anggota']; ?>" >Edit</a>
                            <a class="btn btn-danger" href="proses_delete.php?id_anggota=<?php echo $anggota['id_anggota']; ?>" onclick="return confirm('Yakin dihapus')"  >Delete</a>
                          </td>
                      </tr>
                    <?php
                      }
                    ?>
                  </tbody>
                </table>  
            </div>
            <div class="col-1"></div>
        </div>
    </div>
    <script type="text/javascript">
      $(document).ready( function () {
          $('#myTable').DataTable();
      } );
    </script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>