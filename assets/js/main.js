(function($) {
/*
ZakatCalc (c) Al Farisi & Indokreatif Teknologi
Website :
- http://indokreatif.net
- https://github.com/alfarisi/zakatcalc
- http://alfarisi.web.id
*/

validasiAngka = function (field) {
	var Char;
	var sudahkoma = false;
	var belakangkoma = 2;
	var k = 1;
	Char = "";
	for (i = 0; i < (field.value.length); i++) {
		if (isNaN(field.value.charAt(i)) && field.value.charAt(i) != '.' && field.value.charAt(i) != ',') {
			break;
		} else {
			if (sudahkoma == true) {
				if (field.value.charAt(i) == '.' || k > belakangkoma) {
					break;
				}
				k++;
			}
			if (field.value.charAt(i) == ',') {
				sudahkoma = true;
			}
			Char = Char + field.value.charAt(i);
		}
	}
	field.value = Char;
}

validasi_float = function (num) {
	numfloat = parseFloat(num);
	if (isNaN(numfloat)) {
		numfloat = 0.00;
	}
	return numfloat;
}

nisab_emas = function () {
	harga = $('#harga_emas').val();
	harga = $.elsyifaJS.indonesianNumberToFloat(harga);
	
	nisab = 85 * harga;
	$('#nisab_emas_float').val(nisab);
	
	nisab = $.elsyifaJS.toIndonesianNumber(nisab);
	$('#nisab_emas').val(nisab);
}

nisab_beras = function () {
	harga = $('#harga_beras').val();
	harga = $.elsyifaJS.indonesianNumberToFloat(harga);
	
	nisab = 750 * harga;
	$('#nisab_beras_float').val(nisab);
	
	nisab = $.elsyifaJS.toIndonesianNumber(nisab);
	$('#nisab_beras').val(nisab);
}

/* zakat mal (umum) */
zc_mal_nisab = function () {
	opsi = $('#opsi_nisab').val();
	
	if (opsi == 'emas') {
		$("#harga_emas").prop('disabled', false);
		$("#harga_perak").prop('disabled', true);
		
		harga = $('#harga_emas').val();
		harga = $.elsyifaJS.indonesianNumberToFloat(harga);
		nisab = 85 * harga;
	} else {
		$("#harga_emas").prop('disabled', true);
		$("#harga_perak").prop('disabled', false);
		
		harga = $('#harga_perak').val();
		harga = $.elsyifaJS.indonesianNumberToFloat(harga);
		nisab = 595 * harga;
	}
	
	$('#nisab_float').val(nisab);
	
	nisab = $.elsyifaJS.toIndonesianNumber(nisab);
	$('#nisab').val(nisab);
}

zc_mal_total_harta = function () {
	uang_tabungan = $('#uang_tabungan').val();
	saham = $('#saham').val();
	piutang = $('#piutang').val();
	
	uang_tabungan = $.elsyifaJS.indonesianNumberToFloat(uang_tabungan);
	saham = $.elsyifaJS.indonesianNumberToFloat(saham);
	piutang = $.elsyifaJS.indonesianNumberToFloat(piutang);
	
	total_harta = uang_tabungan + saham + piutang;
	$('#total_harta_float').val(total_harta);
	
	total_harta = $.elsyifaJS.toIndonesianNumber(total_harta);
	$('#total_harta').val(total_harta);
	
	zc_mal_hitung();
}

zc_mal_total_kewajiban = function () {
	hutang = $('#hutang').val();
	hutang = $.elsyifaJS.indonesianNumberToFloat(hutang);
	
	total_kewajiban = hutang;
	$('#total_kewajiban_float').val(total_kewajiban);
	
	total_kewajiban = $.elsyifaJS.toIndonesianNumber(total_kewajiban);
	$('#total_kewajiban').val(total_kewajiban);
	
	zc_mal_hitung();
}

zc_mal_hitung = function () {
	nisab = $('#nisab_float').val();
	harta = $('#total_harta_float').val();
	kewajiban = $('#total_kewajiban_float').val();
	
	nisab = validasi_float(nisab);
	harta = validasi_float(harta);
	kewajiban = validasi_float(kewajiban);
	
	selisih_harta = harta - kewajiban;
	$('#selisih_harta').val($.elsyifaJS.toIndonesianNumber(selisih_harta));
	
	if (selisih_harta >= nisab) {
		zakat = 0.025 * selisih_harta;
		$('#keterangan').html('Harta SUDAH mencapai nishab. Dikenakan KEWAJIBAN ZAKAT.');
	} else {
		zakat = 0.00;
		$('#keterangan').html('Harta BELUM mencapai nishab. Tidak dikenai kewajiban zakat.');
	}
	
	$('#zakat_harta').val($.elsyifaJS.toIndonesianNumber(zakat));
}

/* zakat perdagangan */
zc_dagang_total_harta = function () {
	uang = $('#uang').val();
	stok = $('#stok').val();
	piutang = $('#piutang').val();
	
	uang = $.elsyifaJS.indonesianNumberToFloat(uang);
	stok = $.elsyifaJS.indonesianNumberToFloat(stok);
	piutang = $.elsyifaJS.indonesianNumberToFloat(piutang);
	
	total_harta = uang + stok + piutang;
	$('#total_harta_float').val(total_harta);
	$('#total_harta').val($.elsyifaJS.toIndonesianNumber(total_harta));
	
	zc_mal_hitung();
}

zc_dagang_total_kewajiban = function () {
	hutang = $('#hutang').val();
	hutang = $.elsyifaJS.indonesianNumberToFloat(hutang);
	
	biaya = $('#biaya').val();
	biaya = $.elsyifaJS.indonesianNumberToFloat(biaya);
	
	kewajiban = hutang + biaya;
	
	$('#total_kewajiban_float').val(kewajiban);
	$('#total_kewajiban').val($.elsyifaJS.toIndonesianNumber(kewajiban));
	
	zc_mal_hitung();
}

/* zakat temuan */
zc_harta_temuan = function () {
	harta = $('#harta').val();
	harta = $.elsyifaJS.indonesianNumberToFloat(harta);
	
	if (harta > 0) {
		zakat = 0.2 * harta;
	} else {
		zakat = 0.00;
	}
	
	$('#zakat_temuan').val($.elsyifaJS.toIndonesianNumber(zakat));
}

/* zakat ternak */
zc_ternak_kambing = function () {
	kambing = $('#kambing').val();
	kambing = $.elsyifaJS.indonesianNumberToFloat(kambing);
	
	if (kambing < 40) {
		$('#zakat_kambing').val('0');
		$('#keterangan_kambing').html('Kambing BELUM mencapai nishab. Tidak dikenakan kewajiban zakat.');
		return 1;
	} else if (kambing <= 120) {
		$('#zakat_kambing').val('1');
	} else if (kambing <= 200) {
		$('#zakat_kambing').val('2');
	} else if (kambing > 200 && kambing < 400) {
		$('#zakat_kambing').val('3');
	} else {
		zakat = kambing / 100;
		zakat = Math.floor(zakat);
		$('#zakat_kambing').val(zakat);
	}
	
	$('#keterangan_kambing').html('Kambing SUDAH mencapai nishab. Dikenakan KEWAJIBAN ZAKAT.');
}

/* zakat emas dan perak */
zc_emas_perak = function () {
	emas = $('#emas').val();
	emas = $.elsyifaJS.indonesianNumberToFloat(emas);
	
	if (emas < 85) {
		zakat_emas = 0;
		$('#zakat_emas').val(zakat_emas);
	} else {
		zakat_emas = 0.025 * emas;
		$('#zakat_emas').val($.elsyifaJS.toIndonesianNumber(zakat_emas));
	}
	
	perak = $('#perak').val();
	perak = $.elsyifaJS.indonesianNumberToFloat(perak);
	
	if (perak < 595) {
		zakat_perak = 0;
		$('#zakat_perak').val(zakat_perak);
	} else {
		zakat_perak = 0.025 * perak;
		$('#zakat_perak').val($.elsyifaJS.toIndonesianNumber(zakat_perak));
	}
	
	harga_emas = $.elsyifaJS.indonesianNumberToFloat($('#harga_emas').val());
	harga_perak = $.elsyifaJS.indonesianNumberToFloat($('#harga_perak').val());
	
	zakat_emas_uang = zakat_emas * harga_emas;
	zakat_perak_uang = zakat_perak * harga_perak;
	zakat_total_uang = zakat_emas_uang + zakat_perak_uang;
	
	$('#zakat_emas_uang').val($.elsyifaJS.toIndonesianNumber(zakat_emas_uang));
	$('#zakat_perak_uang').val($.elsyifaJS.toIndonesianNumber(zakat_perak_uang));
	$('#zakat_total_uang').val($.elsyifaJS.toIndonesianNumber(zakat_total_uang));
}


/* zakat pertanian */
zc_pertanian = function () {
	panen = $('#panen').val();
	panen = $.elsyifaJS.indonesianNumberToFloat(panen);
	
	if (panen < 750) {
		$('#zakat').val('0');
		$('#keterangan').html('Hasil panen BELUM mencapai nishab. Tidak dikenakan kewajiban zakat.');
	} else {
		persen_zakat = $('#persen_zakat').val();
		persen_zakat = validasi_float(persen_zakat);
	
		zakat = persen_zakat * panen;
		$('#zakat').val($.elsyifaJS.toIndonesianNumber(zakat));
		$('#keterangan').html('Hasil panen SUDAH mencapai nishab. Dikenakan KEWAJIBAN ZAKAT.');
	}
}

})(jQuery);
