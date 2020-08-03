<div class="container">
	<div class="row">
		<?php $ci =& get_instance();?>
		<div class="col-lg-8 mx-auto">
		<h1><i class="fa fa-calendar-check-o"></i> Tambah Izin Acara</h1>
<?= $this->session->flashdata('message'); ?>


<form action="" method="post" enctype="multipart/form-data">
	<div class="row">
		<div class="col-lg-6">
			<?= $this->session->flashdata('error'); ?>
			
			<div class="form-group">
				<label>Acara</label>
				<input type="text" name="acara" placeholder="Acara" class="form-control">
				<?= form_error('acara', '<small class="text-danger pl-1">','</small>'); ?>
			</div>
			<div class="form-group">
				<label>Tanggal Mulai</label>
				<input type="datetime-local" name="tgl_mulai" placeholder="Tanggal Mulai" class="form-control">
				<?= form_error('tgl_mulai', '<small class="text-danger pl-1">','</small>'); ?>
			</div>
			<div class="form-group">
				<label>Tanggal Selesai</label>
				<input type="datetime-local" name="tgl_selesai" placeholder="Tanggal Selesai" class="form-control">
				<?= form_error('tgl_selesai', '<small class="text-danger pl-1">','</small>'); ?>
			</div>
			<div class="form-group">
				<label>Lokasi</label>
				<textarea name="lokasi" class="form-control" placeholder="Lokasi"></textarea>
				<?= form_error('lokasi', '<small class="text-danger pl-1">','</small>'); ?>
			</div>

			<div class="form-group">
				<label>Jenis Acara</label>
				<input type="text" name="jenis_acara" placeholder="Jenis Acara" class="form-control">
				<?= form_error('jenis_acara', '<small class="text-danger pl-1">','</small>'); ?>
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
		
