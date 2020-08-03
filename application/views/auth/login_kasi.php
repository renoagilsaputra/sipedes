<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login Kasi</title>
	<link href="<?= base_url(''); ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="<?= base_url(''); ?>assets/vendor/font-awesome/css/font-awesome.min.css">
</head>
<body class="bg-secondary">
<?= $this->session->flashdata('message'); ?>
	<div class="container">
		<div class="row">
			<div class="col-lg-6 mx-auto">
				<div class="card mt-5">
					<div class="card-body">
						<h1 class="text-center">
							<i class="fa fa-user-secret"></i> Login Kasi
						</h1>

						<form action="" class="mt-5" method="post">
						<div class="form-group">
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
									</div>
									<input type="text" name="nama_pengguna" class="form-control" placeholder="Nama Pengguna" aria-label="Username" aria-describedby="basic-addon1">
								</div>
								<?= form_error('nama_pengguna', '<small class="text-danger pl-1">', '</small>'); ?>
							</div>

							<div class="form-group">
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon2"><i class="fa fa-lock"></i></span>
									</div>
									<input type="password" name="kata_sandi" class="form-control" placeholder="Kata Sandi" aria-label="Password" aria-describedby="basic-addon2">
								</div>
								<?= form_error('kata_sandi', '<small class="text-danger pl-1">', '</small>'); ?>
							</div>

							<button type="submit" class="btn btn-dark btn-block btn-lg"><i class="fa fa-sign-in-alt"></i> Masuk</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script src="<?= base_url(''); ?>assets/vendor/jquery/jquery.min.js"></script>
	<script src="<?= base_url(''); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
