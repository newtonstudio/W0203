<!-- breadcrumb start -->
			<!-- ================ -->
			<div class="breadcrumb-container">
				<div class="container">
					<ol class="breadcrumb">
						<li><i class="fa fa-home pr-10"></i><a href="<?=base_url()?>">Home</a></li>
						<li class="active">Thank You</li>
					</ol>
				</div>
			</div>
			<!-- breadcrumb end -->

			<!-- main-container start -->
			<!-- ================ -->
			<section class="main-container">

				<div class="container">
					<div class="row">

						<!-- main start -->
						<!-- ================ -->
						<div class="main col-md-8 col-md-offset-2">

							<?php
							if($poData['pay_status'] == 1) {
							?>

							<!-- page-title start -->
							<!-- ================ -->
							<h1 class="page-title text-center">Thank You <i class="fa fa-smile-o pl-10"></i></h1>
							<div class="separator"></div>
							<!-- page-title end -->
							<p class="lead text-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis a deleniti sequi necessitatibus, rem asperiores, magnam labore ullam sint placeat excepturi. Vero corrupti consequuntur id eum esse, rerum, iure neque.</p>
							<p class="text-center">
								<a href="<?=base_url()?>" class="btn btn-default btn-lg">Continue Shopping!</a>	
							</p>
							<?php
							} else {
							?>
							<!-- page-title start -->
							<!-- ================ -->
							<h1 class="page-title text-center">Sorry, your payment is unsuccessful</h1>
							<div class="separator"></div>
							<!-- page-title end -->
							<p class="lead text-center"></p>
							<p class="text-center">
								<a href="<?=base_url('checkout_retry/'.$poData['id'])?>" class="btn btn-default btn-lg">Try again </a>	
							</p>

							<?php	
							}
							?>

						</div>
						<!-- main end -->

					</div>
				</div>
			</section>
			<!-- main-container end -->