<?php
    include "../../config/koneksi.php";

	$id_penerima = $_GET['id_penerima'];
	$modal = mysql_query("Delete FROM tbpenerima WHERE id_penerima='$id_penerima'");
	header('location:../../home.php?page=penerima&status=2');
?>