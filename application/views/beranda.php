 <!-- ======= Hero Section ======= -->
 <section id="hero" class="d-flex align-items-center">

 	<div class="container">
 		<div class="row">
 			<div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
			 	<?= $this->session->flashdata('message'); ?>
				 <h1>SISTEM PELAYANAN DESA PEMERINTAHAN DESA KEDONDONG</h1>
 				<h2 class="text-justify">Kami menyajikan sekilas informasi dan pelayanan online pada Desa Kedondong,
 					Kecamatan Sokaraja, Kabupaten
 					Banyumas, Provinsi Jawa Tengah.
 					Lahirnya Website Kelurahan Desa Kedondong, bertujuan untuk mempermudah proses pelayanan masyarakat
 					serta
 					lebih mendekatkan diri kepada masyarakat. Karena website ini dapat
 					diakses oleh siapapun. Profil kelurahan, kegiatan dan fasilitas desa serta jenis dan prosedur
 					pelayanan dapat
 					diakses oleh masyarakat secara
 					langsung dan cepat. Semoga dengan adanya Website Kelurahan Desa Kedondong sebagai perwujudan
 					peningkatan
 					pelayanan masyarakat ini dapat memberikan manfaat.
 					Namun perlu disadari bahawa website ini masih dalam tahap pengembangan untuk itu kritik dan saran
 					yang
 					sifatnya membangun sangat kami harapkan agar situs ini bisa lebih baik. </h2>

 				<div class="mt-5">
 					<a href="#" class="btn btn-info scrollto" data-toggle="modal" data-target="#pengaduan"><i
 							class="fa fa-bullhorn"></i> Layanan Pengaduan Online</a>
 				</div>
 			</div>
 			<div class="col-lg-6 order-1 order-lg-2 hero-img">
 				<img src="assets/img/hero-img.png" class="img-fluid" alt="">
 			</div>
 		</div>
 	</div>

 </section><!-- End Hero -->

 <!-- Modal -->
 <div class="modal fade" id="pengaduan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
 	aria-hidden="true">
 	<div class="modal-dialog modal-lg">
 		<div class="modal-content">
 			<div class="modal-header">
 				<h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-bullhorn"></i> Pengaduan Online</h5>
 				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
 					<span aria-hidden="true">&times;</span>
 				</button>
 			</div>
 			<form action="<?= base_url('pengaduan'); ?>" method="post" enctype="multipart/form-data">
 				<div class="modal-body">
 					<div class="form-group">
						 <label>NIK</label>
						 <input type="text" name="nik_pengadu" placeholder="NIK" class="form-control mb-2">
					 </div>
 					<div class="form-group">
 						<label>Nama</label>
						 <input type="text" name="nama_pengadu" placeholder="Nama" class="form-control mb-2">
					 </div>
					 <div class="form-group">
						 <label>Deskripsi</label>
						 <textarea name="deskripsi" placeholder="Deskripsi" class="form-control mb-2"></textarea>
					 </div>
					 
					 <div class="form-group">
						 <label>Pilih Gambar</label>

						 <div class="input-group mb-2">
							 <div class="input-group-prepend">
								 <span class="input-group-text" id="inputGroupFileAddon01"><i class="fa fa-image"></i></span>
							 </div>
							 <div class="custom-file">
								 <input type="file" name="foto" class="custom-file-input" id="inputGroupFile01"
									 aria-describedby="inputGroupFileAddon01">
								 <label class="custom-file-label" for="inputGroupFile01">Pilih Gambar</label>
							 </div>
						 </div>
						 <div id="image-holder"> </div>
					 </div>
					 <div class="form-group">
						 <label>Tempat Kejadian</label>
						 <textarea name="tempat_kejadian" placeholder="Tempat Kejadian" class="form-control mb-2"></textarea>
					 </div>
 					<div class="form-group">
						 
						 <label>Waktu Kejadian</label>
						 <input type="datetime-local" name="waktu_kejadian" class="form-control mb-2">
					 </div>
 				</div>
 				<div class="modal-footer">
 					<button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
 					<button type="submit" class="btn btn-info">Kirim</button>
 				</div>
 			</form>
 		</div>
 	</div>
 </div>
