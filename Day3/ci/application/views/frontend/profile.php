<!-- breadcrumb start -->
			<!-- ================ -->
			<div class="breadcrumb-container">
				<div class="container">
					<ol class="breadcrumb">
						<li><i class="fa fa-home pr-10"></i><a href="<?=base_url()?>">Home</a></li>
						<li class="active">Profile</li>
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
							<h1 class="page-title">Profile</h1>
							<div class="separator-2"></div>
							<!-- page-title end -->

							<p>Welcome</p>

							<?php
								if(isset($errormsg)) {
								?>
								<div class="alert alert-warning">
									<?=$errormsg?>
								</div>
								<?php		
								}
								?>

								<?php
								if(isset($_GET['updated'])) {
								?>
								<div class="alert alert-warning">
									<?=$_GET['updated']?>
								</div>
								<?php		
								}
								?>



							<form method="POST" action="<?=base_url('profile_submit')?>">


								<div class="form-group">
									<label for="name">Full Name</label>
									<input type="text" name="name" placeholder="Please input your Full Name" class="form-control" value="<?=isset($userdata['name'])?$userdata['name']:''?>" />
								</div>

								<div class="form-group">
									<label for="name">Email</label>
									<input type="email" name="email" placeholder="Please input your Email" class="form-control" value="<?=isset($userdata['email'])?$userdata['email']:''?>" />
								</div>

								<div class="form-group">
									<label for="mobile">Mobile</label>
									<input type="text" name="mobile" placeholder="Please input your Mobile (01xxxxxxxx)" class="form-control" value="<?=isset($userdata['mobile'])?$userdata['mobile']:''?>"/>

									<div id="iconSection">
									<?php
									if(isset($userdata['mobileVerified'])) {
										if($userdata['mobileVerified']) {
											echo '<i class="glyphicon glyphicon-ok"></i>';
										} else {
											echo '<a href="javascript: verifyMobile(\''.$userdata['mobile'].'\')" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i> Your mobile is not verified yet, click here to verify</a>';
										}

									}
									?>
									</div>

									<div id="mobileCodeSection" style="display:none">
										<input type="text" id="mobileCode" class="form-control" placeholder="Please fill in four digit mobile code for verification. E.g. 1234"/> 
										<a href="javascript:verifyCode()" class="btn btn-success">Verify This Code</a>
									</div>

								</div>

								<div class="form-group">
									<label for="name">Password</label>
									<input type="password" name="password" placeholder="Leave blank if not changing password" class="form-control" />
								</div>

								<div class="form-group">
									<label for="name">Confirm Password</label>
									<input type="password" name="repassword" placeholder="Leave blank if not changing password" class="form-control" />
								</div>

								

								<input type="submit" value="Submit" class="btn btn-primary" />

							</form>



							

							

						</div>
						<!-- main end -->

					</div>
				</div>
			</section>
			<!-- main-container end -->

			<script>

			function verifyMobile(mobile) {

				$.getJSON("<?=base_url('verifyMobile')?>/"+mobile, function(data){

					if(data.status == "OK") {
						alert(data.result);
						$("#mobileCodeSection").show();
					} else {
						alert(data.result);
					}

				});

			}

			function verifyCode(){

				var code = $("#mobileCode").val();

				$.getJSON("<?=base_url('verifyMobileCode')?>/"+code, function(data){

					if(data.status == "OK") {
						
						$("#mobileCodeSection").hide();
						$("#iconSection").html('<i class="glyphicon glyphicon-ok"></i>');

					} else {
						alert(data.result);
					}

				});


			}

			</script>

			