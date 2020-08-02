<h1><i class="fa fa-envelope"></i> Edit Surat Keterangan Kematian</h1>
<?= $this->session->flashdata('message'); ?>


<form action="" method="post" enctype="multipart/form-data">
	<input type="hidden" name="id_penduduk_mati" value="<?= $mati['id_penduduk_mati']; ?>">
	<div class="row">
		<div class="col-lg-6">
			<?= $this->session->flashdata('error'); ?>
			<div class="form-group">
				<label>NIK</label>
				<select name="id_penduduk" class="js-example-basic-single form-control">
					<option value=""></option>
					<?php foreach($penduduk as $pd) : ?>
					<option value="<?= $pd['id_penduduk']; ?>" <?= ($pd['id_penduduk'] == $mati['id_pengaju']) ? 'selected' : ''; ?>><?= $pd['nik'].' '.$pd['nama_lengkap']; ?></option>
					<?php endforeach; ?>
				</select>
				<?= form_error('id_penduduk', '<small class="text-danger pl-1">','</small>'); ?>
			</div>
			<div class="form-group">
				<label>NIK Penduduk Mati</label>
				<select name="id_mati" class="js-example-basic-single form-control">
					<option value=""></option>
					<?php foreach($penduduk as $pe) : ?>
					<option value="<?= $pe['id_penduduk']; ?>" <?= ($pe['id_penduduk'] == $mati['id_mati']) ? 'selected' : ''; ?>><?= $pe['nik'].' '.$pe['nama_lengkap']; ?></option>
					<?php endforeach; ?>
				</select>
				<?= form_error('id_mati', '<small class="text-danger pl-1">','</small>'); ?>
			</div>
			
			
			
			<div class="form-group">
				<label>Waktu Kematian</label>
				<input type="datetime-local" name="waktu_kematian" placeholder="Waktu Kematian" class="form-control" value="<?= strftime('%Y-%m-%dT%H:%M:%S', strtotime($mati['waktu_kematian'])); ?>">
				<?= form_error('waktu_kematian', '<small class="text-danger pl-1">','</small>'); ?>
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
				<div id="image-holder">
				<img src="<?= base_url('assets/img/suket_mati/').$mati['gambar_surat_pengantar']; ?>" class="img-fluid img-thumbnail" width="100%" alt="">
				</div>
				<small class="text-danger">*) Jenis File : jpg,png,jpeg</small>
				<small class="text-danger">*) Ukuran Maksimal : 1MB</small>
			</div>

			<div class="form-group">
				<label>Status</label>
				<select name="status" class="form-control">
					<option value=""></option>
					<?php foreach($status as $st) : ?>
					<option value="<?= $st; ?>" <?= ($st == $mati['status']) ? 'selected' : ''; ?>><?= $st; ?></option>
					<?php endforeach; ?>
				</select>
			</div>


			<button type="submit" class="btn btn-success"><i class="fa fa-edit"></i> Edit</button>
		</div>
	</div>
</form>
