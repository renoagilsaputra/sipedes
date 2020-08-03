<h1><i class="fa fa-users"></i> Tambah Penduduk</h1>
<?= $this->session->flashdata('message'); ?>


<form action="" method="post" enctype="multipart/form-data">
	<div class="row">
		<div class="col-lg-6">
			<?= $this->session->flashdata('error'); ?>

			<div class="form-group">
				<label>Nama Pengguna</label>
				<input type="text" name="nama_pengguna" placeholder="Nama Pengguna" class="form-control">
				<?= form_error('nama_pengguna', '<small class="text-danger pl-1">','</small>'); ?>
			</div>

			<div class="row">
				<div class="col-lg-6">
					<div class="form-group">
						<label>Kata Sandi</label>
						<input type="password" name="kata_sandi" placeholder="Kata Sandi" class="form-control">
						<?= form_error('kata_sandi', '<small class="text-danger pl-1">','</small>'); ?>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="form-group">
						<label>Konfirmasi Kata Sandi</label>
						<input type="password" name="konfirmasi_kata_sandi" placeholder="Konfirmasi Kata Sandi"
							class="form-control">
						<?= form_error('konfirmasi_kata_sandi', '<small class="text-danger pl-1">','</small>'); ?>
					</div>
				</div>
			</div>

	

			<button type="submit" class="btn btn-primary"><i class="fa fa-pencil"></i> Tambah</button>
		</div>
	</div>
</form>
