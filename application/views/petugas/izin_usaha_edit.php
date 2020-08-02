<h1><i class="fa fa-calendar-check-o"></i> Tambah Izin Usaha</h1>
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
					<option value="<?= $pd['id_penduduk']; ?>" <?= ($pd['id_penduduk'] == $usaha['id_penduduk']) ? 'selected' : ''; ?>><?= $pd['nik'].' '.$pd['nama_lengkap']; ?></option>
					<?php endforeach; ?>
				</select>
				<?= form_error('id_penduduk', '<small class="text-danger pl-1">','</small>'); ?>
			</div>
			<div class="form-group">
				<label>Nama Usaha</label>
				<input type="text" name="nama_usaha" placeholder="Nama Usaha" class="form-control" value="<?= $usaha['nama_usaha']; ?>">
				<?= form_error('nama_usaha', '<small class="text-danger pl-1">','</small>'); ?>
			</div>
			<div class="form-group">
				<label>Jenis Usaha</label>
				<input type="text" name="jenis_usaha" placeholder="Jenis Usaha" class="form-control" value="<?= $usaha['jenis_usaha']; ?>">
				<?= form_error('jenis_usaha', '<small class="text-danger pl-1">','</small>'); ?>
			</div>
			<div class="form-group">
				<label>Modal Usaha</label>
				<input type="number" name="modal_usaha" placeholder="Modal Usaha" class="form-control" value="<?= $usaha['modal_usaha']; ?>">
				<?= form_error('modal_usaha', '<small class="text-danger pl-1">','</small>'); ?>
			</div>
			<div class="form-group">
				<label>Tempat Usaha</label>
				<textarea name="tempat_usaha" class="form-control" placeholder="Tempat Usaha"><?= $usaha['tempat_usaha']; ?></textarea>
				<?= form_error('tempat_usaha', '<small class="text-danger pl-1">','</small>'); ?>
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
				<img src="<?= base_url('assets/img/izin_usaha/').$usaha['gambar_surat_pengantar']; ?>" class="img-fluid img-thumbnail" width="100%" alt="">
				</div>
				<small class="text-danger">*) Jenis File : jpg,png,jpeg</small>
				<small class="text-danger">*) Ukuran Maksimal : 1MB</small>
			</div>

			<div class="form-group">
				<label>Status</label>
				<select name="status" class="form-control">
					<option value=""></option>
					<?php foreach($status as $st) : ?>
					<option value="<?= $st; ?>" <?= ($st == $usaha['status']) ? 'selected' : ''; ?>><?= $st; ?></option>
					<?php endforeach; ?>
				</select>
			</div>

			<button type="submit" class="btn btn-success"><i class="fa fa-edit"></i> Edit</button>
		</div>
	</div>
</form>
