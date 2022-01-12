<div class="slider-container light rev_slider_wrapper" style="height: 650px;">
					<div id="revolutionSlider" class="slider rev_slider" data-version="5.4.7" data-plugin-revolution-slider data-plugin-options="{'delay': 9000, 'gridwidth': 1170, 'gridheight': 650, 'disableProgressBar': 'on', 'navigation': {'arrows': {'enable': true, 'left':{'container':'slider','h_align':'right','v_align':'center','h_offset':20,'v_offset':-80},'right':{'container':'slider','h_align':'right','v_align':'center','h_offset':20,'v_offset':80}}}}">
						<div class="slides-number d-none d-sm-block">
							<span class="atual">1</span>
							<span class="total">3</span>
						</div>
						<ul>
							<?php
							$estatequery = $db->prepare("SELECT * FROM estates WHERE estate_show = '1' ORDER BY estate_date DESC LIMIT 3 ");
							$estatequery->execute();

							while ($estatepull = $estatequery->fetch(PDO::FETCH_ASSOC)) {
                    $estate_id = $estatepull['estate_id'];
                    $imagequery=$db->prepare("SELECT * FROM estate_image  WHERE estate_id = :estate_id");
					$imagequery->bindParam(":estate_id",$estate_id,PDO::PARAM_INT);
                    $imagequery->execute();
                    $imagepull = $imagequery->fetch(PDO::FETCH_ASSOC);
                    ?>
								
						 
							<li data-transition="fade">
								<img src="<?php echo $imagepull['image_url'] ?>"  
									alt=""
									data-bgposition="center center" 
									data-bgfit="cover" 
									data-bgrepeat="no-repeat"
									class="rev-slidebg">

								<div class="tp-caption tp-shape tp-shapewrapper tp-resizeme skrollable skrollable-after" 
									id="slide-529-layer-2" 
									data-x="left" data-hoffset="15"
									data-y="center" data-voffset="0"
									data-width="360" 
									data-height="360" 
									data-whitespace="nowrap" 
									data-transform_idle="o:1;" 
									data-transform_in="z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;s:1500;e:Power3.easeOut;" 
									data-transform_out="x:left;s:1200;e:Power3.easeInOut;" 
									data-start="500" 
									data-responsive_offset="on" 
									style="background-color: rgb(255, 255, 255); padding: 30px; overflow: hidden;">
										<span class="featured-border" style="border: 2px solid #dcdde0; width: 90%; position: absolute; height: 90%; top: 5%; left: 5%;"></span>
										<span class="feature-tag" data-width="50" data-height="50" style="background: #2bca6e; color: #FFF; text-transform: uppercase; padding: 15px 102px; position: absolute; right: -24%; top: 6%; -webkit-transform: rotate(45deg); -moz-transform: rotate(45deg); -ms-transform: rotate(45deg); -o-transform: rotate(45deg); transform: rotate(45deg);">
											Yeni əlavələr
										</span>
									</div>

								<div class="tp-caption main-label"
									data-x="left" data-hoffset="35"
									data-y="center" data-voffset="-50"
									data-start="1500"
									data-whitespace="nowrap"						 
									data-transform_in="y:[-100%];s:500;"
									data-transform_out="opacity:0;s:500;"
									data-textAlign="center" 
									style="z-index: 5; font-size: 1.9em; color: #000; text-transform: uppercase; font-weight: 900; text-shadow: none; width: 27vw; max-width: 320px;"
									data-mask_in="x:0px;y:0px;"><?php echo $estatepull['estate_name'] ?></div>

								<div class="tp-caption"
									data-x="left" data-hoffset="35"
									data-y="center" data-voffset="0"
									data-start="1500"
									data-height="44"
									data-whitespace="nowrap"						 
									data-transform_idle="o:1;" 
									data-transform_in="z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;s:1500;e:Power3.easeOut;" 
									data-transform_out="x:left;s:1200;e:Power3.easeInOut;"
									data-textAlign="center" 
									style="z-index: 5; font-size: 3em; font-weight: 400; text-transform: uppercase;  color: #219cd2; line-height: 0.8em; width: 27vw; max-width: 320px;"
									data-mask_in="x:0px;y:0px;"><?php echo $estatepull['estate_price']."₼" ?></div>

								<a class="tp-caption slide-button btn"
									href="estate_detail.php?estate_id=<?php echo $estatepull['estate_id'] ?>" 
									data-x="left" data-hoffset="108"
									data-y="center" data-voffset="60"
									data-start="1500"
									data-whitespace="nowrap"						 
									data-transform_in="y:[100%];s:500;"
									data-transform_out="opacity:0;s:500;"
									style="z-index: 5; font-size: 1em; text-transform: uppercase; background: #219cd2;  padding: 12px 35px; color: #FFF;"
									data-mask_in="x:0px;y:0px;">ƏTRAFLI BAX</a>
							</li>
							<?php	} ?>
						</ul>
					</div>
				</div>