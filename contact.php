<?php include 'header.php' ?>
<div role="main" class="main">
				
				<section class="page-header page-header-light page-header-more-padding">
					<div class="container">
						<div class="row align-items-center">
							<div class="col-lg-6">
								<h1>Əlaqə</h1>
							</div>
						</div>
					</div>
				</section>

				<div class="container">

					<div class="row">
						<div class="col-lg-8">

							<h4 class="heading-primary mt-4">Əlaqə saxla</h4>

							<div class="alert alert-success d-none mt-4" id="contactSuccess">
								 Mesajınız uğurla göndərildi.
							</div>

							<div class="alert alert-danger d-none mt-4" id="contactError">
								<strong>Xəta!</strong> Mesaj göndərilən zaman xəta baş verdi.
								<span class="text-1 mt-2 d-block" id="mailErrorMessage"></span>
							</div>

							<form id="contactForm" action="php/contact-form.php" method="POST">
								<input type="hidden" value="Contact Form" name="subject" id="subject">
								<div class="form-row">
									<div class="form-group col-lg-6">
										<label>Ad *</label>
										<input type="text" value="" data-msg-required="Please enter your name." maxlength="100" class="form-control" name="name" id="name" required>
									</div>
									<div class="form-group col-lg-6">
										<label>E-poçt *</label>
										<input type="email" value="" data-msg-required="Please enter your email address." data-msg-email="Please enter a valid email address." maxlength="100" class="form-control" name="email" id="email" required>
									</div>
								</div>
								<div class="form-row">
									<div class="form-group col">
										<label>Mesaj *</label>
										<textarea maxlength="5000" data-msg-required="Please enter your message." rows="5" class="form-control" name="message" id="message" required></textarea>
									</div>
								</div>
								<div class="form-row">
									<div class="form-group col">
										<input type="submit" value="Send Message" class="btn btn-secondary mb-4" data-loading-text="Loading...">
									</div>
								</div>
							</form>
						</div>
						<div class="col-lg-4">

							<h4 class="heading-primary mt-4">Ofis</h4>
							<ul class="list list-icons mt-3">
								<li>
									<a href="mailto:mail@domain.com">
										<i class="icon-envelope-open icons"></i> <?php echo $settingpull['setting_mail'] ?>
									</a>
								</li>
								<li>
									<a href="#">
										<i class="icon-call-out icons"></i> <?php echo $settingpull['setting_phone'] ?>
									</a>
								</li>
								<li>
									<a href="<?php echo $settingpull['setting_twitter'] ?>">
										<i class="icon-social-twitter icons"></i> Twitter
									</a>
								</li>
								<li>
									<a href="<?php echo $settingpull['setting_facebook'] ?>">
										<i class="icon-social-facebook icons"></i> Facebook
									</a>
								</li>
							</ul>

							<hr class="solid mt-5 mb-5">

							<h4 class="heading-primary">İş vaxtları </i></h4>
							<ul class="list list-icons mt-3">
								<li><?php echo $settingpull['setting_working_hours'] ?></li>
								
							</ul>

						</div>

					</div>

				</div>

				<!-- Google Maps - Go to the bottom of the page to change settings and map location. -->
				<div id="map" class="google-map mt-5 mb-0"></div>

				
			</div>

            <?php include 'footer.php' ?>