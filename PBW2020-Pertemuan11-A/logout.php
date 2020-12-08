<?php
session_start();

$_SESSION['id']='';
$_SESSION['username']='';
$_SESSION['nama']='';
$_SESSION['peran']='';


unset($_SESSION['id']);
unset($_SESSION['username']);
unset($_SESSION['nama']);
unset($_SESSION['peran']);
//menghancurkan session dan kembali ke halaman awal
session_unset();
session_destroy();
header('Location:index.php');

?>