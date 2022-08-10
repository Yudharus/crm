<?php
include "koneksi.php";
$nama = $_POST['nama'];
mysqli_query($koneksi,"INSERT INTO data_master (nama) VALUES ('$nama')");
header('location:datamaster.php');
?>