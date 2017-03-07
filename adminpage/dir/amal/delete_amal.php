<?php
    include "../../config/koneksi.php";

	$id_amal = $_GET['id_amal'];
	$modal=mysql_query("Delete FROM tbjns_amal WHERE id_amal = '$id_amal'");
	header('location:../../home.php?page=jnsamal&status=2');
?>