<?php 
 
    include 'koneksi.php';
    $nama   = $_POST['nama'];
    $alamat = $_POST['alamat'];
 
     
    $sql = "INSERT INTO pelanggan VALUES('', '$nama', '$alamat')";
    $que = mysqli_query($kon, $sql);  
    //peyimpanan
    if ($que) //jika berhasil
    {
        echo
        "
            <script type='text/javascript'>
                alert('Data telah disimpan');
                window.location='admin.php';
            </script>
        ";
    }
    else //jika gagal
    {
        echo
        "
            <script type='text/javascript'>
                alert('Gagal disimpan');
                window.location='tambah_pelanggan.php';
            </script>
        ";
    }
    //penyimpanan
 
?>