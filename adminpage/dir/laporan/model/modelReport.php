<?php
class modelReport{

	function __construct(){
		$connect = mysql_connect("localhost","root","");
		$db = mysql_select_db("db_sikmasjid");
	}
	public function execute($query){
		return mysql_query($query);
	}

	public function fetch($var){
		return mysql_fetch_array($var);
	}

	public function selectAllKas(){
		$query = "SELECT distinct tbkeuangan.tgl_masuk as tglMasuk, group_concat(tbdetail_keuangan.keterangan separator '<br><p align=left>') as ket,
				  group_concat(replace(format(tbdetail_keuangan.sub_saldo, 0), ',','.') separator '<br><p align=right>') as sub,
				  sum(tbdetail_keuangan.sub_saldo) as saldo
				  FROM tbdetail_keuangan,tbkeuangan where tbdetail_keuangan.id_keuangan = tbkeuangan.id_keuangan group by tbkeuangan.tgl_masuk";
		return $this->execute($query);
	}
	
	public function selectPengeluaran(){
		$query = "SELECT distinct tbpengeluaran.tgl_keluar as tglKeluar, group_concat(tbpengeluaran.jenis_pengeluaran separator '<br><p align=left>') as ketPengeluaran,
				  group_concat(replace(format(tbpengeluaran.jumlah, 0), ',','.') separator '<br><p align=right>') as jumlahPengeluaran,
				  sum(tbpengeluaran.jumlah) as totalJumlah
				  FROM tbpengeluaran GROUP BY tbpengeluaran.tgl_keluar";
		return $this->execute($query);
	}
	
	public function selectSumMasuk(){
		$query = "select sum(saldo) as totalMasuk from tbkeuangan";
		return $this->execute($query);
	}
	
	public function selectSumKeluar(){
		$query = "select sum(jumlah) as totalKeluar from tbpengeluaran";
		return $this->execute($query);
	}

	public function selectPerKas($tgl_start, $tgl_end){
		$query = "SELECT distinct tbkeuangan.tgl_masuk as tglMasuk, group_concat(tbdetail_keuangan.keterangan separator '<br><p align=left>') as ket,
				  group_concat(replace(format(tbdetail_keuangan.sub_saldo, 0), ',','.') separator '<br><p align=right>') as sub,
				  sum(tbdetail_keuangan.sub_saldo) as saldo
				  FROM tbdetail_keuangan,tbkeuangan where tbdetail_keuangan.id_keuangan = tbkeuangan.id_keuangan
				  and tbkeuangan.tgl_masuk >= '$tgl_start' and tbkeuangan.tgl_masuk <= '$tgl_end' group by tbkeuangan.tgl_masuk";
		return $this->execute($query);
	}
	
	public function selectPengeluaranPerKas($tgl_start, $tgl_end){
		$query = "SELECT distinct tbpengeluaran.tgl_keluar as tglKeluar, group_concat(tbpengeluaran.jenis_pengeluaran separator '<br><p align=left>') as ketPengeluaran,
				  group_concat(replace(format(tbpengeluaran.jumlah, 0), ',','.') separator '<br><p align=right>') as jumlahPengeluaran,
				  sum(tbpengeluaran.jumlah) as totalJumlah
				  FROM tbpengeluaran where tbpengeluaran.tgl_keluar >= '$tgl_start' and tbpengeluaran.tgl_keluar <= '$tgl_end' GROUP BY tbpengeluaran.tgl_keluar";
		return $this->execute($query);
	}

	public function jumlahPemasukan(){
		$query = "SELECT sum(saldo) as pemasukan FROM tbkeuangan";
		return $this->execute($query);
	}

	public function jumlahPengeluaran(){
		$query = "SELECT sum(jumlah) as pengeluaran FROM tbpengeluaran";
		return $this->execute($query);
	}

	public function jumlahPemasukanPer($tgl_start, $tgl_end){
		$query = "SELECT sum(saldo) as hitungSaldo FROM tbkeuangan WHERE tgl_masuk >= '$tgl_start' AND tgl_masuk <= '$tgl_end'";
		return $this->execute($query);
	}

	public function jumlahPengeluaranPer($tgl_start, $tgl_end){
		$query = "SELECT sum(jumlah) as hitungPengeluaran FROM tbpengeluaran WHERE tgl_keluar >= '$tgl_start' AND tgl_keluar <= '$tgl_end'";
		return $this->execute($query);
	}
	
	function __destruct(){

	}
}
?>