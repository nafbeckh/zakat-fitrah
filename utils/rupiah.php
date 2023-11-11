<?php

function rupiah ($number) {
  $rupiah = number_format($number, 0, ',', '.');

  return $rupiah;
}

function rupiahSingkat($number, $presisi=1) {
	if ($number < 900) {
		$format_angka = number_format($number, $presisi);
		$simbol = '';
	} else if ($number < 900000) {
		$format_angka = number_format($number / 1000, $presisi);
		$simbol = 'RB';
	} else if ($number < 900000000) {
		$format_angka = number_format($number / 1000000, $presisi);
		$simbol = 'JT';
	} else if ($number < 900000000000) {
		$format_angka = number_format($number / 1000000000, $presisi);
		$simbol = 'M';
	} else {
		$format_angka = number_format($number / 1000000000000, $presisi);
		$simbol = 'T';
	}
 
	if ( $presisi > 0 ) {
		$pisah = '.' . str_repeat( '0', $presisi );
		$format_angka = str_replace( $pisah, '', $format_angka );
	}
	
	return $format_angka . $simbol;
}

?>
