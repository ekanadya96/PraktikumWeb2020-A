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
            <h2>Tambah Data Pelanggan</h2>
            </div>
            <div class="card-body pt-4 mt-4">
                                        <!--enctype="multipart/form-data", wajib ada kalo ada upload file-->
                <form action="simpan_pelanggan.php" method="post" enctype="multipart/form-data">
                    <label>NAMA</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="nama" required="" placeholder="Masukkan nama pelanggan" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                    <label>ALAMAT</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="alamat" required="" placeholder="Masukkan alamat pelanggan" aria-label="Username" aria-describedby="basic-addon1">
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