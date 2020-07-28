<h1><i class="fa fa-bullhorn"></i> Laporan Pengaduan</h1>
<?= $this->session->flashdata('message'); ?>
<div class="table-responsive">
	<table class="table table-hover">
		<tr>
			<th>#</th>
			<th>NIK</th>
			<th>Nama</th>
			<th>Tempat</th>
			<th>Waktu Kejadian</th>
			<th>Status</th>
			<th>Waktu</th>
			<th><i class="fa fa-cogs"></i></th>
		</tr>
		<?php 
			if(empty($pengaduan)) :
		?>
		<tr>
			<td colspan="8" class="text-center">Data tidak ada!</td>
		</tr>
		<?php endif; ?>
		<?php 
			$no = 1;
			foreach($pengaduan as $pd) : 
		?>
		<tr>
			<td><?= $no++; ?></td>
			<td><?= $pd['nik_pengadu']; ?></td>
			<td><?= $pd['nama_pengadu']; ?></td>
			<td><?= $pd['tempat_kejadian']; ?></td>
			<td><?= $pd['waktu_kejadian']; ?></td>
			<td><?= $pd['status']; ?></td>
			<td><?= $pd['waktu']; ?></td>
			<td>
				<div class="btn-group">
					<a href="" data-toggle="modal" data-target="#pengadu<?= $pd['id_pengaduan']; ?>" class="btn btn-info"><i class="fa fa-search"></i></a>
					<a href="" data-toggle="modal" data-target="#status<?= $pd['id_pengaduan']; ?>" class="btn btn-success"><i class="fa fa-edit"></i></a>
					<a onclick="return confirm('Yakin?')" href="<?= base_url('petugas/pengaduan/hapus/').$pd['id_pengaduan']; ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
				</div>
			</td>
		</tr>
		<?php endforeach; ?>
	</table>
</div>

<!-- Modal Detail -->
<?php foreach($pengaduan as $pn) : ?>
<div class="modal fade" id="pengadu<?= $pn['id_pengaduan']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Pengaduan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		<div class="table-responsive">

			<table class="table table-hover">
				<tr>
					<th>NIK</th>
					<td>:</td>
					<td><?= $pn['nik_pengadu']; ?></td>
				</tr>
				<tr>
					<th>Nama</th>
					<td>:</td>
					<td><?= $pn['nama_pengadu']; ?></td>
				</tr>
				<tr>
					<th>Deskripsi</th>
					<td>:</td>
					<td><?= $pn['deskripsi']; ?></td>
				</tr>
				<tr>
					<th>Foto</th>
					<td>:</td>
					<td>
						<?php if($pn['foto'] == null) : ?>
							Tidak Ada
						<?php else : ?>

							<img src="<?= base_url('assets/img/pengaduan/').$pn['foto']; ?>" width="500px" class="img-thumbnail" alt="">
						<?php endif; ?>
					</td>
				</tr>
				<tr>
					<th>Tempat</th>
					<td>:</td>
					<td><?= $pn['tempat_kejadian']; ?></td>
				</tr>
				<tr>
					<th>Waktu Kejadian</th>
					<td>:</td>
					<td><?= $pn['waktu_kejadian']; ?></td>
				</tr>
				<tr>
					<th>Status</th>
					<td>:</td>
					<td><?= $pn['status']; ?></td>
				</tr>
				<tr>
					<th>Waktu</th>
					<td>:</td>
					<td><?= $pn['waktu']; ?></td>
				</tr>
			</table>
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        
      </div>
    </div>
  </div>
</div>
<?php endforeach; ?>
<!-- Modal Status -->
<?php foreach($pengaduan as $pg) : ?>
<div class="modal fade" id="status<?= $pg['id_pengaduan']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Status</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
	  </div>
	  <form action="<?= base_url('petugas/pengaduan/status/edit'); ?>" method="post">
      <div class="modal-body">
		
			<input type="hidden" name="id_pengaduan" value="<?= $pg['id_pengaduan']; ?>">
			<select name="status" class="form-control">
				<option value=""></option>
				<?php foreach($status as $st) : ?>
				<option value="<?= $st; ?>" <?= ($st == $pg['status']) ? "selected" : ""; ?>><?= $st; ?></option>
				<?php endforeach; ?>
			</select>
			
		
	</div>
	<div class="modal-footer">
		<button type="submit" class="btn btn-success mt-2"><i class="fa fa-edit"></i> Edit</button>
       
        
      </div>
	</div>
	</form>
  </div>
</div>
<?php endforeach; ?>
