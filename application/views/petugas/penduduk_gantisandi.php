<h1><i class="fa fa-users"></i> Ganti Kata Sandi Penduduk</h1>
<?= $this->session->flashdata('message'); ?>
<div class="col-lg-6">
	<?= $this->session->flashdata('message'); ?>
	<form action="" method="post">
		<div class="form-group">
			<label>Kata Sandi Lama</label>
			<input class="form-control" type="password" name="password_lama" placeholder="Password Lama">
			<?= form_error('password_lama', '<small class="text-danger pl-1">', '</small>'); ?>
		</div>
		<div class="form-group">
			<label>Kata Sandi Baru</label>
			<input class="form-control" type="password" name="password1" placeholder="Password Baru">
			<?= form_error('password1', '<small class="text-danger pl-1">', '</small>'); ?>
		</div>
		<div class="form-group">
			<label>Ulangi Kata Sandi</label>
			<input class="form-control" type="password" name="password2" placeholder="Ulangi Password Baru">
			<?= form_error('password2', '<small class="text-danger pl-1">', '</small>'); ?>
		</div>


		<button type="submit" class="btn btn-warning"><i class="fa fa-lock"></i> Ganti Sandi</button>

	</form>

</div>
