<div class="container mt-2">
	<div class="row">
		<?php 
			$ci =& get_instance();
			$dt = $ci->db->get_where('penduduk', ['id_penduduk' => $ci->session->userdata('id_penduduk')])->row_array();
		?>
		<?= $this->session->flashdata('message'); ?>
		<div class="col-lg-8 mx-auto">
			<h1>Data Diri</h1>
			<a href="<?= base_url('data-diri-edit'); ?>" class="btn btn-info mb-2"><i class="fa fa-edit"></i> Edit Data Diri</a>
			<a href="<?= base_url('data-diri-gantisandi'); ?>" class="btn btn-warning mb-2"><i class="fa fa-lock"></i> Ganti Sandi</a>
			
				<table class="table">
					<tr>
						<td colspan="3">
							<img src="<?= base_url('assets/img/penduduk/').$dt['foto']; ?>" width="500px" class="img-thumbnail d-block mx-auto" alt="">
						</td>
					</tr>
					<tr>
						<th>NIK</th>
						<td>:</td>
						<td><?= $dt['nik']; ?></td>
					</tr>
					<tr>
						<th>No KK</th>
						<td>:</td>
						<td><?= $dt['no_kk']; ?></td>
					</tr>
					<tr>
						<th>Nama Lengkap</th>
						<td>:</td>
						<td><?= $dt['nama_lengkap']; ?></td>
					</tr>
					<tr>
						<th>Tanggal Lahir</th>
						<td>:</td>
						<td><?= $dt['tgl_lahir']; ?></td>
					</tr>
					<tr>
						<th>Tempat Lahir</th>
						<td>:</td>
						<td><?= $dt['tmp_lahir']; ?></td>
					</tr>
					<tr>
						<th>Jenis Kelamin</th>
						<td>:</td>
						<td><?= ($dt['jk'] == 'l') ? 'Laki-laki' : 'Perempuan'; ?></td>
					</tr>
					<tr>
						<th>Kewarganegaraan</th>
						<td>:</td>
						<td><?= $dt['kewarganegaraan']; ?></td>
					</tr>
					<tr>
						<th>Status Perkawinan</th>
						<td>:</td>
						<td><?= $dt['status_perkawinan']; ?></td>
					</tr>
					<tr>
						<th>Agama</th>
						<td>:</td>
						<td><?= $dt['agama']; ?></td>
					</tr>
					<tr>
						<th>Nama Ayah</th>
						<td>:</td>
						<td><?= $dt['nama_ayah']; ?></td>
					</tr>
					<tr>
						<th>Nama Ibu</th>
						<td>:</td>
						<td><?= $dt['nama_ibu']; ?></td>
					</tr>
					<tr>
						<th>Pekerjaan</th>
						<td>:</td>
						<td><?= $dt['pekerjaan']; ?></td>
					</tr>
					<tr>
						<th>Telp</th>
						<td>:</td>
						<td><?= $dt['telp']; ?></td>
					</tr>
					<tr>
						<th>Alamat</th>
						<td>:</td>
						<td><?= $dt['alamat']; ?></td>
					</tr>
					<tr>
						<th>RT</th>
						<td>:</td>
						<td><?= $dt['rt']; ?></td>
					</tr>
					<tr>
						<th>RW</th>
						<td>:</td>
						<td><?= $dt['rw']; ?></td>
					</tr>
					<tr>
						<th>No Rumah</th>
						<td>:</td>
						<td><?= $dt['no_rumah']; ?></td>
					</tr>
					<tr>
						<th>Kelurahan / Desa</th>
						<td>:</td>
						<td><?= $dt['kelurahan_desa']; ?></td>
					</tr>
					<tr>
						<th>Kecamatan</th>
						<td>:</td>
						<td><?= $dt['kecamatan']; ?></td>
					</tr>
					<tr>
						<th>Kabupaten / Kota</th>
						<td>:</td>
						<td><?= $dt['kabupaten_kota']; ?></td>
					</tr>
					<tr>
						<th>Kode Pos</th>
						<td>:</td>
						<td><?= $dt['kode_pos']; ?></td>
					</tr>
				</table>

			
			
		</div>
	</div>
</div>
