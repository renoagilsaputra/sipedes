<h1><i class="fa fa-users"></i> Penduduk</h1>
<?= $this->session->flashdata('message'); ?>

<div class="row">
	<div class="col-lg-8">

		<a href="<?= base_url('petugas/kasi/tambah'); ?>" class="btn btn-primary mb-2"><i class="fa fa-pencil"></i>
			Tambah</a>
	</div>
	
</div>

<div class="table-responsive">
	<table class="table table-hover">
		<tr>
			<th>#</th>
			<th>Nama Pengguna</th>
			<th><i class="fa fa-cogs"></i></th>
		</tr>
		<?php if(empty($kasi)) : ?>
		<tr>
			<td colspan="3" class="text-center">Data tidak ada!</td>
		</tr>
		<?php endif; ?>
		<?php 
			$no = 1;
			foreach($kasi as $pd) :
		?>
		<tr>
			<td><?= $no++; ?></td>
			
			<td><?= $pd['nama_pengguna']; ?></td>
			<td>
				<div class="btn-group">

					<a href="<?= base_url('petugas/kasi/edit/').$pd['id_kasi']; ?>" class="btn btn-success"><i
							class="fa fa-edit"></i></a>
					<a href="<?= base_url('petugas/kasi/gantisandi/').$pd['id_kasi']; ?>"
						class="btn btn-warning"><i class="fa fa-lock"></i></a>
					<a onclick="return confirm('Yakin?')"
						href="<?= base_url('petugas/kasi/hapus/').$pd['id_kasi']; ?>" class="btn btn-danger"><i
							class="fa fa-trash"></i></a>
				</div>
			</td>
		</tr>
		<?php endforeach; ?>
	</table>
</div>

