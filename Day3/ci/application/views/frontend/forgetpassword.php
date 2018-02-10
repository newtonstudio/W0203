<!-- breadcrumb start -->
			<!-- ================ -->
			<div class="breadcrumb-container">
				<div class="container">
					<ol class="breadcrumb">
						<li><i class="fa fa-home pr-10"></i><a href="<?=base_url()?>">Home</a></li>
						<li class="active">Login</li>
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
						<div class="main col-md-12">

							<!-- page-title start -->
							<!-- ================ -->
							<h1 class="page-title">Forget Password</h1>
							<div class="separator-2"></div>
							<!-- page-title end -->


							<form method="POST" action="<?=base_url('forgetpassword_submit')?>">

								<?php
								if(isset($errormsg)) {
								?>
								<div class="alert alert-warning">
									<?=$errormsg?>
								</div>
								<?php		
								}

								if(isset($_GET['msg'])) {
								?>
								<div class="alert alert-success">
									We have sent the reset password link to your email, please check your mailbox
								</div>
								<?php	
								}

								?>


								<div class="form-group">
									<label for="name">Email</label>
									<input type="email" name="email" placeholder="Please input your Email" class="form-control" />
								</div>

								<input type="submit" value="Submit" class="btn btn-primary" />

							</form>
							

							

						</div>
						<!-- main end -->

					</div>
				</div>
			</section>
			<!-- main-container end -->

			