<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Surat Pelayanan</title>
	<link rel="stylesheet" href="<?= base_url('assets/vendor/bootstrap/css/bootstrap.min.css'); ?>">
	<style type="text/css" media="print">
		@page {
			size: auto;
			/* auto is the initial value */
			margin: 0;
			/* this affects the margin in the printer settings */
		}

		* {
			font-family: 'Times New Roman', Times, serif;
		}

		.head {
			margin-top: -4rem;
		}

		.bord {
			border: solid 2px #222;
		}

		.logo {
			margin-top: 6rem;
		}

		.header {
			margin-top: -8rem;
			margin-left: 10rem;
		}
	</style>
</head>

<body onload="window.print()">
	<div class="container-fluid">
		<div class="row p-2">
			<div class="col-lg-12">
				<div class="row head">
					<div class="col-lg-4 float-left">

						<img src="<?= base_url('assets/img/banyumas.png'); ?>" class="logo" width="150px" alt="">
					</div>
					<div class="col-lg-8 header float-right">
						<h4 class="text-center">PEMERINTAH DESA KEDONDONG</h4>
						<h4 class="text-center">KECAMATAN SOKARAJA KABUPATEN BANYUMAS</h4>
						<h4 class="text-center font-weight-bold">KEPALA DESA</h4>
						<h5 class="text-center"> JL. KEDONDONG-LEDUG NO. 01 KODE POS 53181</h5>
					</div>
				</div>
			</div>
		</div>
		<hr class="bord">
		<div class="row">
			<div class="col-lg-4">
				<div class="text-center">

					<h5 class="font-weight-bold">
						<u>
							SURAT KETERANGAN KEMATIAN
						</u>
					</h5>
					<p>Nomor : 042.543/<?= date('m'); ?>/<?= date('Y'); ?></p>
				</div>
			</div>
		</div>
	</div>
	<div class="container p-5">
		<div class="row ml-5">
			<div class="col-lg-6">
				<p class="text-justify">Yang bertandatangan di bawah ini Kepala Desa Kedondong, Kecamatan Sokaraja, Kabupaten Banyumas, menerangkan bahwa telah meninggal dunia :</p>
				<?php
					$ci =& get_instance();
					$ci->db->join('penduduk','penduduk.id_penduduk = penduduk_mati.id_penduduk','left');
					$mt = $ci->db->get_where('penduduk_mati',['id_penduduk_mati' => $ply['id_penduduk_mati']])->row_array();
				?>
				<table class="ml-5">
				<tr>
						<td>NIK</td>
						<td width="50px"></td>
						<td>:</td>
						<td><?= $mt['nik']; ?></td>
					</tr>
					<tr>
						<td>Nama Lengkap</td>
						<td></td>
						<td>:</td>
						<td><?= $mt['nama_lengkap']; ?></td>
					</tr>
					<tr>
						<td>Jenis Kelamin</td>
						<td></td>
						<td>:</td>
						<td><?= ($mt['jk'] == 'l') ? 'Laki - laki' : 'Perempuan'; ?></td>
					</tr>
					<tr>
						<td>Tempat Lahir</td>
						<td></td>
						<td>:</td>
						<td><?= $mt['tmp_lahir']; ?></td>
					</tr>
					<tr>
						<td>Tanggal Lahir</td>
						<td></td>
						<td>:</td>
						<td><?php
								$tglm = date_create($mt['tgl_lahir']);
								echo date_format($tglm, 'd-m-Y');
								 
							?></td>
					</tr>
					<tr>
						<td>Tanggal Kematian</td>
						<td></td>
						<td>:</td>
						<td><?php
								$tgm = date_create($ply['waktu_kematian']);
								echo date_format($tgm, 'd-m-Y');
								 
							?></td>
					</tr>
					
					<tr>
						<td>Alamat</td>
						<td></td>
						<td>:</td>
						<td><?= $mt['alamat']; ?></td>
					</tr>
				</table>
				<p class="text-justify">Surat kematian ini berdasarkan keterangan pelapor :</p>
				<table class="ml-5">
					<tr>
						<td>NIK</td>
						<td width="50px"></td>
						<td>:</td>
						<td><?= $ply['nik']; ?></td>
					</tr>
					<tr>
						<td>Nama Lengkap</td>
						<td></td>
						<td>:</td>
						<td><?= $ply['nama_lengkap']; ?></td>
					</tr>
					<tr>
						<td>Jenis Kelamin</td>
						<td></td>
						<td>:</td>
						<td><?= ($ply['jk'] == 'l') ? 'Laki - laki' : 'Perempuan'; ?></td>
					</tr>
					<tr>
						<td>Tempat Lahir</td>
						<td></td>
						<td>:</td>
						<td><?= $ply['tmp_lahir']; ?></td>
					</tr>
					<tr>
						<td>Tanggal Lahir</td>
						<td></td>
						<td>:</td>
						<td><?php
								$tgl = date_create($ply['tgl_lahir']);
								echo date_format($tgl, 'd-m-Y');
								 
							?></td>
					</tr>
					
					<tr>
						<td>Alamat</td>
						<td></td>
						<td>:</td>
						<td><?= $ply['alamat']; ?></td>
					</tr>
					
				</table>
				
				<p class="text-justify">Demikian Surat Keterangan ini dibuat untuk digunakan seperlunya.</p>
			</div>
		</div>
	</div>
	<div class="container p-5">
		<div class="row">
			<div class="col-lg-4 mr-5">
				<p class="text-right">Kedondong, <?= $tanggal; ?></p>
				<p class="text-right mt-5">SURATMAN</p>
			</div>
		</div>
	</div>
</body>

</html>
