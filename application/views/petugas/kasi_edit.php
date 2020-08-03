<h1><i class="fa fa-users"></i> Tambah Penduduk</h1>
<?= $this->session->flashdata('message'); ?>


<form action="" method="post" enctype="multipart/form-data">
	<div class="row">
		<div class="col-lg-6">
			<?= $this->session->flashdata('error'); ?>

			<div class="form-group">
				<label>Nama Pengguna</label>
				<input type="text" name="nama_pengguna" placeholder="Nama Pengguna" class="form-control" value="<?= $kasi['nama_pengguna']; ?>">
				<?= form_error('nama_pengguna', '<small class="text-danger pl-1">','</small>'); ?>
			</div>

		
	

			<button type="submit" class="btn btn-success"><i class="fa fa-edit"></i> Edit</button>
		</div>
	</div>
</form>
