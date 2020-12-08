<?php 
 
    include 'koneksi.php';
    $id     = $_POST['idm'];
    $nama   = $_POST['nama'];
    $alamat = $_POST['alamat'];

 
    //perintah update sql untuk menyimpan ke database
    $sql = "UPDATE pelanggan SET nama='$nama', alamat='$alamat' WHERE id='$id'";
     
    $que = mysqli_query($kon, $sql);  
    //peyimpanan
    if ($que) //jika berhasil
    {
        echo
        "
            <script type='text/javascript'>
                alert('Data telah diubah');
                window.location='admin.php';
            </script>
        ";
    }
    else //jika gagal
    {
        echo
        "
            <script type='text/javascript'>
                alert('Gagal diubah');
                window.location='edit_pelanggan.php?id=$id';
            </script>
        ";
    }
?>