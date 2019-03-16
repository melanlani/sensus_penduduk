<?php
include 'koneksi.php';
$aksi=isset($_GET['aksi']) ? $_GET['aksi'] : 'list';
switch ($aksi) {
	case 'list':
	?>
	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
		<h2>Daftar Daerah</h2>
	</div>
	<button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#tambahdata">
	  <i data-feather="plus" style="width: 20px;"></i>Tambah Data
	</button>
	<table class="table table-striped">
		<thead class="thead-dark">
		<tr>
			<th>No</th>
			<th>Tanggal</th>
			<th>Nama Daerah</th>
			<th>Aksi</th>
		</tr>
		</thead>
		<?php
		$ambil=mysql_query("SELECT * FROM regions");
		$no = 1;
		while ($data=mysql_fetch_array($ambil)) {
		?>
		<tr>
			<td><?php echo $no; ?></td>
			<td><?php echo $data['created_at']?></td>
			<td><?php echo $data['name']?></td>
			<td>
			<a class="btn btn-info" href="?p=daerah&aksi=edit&id_ubah=<?php echo $data['id']?>">
			<i data-feather="edit" style="width: 20px;"></i>Edit</a>
			<a class="btn btn-danger" href="aksi_daerah.php?proses=hapus&id_hapus=<?php echo $data['id']?>"
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
	        <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Daerah</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <form action="aksi_daerah.php?proses=entri" method="post">
			<div class="form-group row">
			<label for="exampleInputEmail1" class="col-sm-2 col-form-label">Nama Daerah</label>
			<div class="col-sm-10">
				<input type="text" class="form-control-sm" name="name">
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

	<!-- Modal -->
	<div class="modal fade" id="editdata<?php echo $data['id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalCenterTitle">Update Daerah</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body"> 
	    <?php
	      $ambil=mysql_query("SELECT * FROM regions WHERE id='$_GET[id_ubah]'");
		$data=mysql_fetch_array($ambil);
		?>
			<form action="aksi_daerah.php?proses=ubah&id_ubah=<?php echo $data['id'];?>" method="post">
				<div class="form-group row">
				<label for="exampleInputEmail1" class="col-sm-2 col-form-label">Nama Daerah</label>
				<div class="col-sm-10">
					<input type="text" class="form-control-sm" name="name" value="<?php echo $data['name']?>">
				</div>
				</div>
				
				<button type="submit" name="ubah" class="btn btn-primary">Simpan</button>
			</form>
	      </div>
	    </div>
	  </div>
	</div>		
	
	<?php
		break;
	case 'edit':
	include 'koneksi.php';
	$ambil=mysql_query("SELECT * FROM regions WHERE id='$_GET[id_ubah]'");
		$data=mysql_fetch_array($ambil);
	?>
	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
	<h3>Form Update Daerah</h3>
	<div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <button type="button" class="btn btn-sm btn-outline-secondary"><a href="index.php?p=daerah">Back</a></button>
          </div>
        </div>
	</div>
	<div class="col-10">
		<form action="aksi_daerah.php?proses=ubah&id_ubah=<?php echo $data['id'];?>" method="post">
			<div class="form-group row">
			<label for="exampleInputEmail1" class="col-sm-2 col-form-label">Nama Daerah</label>
			<div class="col-sm-10">
				<input type="text" class="form-control-sm" name="name" value="<?php echo $data['name']?>">
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

