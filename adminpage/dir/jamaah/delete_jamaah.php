<?php
    include "../../config/koneksi.php";

	$id_jamaah = $_GET['id_jamaah'];
	$modal=mysql_query("Delete FROM tbjamaah WHERE id_jamaah = '$id_jamaah'");
	header('location:../../home.php?page=jamaah&status=2');
?>