
	<footer>
		<div class="container">
			<div class="row">
				<div class="col-lg-8">
					<p class="footer__copyright">Copyright <i class="far fa-copyright"></i> 2019 Opalex. All rights reserved.</p>
				</div>
				<div class="col-lg-4">
					<div class="footer__social">
						<div class="social">
							<a href="mailto:<?=$contact->email?>">
								<i class="far fa-envelope"></i>
							</a>
						</div>

						<div class="social">
							<a href="<?=$contact->twister?>">
								<i class="fab fa-twitter"></i>
							</a>
						</div>

						<div class="social">
							<a href="<?=$contact->facebook?>">
								<i class="fab fa-facebook-f"></i>
							</a>
						</div>

						<div class="social">
							<a href="tel:<?=$contact->phone?>">
								<i class="fas fa-phone"></i>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>

</div>
<!-- end wrapper -->

	<!-- js -->
	<script src="<?=site_url()?>owlcarousel/owl.carousel.min.js"></script>

	<script src="<?=site_url()?>js/main.js"></script>

  </body>
</html>