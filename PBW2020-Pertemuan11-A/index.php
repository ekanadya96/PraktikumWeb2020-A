<!DOCTYPE html>
<html>
<head>
    <!-- Load file CSS Bootstrap offline -->
 <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

</head>
<body>
	<?php
		 //Fungsi untuk mencegah inputan karakter yang tidak sesuai
		 function input($data) {
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}
		//Cek apakah ada kiriman form dari method post
		if ($_SERVER["REQUEST_METHOD"] == "POST") {

			session_start();
			include "koneksi.php";
			$username = input($_POST["username"]);
			$p = input(md5($_POST["password"]));

			$sql = "select * from pengguna where username='".$username."' and password='".$p."' limit 1";
			$hasil = mysqli_query ($kon,$sql);
			$jumlah = mysqli_num_rows($hasil);

			if ($jumlah>0) {
				$row = mysqli_fetch_assoc($hasil);
				$_SESSION["id"]=$row["id"];
				$_SESSION["username"]=$row["username"];
				$_SESSION["nama"]=$row["nama"];
				$_SESSION["peran"]=$row["peran"];
		
				//menentukan link sesuai dengan peran user
				if ($_SESSION["peran"]=$row["peran"]=="admin")
				{
					header("Location:admin.php");
				} else
				{
					header("Location:pegawaii.php");
				}
		
				
			}else {
				echo "<div class='alert alert-danger'>
				<strong>Error!</strong> Username dan password salah. 
			  </div>";
			}

		}
	
	?>
	
	
	<div class="container">
	<div class="card">
	<div class="card-header">
		<h2>Login multi user dengan PHP</h2><br>
	</div>

	<div class="card-body">
	<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
		<div class="form-group">
            <label>Username:</label>
            <input type="text" class="form-control" name="username" placeholder="Masukan Username">
        </div>
        <div class="form-group">
            <label>Password:</label>
            <input type="password" class="form-control" name="password" placeholder="Masukan Password">
        </div>
        <div class="form-group">
            <input type="submit"  class="btn btn-primary"  value="Login">
        </div>
        </form>
	</div>
	</div>
	</div>


</body>
</html>