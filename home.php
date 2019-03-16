<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
	<h1 class="h2">Data Daerah</h1>
</div>

<?php
include 'koneksi.php';
?>
	<table class="table table-striped">
		<thead class="thead-dark">
		<tr>
			<th>ID</th>
			<th>Nama Daerah</th>
			<th>Jumlah Penduduk</th>
			<th>Total Pendapatan</th>
			<th>Rata-rata Pendapatan</th>
			<th>Status</th>
		</tr>
		</thead>
		<?php
		$ambil=mysql_query("SELECT person.person_id, person.region_id, regions.id,regions.name, COUNT(person_id) as jumlah ,SUM(income) as total, AVG(income) as rata 
			FROM person INNER JOIN regions ON person.region_id=regions.id GROUP BY region_id");
		while ($data=mysql_fetch_array($ambil)) {
		?>
		<tr>
			<td><?php echo $data['region_id']?></td>
			<td><?php echo $data['name']?></td>
			<td><?php echo $data['jumlah']?> Orang</td>
			<td>Rp <?php echo number_format($data['total'], 0, ',', '.')?></td>
			<td>Rp <?php echo number_format($data['rata'], 0, ',', '.')?></td>
			<td>
			<?php 
			if($data['rata']<=1700000){
				echo '<h5 style="background-color:red;">merah</h5>';
			}elseif($data['rata']>=1700000 && $data['rata']<=2200000){
				echo '<h5 style="background-color:yellow;">kuning</h5>';
			}elseif($data['rata']>=2200000){
				echo '<h5 style="background-color:green;">hijau</h5>';
			}
			?>
			</td>
		</tr>
		<?php
		}
		?>
	</table>		


