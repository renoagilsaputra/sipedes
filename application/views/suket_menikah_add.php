<div class="container">
	<div class="row">
		<div class="col-lg-8 mx-auto">
		<?php $ci =& get_instance();?>
		<h1><i class="fa fa-envelope-square"></i> Tambah Surat Keterangan Menikah</h1>
<?= $this->session->flashdata('message'); ?>


<form action="" method="post" enctype="multipart/form-data">
	<input type="hidden" name="id_penduduk" value="<?= $ci->session->userdata('id_penduduk'); ?>">
	<div class="row">
		<div class="col-lg-6">
			<?= $this->session->flashdata('error'); ?>
			
			<div class="form-group">
				<label>NIK Pasangan</label>
				<input type="text" name="nik" placeholder="NIK" class="form-control">
				<?= form_error('nik', '<small class="text-danger pl-1">','</small>'); ?>
			</div> 
			
			<div class="form-group">
				<label>Nama Lengkap</label>
				<input type="text" name="nama_lengkap" placeholder="Nama Lengkap" class="form-control">
				<?= form_error('nama_lengkap', '<small class="text-danger pl-1">','</small>'); ?>
			</div>
			<div class="form-group">
				<label>Tempat Lahir</label>
				<input type="text" name="tmp_lahir" placeholder="Tempat Lahir" class="form-control">
				<?= form_error('tmp_lahir', '<small class="text-danger pl-1">','</small>'); ?>
			</div>
			<div class="form-group">
				<label>Tanggal Lahir</label>
				<input type="date" name="tgl_lahir" placeholder="Tanggal Lahir" class="form-control">
				<?= form_error('tgl_lahir', '<small class="text-danger pl-1">','</small>'); ?>
			</div>
			<div class="form-group">
				<label>Jenis Kelamin</label>
				<select name="jk" class="form-control">
					<option value=""></option>
					<?php foreach($jenis_kelamin as $jk) : ?>
					<option value="<?= $jk; ?>"><?= ($jk == 'l') ? 'Laki - laki' : 'Perempuan'; ?></option>
					<?php endforeach; ?>
				</select>
				<?= form_error('jk', '<small class="text-danger pl-1">','</small>'); ?>
			</div>
			<div class="form-group">
				<label>Kewarganegaraan</label>
				<input type="text" name="kewarganegaraan" placeholder="Kewarganegaraan" class="form-control">
				<?= form_error('kewarganegaraan', '<small class="text-danger pl-1">','</small>'); ?>
			</div>
			<div class="form-group">
				<label>Status Perkawinan</label>
				<select name="status_perkawinan" class="form-control">
					<option value=""></option>
					<?php foreach($status_perkawinan as $sp) : ?>
					<option value="<?= $sp; ?>"><?= $sp; ?></option>
					<?php endforeach; ?>
				</select>
				<?= form_error('status_perkawinan', '<small class="text-danger pl-1">','</small>'); ?>
			</div>
			<div class="form-group">
				<label>Agama</label>
				<input type="text" name="agama" placeholder="Agama" class="form-control">
				<?= form_error('agama', '<small class="text-danger pl-1">','</small>'); ?>
			</div>
			<div class="form-group">
				<label>Nama Ayah</label>
				<input type="text" name="nama_ayah" placeholder="Nama Ayah" class="form-control">
				<?= form_error('nama_ayah', '<small class="text-danger pl-1">','</small>'); ?>
			</div>
			<div class="form-group">
				<label>Nama Ibu</label>
				<input type="text" name="nama_ibu" placeholder="Nama Ibu" class="form-control">
				<?= form_error('nama_ibu', '<small class="text-danger pl-1">','</small>'); ?>
			</div>
			<div class="form-group">
				<label>Pekerjaan</label>
				<input type="text" name="pekerjaan" placeholder="Pekerjaan" class="form-control">
				<?= form_error('pekerjaan', '<small class="text-danger pl-1">','</small>'); ?>
			</div>
			<div class="form-group">
				<label>Telp</label>
				<input type="tel" name="telp" placeholder="Telp" class="form-control">
				<?= form_error('telp', '<small class="text-danger pl-1">','</small>'); ?>
			</div>
			<div class="form-group">
				<label>Alamat</label>
				<textarea name="alamat" class="form-control" placeholder="Alamat"></textarea>
				<?= form_error('alamat', '<small class="text-danger pl-1">','</small>'); ?>
			</div>

			<div class="row">
				<div class="col-lg-6">
					<div class="form-group">
						<label>RT</label>
						<input type="number" name="rt" placeholder="RT" class="form-control">
						<?= form_error('rt', '<small class="text-danger pl-1">','</small>'); ?>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="form-group">
						<label>RW</label>
						<input type="number" name="rw" placeholder="RW" class="form-control">
						<?= form_error('rw', '<small class="text-danger pl-1">','</small>'); ?>
					</div>
				</div>
			</div>

			<div class="form-group">
				<label>No Rumah</label>
				<input type="text" name="no_rumah" placeholder="No Rumah" class="form-control">
				<?= form_error('no_rumah', '<small class="text-danger pl-1">','</small>'); ?>

			</div>
			<div class="form-group">
				<label>Kelurahan / Desa</label>
				<input type="text" name="kelurahan_desa" placeholder="Kelurahan / Desa" class="form-control">
				<?= form_error('kelurahan_desa', '<small class="text-danger pl-1">','</small>'); ?>
			</div>
			<div class="form-group">
				<label>Kecamatan</label>
				<input type="text" name="kecamatan" placeholder="Kecamatan" class="form-control">
				<?= form_error('kecamatan', '<small class="text-danger pl-1">','</small>'); ?>
			</div>
			<div class="form-group">
				<label>Kabupaten / Kota</label>
				<input type="text" name="kabupaten_kota" placeholder="Kabupaten / Kota" class="form-control">
				<?= form_error('kabupaten_kota', '<small class="text-danger pl-1">','</small>'); ?>
			</div>
			<div class="form-group">
				<label>Provinsi</label>
				<input type="text" name="provinsi" placeholder="Provinsi" class="form-control">
				<?= form_error('provinsi', '<small class="text-danger pl-1">','</small>'); ?>
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

			<div class="form-group">
				<label>Akta Kelahiran</label>
				<div class="input-group mb-2">
					<div class="input-group-prepend">
						<span class="input-group-text" id="inputGroupFileAddon02"><i class="fa fa-image"></i></span>
					</div>
					<div class="custom-file">
						<input type="file" name="gambar_akta_kelahiran" class="custom-file-input2" id="inputGroupFile02"
							aria-describedby="inputGroupFileAddon02">
						<label class="custom-file-label" for="inputGroupFile02">Pilih Akta Kelahiran</label>
					</div>
				</div>
				<div id="image-holder2"> </div>
				<small class="text-danger">*) Jenis File : jpg,png,jpeg</small>
				<small class="text-danger">*) Ukuran Maksimal : 1MB</small>
			</div>



			<button type="submit" class="btn btn-primary"><i class="fa fa-pencil"></i> Tambah</button>
		</div>
	</div>
</form>

		</div>
	</div>
</div>
