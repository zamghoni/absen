<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<title><?=$page?> - Absensi Online</title>
	<!--favicon-->
	<link rel="icon" href="<?=base_url('assets/backend/')?>images/favicon-32x32.png" type="image/png" />
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

<body class="bg-forgot">
	<!-- wrapper -->
	<div class="wrapper">
		<div class="authentication-forgot d-flex align-items-center justify-content-center">
			<div class="card shadow-lg forgot-box">
				<div class="card-body p-md-5">
					<div class="text-center">
						<img src="<?=base_url('assets/backend/')?>images/icons/forgot-2.png" width="140" alt="" />
					</div>
					<h4 class="mt-5 font-weight-bold">Lupa Password?</h4>
					<p class="text-muted">Silahkan bisa menghubungi admin dinomor 08979156600 atau bisa menghubungi melalui whatsapp dibawah ini</p>
					<!-- <div class="form-group mt-5">
						<label>Email id</label>
						<input type="text" class="form-control form-control-lg radius-30" placeholder="example@user.com" />
					</div> -->
          <a href="https://wa.me/628979156600" class="btn btn-success btn-lg btn-block radius-30" target="
          ">Whatsapp</a>
					<!-- <button type="button" class="btn btn-success btn-lg btn-block radius-30"></button> -->
          <h5 class="text-muted mt-4">Terimakasih</h5>
          <a href="<?=site_url('auth')?>" class="btn btn-link btn-block"><i class='bx bx-arrow-back mr-1'></i>Back to Login</a>
				</div>
			</div>
		</div>
	</div>
	<!-- end wrapper -->
</body>

</html>
