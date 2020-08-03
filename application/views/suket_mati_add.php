<div class="container">
	<div class="row">
		<?php $ci =& get_instance();?>
		<div class="col-lg-8 mx-auto">
		<h1><i class="fa fa-envelope"></i> Tambah Surat Keterangan Kematian</h1>
<?= $this->session->flashdata('message'); ?>


<form action="" method="post" enctype="multipart/form-data">
	<input type="hidden" name="id_penduduk" value="<?= $ci->session->userdata('id_penduduk'); ?>">
	<div class="row">
		<div class="col-lg-6">
			<?= $this->session->flashdata('error'); ?>
			
			<div class="form-group">
				<label>NIK Penduduk Mati</label>
				<select name="id_mati" class="form-control">
					<option value=""></option>
					<?php foreach($penduduk as $pe) : ?>
					<option value="<?= $pe['id_penduduk']; ?>"><?= $pe['nik'].' '.$pe['nama_lengkap']; ?></option>
					<?php endforeach; ?>
				</select>
				<?= form_error('id_mati', '<small class="text-danger pl-1">','</small>'); ?>
			</div>
			
			
			
			<div class="form-group">
				<label>Waktu Kematian</label>
				<input type="datetime-local" name="waktu_kematian" placeholder="Waktu Kematian" class="form-control">
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
