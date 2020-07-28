<h1><i class="fa fa-id-card"></i> Tambah Pelayanan</h1>
<?= $this->session->flashdata('message'); ?>


<form action="" method="post" enctype="multipart/form-data">
	<div class="row">
		<div class="col-lg-6">
			<?= $this->session->flashdata('error'); ?>
			<div class="form-group">
				<label>NIK</label>
				<select name="id_penduduk" class="js-example-basic-single form-control">
					<option value=""></option>
					<?php foreach($penduduk as $pd) : ?>
					<option value="<?= $pd['id_penduduk']; ?>"><?= $pd['nik'].' '.$pd['nama_lengkap']; ?></option>
					<?php endforeach; ?>
				</select>
				<?= form_error('id_penduduk', '<small class="text-danger pl-1">','</small>'); ?>
			</div>
			<div class="form-group">
				<label>Jenis Pelayanan</label>
				<select name="jenis_pelayanan" class="form-control">
					<option value=""></option>
					<?php foreach($jenis_pelayanan as $jp) : ?>
					<option value="<?= $jp; ?>"><?= $jp; ?></option>
					<?php endforeach; ?>
				</select>
				<?= form_error('jenis_pelayanan', '<small class="text-danger pl-1">','</small>'); ?>
			</div>
			<div class="form-group">
				<label>Keperluan</label>
				<select name="keperluan" class="form-control">
					<option value=""></option>
					<?php foreach($keperluan as $kp) : ?>
					<option value="<?= $kp; ?>"><?= $kp; ?></option>
					<?php endforeach; ?>
				</select>
				<?= form_error('keperluan', '<small class="text-danger pl-1">','</small>'); ?>
			</div>

			<div class="form-group">
				<label>Surat Pengantar</label>
				<div class="input-group mb-2">
					<div class="input-group-prepend">
						<span class="input-group-text" id="inputGroupFileAddon01"><i class="fa fa-image"></i></span>
					</div>
					<div class="custom-file">
						<input type="file" name="gambar_surat_pengantar" class="custom-file-input" id="inputGroupFile01"
							aria-describedby="inputGroupFileAddon01">
						<label class="custom-file-label" for="inputGroupFile01">Pilih Surat Pengantar</label>
					</div>
				</div>
				<div id="image-holder"> </div>
				<small class="text-danger">*) Jenis File : jpg,png,jpeg</small>
				<small class="text-danger">*) Ukuran Maksimal : 1MB</small>
			</div>

			<button type="submit" class="btn btn-primary"><i class="fa fa-pencil"></i> Tambah</button>
		</div>
	</div>
</form>
