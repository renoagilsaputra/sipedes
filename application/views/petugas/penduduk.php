<h1><i class="fa fa-users"></i> Penduduk</h1>
<?= $this->session->flashdata('message'); ?>

<div class="row">
	<div class="col-lg-8">

		<a href="<?= base_url('petugas/penduduk/tambah'); ?>" class="btn btn-primary mb-2"><i class="fa fa-pencil"></i>
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
			<th>Jenis Kelamin</th>
			<th><i class="fa fa-cogs"></i></th>
		</tr>
		<?php if(empty($penduduk)) : ?>
		<tr>
			<td colspan="5" class="text-center">Data tidak ada!</td>
		</tr>
		<?php endif; ?>
		<?php 
			$no = 1;
			foreach($penduduk as $pd) :
		?>
		<tr>
			<td><?= $no++; ?></td>
			<td><?= $pd['nik']; ?></td>
			<td><?= $pd['nama_lengkap']; ?></td>
			<td><?= ($pd['jk'] == 'l') ? 'Laki - laki' : 'Perempuan'; ?></td>
			<td>
				<div class="btn-group">
					<a href="" data-toggle="modal" data-target="#penduduk<?= $pd['id_penduduk']; ?>"
						class="btn btn-info"><i class="fa fa-search"></i></a>
					<a href="<?= base_url('petugas/penduduk/edit/').$pd['id_penduduk']; ?>" class="btn btn-success"><i
							class="fa fa-edit"></i></a>
					<a href="<?= base_url('petugas/penduduk/gantisandi/').$pd['id_penduduk']; ?>"
						class="btn btn-warning"><i class="fa fa-lock"></i></a>
					<a onclick="return confirm('Yakin?')"
						href="<?= base_url('petugas/penduduk/hapus/').$pd['id_penduduk']; ?>" class="btn btn-danger"><i
							class="fa fa-trash"></i></a>
				</div>
			</td>
		</tr>
		<?php endforeach; ?>
	</table>
</div>

<!-- Modal Detail -->
<?php foreach($penduduk as $pn) : ?>
<div class="modal fade" id="penduduk<?= $pn['id_penduduk']; ?>" tabindex="-1" role="dialog"
	aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" id="cetak<?= $pn['id_penduduk']; ?>">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Detail Penduduk</h5>
				<button type="button" class="close no-print" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="text-right">
					<p class="print">Dicetak pada : <?= date('d-m-Y'); ?></p>
					<a href="" onclick="javascript:printlayer('cetak<?= $pn['id_penduduk']; ?>')" class="btn btn-secondary mb-2 no-print"><i
							class="fa fa-print"></i> Cetak</a>
				</div>
				<div class="table-responsive">
					<table class="table table-hover">
						<tr>
							<th>Foto</th>
							<td>:</td>
							<td>
								<?php if($pn['foto'] == null) : ?>
								Tidak Ada
								<?php else : ?>

								<img src="<?= base_url('assets/img/penduduk/').$pn['foto']; ?>" width="500px"
									class="img-thumbnail" alt="">
								<?php endif; ?>
							</td>
						</tr>
						<tr>
							<th>NIK</th>
							<td>:</td>
							<td><?= $pn['nik']; ?></td>
						</tr>
						<tr>
							<th>No KK</th>
							<td>:</td>
							<td><?= $pn['no_kk']; ?></td>
						</tr>
						<tr>
							<th>Nama</th>
							<td>:</td>
							<td><?= $pn['nama_lengkap']; ?></td>
						</tr>
						<tr>
							<th>Tempat Lahir</th>
							<td>:</td>
							<td><?= $pn['tmp_lahir']; ?></td>
						</tr>

						<tr>
							<th>Tanggal Lahir</th>
							<td>:</td>
							<td><?= $pn['tgl_lahir']; ?></td>
						</tr>
						<tr>
							<th>Jenis Kelamin</th>
							<td>:</td>
							<td><?= ($pn['jk'] == 'l') ? 'Laki - laki' : 'Perempuan'; ?></td>
						</tr>
						<tr>
							<th>Kewarganegaraan</th>
							<td>:</td>
							<td><?= $pn['kewarganegaraan']; ?></td>
						</tr>
						<tr>
							<th>Status Perkawinan</th>
							<td>:</td>
							<td><?= $pn['status_perkawinan']; ?></td>
						</tr>
						<tr>
							<th>Agama</th>
							<td>:</td>
							<td><?= $pn['agama']; ?></td>
						</tr>
						<tr>
							<th>Pekerjaan</th>
							<td>:</td>
							<td><?= $pn['pekerjaan']; ?></td>
						</tr>
						<tr>
							<th>Telp</th>
							<td>:</td>
							<td><?= $pn['telp']; ?></td>
						</tr>
						<tr>
							<th>RT</th>
							<td>:</td>
							<td><?= $pn['rt']; ?></td>
						</tr>
						<tr>
							<th>RW</th>
							<td>:</td>
							<td><?= $pn['rw']; ?></td>
						</tr>
						<tr>
							<th>No Rumah</th>
							<td>:</td>
							<td><?= $pn['no_rumah']; ?></td>
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
