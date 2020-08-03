<div class="container">
	<div class="row">
		<?php $ci =& get_instance();?>
		<div class="col-lg-8 mx-auto">
			<h1><i class="fa fa-envelope-square"></i> Tambah Surat Keterangan Pindah</h1>
			<?= $this->session->flashdata('message'); ?>



<form action="" method="post" enctype="multipart/form-data">
<input type="hidden" name="id_penduduk" value="<?= $ci->session->userdata('id_penduduk'); ?>">
	<div class="row">
		<div class="col-lg-6">
			<?= $this->session->flashdata('error'); ?>

			<div class="form-group">
				<label>Status Kependudukan</label>
				<select name="status_kependudukan" class="js-example-basic-single form-control">
					<option value=""></option>
					<?php foreach($status_kependudukan as $sk) : ?>
					<option value="<?= $sk; ?>"><?= $sk; ?></option>
					<?php endforeach; ?>
				</select>
				<?= form_error('status_kependudukan', '<small class="text-danger pl-1">','</small>'); ?>
			</div>
			
			<div class="form-group">
				<label>Jumlah Keluarga Pindah</label>
				<input type="number" name="jml_keluarga_pindah" placeholder="Jumlah Keluarga Pindah" class="form-control">
				<?= form_error('jml_keluarga_pindah', '<small class="text-danger pl-1">','</small>'); ?>
			</div>
			<div class="form-group">
				<label>Tanggal Pindah</label>
				<input type="datetime-local" name="tgl_pindah" placeholder="Tanggal Lahir" class="form-control">
				<?= form_error('tgl_pindah', '<small class="text-danger pl-1">','</small>'); ?>
			</div>
			<div class="form-group">
				<label>Pindah Ke</label>
				<textarea name="pindah_ke" class="form-control" placeholder="Pindah Ke"></textarea>
				<?= form_error('pindah_ke', '<small class="text-danger pl-1">','</small>'); ?>
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


		

		</div>
	
	</div>
</div>
