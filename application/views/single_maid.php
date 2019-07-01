<main>

	<!-- post__wrapper -->
	<div class="post__wrapper">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<figure>
						<img src="<?=site_url("media/maid/".$maid->main_pic)?>" class="img-fluid maid__image" alt="Maid 1">
					</figure>
				</div>
				<div class="col-lg-6">
					<div class="post__summary">
						<h2 class="post__title"><?=$maid->maid_name?></h2>
						<ul class="post__list">
							<?
							$work_list=explode("-and-", $maid->maid_list_des);
							foreach ($work_list as $key => $value) {
								?>
								<li>• <?=$value?></li>
								<?
							}
							?>							
						</ul>
					</div>
				</div>
			</div>
			<div class="row post__detail">
				<div class="col-lg-12">
					<?
					$skull=str_replace("\n","<br>",$maid->maid_description);
					?>
					<p><?=$skull?></p>
				</div>
			</div>
		</div>
	</div>
	<!-- end post__wrapper -->


	<!-- strip -->
	<div class="strip">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<h3>ดูพนักงานคนอื่น</h3>
				</div>
			</div>
		</div>
	</div>
	<!-- end strip -->


	<!-- maid__wrapper -->
	<div class="maid__wrapper single__post">
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
		</div>
	</div>
	<!-- end maid__wrapper -->


</main>  
