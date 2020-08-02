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
			<th>NIK</th>
			<th>Nama Lengkap</th>
			<th>Status Kependudukan</th>
			<th>Jumlah Keluarga</th>
			<th>Tanggal Pindah</th>
			<th>Kode</th>
			<th>Status</th>
			<th><i class="fa fa-cogs"></i></th>
		</tr>
		<?php if(empty($pindah)) : ?>
		<tr>
			<td colspan="8" class="text-center">Data tidak ada!</td>
		</tr>
		<?php endif; ?>
		<?php 
			$no = 1;
			foreach($pindah as $ac) :
		?>
		<tr>
			<td><?= $no++; ?></td>
			<td><?= $ac['nik']; ?></td>
			<td><?= $ac['nama_lengkap']; ?></td>
			<td><?= $ac['status_kependudukan']; ?></td>
			<td><?= $ac['jml_keluarga_pindah']; ?></td>
			<td><?= $ac['tgl_pindah']; ?></td>
			<td><?= $ac['kode']; ?></td>
			<td><?= $ac['status']; ?></td>
			<td>
				<div class="btn-group">
					<a href="<?= base_url('petugas/keluarga_pindah/').$ac['id_suket_pindah']; ?>"
						class="btn btn-warning"><i class="fa fa-child"></i> Keluarga</a>
					<a href="" data-toggle="modal" data-target="#pindah<?= $ac['id_suket_pindah']; ?>"
						class="btn btn-info"><i class="fa fa-search"></i></a>
					<a href="<?= base_url('petugas/suket_pindah/edit/').$ac['id_suket_pindah']; ?>"
						class="btn btn-success"><i class="fa fa-edit"></i></a>

					<a onclick="return confirm('Yakin?')"
						href="<?= base_url('petugas/suket_pindah/hapus/').$ac['id_suket_pindah']; ?>"
						class="btn btn-danger"><i class="fa fa-trash"></i></a>

				</div>
			</td>
		</tr>
		<?php endforeach; ?>
	</table>
</div>

<!-- Modal Detail -->
<?php foreach($pindah as $pn) : ?>
<div class="modal fade" id="pindah<?= $pn['id_suket_pindah']; ?>" tabindex="-1" role="dialog"
	aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" id="cetak<?= $pn['id_suket_pindah']; ?>">
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
					<a href="" onclick="javascript:printlayer('cetak<?= $pn['id_suket_pindah']; ?>')"
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
							<th>Status Kependudukan</th>
							<td>:</td>
							<td><?= $pn['status_kependudukan']; ?></td>
						</tr>
						<tr>
							<th>Jumlah Keluarga</th>
							<td>:</td>
							<td><?= $pn['jml_keluarga_pindah']; ?></td>
						</tr>

						<tr>
							<th>Pindah Ke</th>
							<td>:</td>
							<td><?= $pn['pindah_ke']; ?></td>
						</tr>
						<tr>
							<th>Tanggal Pindah</th>
							<td>:</td>
							<td><?= $pn['tgl_pindah']; ?></td>
						</tr>
						`
						<tr>
							<th>Kelurahan / Desa</th>
							<td>:</td>
							<td><?= $pn['kelurahan_desa_pindah']; ?></td>
						</tr>
						<tr>
							<th>Kecamatan</th>
							<td>:</td>
							<td><?= $pn['kecamatan_pindah']; ?></td>
						</tr>
						<tr>
							<th>Kabupaten / Kota</th>
							<td>:</td>
							<td><?= $pn['kabupaten_kota_pindah']; ?></td>
						</tr>
						<tr>
							<th>Surat Pengantar</th>
							<td>:</td>
							<td><img src="<?= base_url('assets/img/suket_pindah/').$pn['gambar_surat_pengantar']; ?>"
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
							<th colspan="3">Data Keluarga</th>
						</tr>
						<tr>
							<th>#</th>
							<th>NIK</th>
							<th>Nama</th>
						</tr>
						<?php 
							$nk = 1;
							$kel = $ci->db->get_where('keluarga_pindah',['id_suket_pindah' => $pn['id_suket_pindah']])->result_array();
							if(empty($kel)) {
								echo "<tr>
									<td colspan='3' class='text-center'>Data tidak ada!</td>
								</tr>";
							}
							foreach($kel as $kl) :
							
						?>
						<tr>
							<td><?= $nk++; ?></td>
							<td><?= $kl['nik']; ?></td>
							<td><?= $kl['nama']; ?></td>
						</tr>
						<?php endforeach; ?>
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
