<?php
    include "../../config/koneksi.php";

	$id_admin=$_GET['id_admin'];
	$modal=mysql_query("Delete FROM tbadmin WHERE id_admin='$id_admin'");
	header('location:../../home.php?page=admin&status=2');
?>