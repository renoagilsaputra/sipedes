<h1><i class="fa fa-envelope"></i> Surat Keterangan Pindah</h1>
<?= $this->session->flashdata('message'); ?>
<?php $ci =& get_instance(); ?>

<div class="row">
	<div class="col-lg-8">

		<a href="<?= base_url('petugas/suket_pindah/tambah'); ?>" class="btn btn-primary mb-2"><i
				class="fa fa-pencil"></i>
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
			<th>NIK Pengaju</th>
			<th>Nama Pengaju</th>
			<th>NIK Pasangan</th>
			<th>Nama Pasangan</th>
			<th>Kode</th>
			<th>Status</th>
			<th><i class="fa fa-cogs"></i></th>
		</tr>
		<?php if(empty($nikah)) : ?>
		<tr>
			<td colspan="8" class="text-center">Data tidak ada!</td>
		</tr>
		<?php endif; ?>
		<?php 
			$no = 1;
			foreach($nikah as $ac) :
			$ps = $this->MyModel->getPasanganByID($ac['id_pasangan']);
		?>
		<tr>
			<td><?= $no++; ?></td>
			<td><?= $ac['nik']; ?></td>
			<td><?= $ac['nama_lengkap']; ?></td>
			<td><?= $ps['nik']; ?></td>
			<td><?= $ps['nama_lengkap']; ?></td>
			<td><?= $ac['kode']; ?></td>
			<td><?= $ac['status']; ?></td>
			<td>
				<div class="btn-group">

					<a href="" data-toggle="modal" data-target="#nikah<?= $ac['id_suket_menikah']; ?>"
						class="btn btn-info"><i class="fa fa-search"></i></a>
					<a href="<?= base_url('petugas/suket_menikah/edit/').$ac['id_suket_menikah']; ?>"
						class="btn btn-success"><i class="fa fa-edit"></i></a>

					<a onclick="return confirm('Yakin?')"
						href="<?= base_url('petugas/suket_menikah/hapus/').$ac['id_suket_menikah']; ?>"
						class="btn btn-danger"><i class="fa fa-trash"></i></a>

				</div>
			</td>
		</tr>
		<?php endforeach; ?>
	</table>
</div>

<!-- Modal Detail -->
<?php 
	foreach($nikah as $pn) :
	$pg = $this->MyModel->getPasanganByID($ac['id_pasangan']);
?>
<div class="modal fade" id="nikah<?= $pn['id_suket_menikah']; ?>" tabindex="-1" role="dialog"
	aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" id="cetak<?= $pn['id_suket_menikah']; ?>">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Detail Surat Keterangan Menikah</h5>
				<button type="button" class="close no-print" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="text-right">
					<p class="print">Dicetak pada : <?= date('d-m-Y'); ?></p>
					<a href="" onclick="javascript:printlayer('cetak<?= $pn['id_suket_menikah']; ?>')"
						class="btn btn-secondary mb-2 no-print"><i class="fa fa-print"></i> Cetak</a>
				</div>
				<div class="table-responsive">
					<table class="table table-hover">
						<tr>
							<th>Kode</th>
							<td>:</td>
							<td><?= $pn['kode']; ?></td>
						</tr>
						<tr>
							<th>NIK Pengaju</th>
							<td>:</td>
							<td><?= $pn['nik']; ?></td>
						</tr>
						<tr>
							<th>Nama Pengaju</th>
							<td>:</td>
							<td><?= $pn['nama_lengkap']; ?></td>
						</tr>
						<tr>
							<th>Tanggal Lahir Pengaju</th>
							<td>:</td>
							<td><?= $pn['tgl_lahir']; ?></td>
						</tr>
						<tr>
							<th>Tempat Lahir Lahir Pengaju</th>
							<td>:</td>
							<td><?= $pn['tmp_lahir']; ?></td>
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
							<th>Surat Pengantar</th>
							<td>:</td>
							<td><img src="<?= base_url('assets/img/suket_nikah/').$pn['gambar_surat_pengantar']; ?>"
									width="100%" class="img-thumbnail" alt=""></td>
						</tr>
						<tr>
							<th>Akta Kelahiran</th>
							<td>:</td>
							<td><img src="<?= base_url('assets/img/suket_nikah/').$pn['akta_kelahiran']; ?>"
									width="100%" class="img-thumbnail" alt=""></td>
						</tr>
						<tr>
							<th>Status</th>
							<td>:</td>
							<td><?= $pn['status']; ?></td>
						</tr>
						<tr>
							<th>Waktu Pengajuan</th>
							<td>:</td>
							<td><?= $pn['waktu']; ?></td>
						</tr>



					</table>
					<table class="table table-hover">
						<tr>
							<th>NIK Pasangan</th>
							<td>:</td>
							<td><?= $pg['nik']; ?></td>
						</tr>
						<tr>
							<th>Nama Pasangan</th>
							<td>:</td>
							<td><?= $pg['nama_lengkap']; ?></td>
						</tr>
						<tr>
							<th>Tanggal Lahir Pasangan</th>
							<td>:</td>
							<td><?= $pg['tgl_lahir']; ?></td>
						</tr>
						<tr>
							<th>Tempat Lahir Lahir Pasangan</th>
							<td>:</td>
							<td><?= $pg['tmp_lahir']; ?></td>
						</tr>

						<tr>
							<th>Jenis Kelamin</th>
							<td>:</td>
							<td><?= $pg['jenis_kelamin']; ?></td>
						</tr>
						<tr>
							<th>Kelurahan / Desa</th>
							<td>:</td>
							<td><?= $pg['kelurahan_desa']; ?></td>
						</tr>
						<tr>
							<th>Kecamatan</th>
							<td>:</td>
							<td><?= $pg['kecamatan']; ?></td>
						</tr>
						<tr>
							<th>Kabupaten / Kota</th>
							<td>:</td>
							<td><?= $pg['kabupaten_kota']; ?></td>
						</tr>
						<tr>
							<th>Provinsi</th>
							<td>:</td>
							<td><?= $pg['provinsi']; ?></td>
						</tr>
						<tr>
							<th>No Telp</th>
							<td>:</td>
							<td><?= $pg['no_telp']; ?></td>
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
