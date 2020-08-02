<h1><i class="fa fa-envelope"></i> Edit Surat Keterangan Pindah</h1>
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
					<option value="<?= $pd['id_penduduk']; ?>" <?= ($pd['id_penduduk'] == $pindah['id_penduduk']) ? 'selected' : ''; ?>><?= $pd['nik'].' '.$pd['nama_lengkap']; ?></option>
					<?php endforeach; ?>
				</select>
				<?= form_error('id_penduduk', '<small class="text-danger pl-1">','</small>'); ?>
			</div>
			<div class="form-group">
				<label>Status Kependudukan</label>
				<select name="status_kependudukan" class="js-example-basic-single form-control">
					<option value=""></option>
					<?php foreach($status_kependudukan as $sk) : ?>
					<option value="<?= $sk; ?>" <?= ($sk == $pindah['status_kependudukan']) ? 'selected' : ''; ?>><?= $sk; ?></option>
					<?php endforeach; ?>
				</select>
				<?= form_error('status_kependudukan', '<small class="text-danger pl-1">','</small>'); ?>
			</div>
			
			<div class="form-group">
				<label>Jumlah Keluarga Pindah</label>
				<input type="number" name="jml_keluarga_pindah" placeholder="Jumlah Keluarga Pindah" class="form-control" value="<?= $pindah['jml_keluarga_pindah']; ?>">
				<?= form_error('jml_keluarga_pindah', '<small class="text-danger pl-1">','</small>'); ?>
			</div>
			<div class="form-group">
				<label>Tanggal Pindah</label>
				<input type="datetime-local" name="tgl_pindah" placeholder="Tanggal Pindah" class="form-control" value="<?= strftime('%Y-%m-%dT%H:%M:%S', strtotime($pindah['tgl_pindah'])); ?>">
				<?= form_error('tgl_pindah', '<small class="text-danger pl-1">','</small>'); ?>
			</div>
			<div class="form-group">
				<label>Pindah Ke</label>
				<textarea name="pindah_ke" class="form-control" placeholder="Pindah Ke"><?= $pindah['pindah_ke']; ?></textarea>
				<?= form_error('pindah_ke', '<small class="text-danger pl-1">','</small>'); ?>
			</div>
			<div class="form-group">
				<label>Kelurahan / Desa</label>
				<input type="text" name="kelurahan_desa" placeholder="Kelurahan / Desa" class="form-control" value="<?= $pindah['kelurahan_desa']; ?>">
				<?= form_error('kelurahan_desa', '<small class="text-danger pl-1">','</small>'); ?>
			</div>
			<div class="form-group">
				<label>Kecamatan</label>
				<input type="text" name="kecamatan" placeholder="Kecamatan" class="form-control" value="<?= $pindah['kecamatan']; ?>">
				<?= form_error('kecamatan', '<small class="text-danger pl-1">','</small>'); ?>
			</div>
			<div class="form-group">
				<label>Kabupaten / Kota</label>
				<input type="text" name="kabupaten_kota" placeholder="Kabupaten / Kota" class="form-control" value="<?= $pindah['kabupaten_kota']; ?>">
				<?= form_error('kabupaten_kota', '<small class="text-danger pl-1">','</small>'); ?>
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
				<img src="<?= base_url('assets/img/suket_pindah/').$pindah['gambar_surat_pengantar']; ?>" class="img-fluid img-thumbnail" width="100%" alt="">
				</div>
				<small class="text-danger">*) Jenis File : jpg,png,jpeg</small>
				<small class="text-danger">*) Ukuran Maksimal : 1MB</small>
			</div>

			<div class="form-group">
				<label>Status</label>
				<select name="status" class="form-control">
					<option value=""></option>
					<?php foreach($status as $st) : ?>
					<option value="<?= $st; ?>" <?= ($st == $pindah['status']) ? 'selected' : ''; ?>><?= $st; ?></option>
					<?php endforeach; ?>
				</select>
			</div>


			<button type="submit" class="btn btn-success"><i class="fa fa-edit"></i> Edit</button>
		</div>
	</div>
</form>
