
<style type="text/css">
	<?
	foreach ($banner_list as $key => $value) {
		?>
		.slider__wrapper .slider .item_<?=$value->id?>{
			background-image: url(<?=site_url("media/banner/".$value->main_pic)?>)!important;
		}
		<?
	}
	?>
	
</style>

<main>
	<!-- slider__wrapper -->
	<div class="slider__wrapper">
		<div id="slider" class="slider carousel slide" data-ride="carousel">
	    <ol class="carousel-indicators">
	      <?
	    	foreach ($banner_list as $key => $value) {
	    		$active="";
	    		if ($key==0) {
	    			$active="active";
	    		}
	    		?>
	    		<li data-target="#slider" data-slide-to="<?=$key?>" class="<?=$active?>"></li>
	    		<?
	    	}
	    	?>
	    </ol>
	    <div class="carousel-inner">
	    	<?
	    	foreach ($banner_list as $key => $value) {
	    		$active="";
	    		if ($key==0) {
	    			$active="active";
	    		}
	    		?>
	    		<div class="carousel-item slider__item slider__item1 item_<?=$value->id?> <?=$active?>">
			        <div class="carousel-caption d-block slider__caption">
			          <h1 class="slider__head"><?=$value->title?></h1>
			          <p><?=$value->des?></p>
			        </div>
			      </div>
	    		<?
	    	}
	    	?>
	    </div>
	  </div>
	</div>
	<!-- end slider__wrapper -->


	<!-- gallery__wrapper -->
	<div class="gallery__wrapper">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="owl-carousel owl-theme" id="gallery__carousel">
						<?
						foreach ($item as $key => $value) {
							?>
							<div class="gallery">
							  	<figure>
							  		<img src="<?=site_url('media/gallery/'.$value->filepath)?>" class="img-fluid" alt="Image1">
							  	</figure>
							  </div>
							<?
						}
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end gallery__wrapper -->


	<!-- aboutus__wrapper -->
	<div class="container">
		<div class="aboutus__wrapper">
			<h1 class="aboutus__title"><?=$contact->gal_header?></h1>
			<p><?=$contact->gal_des?></p>
		</div>
	</div>
	<!-- end aboutus__wrapper -->


	<!-- maid__wrapper -->
	<div class="maid__wrapper">
		<div class="container">
			<div class="row no-gutters">
				<?
				for ($i=0; $i <3 ; $i++) { 
					?>
					<div class="col-md-4">
						<a href="<?=site_url("maid_detail/".$maid_list[$i]->id)?>" class="maid__card" title="<?=$maid_list[$i]->maid_name?>">
							<figure>
								<img src="<?=site_url("media/maid/".$maid_list[$i]->main_pic)?>" class="img-fluid maid__image" alt="Maid 1">
								<div class="sheep">
									<img src="<?=site_url()?>img/sheep.png">
								</div>
							</figure>
							<h2 class="maid__name"><?=$maid_list[$i]->maid_name?></h2>
							<p class="maid__detail"><?=$maid_list[$i]->maid_short_des?></p>
							<div class="button__wrapper">
								<button class="btn btn--dark">ดูรายละเอียดเพิ่มเติม</button>
							</div>
						</a>
					</div>
					<?
				}
				?>
			</div>
			<div class="seemore__wrapper">
				<button class="btn btn--seemore float-right" onclick="location.href='<?=site_url("maid_list")?>';">ดูพนักงานทั้งหมด</button>
			</div>
		</div>
	</div>
	<!-- end maid__wrapper -->


	<!-- contact__wrapper -->
	<div class="contact__wrapper" id="contact">
		<div class="container">
			<div class="row no-gutters">
				<div class="col-lg-4 contact--bg">
					<div class="contact__card">
						<h1 class="contact__title">ติดต่อเรา</h1>
						<p>โทรศัพท์: <a href="tel:<?=$contact->phone?>"><?=$contact->phone?></a></p>
						<p>มือถือ: <a href="tel:<?=$contact->mobile?>"><?=$contact->mobile?></a></p>
						<p>อีเมล์:	<a href="mailto:<?=$contact->email?>"><?=$contact->email?></a></p>
						<br><br><br><br><br><br><br><br><br><br>
						<!--<div class="second__contact">
							<p>โทรศัพท์: <a href="tel:02-XXX-XXX">02-XXX-XXX</a></p>
							<p>มือถือ: <a href="tel:08X-XXX-XXXX">	08X-XXX-XXXX</a></p>
							<p>อีเมล์:	<a href="mailto:lorem_ipsum@gmail.com">lorem_ipsum@gmail.com</a></p>
						</div>-->
					</div>
				</div>
				<div class="col-lg-8">
					<div class="contact__map">
						<div id="map"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end contact__wrapper -->

</main>  
