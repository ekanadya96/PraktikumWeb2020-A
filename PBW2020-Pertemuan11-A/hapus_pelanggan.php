<?php 
    include 'koneksi.php';
    $id  = $_GET['id'];
    //delete sesuai dengan id
    $sql = "DELETE FROM pelanggan WHERE id='$id'";
    $que = mysqli_query($kon, $sql);  
    //peyimpanan
    if ($que) //jika berhasil
    {
        echo
        "
            <script type='text/javascript'>
                alert('Data telah dihapus');
                window.location='admin.php';
            </script>
        ";
    }
    else //jika gagal
    {
        echo
        "
            <script type='text/javascript'>
                alert('Gagal dihapus');
                window.location='admin.php';
            </script>
        ";
    }
 
?>