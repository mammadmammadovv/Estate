<?php include 'header.php';
$minPrice = $_GET['minPrice'];
$maxPrice = $_GET['maxPrice'];
$saleType = $_GET['propertiesSaleType'];
$saleCity = $_GET['estate_city'];
?>


<div role="main" class="main">


	<?php if ($settingpull['setting_slider'] == "1") {
		include 'slider.php';
	} ?>
	<div class="container">
		<div class="row mt-5">
			<?php include 'estates.php' ?>
		</div>
	</div>

	<?php include 'footer.php'; ?>