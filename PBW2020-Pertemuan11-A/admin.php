<?php
session_start();

if (!isset($_SESSION["username"])) {
	echo "Anda harus login dulu <br><a href='index.php'>Klik disini</a>";
	exit;
}

$peran=$_SESSION["peran"];
//mengecek siapa yang login
if ($peran!="admin") {
    echo "Anda tidak punya akses pada halaman admin";
    exit;
}
//mengambil data
$id=$_SESSION["id"];
$username=$_SESSION["username"];
$nama=$_SESSION["nama"];
$peran=$_SESSION["peran"];

?>
<!DOCTYPE html>
<html>
<head>
 <!-- Load file CSS Bootstrap offline -->
 <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

</head>
<body>
<div class="text-center pt-3">
    <h2>Selamat Datang <?php echo $nama; ?> di Halaman Admin</h2>
    <h6 class="text-muted">Halaman ini hanya dapat diakses oleh Admin</h6>
</div>
<div>

<div class="container pt-4">
<h2>Data Pelanggan</h2>
<a href="tambah_pelanggan.php">Tambah Data Pelanggan</a>
<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">NO</th>
      <th scope="col">NAMA</th>
      <th scope="col">ALAMAT</th>
      <th scope="col">AKSI</th>
    </tr>
  </thead>
    <?php 
    //koneksi database
    include 'koneksi.php';
    $sql = "SELECT * FROM pelanggan";
    $que = mysqli_query($kon, $sql);//eksekusi perintah $sql
    $no=1;
    while ($data=mysqli_fetch_array($que)) 
    {
        //deklarasi database sesuai dengan isi database
        $idm    = $data['id'];
        $nama   = $data['nama'];
        $alamat = $data['alamat'];

        echo
        "
            <tr>
                <td align='center'>$no</td>
                <td>$nama</td>
                <td>$alamat</td>
                <td>
                    <a href='edit_pelanggan.php?id=$idm'>Edit</a>
                    
                    <a href='hapus_pelanggan.php?id=$idm'>Hapus</a>
                </td>
            </tr>
        ";
        $no++;
    }

    ?>
</table>
<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#pesan">
            LOGOUT
</button>
</div>

</div>

 <!-- Modal untuk menampilkan konfirmasi sebelum logout-->
 <div class="modal fade" id="pesan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        Apakah Anda yakin?<br>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">TIDAK</button>
                        <a href="logout.php"><button type="button" class="btn btn-warning">YA</button></a>
                    </div>
                </div>
            </div>
        </div>

<script src="js/jquery.js"></script>
<script src="js/bootstrap.bundle.js"></script>
</body>

</html> 