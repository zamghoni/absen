<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<title><?=$page?> - Absensi Online</title>
	<!--favicon-->
	<link rel="icon" href="<?=base_url('assets/backend/')?>images/favicon-32x32.png" type="image/png" />
	<!-- Sweet Alert -->
	<link href="<?=base_url('assets/backend/')?>plugins/sweet-alert2/sweetalert2.min.css" rel="stylesheet" type="text/css">
	<!-- Vector CSS -->
	<link href="<?=base_url('assets/backend/')?>plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
	<!--plugins-->
	<link rel="stylesheet" href="<?=base_url('assets/backend/')?>plugins/notifications/css/lobibox.min.css" />
	<link href="<?=base_url('assets/backend/')?>plugins/simplebar/css/simplebar.css" rel="stylesheet" />
	<!-- datepicker -->
	<link href="<?=base_url('assets/backend/')?>plugins/datetimepicker/css/classic.css" rel="stylesheet" />
	<link href="<?=base_url('assets/backend/')?>plugins/datetimepicker/css/classic.time.css" rel="stylesheet" />
	<link href="<?=base_url('assets/backend/')?>plugins/datetimepicker/css/classic.date.css" rel="stylesheet" />
	<link rel="stylesheet" href="<?=base_url('assets/backend/')?>plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.min.css">
	<!-- select2 -->
	<link href="<?=base_url('assets/backend/')?>plugins/select2/css/select2.min.css" rel="stylesheet" />
	<link href="<?=base_url('assets/backend/')?>plugins/select2/css/select2-bootstrap4.css" rel="stylesheet" />
	<link href="<?=base_url('assets/backend/')?>plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
	<link href="<?=base_url('assets/backend/')?>plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
	<!--Data Tables -->
	<link href="<?=base_url('assets/backend/')?>plugins/datatable/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
	<link href="<?=base_url('assets/backend/')?>plugins/datatable/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css">
	<!-- loader-->
	<link href="<?=base_url('assets/backend/')?>css/pace.min.css" rel="stylesheet" />
	<script src="<?=base_url('assets/backend/')?>js/pace.min.js"></script>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="<?=base_url('assets/backend/')?>css/bootstrap.min.css" />
	<!-- Icons CSS -->
	<link rel="stylesheet" href="<?=base_url('assets/backend/')?>css/icons.css" />
	<!-- lightbox -->
	<link rel="stylesheet" href="<?=base_url('assets/backend/callout.css')?>">
	<link rel="stylesheet" href="<?=base_url('assets/backend/css/lightbox.css')?>">
	<!-- App CSS -->
	<link rel="stylesheet" href="<?=base_url('assets/backend/')?>css/app.css" />
</head>

