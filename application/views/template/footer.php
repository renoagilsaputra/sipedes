 <!-- ======= Footer ======= -->
 <footer id="footer" style="margin-top: 20rem;">

 	<div class="container py-4">
 		<div class="copyright">
 			&copy; Copyright <strong><span>Admin siPEDES</span></strong>. All Rights Reserved
 		</div>
 		<div class="credits">
 			<!-- All the links in the footer should remain intact. -->
 			<!-- You can delete the links only if you purchased the pro version. -->
 			<!-- Licensing information: https://bootstrapmade.com/license/ -->
 			<!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/butterfly-free-bootstrap-theme/ -->
 			Designed by <a href="">Admin siPEDES</a>
 		</div>
 	</div>
 </footer><!-- End Footer -->

 <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

 <!-- Vendor JS Files -->
 <script src="<?= base_url(''); ?>assets/vendor/jquery/jquery.min.js"></script>
 <script src="<?= base_url(''); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
 <script src="<?= base_url(''); ?>assets/vendor/jquery.easing/jquery.easing.min.js"></script>
 <script src="<?= base_url(''); ?>assets/vendor/php-email-form/validate.js"></script>
 <script src="<?= base_url(''); ?>assets/vendor/venobox/venobox.min.js"></script>
 <script src="<?= base_url(''); ?>assets/vendor/waypoints/jquery.waypoints.min.js"></script>
 <script src="<?= base_url(''); ?>assets/vendor/counterup/counterup.min.js"></script>
 <script src="<?= base_url(''); ?>assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
 <script src="<?= base_url(''); ?>assets/vendor/owl.carousel/owl.carousel.min.js"></script>
 <script src="<?= base_url('') ?>assets/vendor/select2/js/select2.min.js"></script>
 <!-- Template Main JS File -->
 <script src="<?= base_url(''); ?>assets/js/main.js"></script>
 <script>

	$(document).ready(function () {
		$('.js-example-basic-single').select2();
	});
	 
 	$(".custom-file-input").on('change', function () {

 		if (typeof (FileReader) != "undefined") {

 			var image_holder = $("#image-holder");
 			image_holder.empty();

 			var reader = new FileReader();
 			reader.onload = function (e) {
 				$("<img />", {
 					"src": e.target.result,
 					"class": "img-fluid img-thumbnail",
 					"width": "100%"

 				}).appendTo(image_holder);

 			}
 			image_holder.show();
 			reader.readAsDataURL($(this)[0].files[0]);
 		} else {
 			alert("This browser does not support FileReader.");
 		}
 	});

 	$(".custom-file-input2").on('change', function () {

 		if (typeof (FileReader) != "undefined") {

 			var image_holder2 = $("#image-holder2");
 			image_holder2.empty();

 			var reader = new FileReader();
 			reader.onload = function (e) {
 				$("<img />", {
 					"src": e.target.result,
 					"class": "img-fluid img-thumbnail",
 					"width": "100%"

 				}).appendTo(image_holder2);

 			}
 			image_holder2.show();
 			reader.readAsDataURL($(this)[0].files[0]);
 		} else {
 			alert("This browser does not support FileReader.");
 		}
 	});	
 </script>

 </body>

 </html>
