<?php include 'header.php';
$estate_id = $_GET['estate_id'];
$estatequery = $db->prepare("SELECT * , cities.city_name FROM estates LEFT JOIN cities ON estates.city_id = cities.city_id WHERE estate_id=:estate_id");
$estatequery->bindParam(":estate_id",$estate_id,PDO::PARAM_INT);
$estatequery->execute();
$estatepull = $estatequery->fetch(PDO::FETCH_ASSOC); ?>
<div role="main" class="main">
	<section class="page-header page-header-light page-header-more-padding">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-6">
					<h1><?php echo $estatepull['estate_adress'] ?><span><?php echo $estatepull['estate_name'] ?> - <a href="#map" data-hash data-hash-offset="100">(Map Location)</a></span></h1>
				</div>

			</div>
		</div>
	</section>

	<div class="container">
		<div class="row pb-5 pt-3">
			<div class="col-lg-9">
				<div class="row">
					<div class="col-lg-7">
						<span class="thumb-info-listing-type thumb-info-listing-type-detail background-color-secondary text-uppercase text-color-light font-weight-semibold p-2 pl-3 pr-3">
							<?php echo $estatepull['estate_sale'] ?>
						</span>
						<div class="thumb-gallery">
							<div class="lightbox" data-plugin-options="{'delegate': 'a', 'type': 'image', 'gallery': {'enabled': true}}">
								<div class="owl-carousel owl-theme manual thumb-gallery-detail show-nav-hover" id="thumbGalleryDetail">
									<?php
									$imagequery = $db->prepare("SELECT * FROM estate_image WHERE estate_id=$estate_id");
									$imagequery->execute();
									while ($imagepull = $imagequery->fetch(PDO::FETCH_ASSOC)) { ?>
										<div>
											<a href="<?php echo $imagepull['image_url'] ?>">
												<span class="thumb-info thumb-info-centered-info thumb-info-no-borders text-4">
													<span class="thumb-info-wrapper text-4">
														<img alt="Property Detail" src="<?php echo $imagepull['image_url'] ?>" class="img-fluid">
														<span class="thumb-info-title text-4">
															<span class="thumb-info-inner text-4"><i class="icon-magnifier icons text-4"></i></span>
														</span>
													</span>
												</span>
											</a>
										</div>
									<?php } ?>
								</div>
							</div>
							<div class="owl-carousel owl-theme manual thumb-gallery-thumbs mt" id="thumbGalleryThumbs">
								<?php
								$imagequery = $db->prepare("SELECT * FROM estate_image WHERE estate_id=$estate_id");
								$imagequery->execute();
								while ($imagepull = $imagequery->fetch(PDO::FETCH_ASSOC)) { ?>
									<div>
										<img style="width:106px; height:137px" alt="Property Detail" src="<?php echo $imagepull['image_url'] ?>" class="img-fluid cur-pointer">
									</div>
								<?php } ?>
							</div>
						</div>
					</div>
					<div class="col-lg-5">
						<table class="table table-striped">
							<colgroup>
								<col width="35%">
								<col width="65%">
							</colgroup>
							<tbody>
								<tr>
									<td class="background-color-primary text-light align-middle">
										Qiyməti
									</td>
									<td class="text-4 font-weight-bold align-middle background-color-primary text-light">
										<?php echo $estatepull['estate_price'] . " ₼" ?>
									</td>
								</tr>
								<tr>
									<td>
										Elan nömrəsi
									</td>
									<td>
										#<?php echo $estatepull['estate_id'] ?>
									</td>
								</tr>
								<tr>
									<td>
										Şəhər
									</td>
									<td>
										<?php echo $estatepull['city_name'] ?>
									</td>
								</tr>
								<tr>
									<td>
										Address
									</td>
									<td>
										<?php echo $estatepull['estate_adress'] ?><br><a href="#map" class="text-2" data-hash data-hash-offset="100">(Xəritədə bax)</a>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<h4 class="mt-3 mb-3">Elan haqqında</h4>
						<p><?php echo $estatepull['estate_description'] ?></p>
						<hr class="solid tall">
						<h4 class="mt-3 mb-3" >Xəritə yeri</h4>
						<div id="map"></div>
					</div>
				</div>
			</div>
			<div class="col-lg-3">
				<aside class="sidebar">
					<div class="agents text-color-light text-center">
						<h4 class="text-light pt-5 m-0">Elan Sahibi</h4>
						<div class="owl-carousel   pl-1 pr-1 pt-3 m-0" data-plugin-options="{'items': 1}">
							<div class="pr-2 pl-2">
								<span class="agent-infos text-light pt-3">
									<strong class="text-uppercase font-weight-bold"><?php echo $estatepull['estate_owner_name'] . ' ' . $estatepull['estate_owner_surname'] ?></strong>
									<span class="font-weight-light"><?php echo $estatepull['estate_owner_phone'] ?></span>
									<span class="font-weight-light"><?php echo $estatepull['estate_owner_mail'] ?></span>
								</span>
								<hr>
							</div>
						</div>
					</div>
				</aside>
			</div>
		</div>
	</div>
	<?php include 'footer.php' ?>