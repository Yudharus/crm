<?php 
	
	@session_start();
	include "koneksi.php";

	$user = @$_POST['username'];
	$pass = @$_POST['password'];
	$login = @$_POST['login'];
	
	if (isset($login)) {

			$sql = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$user' AND password = '$pass'") or die(mysqli_error());
			$data = mysqli_fetch_array($sql);
			$cek = mysqli_num_rows($sql);
		
			if ($cek > 0) {
				if ($data['level'] == "manager") {

						@$_SESSION['manager'] = $data['id'];

						header("location:home.php");

					} else if ($data['level'] == "pegawai") {
						
						@$_SESSION['pegawai'] = $data['id'];

						header("location:manager/jurnalUmum.php");
					}				
			} 
			else{
				?> <script type="text/javascript">alert("Usename / password salah ");window.location.href='index.php';</script> <?php
			}
		

	}

?>