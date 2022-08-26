<?php
include('config.php');
$nip	= $_GET['nip'];

$hapus 	= 'delete from tbl_pegawai where nip="'.$nip.'"';
$query	= mysqli_query($connect,$hapus);
header('location: dpegawai.php');
?>
