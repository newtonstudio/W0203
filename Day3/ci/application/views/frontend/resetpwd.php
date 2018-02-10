<!-- breadcrumb start -->
			<!-- ================ -->
			<div class="breadcrumb-container">
				<div class="container">
					<ol class="breadcrumb">
						<li><i class="fa fa-home pr-10"></i><a href="<?=base_url()?>">Home</a></li>
						<li class="active">Reset Password</li>
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
							<h1 class="page-title">Reset Password</h1>
							<div class="separator-2"></div>
							<!-- page-title end -->


							<form method="POST" action="<?=base_url('resetpassword_submit')?>">

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

								<input type="hidden" name="pwdRetrieavalCode" value="<?=$pwdRetrieavalCode?>" />
								<input type="hidden" name="email" value="<?=$email?>" />


								<div class="form-group">
									<label for="password">Password</label>
									<input type="password" name="password" placeholder="Please input your password" class="form-control" />
								</div>

								<div class="form-group">
									<label for="password">Confirm Password</label>
									<input type="password" name="repassword" placeholder="Please input your password again" class="form-control" />
								</div>

								<input type="submit" value="Submit" class="btn btn-primary" />

							</form>
							

							

						</div>
						<!-- main end -->

					</div>
				</div>
			</section>
			<!-- main-container end -->

			