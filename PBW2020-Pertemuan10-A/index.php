<?php
session_start(); //digunakan untuk melakukan start pada session

//proses pengecekan isi form
if(isset($_POST['simpan'])){  
  //variabel berbentuk array untuk menyimpan kesalahan yang terjadi
  $error=array();

  if(empty($_POST['nis'])){
    $error['nis']= "NIS tidak boleh kosong";
  }else if(strlen($_POST['nis'])!=5){
    $error['nis']= "Jumlah karakter NIS harus 5 digit";
  }
  if(empty($_POST['nama'])){
    $error['nama'] = "Nama tidak boleh kosong";
  }
  if(empty($_POST['nilai_1'])){
    $error['nilai_1'] = "Nilai kuis tidak boleh kosong";
  }
  if(empty($_POST['nilai_2'])){
    $error['nilai_2'] = "Nilai kuis tidak boleh kosong";
  }
  if(count($error)==0) {
  //jika error tidak ada maka input user disimpan ke variabel input yang berbentuk array
  $input = array();
  $input['nis'] = $_POST['nis'];
  $input['nama'] = $_POST['nama'];
  $input['nilai_1'] = $_POST['nilai_1'];
  $input['nilai_2'] = $_POST['nilai_2'];
  //proses mencari jumlah dan rata-rata
  $input['jum'] = $input['nilai_1'] + $input['nilai_2'] ;
  $input['rata'] = $input['jum']/ 2;

  //menyimpan ke session
  if($_SESSION['siswa']){
    $siswa = $_SESSION['siswa'];
    array_push($siswa,$input);
    $_SESSION['siswa'] = $siswa;
  }else{
    $_SESSION['siswa'][] = $input;
  }
  header("location: ./index.php");
  } 

}

error_reporting(0); //abaikan error pada browser
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="fontawesome-free/css/all.min.css">

    <title>Tugas PBW PHP</title>
  </head>
  <body style="background-color: white;">

  <div class="mb-4" style="background-color:black; width: 100%;">
        <br>
        <h2 class="text-center mt-3 text-warning" style="font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;">DAFTAR NILAI SISWA</h2>
        <br><br>
  </div>
    <div class="container" style="margin-left: 20rem;">

        <form action="index.php" method="post">
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label>NIS</label>
                        <input class="form-control" type="number" name="nis" placeholder="Masukkan NIS anda"></input>
                       <p class="text-danger"><?php echo $error['nis'];?></p> 
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input class="form-control" type="text" name="nama" placeholder="Masukkan nama lengkap anda"></input>
                        <p class="text-danger"><?php echo $error['nama'];?></p> 
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label>Nilai Kuis 1</label>
                        <input class="form-control" type="number" name="nilai_1" placeholder="Masukkan nilai anda"></input>
                        <p class="text-danger"><?php echo $error['nilai_1'];?></p> 
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label>Nilai Kuis 2</label>
                        <input class="form-control" type="number" name="nilai_2" placeholder="Masukkan nilai anda"></input>
                        <p class="text-danger"><?php echo $error['nilai_2'];?></p> 
                    </div>
                </div>
            </div>

         
        <!-- Button -->
        <button type="submit" class="btn btn-warning" value="Simpan" name="simpan">SUBMIT</button>
        <button type="reset" class="btn btn-danger" value="reset">RESET</button>
        
    </div>
<?php
    if($_SESSION['siswa']){ ?>  
      <div class="container mt-4">
      
      <table class="table table-bordered table-warning">
      <thead>
        <tr>
          <th scope="col">NO</th>
          <th scope="col">NIS</th>
          <th scope="col">NAMA</th>
          <th scope="col">NILAI KUIS 1</th>
          <th scope="col">NILAI KUIS 2</th>
          <th scope="col">JUMLAH NILAI</th>
          <th scope="col">RATA-RATA NILAI</th>
          <th scope="col">AKSI</th>
        </tr>
      </thead>
      <tbody>
        <!--proses untuk menampilkan data input user-->
      <?php $no=0; foreach ($_SESSION['siswa'] as $aksi => $value) { $no++; ?>
        <tr>
      
          <th scope="row"><?php echo $no;?></th>
            <td><?php echo $value['nis'];?></td>
            <td><?php echo $value['nama'];?></td>
            <td><?php echo $value['nilai_1'];?></td>
            <td><?php echo $value['nilai_2'];?></td>
            <td><?php echo $value['jum'];?></td>
            <td><?php echo $value['rata'];?></td>
            <td><button type="button" class="btn btn-warning" onclick="window.location='index.php?hapus=delete&id=<?php echo $aksi;?>'">Hapus</button></td>
        </tr>
      </tbody>
      <?php } ?>
      </table>
        </div>
        <?php }?>

        <?php
          //untuk menghapus data yang sudah diinput user 
          if ($_GET['hapus']){
          $id = $_GET['id'];
          unset($_SESSION['siswa'][$id]);
          header("location: ./index.php");
        }
        ?>

    <script type="text/javascript" src="js/bootstrap.min.js"></script>
  </body>
</html>