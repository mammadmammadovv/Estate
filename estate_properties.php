<?php include 'header.php';
 $_POST['estate_sale'];
 $_POST['estate_city'];
 $_POST['estate_minPrice'];
 $_POST['estate_maxPrice'];  ?>
			<div role="main" class="main">
				
				<section class="page-header page-header-light page-header-more-padding">
					<div class="container">
						<div class="row align-items-center">
							<div class="col-lg-6">
								<h1>Axtarış <p class="lead mb-0"></p></h1>
							</div>
						</div>
						<div class="row mt-4">
							<div class="col">

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
																				<input type="text" name="estate_minPrice" id="propertiesMinPrice" class="form-control input-manat right" placeholder="Min Qiymət">
																					
																				</div>
																			</div>
																			<div class="form-group col-lg-2 mb-0">
																				<div class="form-control-custom">
																				<input type="text" name="estate_maxPrice" id="propertiesMaxPrice" class="form-control input-manat right" placeholder="Max Qiymət">
																					
																				</div>
																			</div>
																			<div class="form-group col-lg-2 mb-0">
																				<input type="submit" name="searchfilter" value="Search Now" class="btn btn-secondary btn-lg btn-block text-uppercase text-2">
																			</div>
																		</div>
																	</div>
																</form>
							</div>
						</div>
					</div>
				</section>

				<div class="container">
                <div class="row mt-5">
					<?php include 'estates.php' ?>
            <?php include 'rightbar.php' ?>
        </div>

					

				</div>

				<?php include 'footer.php' ?>