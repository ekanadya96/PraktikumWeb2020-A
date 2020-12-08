<!DOCTYPE html>
<html>
<head>
 <!-- Load file CSS Bootstrap -->
 <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

</head>
<body>
<div class="container">

<div class="card mt-4">
  <div class="card-header">
    <h2>Edit Data Pelanggan</h2>
  </div>
    <?php 
        include 'koneksi.php';
        $id  = $_GET['id'];
        $sql = "SELECT * FROM pelanggan WHERE id='$id'";
        $que = mysqli_query($kon, $sql);
    
        while ($data=mysqli_fetch_array($que)) 
        {
            $nama   = $data['nama'];
            $alamat = $data['alamat'];
        }
    ?>
 
  <div class="card-body pt-4 mt-4">
  <form action="ubah_pelanggan.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="idm" value="<?php echo"$id"; ?>">
    <label>NAMA</label>
    <div class="input-group mb-3">
        
         <input type="text" class="form-control" name="nama" required="" placeholder="Masukkan nama pelanggan" aria-label="Username" aria-describedby="basic-addon1" value="<?php echo "$nama"; ?>">
    </div>
    <label>ALAMAT</label>
    <div class="input-group mb-3">
        
         <input type="text" class="form-control" name="alamat" required="" placeholder="Masukkan alamat pelanggan" aria-label="Username" aria-describedby="basic-addon1" value="<?php echo "$alamat"; ?>">
    </div>
 
 
    <p>
        <input type="submit" class="btn btn-warning" value="SIMPAN">
    </p>
</form>
  </div>
</div>

</div>
</body>
</html> 