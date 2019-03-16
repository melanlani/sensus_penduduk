<?php
include 'koneksi.php';

if($_GET['proses']=='entri'){
	if (isset($_POST['submit'])) {
	$person = $_POST['person_name'];
	$name = $_POST['name'];
	$address = $_POST['address'];
	$income = $_POST['income'];
	$simpan= mysql_query("INSERT INTO person(person_name, region_id, address, income) VALUES ('$person','$name','$address','$income')");
	if($simpan){
			header("location:index.php?p=penduduk");
		}else{
			echo "Gagal disimpan";
		}
		
	}
}

if($_GET['proses']=='hapus'){
	$hapus= mysql_query("DELETE FROM person WHERE id='$_GET[id_hapus]'");
	if($hapus){
		header('location:index.php?p=penduduk');
	}
}

if($_GET['proses']=='ubah'){
	if (isset($_POST['ubah'])) {
	$person = $_POST['person_name'];
	$name = $_POST['name'];
	$address = $_POST['address'];
	$income = $_POST['income'];
	$save= mysql_query("UPDATE person SET 
						person_name='$person',
						region_id='$name',
						address='$address',
						income='$income'
						WHERE person_id='$_GET[id_ubah]'");
	if($save){			
			header("location:index.php?p=penduduk");
		}else{
			echo "Gagal disimpan";
		}
		
	}
}
?>