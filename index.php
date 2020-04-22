<?php 
/**
 * https://www.xml-sitemaps.com/ sitesinden php sitenin site haritasını çıkart.
 * XML sitemap ı sitemap.xml olarak bu index.php ile aynı dizine koy
 * Ayarlarını yap
 * index.php yi çalıştır, linkleri al, keyfine bak.
 */

 /* Ayarlar */
	$yeniSite = "https://website.com";
	$xmlDosya = file_get_contents('sitemap.xml');
	$bastanSil = 23 ;
	$arrayAnahtari = 'loc';
	$linkAnahtari = 'url';
	$sondanSil = '.php';
	$redirectKomutu = 'redirect 301';
 /* Ayarlar */

 /* Veriyi Formatlayalım */
	$obje= simplexml_load_string($xmlDosya);
	$json  = json_encode($obje);
	$data = json_decode($json, true);
	$veri = $data[$linkAnahtari];
/* Veriyi Formatlayalım */

/* Döngü, Çeviri işi yapılsın */
	foreach($veri as $anahtar => $deger) {
		$url = $deger[$arrayAnahtari];
		$url1 = substr($url, $bastanSil);
		$url2 = str_replace($sondanSil,'',$url1);
		echo $redirectKomutu . " " . $url1 . " ". $yeniSite . $url2 . '/ <br>';
	  } 
/* Döngü, Çeviri işi yapılsın */
?>
