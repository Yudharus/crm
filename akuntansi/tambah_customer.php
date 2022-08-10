<?php
include "koneksi.php";
$id_customer = $_POST['id_customer'];
$nama_customer = $_POST['nama_customer'];
$alamat = $_POST['alamat'];
$nomor= $_POST['nomor'];
mysqli_query($koneksi,"INSERT INTO customer (id_customer,nama_customer,alamat,nomor) VALUES ('$id_customer','$nama_customer','$alamat','$nomor')");
header('location:costumer.php');
?>