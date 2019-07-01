
<main>

	<!-- maid__listing__outter -->
	<div class="maid__listing__outter">
		<div class="maid__listing__inner">
			
			<ul class="maid__listing">
				<?
				foreach ($maid_list as $key => $value) {
					?>
					<li>
						<a href="<?=site_url("maid_detail/".$value->id)?>">
							<div class="container-fluid maid__card" title="<?=$value->maid_name?>">
								<div class="row">
									<div class="col-lg-3">
										<figure>
											<img src="<?=site_url("media/maid/".$value->thumb_pic)?>" class="img-fluid maid__image" alt="Maid 1">
										</figure>
									</div>
									<div class="col-lg-9">
										<h2 class="maid__name"><?=$value->maid_name?></h2>
										<p class="maid__detail"><?=$value->maid_short_des?></p>
										<div class="button__wrapper">
											<button class="btn btn--dark">ดูรายละเอียดเพิ่มเติม</button>
										</div>
									</div>
								</div>
								<div class="sheep">
									<img src="<?=site_url()?>img/sheep2.png">
								</div>
							</div>
						</a>
					</li>
					<?
				}
				?>
				
			</ul>
			
		</div>
	</div>
	<!-- end maid__listing__outter -->


</main>  

