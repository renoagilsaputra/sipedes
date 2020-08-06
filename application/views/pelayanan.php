<?php $ci =& get_instance(); ?>
<?= $this->session->flashdata('message'); ?>
<div class="container">
	<div class="row">
		<div class="col-lg-12 mx-auto">
			<h1 class="text-center mb-5">Pelayanan</h1>
			<div class="row">

				<div class="col-lg-4 col-md-4 mb-2">
					<div class="card">
						<div class="card-header">
							<h4 class="text-center">Pelayanan</h4>

						</div>
						<div class="card-body text-center">
							<strong>Membuat & Merubah</strong>
							<p>Kartu Keluarga,SKCK,Surat Keterangan Belum Menikah,Surat Keterangan Sudah Menikah,Surat
								Keterangan Tidak Mampu,Surat Keterangan Cerai,Domisili</p>

							<?php if($ci->session->userdata('id_penduduk')) : ?>

							<a href="<?= base_url('pelayanan/tambah'); ?>" class="btn btn-primary">Buat</a>
							<?php else : ?>

							<a href="<?= base_url('login'); ?>" class="btn btn-primary">Buat</a>
							<?php endif; ?>

						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-4 mb-2">
					<div class="card">
						<div class="card-header">
							<h4 class="text-center">Kependudukan</h4>

						</div>
						<div class="card-body text-center">
							<strong>Membuat & Merubah</strong>
							<p>KTP & KIA</p>

							<?php if($ci->session->userdata('id_penduduk')) : ?>

							<a href="<?= base_url('kependudukan/tambah'); ?>" class="btn btn-primary">Buat</a>
							<?php else : ?>

							<a href="<?= base_url('login'); ?>" class="btn btn-primary">Buat</a>
							<?php endif; ?>

						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-4 mb-2">
					<div class="card">
						<div class="card-header">
							<h4 class="text-center">Surat Keterangan Menikah</h4>

						</div>
						<div class="card-body text-center">

							<?php if($ci->session->userdata('id_penduduk')) : ?>

							<a href="<?= base_url('suket_menikah/tambah'); ?>" class="btn btn-primary">Buat</a>
							<?php else : ?>

							<a href="<?= base_url('login'); ?>" class="btn btn-primary">Buat</a>
							<?php endif; ?>

						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-4 mb-2">
					<div class="card">
						<div class="card-header">
							<h4 class="text-center">Surat Izin Acara</h4>

						</div>
						<div class="card-body text-center">
							<?php if($ci->session->userdata('id_penduduk')) : ?>

							<a href="<?= base_url('suket_izin_acara/tambah'); ?>" class="btn btn-primary">Buat</a>
							<?php else : ?>

							<a href="<?= base_url('login'); ?>" class="btn btn-primary">Buat</a>
							<?php endif; ?>

						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-4 mb-2">
					<div class="card">
						<div class="card-header">
							<h4 class="text-center">Surat Izin Usaha</h4>

						</div>
						<div class="card-body text-center">
							<?php if($ci->session->userdata('id_penduduk')) : ?>

							<a href="<?= base_url('suket_izin_usaha/tambah'); ?>" class="btn btn-primary">Buat</a>
							<?php else : ?>

							<a href="<?= base_url('login'); ?>" class="btn btn-primary">Buat</a>
							<?php endif; ?>

						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-4 mb-2">
					<div class="card">
						<div class="card-header">
							<h4 class="text-center">Pembuatan Akta Kelahiran</h4>

						</div>
						<div class="card-body text-center">
							<?php if($ci->session->userdata('id_penduduk')) : ?>

							<a href="<?= base_url('akta/tambah'); ?>" class="btn btn-primary">Buat</a>
							<?php else : ?>

							<a href="<?= base_url('login'); ?>" class="btn btn-primary">Buat</a>
							<?php endif; ?>

						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-4 mb-2">
					<div class="card">
						<div class="card-header">
							<h4 class="text-center">Surat Keterangan Pindah</h4>

						</div>
						<div class="card-body text-center">
							<?php if($ci->session->userdata('id_penduduk')) : ?>

							<a href="<?= base_url('suket_pindah/tambah'); ?>" class="btn btn-primary">Buat</a>
							<?php else : ?>

							<a href="<?= base_url('login'); ?>" class="btn btn-primary">Buat</a>
							<?php endif; ?>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-4 mb-2">
					<div class="card">
						<div class="card-header">
							<h4 class="text-center">Surat Keterangan Kematian</h4>

						</div>
						<div class="card-body text-center">
							<?php if($ci->session->userdata('id_penduduk')) : ?>

							<a href="<?= base_url('suket_kematian/tambah'); ?>" class="btn btn-primary">Buat</a>
							<?php else : ?>

							<a href="<?= base_url('login'); ?>" class="btn btn-primary">Buat</a>
							<?php endif; ?>

						</div>
					</div>
				</div>


			</div>
			<?php 
				
				if($ci->session->userdata('id_penduduk')) :
			?>
			<div class="row mt-5">
				<div class="col-lg-12">
					<h1>Kode</h1>

					<h4>Pelayanan</h4>
					<table class="table">
						<tr>
							<th>#</th>
							<th>Kode</th>
							<th>Jenis Pelayanan</th>
						</tr>
						<?php
							$na = 1;
							foreach($pelayanan as $pl) :
						?>
						<tr>
							<td><?= $na++; ?></td>
							<td><?= $pl['kode']; ?></td>
							<td><?= $pl['jenis_pelayanan']; ?></td>
						</tr>
						<?php endforeach; ?>
					</table>

					<h4>Kependudukan</h4>
					<table class="table">
						<tr>
							<th>#</th>
							<th>Kode</th>
							<th>Jenis Pelayanan</th>
						</tr>
						<?php
							$na = 1;
							foreach($kependudukan as $kp) :
						?>
						<tr>
							<td><?= $na++; ?></td>
							<td><?= $kp['kode']; ?></td>
							<td><?= $kp['jenis_pelayanan']; ?></td>
						</tr>
						<?php endforeach; ?>
					</table>

					<h4>Surat Keterangan Menikah</h4>
					<table class="table">
						<tr>
							<th>#</th>
							<th>Kode</th>

						</tr>
						<?php
							$na = 1;
							foreach($suket_menikah as $sm) :
						?>
						<tr>
							<td><?= $na++; ?></td>
							<td><?= $sm['kode']; ?></td>

						</tr>
						<?php endforeach; ?>
					</table>
					<h4>Surat Keterangan Izin Acara</h4>
					<table class="table">
						<tr>
							<th>#</th>
							<th>Kode</th>

						</tr>
						<?php
							$na = 1;
							foreach($suket_izin_acara as $sm) :
						?>
						<tr>
							<td><?= $na++; ?></td>
							<td><?= $sm['kode']; ?></td>

						</tr>
						<?php endforeach; ?>
					</table>
					<h4>Surat Keterangan Izin Usaha</h4>
					<table class="table">
						<tr>
							<th>#</th>
							<th>Kode</th>

						</tr>
						<?php
							$na = 1;
							foreach($suket_izin_usaha as $sm) :
						?>
						<tr>
							<td><?= $na++; ?></td>
							<td><?= $sm['kode']; ?></td>

						</tr>
						<?php endforeach; ?>
					</table>

					<h4>Pembuatan Akta Kelahiran</h4>
					<table class="table">
						<tr>
							<th>#</th>
							<th>Kode</th>

						</tr>
						<?php
							$na = 1;
							foreach($akta as $sm) :
						?>
						<tr>
							<td><?= $na++; ?></td>
							<td><?= $sm['kode']; ?></td>

						</tr>
						<?php endforeach; ?>
					</table>

					<h4>Surat Keterangan Pindah</h4>
					<table class="table">
						<tr>
							<th>#</th>
							<th>Kode</th>
							<td>
								<i class="fa fa-cogs"></i>
							</td>

						</tr>
						<?php
							$na = 1;
							foreach($suket_pindah as $sm) :
						?>
						<tr>
							<td><?= $na++; ?></td>
							<td><?= $sm['kode']; ?></td>
							<td>
								<a href="<?= base_url('keluarga_pindah/').$sm['id_suket_pindah']; ?>"
									class="btn btn-warning"><i class="fa fa-child"></i> Keluarga</a>
							</td>

						</tr>
						<?php endforeach; ?>
					</table>
					<h4>Surat Keterangan Kematian</h4>
					<table class="table">
						<tr>
							<th>#</th>
							<th>Kode</th>

						</tr>
						<?php
							$na = 1;
							foreach($suket_kematian as $sm) :
						?>
						<tr>
							<td><?= $na++; ?></td>
							<td><?= $sm['kode']; ?></td>

						</tr>
						<?php endforeach; ?>
					</table>
				</div>
			</div>
			<?php endif; ?>
		</div>
	</div>
</div>

<br><br>
