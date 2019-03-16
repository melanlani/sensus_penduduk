<?php
include 'koneksi.php';
?>
	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
		<h2>Data Penduduk</h2>
	</div>
	<form action="" method="post">
	  	<div class="form-group mb-2">
			<div class="form-group row">
			<label for="exampleInputEmail1" class="col-sm-2 col-form-label">Cari Berdasarkan</label>
			<div class="col-sm-10">
			<select name="name" class="form-control-sm">
				<?php
				$ambil=mysql_query("SELECT * FROM regions");
				?>
			    <option value="">Pilih Daerah</option>
			    <?php
				while ($data=mysql_fetch_array($ambil)){
				echo "<option value='$data[id]'>$data[name]</option>";
				}?>
			</select>

	  		<button type="submit" name="cari" class="btn btn-primary mb-2">Cari</button>
			</div>
			</div>
	  	</div>
	</form>

    	
	<?php
	if(isset($_POST['cari'])){
		$kategori= $_POST['name'];
		$ambil=mysql_query("SELECT person.person_id, person.person_name, person.region_id, person.income, regions.id, 
			regions.name FROM person INNER JOIN regions ON person.region_id=regions.id WHERE person.region_id='$kategori'");
		?>
		<table class="table table-striped">
				<thead class="thead-dark">
				<tr>
					<th>ID</th>
					<th>Nama Penduduk</th>
					<th>Gaji</th>
					<th>Daerah</th>
				</tr>
				</thead>
				<tbody>
		<?php
		if (mysql_num_rows($ambil) == 0) {
   			echo '<tr><td colspan=4>Pencarian tidak ditemukan</td></tr>';
   		} else {
		    while ($data = mysql_fetch_array($ambil)) {
    	?>
		    
				<tr>
					<td><?php echo $data['person_id']?></td>
					<td><?php echo $data['person_name']?></td>
					<td>Rp <?php echo number_format($data['income'], 0, ',', '.')?></td>
					<td><?php echo $data['name']?></td>
				</tr>
		<?php	
		    }
		   }
		?>
			</tbody>
			</table>
		<?php
		}
?>
	
		
	