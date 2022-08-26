<?php
include('config.php');
$id_data_pendidikan	= $_GET['id_data_pendidikan'];

$hapus 	= 'delete from tbl_pendidikan where id_data_pendidikan="'.$id_data_pendidikan.'"';
$query	= mysqli_query($connect,$hapus);
header('location: dpendidikan.php');
?>
