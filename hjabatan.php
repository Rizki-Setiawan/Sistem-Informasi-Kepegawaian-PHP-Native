<?php
include('config.php');
$id_jabatan	= $_GET['id_jabatan'];

$hapus 	= 'delete from tbl_jabatan where id_jabatan="'.$id_jabatan.'"';
$query	= mysqli_query($connect,$hapus);
header('location: djabatan.php');
?>
