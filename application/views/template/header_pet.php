<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Kasi | siPEDES</title>

	<link href="<?= base_url(''); ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="<?= base_url(''); ?>assets/vendor/font-awesome/css/font-awesome.min.css">
	<link href="<?= base_url(''); ?>assets/css/style.css" rel="stylesheet">
	<link rel="stylesheet" href="<?= base_url(''); ?>assets/css/dashboard.css">
	<link rel="stylesheet" href="<?= base_url(''); ?>assets/vendor/select2/css/select2.min.css">
</head>

<body>

	<nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
		<a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="#">Kasi | siPEDES</a>
		<button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse"
			data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		
		<ul class="navbar-nav px-3">
			<li class="nav-item text-nowrap">
				<a class="nav-link" href="#"><i class="fa fa-sign-out"></i> Sign out</a>
			</li>
		</ul>
	</nav>

	<div class="container-fluid">
		<div class="row">
			<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
				<div class="sidebar-sticky pt-3">
					<ul class="nav flex-column">
						<li class="nav-item">
							<a class="nav-link" href="<?= base_url('petugas'); ?>">
								<i class="fa fa-dashboard"></i>
								Dashboard <span class="sr-only">(current)</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?= base_url('petugas/laporan-pengaduan'); ?>">
								<i class="fa fa-bullhorn"></i>
								Laporan Pengaduan
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?= base_url('petugas/penduduk'); ?>">
								<i class="fa fa-users"></i>
								Penduduk
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?= base_url('petugas/pelayanan'); ?>">
								<i class="fa fa-id-card"></i>
								Pelayanan
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?= base_url('petugas/kependudukan'); ?>">
								<i class="fa fa-users"></i>
								Kependudukan
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">
								<i class="fa fa-child"></i>
								Akta Kelahiran
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">
								<i class="fa fa-envelope-square"></i>
								Surat Keterangan Menikah
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">
								<i class="fa fa-envelope"></i>
								Surat Keterangan Kematian
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">
								<i class="fa fa-envelope-o"></i>
								Surat Pindah
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?= base_url('petugas/izin_acara'); ?>">
								<i class="fa fa-calendar-check-o"></i>
								Izin Acara
							</a>
						</li>
					</ul>

					
				</div>
			</nav>

			<main role="main" class="col-md-9 ml-sm-auto col-lg-10 p-5">
