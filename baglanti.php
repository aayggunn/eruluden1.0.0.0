<?php
	
	$host="localhost";
	$kullanici="root";
	$parola="root";
	$vt="eruluden";
	
	$baglanti = @mysqli_connect($host, $kullanici, $parola, $vt);
	mysqli_set_charset($baglanti, "UTF8");
	
	if(mysqli_connect_errno()>0){
		die("Hata: ". mysqli_connect_errno());
	}
	
?>
