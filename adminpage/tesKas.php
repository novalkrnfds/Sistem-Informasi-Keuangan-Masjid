<?php
	include "config/koneksi.php";

	/*pertama kita panggil colom yang akan kita gunakan untuk ID kita dengan menyaring nilai maksimum */
	$hasil = mysql_query("SELECT max(id_admin) as maxid from tb_anggota");
	
	//memecah table hasil query
	$r = mysql_fetch_array($hasil);
	
	//mengambil cell atau 1 kotak bagian dari table yaitu cell id_anggota yang dialiaskan terakhir
	$lastID = $r['terakhir'];
	
	// baca nomor urut  id transaksi terakhir
	$lastNoUrut = substr($lastID, 3, 9);
	
	// nomor urut ditambah 1
	$nextNoUrut = $lastNoUrut + 1;
	
	// membuat format nomor berikutnya
	$nextID = "KAS".sprintf("%03s",$nextNoUrut);
	
	// selesai,,, untuk memanggil ID otomatis ini  bisa memasangkan cara
	echo "<form method='GET'>
						<input type='text' name='kas' value='$nextID'>
						<select name='tes' onChange='this.form.submit()'>
							<option value=''> pilih </option>
							<option value='infaq'>Infaq</option>
							<option value='zakat'>Zakat</option>
						</select>
		</form>";
				if(isset($_GET['infaq'])){
					echo $_GET['infaq'];
				} 
				if(isset($_GET['zakat'])){
					echo $_GET['infaq'];
				}
?>