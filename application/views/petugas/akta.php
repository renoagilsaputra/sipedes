<h1><i class="fa fa-child"></i> Akta Kelahiran</h1>
<?= $this->session->flashdata('message'); ?>

<div class="row">
	<div class="col-lg-8">

		<a href="<?= base_url('petugas/akta/tambah'); ?>" class="btn btn-primary mb-2"><i class="fa fa-pencil"></i>
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
			<th>Nama Ayah</th>
			<th>Nama Ibu</th>
			<th>Tanggal Lahir</th>
			<th>Kode</th>
			<th>Status</th>
			<th><i class="fa fa-cogs"></i></th>
		</tr>
		<?php if(empty($akta)) : ?>
		<tr>
			<td colspan="8" class="text-center">Data tidak ada!</td>
		</tr>
		<?php endif; ?>
		<?php 
			$no = 1;
			foreach($akta as $ac) :
		?>
		<tr>
			<td><?= $no++; ?></td>
			<td><?= $ac['nik']; ?></td>
			<td><?= $ac['nama_akta']; ?></td>
			<td><?= $ac['nama_ayah']; ?></td>
			<td><?= $ac['nama_ibu']; ?></td>
			<td><?= $ac['tgl_lahir_akta']; ?></td>
			<td><?= $ac['kode']; ?></td>
			<td><?= $ac['status']; ?></td>
			<td>
				<div class="btn-group">
					<a target="_blank" href="<?= base_url('petugas/akta/cetak/').$ac['id_akta_kelahiran']; ?>" class="btn btn-secondary"><i class="fa fa-print"></i> Cetak</a>
					<a href="" data-toggle="modal" data-target="#akta<?= $ac['id_akta_kelahiran']; ?>"
						class="btn btn-info"><i class="fa fa-search"></i></a>
					<a href="<?= base_url('petugas/akta/edit/').$ac['id_akta_kelahiran']; ?>" class="btn btn-success"><i
							class="fa fa-edit"></i></a>
					
					<a onclick="return confirm('Yakin?')"
						href="<?= base_url('petugas/akta/hapus/').$ac['id_akta_kelahiran']; ?>" class="btn btn-danger"><i
							class="fa fa-trash"></i></a>
				</div>
			</td>
		</tr>
		<?php endforeach; ?>
	</table>
</div>

<!-- Modal Detail -->
<?php foreach($akta as $pn) : ?>
<div class="modal fade" id="akta<?= $pn['id_akta_kelahiran']; ?>" tabindex="-1" role="dialog"
	aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" id="cetak<?= $pn['id_akta_kelahiran']; ?>">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Detail Izin Akta Kelahiran</h5>
				<button type="button" class="close no-print" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="text-right">
				<p class="print">Dicetak pada : <?= date('d-m-Y'); ?></p>
					<a href="" onclick="javascript:printlayer('cetak<?= $pn['id_akta_kelahiran']; ?>')" class="btn btn-secondary mb-2 no-print"><i
							class="fa fa-print"></i> Cetak</a>
				</div>
				<div class="table-responsive">
					<table class="table table-hover">
						<tr>
							<th>Kode</th>
							<td>:</td>
							<td><?= $pn['kode']; ?></td>
						</tr>
						<tr>
							<th>NIK</th>
							<td>:</td>
							<td><?= $pn['nik']; ?></td>
						</tr>
						<tr>
							<th>Nama Lengkap</th>
							<td>:</td>
							<td><?= $pn['nama_akta']; ?></td>
						</tr>
						<tr>
							<th>Tempat Lahir</th>
							<td>:</td>
							<td><?= $pn['tmp_lahir_akta']; ?></td>
						</tr>
						<tr>
							<th>Tanggal Lahir</th>
							<td>:</td>
							<td><?= $pn['tgl_lahir_akta']; ?></td>
						</tr>
						<tr>
							<th>Jenis Kelamin</th>
							<td>:</td>
							<td><?= ($pn['jk_akta'] == 'l') ? 'Laki - laki' : 'Perempuan'; ?></td>
						</tr>
						<tr>
							<th>Kewarganegaraan</th>
							<td>:</td>
							<td><?= $pn['kewarganegaraan_akta']; ?></td>
						</tr>
						<tr>
							<th>Agama</th>
							<td>:</td>
							<td><?= $pn['agama_akta']; ?></td>
						</tr>
						<tr>
							<th>RT</th>
							<td>:</td>
							<td><?= $pn['rt_akta']; ?></td>
						</tr>
						<tr>
							<th>RW</th>
							<td>:</td>
							<td><?= $pn['rw_akta']; ?></td>
						</tr>
						<tr>
							<th>No Rumah</th>
							<td>:</td>
							<td><?= $pn['no_rumah_akta']; ?></td>
						</tr>
						<tr>
							<th>Kelurahan / Desa</th>
							<td>:</td>
							<td><?= $pn['kelurahan_desa_akta']; ?></td>
						</tr>
						<tr>
							<th>Kecamatan</th>
							<td>:</td>
							<td><?= $pn['kecamatan_akta']; ?></td>
						</tr>
						<tr>
							<th>Kabupaten / Kota</th>
							<td>:</td>
							<td><?= $pn['kabupaten_kota_akta']; ?></td>
						</tr>
						<tr>
							<th>Kode Pos</th>
							<td>:</td>
							<td><?= $pn['kode_pos_akta']; ?></td>
						</tr>

						
						<tr>
							<th>Surat Pengantar</th>
							<td>:</td>
							<td><img src="<?= base_url('assets/img/akta/').$pn['gambar_surat_pengantar']; ?>" width="100%" class="img-thumbnail" alt=""></td>
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
				</div>
			</div>
			<div class="modal-footer no-print">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>

			</div>
		</div>
	</div>
</div>
<?php endforeach; ?>