<body>
	<!-- wrapper -->
	<div class="wrapper">
		<!--sidebar-wrapper-->
		<div class="sidebar-wrapper" data-simplebar="true">
			<div class="sidebar-header">
				<div class="">
					<img src="<?=base_url('assets/backend/')?>images/logo-icon.png" class="logo-icon-2" alt="" />
				</div>
				<div>
					<h4 class="logo-text">Absensi</h4>
				</div>
				<a href="javascript:;" class="toggle-btn ml-auto"> <i class="bx bx-menu"></i>
				</a>
			</div>
			<!--navigation-->
			<ul class="metismenu" id="menu">
				<li>
					<li class="mm-<?=activate_menu('dashboard')?>">
						<a href="<?=site_url('dashboard')?>">
							<div class="parent-icon icon-color-1"><i class="bx bx-home"></i>
							</div>
							<div class="menu-title">Dashboard</div>
						</a>
					</li>
					<li class="mm-<?=activate_menu('riwayat')?>">
						<a href="<?=site_url('riwayat')?>">
							<div class="parent-icon icon-color-2"><i class="bx bx-task"></i>
							</div>
							<div class="menu-title">Riwayat Kehadiran</div>
						</a>
					</li>
				</li>
				<li class="menu-label">Manajement</li>
				<li class="mm-<?=activate_menu('user')?>">
					<a href="<?=site_url('user')?>">
						<div class="parent-icon icon-color-3"><i class="bx bx-user-check"></i>
						</div>
						<div class="menu-title">User</div>
					</a>
				</li>
				<li class="mm-<?=activate_menu('pengaturan')?>">
					<a href="<?=site_url('pengaturan')?>">
						<div class="parent-icon icon-color-4"><i class="bx bx-cog"></i>
						</div>
						<div class="menu-title">Pengaturan</div>
					</a>
				</li>
				<li class="menu-label">Laporan</li>
				<li class="mm-<?=activate_menu('laporan')?>">
					<a href="<?=site_url('laporan')?>">
						<div class="parent-icon icon-color-5"><i class="bx bx-export"></i>
						</div>
						<div class="menu-title">Absensi</div>
					</a>
				</li>
			</ul>
			<!--end navigation-->
		</div>
		<!--end sidebar-wrapper-->
		<!--header-->
		<header class="top-header">
			<nav class="navbar navbar-expand">
				<div class="left-topbar d-flex align-items-center">
					<a href="javascript:;" class="toggle-btn">	<i class="bx bx-menu"></i>
					</a>
				</div>
				<div class="flex-grow-1 search-bar">
					<div class="input-group">
						<div class="input-group-prepend search-arrow-back">
							<button class="btn btn-search-back" type="button"><i class="bx bx-arrow-back"></i>
							</button>
						</div>
						<input type="text" class="form-control" placeholder="search" />
						<div class="input-group-append">
							<button class="btn btn-search" type="button"><i class="lni lni-search-alt"></i>
							</button>
						</div>
					</div>
				</div>
				<div class="right-topbar ml-auto">
					<ul class="navbar-nav">
						<li class="nav-item search-btn-mobile">
							<a class="nav-link position-relative" href="javascript:;">	<i class="bx bx-search vertical-align-middle"></i>
							</a>
						</li>
						<li class="nav-item dropdown dropdown-user-profile">
							<a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;" data-toggle="dropdown">
								<div class="media user-box align-items-center">
									<div class="media-body user-info">
										<p class="user-name mb-0"><?=$this->fungsi->user_login()->username?></p>
										<p class="designattion mb-0 text-success">Available</p>
									</div>
									<?php if ($this->fungsi->user_login()->foto != null){ ?>
										<img src="<?=base_url('upload/foto/'.$this->fungsi->user_login()->foto)?>" class="user-img" alt="user avatar">
									<?php } else { ?>
										<img src="https://via.placeholder.com/110x110" class="user-img" alt="user avatar">
									<?php } ?>
								</div>
							</a>
							<div class="dropdown-menu dropdown-menu-right">	<a class="dropdown-item" href="<?=site_url('profile')?>"><i
								class="bx bx-user"></i><span>Profile</span></a>
								<div class="dropdown-divider mb-0"></div>	<a class="dropdown-item" href="<?=site_url('auth/logout')?>"><i
									class="bx bx-power-off"></i><span>Logout</span></a>
								</div>
							</li>
						</ul>
					</div>
				</nav>
			</header>
			<!--end header-->
			<!--page-wrapper-->
			<div class="page-wrapper">
				<!--page-content-wrapper-->
				<div class="page-content-wrapper">
					<div class="page-content">
						<!--breadcrumb-->
						<?php if ($this->uri->segment(1) != 'dashboard'){ ?>
							<div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
								<div class="breadcrumb-title pr-3"><?=$page?></div>
								<div class="pl-3">
									<nav aria-label="breadcrumb">
										<ol class="breadcrumb mb-0 p-0">
											<li class="breadcrumb-item"><a href="<?=site_url('dashboard')?>"><i class='bx bx-home-alt'></i></a>
											</li>
											<li class="breadcrumb-item active" aria-current="page"><?=$subpage?></li>
										</ol>
									</nav>
								</div>
							</div>
						<?php } ?>
						<!--end breadcrumb-->
						<?=$contents;?>
					</div>
				</div>
				<!--end page-content-wrapper-->
			</div>
			<!--end page-wrapper-->
			<!--start overlay-->
			<div class="overlay toggle-btn-mobile"></div>
			<!--end overlay-->
			<!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
			<!--End Back To Top Button-->
			<!--footer -->
			<div class="footer">
				<p class="mb-0">Absensi Online @<?=date('Y')?> | Developed By : <a href="https://github.com/zamghoni" target="_blank">Zamghoni</a>
				</p>
			</div>
			<!-- end footer -->
		</div>
		<!-- end wrapper -->

		<!-- JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<!-- <script src="<?=base_url('assets/backend/')?>js/jquery.min.js"></script> -->
		<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
		<script src="<?=base_url('assets/backend/')?>js/popper.min.js"></script>
		<script src="<?=base_url('assets/backend/')?>js/bootstrap.min.js"></script>
		<script src="<?=base_url('assets/backend/')?>js/bs-custom-file-input.min.js"></script>
		<script src="<?=base_url('assets/backend/')?>custom/custom.js"></script>
		<script>
			// custom file
			$(document).ready(function () {
				bsCustomFileInput.init()
			})
		</script>
		<!--plugins-->
		<script src="<?=base_url('assets/backend/')?>plugins/simplebar/js/simplebar.min.js"></script>
		<script src="<?=base_url('assets/backend/')?>plugins/metismenu/js/metisMenu.min.js"></script>
		<script src="<?=base_url('assets/backend/')?>plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
		<!-- datepicker -->
		<script src="<?=base_url('assets/backend/')?>plugins/datetimepicker/js/legacy.js"></script>
		<script src="<?=base_url('assets/backend/')?>plugins/datetimepicker/js/picker.js"></script>
		<script src="<?=base_url('assets/backend/')?>plugins/datetimepicker/js/picker.time.js"></script>
		<script src="<?=base_url('assets/backend/')?>plugins/datetimepicker/js/picker.date.js"></script>
		<script src="<?=base_url('assets/backend/')?>plugins/bootstrap-material-datetimepicker/js/moment.min.js"></script>
		<script src="<?=base_url('assets/backend/')?>plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.min.js"></script>
		<script>
			$('.datepicker').pickadate({
				selectMonths: true,
				selectYears: true
			}),
			$('.timepicker').pickatime()
		</script>
		<script>
			$(function () {
				$('#date-time').bootstrapMaterialDatePicker({
					format: 'YYYY-MM-DD HH:mm'
				});
				$('#date').bootstrapMaterialDatePicker({
					time: false
				});
				$('#time').bootstrapMaterialDatePicker({
					date: false,
					format: 'HH:mm:ss'
				});
				$('#time2').bootstrapMaterialDatePicker({
					date: false,
					format: 'HH:mm:ss'
				});
				$('#time3').bootstrapMaterialDatePicker({
					date: false,
					format: 'HH:mm:ss'
				});
			});
		</script>
		<!-- select2 -->
		<script src="<?=base_url('assets/backend/')?>plugins/select2/js/select2.min.js"></script>
		<script>
			$('.single-select').select2({
				theme: 'bootstrap4',
				width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
				placeholder: $(this).data('placeholder'),
				allowClear: Boolean($(this).data('allow-clear')),
			});
		</script>
		<!--notification js -->
		<script src="<?=base_url('assets/backend/')?>plugins/notifications/js/lobibox.min.js"></script>
		<script src="<?=base_url('assets/backend/')?>plugins/notifications/js/notifications.min.js"></script>
		<!--Data Tables js-->
		<script src="<?=base_url('assets/backend/')?>plugins/datatable/js/jquery.dataTables.min.js"></script>
		<script>
			$(document).ready(function () {
				//Default data table
				$('#example').DataTable();
				var table = $('#example2').DataTable({
					lengthChange: false,
					buttons: ['copy', 'excel', 'pdf', 'print', 'colvis']
				});
				table.buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');
			});
		</script>
		<script type="text/javascript" src="<?=base_url('assets/backend/js/lightbox.js')?>"></script>
		<!-- App JS -->
		<script src="<?=base_url('assets/backend/')?>js/app.js"></script>
		<!-- Sweet-Alert  -->
		<script src="<?=base_url('assets/backend/')?>plugins/sweet-alert2/sweetalert2.min.js"></script>
		<script src="<?=base_url('assets/backend/')?>pages/sweet-alert.init.js"></script>
	</body>

	</html>
