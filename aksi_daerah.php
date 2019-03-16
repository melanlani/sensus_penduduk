<?php
include 'koneksi.php';

if($_GET['proses']=='entri'){
	if (isset($_POST['submit'])) {
	$name = $_POST['name'];
	$simpan= mysql_query("INSERT INTO regions(name) VALUES ('$name')");
	if($simpan){
			header("location:index.php?p=daerah");
		}else{
			echo "Gagal disimpan";
		}
		
	}
}

if($_GET['proses']=='hapus'){
	$hapus= mysql_query("DELETE FROM regions WHERE id='$_GET[id_hapus]'");
	if($hapus){
		header('location:index.php?p=daerah');
	}
}

if($_GET['proses']=='ubah'){
	if (isset($_POST['ubah'])) {
	$name = $_POST['name'];
	$save= mysql_query("UPDATE regions SET 
						name='$name'
						WHERE id='$_GET[id_ubah]'");
	if($save){			
			header("location:index.php?p=daerah");
		}else{
			echo "Gagal disimpan";
		}
		
	}
}
?>