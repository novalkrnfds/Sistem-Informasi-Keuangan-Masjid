<?php
    include "../../config/koneksi.php";

	//$page = $_GET['page'];
	
	//if($page == "setup_pengeluaran"){
		$id_pengeluaran = $_GET['id_pengeluaran'];
		$select = mysql_query("Select id_santunan from tbpengeluaran where id_pengeluaran = '$id_pengeluaran'");
		$data = mysql_fetch_array($select);
		$getid = $data['id_santunan'];
		
		$modal=mysql_query("Delete FROM tbpengeluaran WHERE id_pengeluaran = '$id_pengeluaran'");
		$delete=mysql_query("delete from tbsantunan where id_santunan = '$getid'");
		header('location:../../home.php?page=setup_pengeluaran&status=2');
	//} else if($page == "setup_pemasukan"){
	
	//}
?>