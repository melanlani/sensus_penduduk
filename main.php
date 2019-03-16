<?php
$page=isset($_GET['p']) ? $_GET['p'] : 'home';
	if($page=='home') include ('home.php');
	if($page=='datapenduduk') include ('data_penduduk.php');
	if($page=='daerah') include ('daerah.php');
	if($page=='penduduk') include ('penduduk.php');
?>