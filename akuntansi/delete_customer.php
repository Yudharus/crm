<?php
	include "koneksi.php";
	$id_customer=$_GET['id_customer'];
	$datacustomer=mysqli_query($koneksi,"Delete FROM customer WHERE id_customer='$id_customer'");
	header('location:costumer.php');
?>