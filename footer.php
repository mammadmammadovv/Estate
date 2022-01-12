<footer id="footer" class=" custom-background-color-1">
	<div class="container">
		<div class="row">
			<div class="col-lg-3">
				<h4 class="mb-3"><?php echo $settingpull['setting_title'] ?></h4>
				<p class="custom-color-2 mb-0">
					<?php echo $settingpull['setting_adress'] ?><br>
					Phone : <?php echo $settingpull['setting_phone'] ?><br>
					Email : <a class="text-color-secondary" href="mailto:mail@example.com"><?php echo $settingpull['setting_mail'] ?></a>
				</p>
			</div>
			<div class="col-lg-2">
				<h4 class="mb-3">Satılma növü</h4>
				<nav class="nav-footer">
					<ul class="custom-list-style-1 mb-0">
						<li>
							<a href="estate_properties.php" class="custom-color-2 text-decoration-none">
								Satılır
							</a>
						</li>
						<li>
							<a href="estate_properties.php" class="custom-color-2 text-decoration-none">
								Kirayə
							</a>
						</li>
					</ul>
				</nav>
			</div>
			<div class="col-lg-2">
				<h4 class="mb-3">Linklər</h4>
				<nav class="nav-footer">
					<ul class="custom-list-style-1 mb-0">
						<?php
						$menulistquery = $db->prepare("SELECT * FROM menus ORDER BY menu_up ASC");
						$menulistquery->execute();
						while ($menulistpull = $menulistquery->fetch(PDO::FETCH_ASSOC)) { ?>
							<li>
								<a href="<?php echo $menulistpull['menu_url'] ?>" class="custom-color-2 text-decoration-none">
									<?php echo $menulistpull['menu_name'] ?>
								</a>
							</li>
						<?php } ?>
					</ul>
				</nav>
			</div>
		</div>
	</div>
	<div class="footer-copyright custom-background-color-1 pb-0">
		<div class="container">
			<div class="row pt-3 pb-3">
				<div class="col-lg-12 left m-0">
					<p><?php echo $settingpull['setting_title'] ?></p>
				</div>
			</div>
		</div>
	</div>
</footer>
</div>
</div>

<!-- -------------------------------------------------------- -->

<!-- Vendor -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/jquery/jquery.maskedinput.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="vendor/common/common.min.js"></script>
<script src="vendor/jquery.validation/jquery.validation.min.js"></script>
<script src="vendor/isotope/jquery.isotope.min.js"></script>
<script src="vendor/owl.carousel/owl.carousel.min.js"></script>

<!-- Theme Base, Components and Settings -->
<script src="js/theme.js"></script>
<script src="js/custom.js"></script>
<!-- Current Page Vendor and Views -->

<!-- Current Page Vendor and Views -->
<script src="js/views/view.contact.js"></script>

<!-- Demo -->
<script src="js/demos/demo-real-estate.js"></script>


<!-- Theme Initialization Files -->
<script src="js/theme.init.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>




<script async defer type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=<?php echo $settingpull['setting_googlemap'] ?>&callback=initMap"></script>
	


<script>
	$(document).ready(function() {
		if (window.File && window.FileList && window.FileReader) {
			$("#files").on("change", function(e) {
				var files = e.target.files,
					filesLength = files.length;
				for (var i = 0; i < filesLength; i++) {
					var f = files[i]
					var fileReader = new FileReader();
					fileReader.onload = (function(e) {
						var file = e.target;
						$("<span class=\"pip\">" +
							"<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
							"<br/><span class=\"remove\"><i style=\"color:red;\" class=\"fas fa-times\"></i></span>" +
							"</span>").insertAfter("#files");
						$(".remove").click(function() {
							$(this).parent(".pip").remove();
						});
					});
					fileReader.readAsDataURL(f);
				}
				console.log(files);
			});
		} else {
			alert("Your browser doesn't support to File API")
		}
	});
</script>

<script>
	$('#phone').mask("(99) 999-99-99");
</script>

<!-- <script type="text/javascript">
	$("#demo-form2").submit(function() {
		$refresh = true;
		$(this).find(".required").each(function() {
			if ($(this).val() == "") {
				$refresh = false;
				$(this).addClass("blank").siblings(".red").children("small").html("Bu xana boş buraxıla bilməz...");
			} else {
				$(this).removeClass("blank").siblings(".red").children("small").html("Bu xana boş buraxıla bilməz...");
			}
		});
		return $refresh;
	})
</script> -->


<!-- Google Analytics: Change UA-XXXXX-X to be your site's ID. Go to http://www.google.com/analytics/ for more information.
		<script>
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		
			ga('create', 'UA-12345678-1', 'auto');
			ga('send', 'pageview');
		</script>
		 -->


</body>

</html>