<?php include 'control/netting/connection.php';
include 'control/production/function.php';
$setting_id = 0;
$settingquery = $db->prepare("SELECT * FROM settings WHERE setting_id=:setting_id");
$settingquery->bindParam(":setting_id",$setting_id,PDO::PARAM_INT);
$settingquery->execute();
$settingpull = $settingquery->fetch(PDO::FETCH_ASSOC);
?>



<!DOCTYPE html>
<html>

<head>

	<!-- Basic -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<title><?php echo $settingpull['setting_title'] ?></title>

	<meta name="keywords" content="HTML5 Template" />
	<meta name="description" content="Porto - Responsive HTML5 Template">
	<meta name="author" content="okler.net">

	
	<!-- Favicon -->
	<link rel="shortcut icon" href="img/demos/real-estate/favicon-estate.png" type="image/x-icon" />
	<link rel="apple-touch-icon" href="img/apple-touch-icon.png">

	<!-- Mobile Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">

	<!-- Web Fonts  -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800%7CShadows+Into+Light" rel="stylesheet" type="text/css">

	<!-- Vendor CSS -->
	<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="vendor/font-awesome/css/fontawesome-all.min.css">
	<link rel="stylesheet" href="vendor/animate/animate.min.css">
	<link rel="stylesheet" href="vendor/simple-line-icons/css/simple-line-icons.min.css">
	<link rel="stylesheet" href="vendor/owl.carousel/assets/owl.carousel.min.css">
	<link rel="stylesheet" href="vendor/owl.carousel/assets/owl.theme.default.min.css">
	<link rel="stylesheet" href="vendor/magnific-popup/magnific-popup.min.css">

	<!-- Theme CSS -->
	<link rel="stylesheet" href="css/theme.css">
	<link rel="stylesheet" href="css/theme-elements.css">
	<link rel="stylesheet" href="css/theme-blog.css">
	<link rel="stylesheet" href="css/theme-shop.css">

	<!-- Current Page CSS -->
	<link rel="stylesheet" href="vendor/rs-plugin/css/settings.css">
	<link rel="stylesheet" href="vendor/rs-plugin/css/layers.css">
	<link rel="stylesheet" href="vendor/rs-plugin/css/navigation.css">

	<!-- Demo CSS -->
	<link rel="stylesheet" href="css/demos/demo-real-estate.css">

	<!-- Skin CSS -->
	<link rel="stylesheet" href="css/skins/skin-real-estate.css">

	<!-- Theme Custom CSS -->
	<link rel="stylesheet" href="css/custom.css">

	<!-- Head Libs -->
	<script src="vendor/modernizr/modernizr.min.js"></script>

	<style>
		#map{
			width: 100%;
			height: 400px;
		}

		.pagination_btn{
			padding:10px;  
			margin:0px 2px;
		}

		.pagination_active{
			color: white !important;;
			background:#333b48 ;
			padding:10px;  
			margin:0px 2px;
		}

		 .input-manat {
     		position: relative;
 		}
 
 		.input-manat.right input {
     		padding-right:18px;
     		text-align:end; 
 }

 .input-manat:before {
     position: absolute;
     top: 0;
     content:"₼";
 }
 .input-manat.right:before {
     right: 5px;
 }
		input[type="file"] {
  display: block;
}
.imageThumb {
  max-height: 75px;
  border: 2px solid;
  padding: 1px;
  cursor: pointer;
}
.pip {
  display: inline-block;
  margin: 10px 10px 0 0;
}
.remove {
  display: block;
  color: white;
  text-align: center;
  cursor: pointer;
}
.remove:hover {
  background: white;
  color: black;
}
		.red {
			color: red;
		}

		.blank {
			border: 1px solid red;
		}
	</style>
</head>

