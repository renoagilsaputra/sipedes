<h1><i class="fa fa-envelope"></i> Surat Keterangan Pindah</h1>
<?= $this->session->flashdata('message'); ?>
<?php $ci =& get_instance(); ?>

<div class="row">
	<div class="col-lg-8">

		<a href="" data-toggle="modal" data-target="#tambah" class="btn btn-primary mb-2"><i class="fa fa-pencil"></i>
			Tambah</a>
	</div>

</div>

<div class="table-responsive">
	<table class="table table-hover">
		<tr>
			<th>#</th>
			<th>NIK</th>
			<th>Nama</th>
			
			<th><i class="fa fa-cogs"></i></th>
		</tr>
		<?php if(empty($kel)) : ?>
		<tr>
			<td colspan="4" class="text-center">Data tidak ada!</td>
		</tr>
		<?php endif; ?>
		<?php 
			$no = 1;
			foreach($kel as $ac) :
		?>
		<tr>
			<td><?= $no++; ?></td>
			<td><?= $ac['nik']; ?></td>
			<td><?= $ac['nama']; ?></td>
			<td>
				<div class="btn-group">
					
					<a href="" data-toggle="modal" data-target="#edit<?= $ac['id_keluarga_pindah']; ?>" class="btn btn-success"><i
							class="fa fa-edit"></i></a>
					
					<a onclick="return confirm('Yakin?')"
						href="<?= base_url('petugas/keluarga_pindah/hapus/').$ac['id_keluarga_pindah']; ?>" class="btn btn-danger"><i
							class="fa fa-trash"></i></a>
					
				</div>
			</td>
		</tr>
		<?php endforeach; ?>
	</table>
</div>

<!-- Modal Tambah -->
<div class="modal fade" id="tambah" tabindex="-1" role="dialog"
	aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" >
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tambah Keluarga Pindah</h5>
				
			</div>
			<form action="<?= base_url('petugas/keluarga_pindah/tambah'); ?>" method="post">
			
			<input type="hidden" name="id_suket_pindah" value="<?= $ci->uri->segment(3); ?>">
			<div class="modal-body">
				
				<div class="table-responsive">
					<table class="table table-hover">
						<tr>
							<th>NIK</th>
							<td>:</td>
							<td>
								<input type="text" name="nik" class="form-control" placeholder="NIK">
							</td>
						</tr>
						<tr>
							<th>Nama</th>
							<td>:</td>
							<td>
								<input type="text" name="nama" class="form-control" placeholder="Nama">
							</td>
						</tr>
					</table>
				</div>
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-primary"><i class="fa fa-pencil"></i> Tambah</button>
			</div>
			</form>
		</div>
	</div>
</div>

<!-- Modal Edit -->
<?php foreach($kel as $pn) : ?>
<div class="modal fade" id="edit<?= $pn['id_keluarga_pindah']; ?>" tabindex="-1" role="dialog"
	aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" >
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Edit Keluarga Pindah</h5>
				
			</div>
			<form action="<?= base_url('petugas/keluarga_pindah/edit'); ?>" method="post">
			<input type="hidden" name="id_suket_pindah" value="<?= $ci->uri->segment(3); ?>">
			<input type="hidden" name="id_keluarga_pindah" value="<?= $pn['id_keluarga_pindah']; ?>">
			<div class="modal-body">
				
				<div class="table-responsive">
					<table class="table table-hover">
						<tr>
							<th>NIK</th>
							<td>:</td>
							<td>
								<input type="text" name="nik" class="form-control" value="<?= $pn['nik']; ?>">
							</td>
						</tr>
						<tr>
							<th>Nama</th>
							<td>:</td>
							<td>
								<input type="text" name="nama" class="form-control" value="<?= $pn['nama']; ?>">
							</td>
						</tr>
					</table>
				</div>
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-success"><i class="fa fa-edit"></i> Edit</button>

			</div>
			</form>
		</div>
	</div>
</div>
<?php endforeach; ?>
