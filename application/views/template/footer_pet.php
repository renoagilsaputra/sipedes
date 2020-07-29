</main>
		</div>
	</div>


	<script src="<?= base_url(''); ?>assets/vendor/jquery/jquery.min.js"></script>
	<script src="<?= base_url(''); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="<?= base_url('') ?>assets/vendor/select2/js/select2.min.js"></script>
	<script>
		
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

		function printlayer(layer) {
			var printContents = document.getElementById(layer).innerHTML;
			var originalContents = document.body.innerHTML;

			document.body.innerHTML = printContents;
			window.print();
			document.body.innerHTML = originalContents;
		}

		$(document).ready(function () {
            $('.js-example-basic-single').select2();
        });
	</script>
</body>

</html>