<body class="loading-overlay-showing" data-loading-overlay>
	

	<div class="body">
		<header id="header" data-plugin-options="{'stickyEnabled': true, 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': true, 'stickyStartAt': 37, 'stickySetTop': '-37px', 'stickyChangeLogo': false}">
			<div class="header-body background-color-primary pt-0 pb-0">
				<div class="header-top header-top-style-3 header-top-custom background-color-primary">
					<div class="container">
						<div class="header-row">
							<div class="header-column justify-content-start">
								<div class="header-row">
									<nav class="header-nav-top">
										<ul class="nav nav-pills">
											<li class="d-none d-md-block">
												<span class="ws-nowrap"><i class="icon-location-pin icons"></i><?php echo $settingpull['setting_adress'] ?></span>
											</li>
											<li>
												<span class="ws-nowrap"><i class="icon-call-out icons"></i> <?php echo $settingpull['setting_phone'] ?></span>
											</li>
											<li class="d-none d-md-block">
												<span class="ws-nowrap"><i class="icon-envelope-open icons"></i> <a class="text-decoration-none" href="mailto:mail@example.com"><?php echo $settingpull['setting_mail'] ?></a></span>
											</li>
										</ul>
									</nav>
								</div>
							</div>
							<div class="header-column justify-content-end">
								<div class="header-row">
									<nav class="header-nav-top langs mr-0">
										<ul class="nav nav-pills">

											<li class="blog">
												<a class="nav-link" href="#">
													Blog/Xəbərlər
												</a>
											</li>
										</ul>
									</nav>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="header-container container custom-position-initial">
					<div class="header-row">
						<div class="header-column">
							<div class="header-row">
								<div class="header-logo">
									<a href="index.php">
										<img alt="Porto" width="143" height="40" src="<?php echo $settingpull['setting_logo'] ?>">
									</a>
								</div>
							</div>
						</div>
						<div class="header-column justify-content-end">
							<div class="header-row">
								<div class="header-nav header-nav-stripe">
									<div class="header-nav-main header-nav-main-effect-1 header-nav-main-sub-effect-1 m-0">
										<nav class="collapse">
											<ul class="nav nav-pills" id="mainNav">
												<?php
												$menu_id = 0;
												$menuquery = $db->prepare("SELECT * FROM menus WHERE menu_up=:menu_id ORDER BY menu_row ASC");
												$menuquery->bindParam(":menu_id",$menu_id,PDO::PARAM_INT);
												$menuquery->execute();
												while ($menupull = $menuquery->fetch(PDO::FETCH_ASSOC)) {
													$sub_menu_id = $menupull['menu_id'];
													$submenuquery = $db->prepare("SELECT * FROM menus WHERE menu_up=:menu_id ORDER BY menu_row ASC");
													$submenuquery->bindParam(":menu_id",$sub_menu_id,PDO::PARAM_INT);
													$submenuquery->execute();
													$count = $submenuquery->rowCount();
												?>
													<li class=" <?php if ($count > 0) {
																	echo "dropdown";
																} ?>  dropdown-full-color dropdown-quaternary">
														<a class="nav-link <?php if ($count > 0) {
																				echo "dropdown-toggle";
																			} ?>  " href="<?php echo $menupull['menu_url'] ?>">
															<?php echo $menupull['menu_name'] ?>
														</a>
														<ul class="dropdown-menu">
															<?php while ($submenupull = $submenuquery->fetch(PDO::FETCH_ASSOC)) { ?>
																<li><a class="dropdown-item" href="<?php echo $submenupull['menu_url'] ?>"><?php echo $submenupull['menu_name'] ?></a></li>
															<?php } ?>
														</ul>
													</li>

												<?php } ?>
												<li class="dropdown dropdown-full-color dropdown-quaternary dropdown-mega" id="headerSearchProperties">
													<a class="nav-link dropdown-toggle" href="#">
														Axtarış <i class="fas fa-search"></i>
													</a>
													<ul class="dropdown-menu custom-fullwidth-dropdown-menu">
														<li>
															<div class="dropdown-mega-content">
																<form id="propertiesFormHeader" action="estate_properties.php" method="POST">
																	<div class="container p-0">
																		<div class="form-row">
																			<div class="form-group col-lg-2 mb-0">
																				<div class="form-control-custom">
																					<select class="form-control text-uppercase text-2" name="estate_sale" data-msg-required="This field is required." id="propertiesPropertyType" >
																						<option value="" >Satış növü</option>
																						<option value="Satılır">Satılır</option>
																						<option value="Kirayə">Kirayə</option>
																					</select>
																				</div>
																			</div>
																			<div class="form-group col-lg-2 mb-0">
																				<div class="form-control-custom">
																					<select class="form-control text-uppercase text-2" name="estate_city" data-msg-required="This field is required." id="propertiesLocation" >
																						<option value="" >Şəhər seç</option>
																						<?php $cityquery = $db->prepare("SELECT * FROM cities");
																						$cityquery->execute();
																						while ($citypull = $cityquery->fetch(PDO::FETCH_ASSOC)) { ?>
																							<option value="<?php echo $citypull['city_id'] ?>"><?php echo $citypull['city_name'] ?></option>
																						<?php  }
																						?>
																					</select>
																				</div>
																			</div>
																			<div class="form-group col-lg-2 mb-0">
																				<div class="form-control-custom">
																					<input type="number" name="estate_minPrice" id="propertiesMinPrice" class="form-control input-manat right" placeholder="Min Qiymət">
																					<!-- <select class="form-control text-uppercase text-2" name="estate_minPrice" data-msg-required="This field is required." id="propertiesMinPrice" >
																						<option value="">Min Qiymət</option>
																						<option value="150000">$150,000</option>
																						<option value="200000">$200,000</option>
																						<option value="250000">$250,000</option>
																						<option value="300000">$300,000</option>
																						<option value="350000">$350,000</option>
																						<option value="400000">$400,000</option>
																						<option value="450000">$450,000</option>
																						<option value="500000">$500,000</option>
																						<option value="550000">$550,000</option>
																						<option value="600000">$600,000</option>
																						<option value="650000">$650,000</option>
																						<option value="700000">$700,000</option>
																						<option value="750000">$750,000</option>
																						<option value="800000">$800,000</option>
																						<option value="850000">$850,000</option>
																						<option value="900000">$900,000</option>
																						<option value="950000">$950,000</option>
																						<option value="1000000">$1,000,000</option>
																						<option value="1250000">$1,250,000</option>
																						<option value="1500000">$1,500,000</option>
																						<option value="1750000">$1,750,000</option>
																						<option value="2000000">$2,000,000</option>
																						<option value="2250000">$2,250,000</option>
																						<option value="2500000">$2,500,000</option>
																						<option value="2750000">$2,750,000</option>
																						<option value="3000000">$3,000,000</option>
																						<option value="3250000">$3,250,000</option>
																						<option value="3500000">$3,500,000</option>
																						<option value="3750000">$3,750,000</option>
																						<option value="4000000">$4,000,000</option>
																						<option value="4250000">$4,250,000</option>
																						<option value="4500000">$4,500,000</option>
																						<option value="4750000">$4,750,000</option>
																						<option value="5000000">$5,000,000</option>
																						<option value="6000000">$6,000,000</option>
																						<option value="7000000">$7,000,000</option>
																						<option value="8000000">$8,000,000</option>
																						<option value="9000000">$9,000,000</option>
																						<option value="10000000">$10,000,000</option>
																					</select> -->
																				</div>
																			</div>
																			<div class="form-group col-lg-2 mb-0">
																				<div class="form-control-custom">
																				<input type="number" name="estate_maxPrice" id="propertiesMaxPrice" class="form-control input-manat right" placeholder="Max Qiymət">
																					<!-- <select class="form-control text-uppercase text-2" name="estate_maxPrice" data-msg-required="This field is required." id="propertiesMaxPrice" >
																						<option value="">Max Qiymət</option>
																						<option value="150000">10,000₼</option>
																						<option value="200000">20,000₼</option>
																						<option value="250000">30,000₼</option>
																						<option value="300000">40,000₼</option>
																						<option value="350000">50,000₼</option>
																						<option value="400000">60,000₼</option>
																						<option value="450000">70,000₼</option>
																						<option value="500000">80,000₼</option>
																						<option value="550000">90,000₼</option>
																						<option value="600000">100,000₼</option>
																						<option value="650000">150,000₼</option>
																						<option value="700000">200,000₼</option>
																						<option value="750000">300,000₼</option>
																						<option value="800000">400,000₼</option>
																						<option value="850000">500,000₼</option>
																						<option value="900000">600,000₼</option>
																						<option value="950000">700,000₼</option>
																						<option value="1000000">800,000₼</option>
																						<option value="1250000">900,000₼</option>
																						<option value="1500000">1,000,000₼</option>
																						<option value="1750000">1,100,000₼</option>
																						<option value="2000000">800,000₼</option>
																						<option value="2250000">800,000₼</option>
																						<option value="2500000">800,000₼</option>
																						<option value="2750000">800,000₼</option>
																						<option value="3000000">800,000₼</option>
																						<option value="3250000">800,000₼</option>
																						<option value="3500000">800,000₼</option>
																						<option value="3750000">800,000₼</option>
																						<option value="4000000">800,000₼</option>
																						<option value="4250000">800,000₼</option>
																						<option value="4500000">800,000₼</option>
																						<option value="4750000">800,000₼</option>
																						<option value="5000000">800,000₼</option>
																						<option value="6000000">800,000₼</option>
																						<option value="7000000">800,000₼</option>
																						<option value="8000000">800,000₼</option>
																						<option value="9000000">800,000₼</option>
																						<option value="10000000">$10,000,000</option>
																					</select> -->
																				</div>
																			</div>
																			<div class="form-group col-lg-2 mb-0">
																				<input type="submit" name="searchfilter" value="Search Now" class="btn btn-secondary btn-lg btn-block text-uppercase text-2">
																			</div>
																		</div>
																	</div>
																</form>
															</div>
														</li>
													</ul>
												</li>
												<li class="  dropdown-full-color dropdown-quaternary">
													<a class="nav-link" href="estate_add.php">
														Elan yerləşdir
													</a>
												</li>
											</ul>
										</nav>
									</div>
									<button class="btn header-btn-collapse-nav" data-toggle="collapse" data-target=".header-nav-main nav">
										<i class="fas fa-bars"></i>
									</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</header>