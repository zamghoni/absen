<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<title><?=$page?> - Absensi Online</title>
	<!--favicon-->
	<!-- <link rel="icon" href="<?=base_url('assets/backend/')?>images/favicon-32x32.png" type="image/png" /> -->
	<link rel="apple-touch-icon" sizes="57x57" href="<?=base_url('assets/backend/images/favicon')?>/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="<?=base_url('assets/backend/images/favicon')?>/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="<?=base_url('assets/backend/images/favicon')?>/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="<?=base_url('assets/backend/images/favicon')?>/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="<?=base_url('assets/backend/images/favicon')?>/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="<?=base_url('assets/backend/images/favicon')?>/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="<?=base_url('assets/backend/images/favicon')?>/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="<?=base_url('assets/backend/images/favicon')?>/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="<?=base_url('assets/backend/images/favicon')?>/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="<?=base_url('assets/backend/images/favicon')?>/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?=base_url('assets/backend/images/favicon')?>/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="<?=base_url('assets/backend/images/favicon')?>/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?=base_url('assets/backend/images/favicon')?>/favicon-16x16.png">
	<link rel="manifest" href="<?=base_url('assets/backend/images/favicon')?>/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="<?=base_url('assets/backend/images/favicon')?>/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">

  <link rel="stylesheet" href="<?=base_url('assets/backend/')?>plugins/notifications/css/lobibox.min.css" />
	<!-- loader-->
	<link href="<?=base_url('assets/backend/')?>css/pace.min.css" rel="stylesheet" />
	<script src="<?=base_url('assets/backend/')?>js/pace.min.js"></script>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="<?=base_url('assets/backend/')?>css/bootstrap.min.css" />
	<!-- Icons CSS -->
	<link rel="stylesheet" href="<?=base_url('assets/backend/')?>css/icons.css" />
	<!-- App CSS -->
	<link rel="stylesheet" href="<?=base_url('assets/backend/')?>css/app.css" />
</head>

<body class="bg-login">
	<!-- wrapper -->
	<div class="wrapper">
		<div class="section-authentication-login d-flex align-items-center justify-content-center">
			<div class="row">
				<div class="col-12 col-lg-10 mx-auto">
					<div class="card radius-15">
						<div class="row no-gutters">
							<div class="col-lg-6">
								<div class="card-body p-md-5">
									<div class="text-center">
										<img src="<?=base_url('assets/backend/images/favicon')?>/favicon-96x96.png" width="80" alt="">
										<h3 class="mt-4 font-weight-bold">Selamat Datang</h3>
									</div>
                  <?php
                  $this->load->view('message');
                  $attributes = array('onsubmit' => 'return tambah(this)');
                  echo form_open_multipart('auth/process',$attributes); ?>
									<div class="form-group mt-4">
										<label for="username">Username</label>
										<input type="text" name="username" class="form-control" placeholder="Masukkan username anda" autofocus required oninvalid="this.setCustomValidity('Masukkan Username disini')" oninput="setCustomValidity('')">
									</div>
									<div class="form-group">
										<label for="password">Password</label>
										<input type="password" name="password" class="form-control" placeholder="Masukkan password anda" required
                      oninvalid="this.setCustomValidity('Masukkan password anda disini')" oninput="setCustomValidity('')">
									</div>
									<div class="form-row">
										<div class="form-group col">
											<!-- <div class="custom-control custom-switch">
												<input type="checkbox" class="custom-control-input" id="customSwitch1" checked>
												<label class="custom-control-label" for="customSwitch1">Remember Me</label>
											</div> -->
										</div>
										<div class="form-group col text-right"> <a href="<?=site_url('forget')?>"><i class='bx bxs-key mr-2'></i>Lupa Password?</a>
										</div>
									</div>
									<div class="btn-group mt-3 w-100">
										<button type="submit" name="login" class="btn btn-primary btn-block">Log In</button>
										<button type="button" class="btn btn-primary"><i class="lni lni-arrow-right"></i>
										</button>
									</div>
									<hr>
                  <?php echo form_close(); ?>
									<div class="text-center">
										<p class="mb-0">Belum punya akun? <a href="<?=site_url('register')?>">Daftar Disini</a>
										</p>
									</div>
								</div>
							</div>
							<div class="col-lg-6">
								<img src="<?=base_url('assets/backend/')?>images/login-images/login-frent-img.jpg" class="card-img login-img h-100" alt="...">
							</div>
						</div>
						<!--end row-->
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end wrapper -->
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <!--notification js -->
  <script src="<?=base_url('assets/backend/')?>plugins/notifications/js/lobibox.min.js"></script>
  <script src="<?=base_url('assets/backend/')?>plugins/notifications/js/notifications.min.js"></script>
</body>

</html>
