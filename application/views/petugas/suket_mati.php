<h1><i class="fa fa-envelope"></i> Surat Keterangan Pindah</h1>
<?= $this->session->flashdata('message'); ?>
<?php $ci =& get_instance(); ?>

<div class="row">
	<div class="col-lg-8">

		<a href="<?= base_url('petugas/suket_mati/tambah'); ?>" class="btn btn-primary mb-2"><i
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
			<th>NIK Penuduk Mati</th>
			<th>Nama Penduduk Mati</th>
			<th>Waktu Kematian</th>
			<th>Kode</th>
			<th>Status</th>
			<th><i class="fa fa-cogs"></i></th>
		</tr>
		<?php if(empty($mati)) : ?>
		<tr>
			<td colspan="8" class="text-center">Data tidak ada!</td>
		</tr>
		<?php endif; ?>
		<?php 
			$no = 1;
			foreach($mati as $ac) :
			$pd = $ci->db->get_where('penduduk',['id_penduduk' => $ac['id_mati']])->row_array();
		?>
		<tr>
			<td><?= $no++; ?></td>
			<td><?= $ac['nik']; ?></td>
			<td><?= $ac['nama_lengkap']; ?></td>
			<td><?= $pd['nik']; ?></td>
			<td><?= $pd['nama_lengkap']; ?></td>
			<td><?= $ac['waktu_kematian']; ?></td>
			<td><?= $ac['kode']; ?></td>
			<td><?= $ac['status']; ?></td>
			<td>
				<div class="btn-group">
					
					<a href="" data-toggle="modal" data-target="#mati<?= $ac['id_suket_kematian']; ?>"
						class="btn btn-info"><i class="fa fa-search"></i></a>
					<a href="<?= base_url('petugas/suket_mati/edit/').$ac['id_suket_kematian']; ?>"
						class="btn btn-success"><i class="fa fa-edit"></i></a>

					<a onclick="return confirm('Yakin?')"
						href="<?= base_url('petugas/suket_mati/hapus/').$ac['id_suket_kematian']; ?>"
						class="btn btn-danger"><i class="fa fa-trash"></i></a>

				</div>
			</td>
		</tr>
		<?php endforeach; ?>
	</table>
</div>

<!-- Modal Detail -->
<?php 
	foreach($mati as $pn) :
	$pk = $ci->db->get_where('penduduk',['id_penduduk' => $pn['id_mati']])->row_array(); 
?>
<div class="modal fade" id="mati<?= $pn['id_suket_kematian']; ?>" tabindex="-1" role="dialog"
	aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" id="cetak<?= $pn['id_suket_kematian']; ?>">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Detail Surat Keterangan Kematian</h5>
				<button type="button" class="close no-print" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="text-right">
					<p class="print">Dicetak pada : <?= date('d-m-Y'); ?></p>
					<a href="" onclick="javascript:printlayer('cetak<?= $pn['id_suket_kematian']; ?>')"
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
							<th>Nama</th>
							<td>:</td>
							<td><?= $pn['nama_lengkap']; ?></td>
						</tr>
						<tr>
							<th>NIK Penduduk Mati</th>
							<td>:</td>
							<td><?= $pk['nik']; ?></td>
						</tr>
						<tr>
							<th>Nama Penduduk Mati</th>
							<td>:</td>
							<td><?= $pk['nama_lengkap']; ?></td>
						</tr>
						
						<tr>
							<th>Surat Pengantar</th>
							<td>:</td>
							<td><img src="<?= base_url('assets/img/suket_mati/').$pn['gambar_surat_pengantar']; ?>"
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

				</div>
			</div>
			<div class="modal-footer no-print">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>

			</div>
		</div>
	</div>
</div>
<?php endforeach; ?>
