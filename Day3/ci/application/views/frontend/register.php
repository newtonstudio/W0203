<!-- breadcrumb start -->
			<!-- ================ -->
			<div class="breadcrumb-container">
				<div class="container">
					<ol class="breadcrumb">
						<li><i class="fa fa-home pr-10"></i><a href="<?=base_url()?>">Home</a></li>
						<li class="active">Register</li>
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
							<h1 class="page-title">Register</h1>
							<div class="separator-2"></div>
							<!-- page-title end -->

							<p>Already a member? <a href="<?=base_url('login')?>">Sign In here</a></p>


							<div class="g-signin2" data-onsuccess="onSignIn" data-theme="dark"></div>



							<form method="POST" action="register_submit">

								<div class="form-group">
									<label for="name">Full Name</label>
									<input type="text" name="name" placeholder="Please input your Full Name" class="form-control" />
								</div>

								<div class="form-group">
									<label for="name">Email</label>
									<input type="email" name="email" placeholder="Please input your Email" class="form-control" />
								</div>

								<div class="form-group">
									<label for="name">Password</label>
									<input type="password" name="password" placeholder="Please input your password" class="form-control" />
								</div>

								<div class="form-group">
									<label for="name">Confirm Password</label>
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

			<script>
		      function onSignIn(googleUser) {
		        // Useful data for your client-side scripts:
		        var profile = googleUser.getBasicProfile();

		        console.log("ID: " + profile.getId()); // Don't send this directly to your server!
		        console.log('Full Name: ' + profile.getName());
		        console.log('Given Name: ' + profile.getGivenName());
		        console.log('Family Name: ' + profile.getFamilyName());
		        console.log("Image URL: " + profile.getImageUrl());
		        console.log("Email: " + profile.getEmail());

		        // The ID token you need to pass to your backend:
		        var id_token = googleUser.getAuthResponse().id_token;
		        console.log("ID Token: " + id_token);

		        $.post("<?=base_url('googleLogin')?>",{"name":profile.getName(),"avatar":profile.getImageUrl(),email:profile.getEmail(),googleID:profile.getId(),googleToken:id_token}, function(data){

		        	if(data.status == "OK") {
		        		location.href='<?=base_url('profile')?>';
		        	}

		        });


		      };
		    </script>

			