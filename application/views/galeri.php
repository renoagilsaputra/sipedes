<!-- Page Content -->
<div class="container">

  <h1 class="font-weight-light text-center text-lg-left mt-4 mb-0">Galeri</h1>

  <hr class="mt-2 mb-5">

  <div class="row text-center text-lg-left">
		<?php 
			for($i = 1; $i <= 9; $i++) :
		?>
    <div class="col-lg-4 col-md-4 col-6">
      <a href="#" class="d-block mb-4 h-100">
            <img  class="img-fluid img-thumbnail" src="<?= base_url('assets/img/galeri/').$i.'.jpg'; ?>" alt="">
          </a>
    </div>
			<?php endfor; ?>
    
  </div>

</div>
<!-- /.container -->
