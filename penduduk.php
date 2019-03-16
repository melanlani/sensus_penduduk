<?php
include 'koneksi.php';
$aksi=isset($_GET['aksi']) ? $_GET['aksi'] : 'list';
switch ($aksi) {
	case 'list':
	?>
	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
		<h2>Daftar Penduduk</h2>
	</div>
	<button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#tambahdata">
	  <i data-feather="plus" style="width: 20px;"></i>Tambah Data
	</button>
	<table class="table table-striped">
		<thead class="thead-dark">
		<tr>
			<th>No</th>
			<th>Tanggal</th>
			<th>Nama</th>
			<th>Daerah</th>
			<th>Alamat</th>
			<th>Gaji</th>
			<th>Aksi</th>
		</tr>
		</thead>
		<?php
		$ambil=mysql_query("SELECT person.person_id, person.person_name, person.region_id, person.address, person.income, person.created_at, 
			regions.id, regions.name FROM person INNER JOIN regions ON person.region_id=regions.id");
		$no = 1;
		while ($data=mysql_fetch_array($ambil)) {
		?>
		<tr>
			<td><?php echo $no; ?></td>
			<td><?php echo $data['created_at']?></td>
			<td><?php echo $data['person_name']?></td>
			<td><?php echo $data['name']?></td>
			<td><?php echo $data['address']?></td>
			<td>Rp <?php echo number_format($data['income'], 0, ',', '.')?></td>
			<td>
			<a class="btn btn-info" href="?p=penduduk&aksi=edit&id_ubah=<?php echo $data['person_id']?>">
			<i data-feather="edit" style="width: 20px;"></i>Edit</a>
			<a class="btn btn-danger" href="aksi_penduduk.php?proses=hapus&id_hapus=<?php echo $data['person_id']?>"
			onclick="return confirm('Yakin akan menghapus data?')" ><i data-feather="delete" style="width: 20px;"></i>Hapus</a>
			</td>
		</tr>
		<?php
		$no++;
		}
		?>
	</table>
	<!-- Modal -->
	<div class="modal fade" id="tambahdata" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Penduduk</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <form action="aksi_penduduk.php?proses=entri" method="post">
			<div class="form-group row">
			<label for="exampleInputEmail1" class="col-sm-2 col-form-label">Nama</label>
			<div class="col-sm-10">
				<input type="text" class="form-control-sm" name="person_name">
			</div>
			</div>
			<div class="form-group row">
			<label for="exampleInputEmail1" class="col-sm-2 col-form-label">Daerah</label>
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
			</div>
			</div>
			<div class="form-group row">
			<label for="exampleInputEmail1" class="col-sm-2 col-form-label">Alamat</label>
			<div class="col-sm-10">
			<textarea class="form-control" name="address" rows="5"></textarea> 
			</div>
			</div>
			<div class="form-group row">
			<label for="exampleInputEmail1" class="col-sm-2 col-form-label">Gaji</label>
			<div class="col-sm-10">
			<input type="text" class="form-control-sm" name="income">
			</div>
			</div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			<button type="submit" name="submit" class="btn btn-primary">Tambah</button>
		  </div>
		</form>
	      </div>
	    </div>
	  </div>
	</div>	

	<?php
		break;
	case 'edit':
	include 'koneksi.php';
	$ambil=mysql_query("SELECT person.person_id, person.person_name, person.region_id, person.address, person.income, person.created_at, 
			regions.id, regions.name FROM person INNER JOIN regions ON person.region_id=regions.id WHERE person_id='$_GET[id_ubah]'");
	$data=mysql_fetch_array($ambil);
	?>
	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
	<h3>Form Update Penduduk</h3>
	<div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <a href="javascript:history.go(-1)" class="btn btn-sm btn-outline-secondary">Back</a>
          </div>
        </div>
	</div>
	<div class="col-10">
		<form action="aksi_penduduk.php?proses=ubah&id_ubah=<?php echo $data['person_id'];?>" method="post">
			<div class="form-group row">
			<label for="exampleInputEmail1" class="col-sm-2 col-form-label">Nama</label>
			<div class="col-sm-10">
				<input type="text" class="form-control-sm" name="person_name" value="<?php echo $data['person_name']?>">
			</div>
			</div>
			<div class="form-group row">
			<label for="exampleInputEmail1" class="col-sm-2 col-form-label">Daerah</label>
			<div class="col-sm-10">
			<select name="name" class="form-control-sm">
				<?php
				echo "<option value='$data[region_id]'>$data[name]</option>";
				$no=1;
				$panggil=mysql_query("SELECT * FROM regions");
				while ($baru=mysql_fetch_array($panggil)){
				if($data['region_id']==$baru['id']){
					continue;
				}else{
					echo "<option value='$baru[id]'>$baru[name]</option>";
				}
				$no++;
				}
				?>
			</select>
			</div>
			</div>
			<div class="form-group row">
			<label for="exampleInputEmail1" class="col-sm-2 col-form-label">Alamat</label>
			<div class="col-sm-10">
			<textarea class="form-control" name="address" rows="5"><?php echo $data['address']?></textarea>
			</div>
			</div>
			<div class="form-group row">
			<label for="exampleInputEmail1" class="col-sm-2 col-form-label">Gaji</label>
			<div class="col-sm-10">
			<input type="text" class="form-control-sm" name="income" value="<?php echo $data['income']?>">
			</div>
			</div>
			<button type="submit" name="ubah" class="btn btn-primary">Simpan</button>
		</form>
		
		</div>
		</div>
<?php
	break;
}
?>
