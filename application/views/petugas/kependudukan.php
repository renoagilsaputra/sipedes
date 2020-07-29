<h1><i class="fa fa-users"></i> Kependudukan</h1>
<?= $this->session->flashdata('message'); ?>

<div class="row">
	<div class="col-lg-8">

		<a href="<?= base_url('petugas/kependudukan/tambah'); ?>" class="btn btn-primary mb-2"><i class="fa fa-pencil"></i>
			Tambah</a>
	</div>
	<div class="col-lg-4">
		<form action="" method="post">
			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text" id="basic-addon1"><i class="fa fa-search"></i></span>
				</div>
				<input type="text" name="search" class="form-control" placeholder="Pencarian" aria-label="Pencarian"
					aria-describedby="basic-addon1">
			</div>
		</form>
	</div>
</div>

<div class="table-responsive">
	<table class="table table-hover">
		<tr>
			<th>#</th>
			<th>NIK</th>
			<th>Nama Lengkap</th>
			<th>Jenis Pelayanan</th>
			<th>Keperluan</th>
			<th>Kode</th>
			<th>Status</th>
			<th><i class="fa fa-cogs"></i></th>
		</tr>
		<?php if(empty($kependudukan)) : ?>
		<tr>
			<td colspan="8" class="text-center">Data tidak ada!</td>
		</tr>
		<?php endif; ?>
		<?php 
			$no = 1;
			foreach($kependudukan as $kp) :
		?>
		<tr>
			<td><?= $no++; ?></td>
			<td><?= $kp['nik']; ?></td>
			<td><?= $kp['nama_lengkap']; ?></td>
			<td><?= $kp['jenis_pelayanan']; ?></td>
			<td><?= $kp['keperluan']; ?></td>
			<td><?= $kp['kode']; ?></td>
			<td><?= $kp['status']; ?></td>
			<td>
				<div class="btn-group">
					<a href="" data-toggle="modal" data-target="#kependudukan<?= $kp['id_kependudukan']; ?>"
						class="btn btn-info"><i class="fa fa-search"></i></a>
					<a href="<?= base_url('petugas/kependudukan/edit/').$kp['id_kependudukan']; ?>" class="btn btn-success"><i
							class="fa fa-edit"></i></a>
					
					<a onclick="return confirm('Yakin?')"
						href="<?= base_url('petugas/kependudukan/hapus/').$kp['id_kependudukan']; ?>" class="btn btn-danger"><i
							class="fa fa-trash"></i></a>
				</div>
			</td>
		</tr>
		<?php endforeach; ?>
	</table>
</div>

<!-- Modal Detail -->
<?php foreach($kependudukan as $pn) : ?>
<div class="modal fade" id="kependudukan<?= $pn['id_kependudukan']; ?>" tabindex="-1" role="dialog"
	aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" id="cetak<?= $pn['id_kependudukan']; ?>">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Detail Kependudukan</h5>
				<button type="button" class="close no-print" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="text-right">
				<p class="print">Dicetak pada : <?= date('d-m-Y'); ?></p>
					<a href="" onclick="javascript:printlayer('cetak<?= $pn['id_kependudukan']; ?>')" class="btn btn-secondary mb-2 no-print"><i
							class="fa fa-print"></i> Cetak</a>
				</div>
				<div class="table-responsive">
					<table class="table table-hover">
						<tr>
							<th>NIK</th>
							<td>:</td>
							<td><?= $pn['nik']; ?></td>
						</tr>
						<tr>
							<th>Nama Lengkap</th>
							<td>:</td>
							<td><?= $pn['nama_lengkap']; ?></td>
						</tr>
						<tr>
							<th>Kelurahan / Desa</th>
							<td>:</td>
							<td><?= $pn['kelurahan_desa']; ?></td>
						</tr>
						<tr>
							<th>Kecamatan</th>
							<td>:</td>
							<td><?= $pn['kecamatan']; ?></td>
						</tr>
						<tr>
							<th>Kabupaten / Kota</th>
							<td>:</td>
							<td><?= $pn['kabupaten_kota']; ?></td>
						</tr>
						<tr>
							<th>Kode Pos</th>
							<td>:</td>
							<td><?= $pn['kode_pos']; ?></td>
						</tr>

						<tr>
							<th>Jenis Pelayanan</th>
							<td>:</td>
							<td><?= $pn['jenis_pelayanan']; ?></td>
						</tr>
						<tr>
							<th>Keperluan</th>
							<td>:</td>
							<td><?= $pn['keperluan']; ?></td>
						</tr>
						<tr>
							<th>Surat Pengantar</th>
							<td>:</td>
							<td><img src="<?= base_url('assets/img/kependudukan/').$pn['gambar_surat_pengantar']; ?>" width="100%" class="img-thumbnail" alt=""></td>
						</tr>
						<tr>
							<th>Akta Kelahiran</th>
							<td>:</td>
							<td><img src="<?= base_url('assets/img/kependudukan/').$pn['gambar_akta_kelahiran']; ?>" width="100%" class="img-thumbnail" alt=""></td>
						</tr>
						<tr>
							<th>Waktu Pengajuan</th>
							<td>:</td>
							<td><?= $pn['waktu']; ?></td>
						</tr>

					</table>
				</div>
			</div>
			<div class="modal-footer no-print">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>

			</div>
		</div>
	</div>
</div>
<?php endforeach; ?>
