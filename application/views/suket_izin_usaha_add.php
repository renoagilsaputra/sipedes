<div class="container">
	<div class="row">
		<div class="col-lg-8 mx-auto">

			<?php $ci =& get_instance();?>
	
			<h1><i class="fa fa-calendar-check-o"></i> Tambah Izin Usaha</h1>
			<?= $this->session->flashdata('message'); ?>
	
	
			<form action="" method="post" enctype="multipart/form-data">
				<input type="hidden" name="id_penduduk" value="<?= $ci->session->userdata('id_penduduk'); ?>">
				<div class="row">
					<div class="col-lg-6">
						<?= $this->session->flashdata('error'); ?>
						
						<div class="form-group">
							<label>Nama Usaha</label>
							<input type="text" name="nama_usaha" placeholder="Nama Usaha" class="form-control">
							<?= form_error('nama_usaha', '<small class="text-danger pl-1">','</small>'); ?>
						</div>
						<div class="form-group">
							<label>Jenis Usaha</label>
							<input type="text" name="jenis_usaha" placeholder="Jenis Usaha" class="form-control">
							<?= form_error('jenis_usaha', '<small class="text-danger pl-1">','</small>'); ?>
						</div>
						<div class="form-group">
							<label>Modal Usaha</label>
							<input type="number" name="modal_usaha" placeholder="Modal Usaha" class="form-control">
							<?= form_error('modal_usaha', '<small class="text-danger pl-1">','</small>'); ?>
						</div>
						<div class="form-group">
							<label>Tempat Usaha</label>
							<textarea name="tempat_usaha" class="form-control" placeholder="Tempat Usaha"></textarea>
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
