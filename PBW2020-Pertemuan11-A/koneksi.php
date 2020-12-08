<?php
$host="localhost";
$user="root";
$password="";
$db="usaha_mikro";
//melakukan koneksi database
$kon = mysqli_connect($host,$user,$password,$db);
if (!$kon){
	  die("Koneksi gagal:".mysqli_connect_error());
}
?>
