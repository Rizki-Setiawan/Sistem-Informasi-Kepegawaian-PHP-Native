<?php
include('config.php');
$id_mutasi	= $_GET['id_mutasi'];

$hapus 	= 'delete from tbl_mutasi where id_mutasi="'.$id_mutasi.'"';
$query	= mysqli_query($connect,$hapus);
header('location: dmutasi.php');
?>
