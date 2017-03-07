<?php
include "dir/laporan/model/modelReport.php";
class reportController{
	public $model;
	public function __construct(){
		$this->model = new modelReport();
	}

	public function reportKasAll(){
		$data = $this->model->selectAllKas();
		$getPengeluaran = $this->model->selectPengeluaran();
		$pemasukan = $this->model->selectSumMasuk();
		$pengeluaran = $this->model->selectSumKeluar();
		$hitungPem = $this->model->fetch($pemasukan);
		$hitungPen = $this->model->fetch($pengeluaran);
		include "dir/laporan/view/report_kas.php";
	}

	public function reportKasPer(){
		$tgl_start	= date('Y-m-d', strtotime(@$_POST['tgl_awal']));
		$tgl_end 	= date('Y-m-d', strtotime(@$_POST['tgl_akhir']));

		$data = $this->model->selectPerKas($tgl_start, $tgl_end);
		$getPengeluaran = $this->model->selectPengeluaranPerKas($tgl_start, $tgl_end);
		$pemasukan = $this->model->jumlahPemasukanPer($tgl_start, $tgl_end);
		$pengeluaran = $this->model->jumlahPengeluaranPer($tgl_start, $tgl_end);
		$hitungPem = $this->model->fetch($pemasukan);
		$hitungPen = $this->model->fetch($pengeluaran);
		include "dir/laporan/view/report_kas_per.php";
	}

	public function __destruct(){

	}
}
?>