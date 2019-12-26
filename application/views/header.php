<!doctype html>
<html class="no-js" lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Sistem Informasi Manajemen Proyek</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- favicon
		============================================ -->
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('assets/img/favicon.ico'); ?>">
	<!-- Google Fonts
		============================================ -->
	<link href="https://fonts.googleapis.com/css?family=Play:400,700" rel="stylesheet">
	<!-- Bootstrap CSS
		============================================ -->
	<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
	<!-- Bootstrap CSS
		============================================ -->
	<link rel="stylesheet" href="<?php echo base_url('assets/css/font-awesome.min.css'); ?>">
	<!-- owl.carousel CSS
		============================================ -->
	<link rel="stylesheet" href="<?php echo base_url('assets/css/owl.carousel.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/owl.theme.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/owl.transitions.css'); ?>">
	<!-- animate CSS
		============================================ -->
	<link rel="stylesheet" href="<?php echo base_url('assets/css/animate.css'); ?>">
	<!-- normalize CSS
		============================================ -->
	<link rel="stylesheet" href="<?php echo base_url('assets/css/normalize.css'); ?>">
	<!-- meanmenu icon CSS
		============================================ -->
	<link rel="stylesheet" href="<?php echo base_url('assets/css/meanmenu.min.css'); ?>">
	<!-- main CSS
		============================================ -->
	<link rel="stylesheet" href="<?php echo base_url('assets/css/main.css'); ?>">
	<!-- morrisjs CSS
		============================================ -->
	<link rel="stylesheet" href="<?php echo base_url('assets/css/morrisjs/morris.css'); ?>">
	<!-- mCustomScrollbar CSS
		============================================ -->
	<link rel="stylesheet" href="<?php echo base_url('assets/css/scrollbar/jquery.mCustomScrollbar.min.css'); ?>">
	<!-- metisMenu CSS
		============================================ -->
	<link rel="stylesheet" href="<?php echo base_url('assets/css/metisMenu/metisMenu.min.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/metisMenu/metisMenu-vertical.css'); ?>">
	<!-- calendar CSS
		============================================ -->
	<link rel="stylesheet" href="<?php echo base_url('assets/css/calendar/fullcalendar.min.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/calendar/fullcalendar.print.min.css'); ?>">
	<!-- x-editor CSS
		============================================ -->
	<link rel="stylesheet" href="<?php echo base_url('assets/css/editor/select2.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/editor/datetimepicker.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/editor/bootstrap-editable.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/editor/x-editor-style.css'); ?>">
	<!-- normalize CSS
		============================================ -->
	<link rel="stylesheet" href="<?php echo base_url('assets/css/data-table/bootstrap-table.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/data-table/bootstrap-editable.css'); ?>">
	<!-- style CSS
		============================================ -->
	<link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">
	<!-- responsive CSS
		============================================ -->
	<link rel="stylesheet" href="<?php echo base_url('assets/css/responsive.css'); ?>">

	<!-- jquery ui -->
	<link rel="stylesheet" href="<?php echo base_url('assets/css/jquery-ui.css'); ?>">
	<!-- modernizr JS
		============================================ -->
	<script src="<?php echo base_url('assets/js/vendor/modernizr-2.8.3.min.js'); ?>"></script>

	<!-- jquery -->
	<script src="<?php echo base_url('assets/js/vendor/jquery-1.11.3.min.js'); ?>"></script>

</head>

<body>
	<!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
	<div class="left-sidebar-pro">
		<nav id="sidebar" class="">
			<div class="sidebar-header">
				<a href="index.html"><img class="main-logo" src="<?php echo base_url('assets/img/logo/logoipc.jpg'); ?>"
						alt="" /></a>
						<strong><img src="<?php echo base_url('assets/img/logo/logoipc.jpg'); ?>" alt="" /></strong>

			</div>
			<div class="left-custom-menu-adp-wrap comment-scrollbar">
				<nav class="sidebar-nav left-sidebar-menu-pro">
					<ul class="metismenu" id="menu1">
						<li>
							<a class="mini-click-non">
								<h3 style="color: white;">Menu Navigasi</h3>
							</a>
						</li>
						<?php if(in_array($this->session->userdata('user')->tipe_user, ['superadmin', 'admin', 'manager'])) : ?>
						<li>
							<a href='<?php echo base_url("index.php/awal"); ?>'
								class='<?php echo $this->uri->segment(1) == "awal" ? "active" : ""; ?>'><strong>Dashboard</strong></a>
						</li>
						<?php endif; ?>
						<!-- untuk mengatur hak akses menu admin -->
						<?php if($this->session->userdata('user')->tipe_user == "admin" || $this->session->userdata('user')->tipe_user == "superadmin"): ?>
						<li>
							<a href='<?php echo base_url("index.php/user"); ?>'
								class='<?php echo $this->uri->segment(1) == "user" ? "active" : ""; ?>'><strong>Data
									User</strong></a>
						</li>
						<li>
							<a href='<?php echo base_url("index.php/proyek"); ?>'
								class='<?php echo $this->uri->segment(1) == "proyek" ? "active" : ""; ?>'><strong>Data
									Proyek</strong></a>
						</li>
						<li>
							<a href='<?php echo base_url("index.php/uraian_kerja"); ?>'
								class='<?php echo $this->uri->segment(1) == "uraian_kerja" ? "active" : ""; ?>'><strong>Uraian
									Kerja</strong></a>
						</li>
						<li>
							<a href='<?php echo base_url("index.php/jadwal_rencana"); ?>'
								class='<?php echo $this->uri->segment(1) == "jadwal_rencana" ? "active" : ""; ?>'><strong>Jadwal
									Rencana</strong></a>
						</li>
						<li>
							<a href='<?php echo base_url("index.php/realisasi"); ?>'
								class='<?php echo $this->uri->segment(1) == "realisasi" ? "active" : ""; ?>'><strong>Realisasi</strong></a>
						</li>
						<li>
							<a href='<?php echo base_url("index.php/laporan"); ?>'
								class='<?php echo $this->uri->segment(1) == "laporan" ? "active" : ""; ?>'><strong>Laporan</strong></a>
						</li>
						<li>
							<a href='<?php echo base_url("index.php/tagihan"); ?>'
								class='<?php echo $this->uri->segment(1) == "tagihan" ? "active" : ""; ?>'><strong>Tagihan</strong></a>
						</li>
						<?php endif; ?>

						<!-- untuk mengatur hak akses menu manager -->
						<?php if($this->session->userdata('user')->tipe_user == "manager"): ?>
						<li>
							<a href='<?php echo base_url("index.php/laporan"); ?>'
								class='<?php echo $this->uri->segment(1) == "laporan" ? "active" : ""; ?>'><strong>Laporan</strong></a>
						</li>
						<?php endif; ?>

						<!-- untuk mengatur hak akses menu rekanan -->
						<?php if($this->session->userdata('user')->tipe_user == "rekanan"): ?>
						<li>
							<a href='<?php echo base_url("index.php/realisasi"); ?>'
								class='<?php echo $this->uri->segment(1) == "realisasi" ? "active" : ""; ?>'><strong>Realisasi</strong></a>
						</li>
						<li>
							<a href='<?php echo base_url("index.php/laporan"); ?>'
								class='<?php echo $this->uri->segment(1) == "laporan" ? "active" : ""; ?>'><strong>Laporan</strong></a>
						</li>
						<li>
							<a href='<?php echo base_url("index.php/tagihan"); ?>'
								class='<?php echo $this->uri->segment(1) == "tagihan" ? "active" : ""; ?>'><strong>Tagihan</strong></a>
						</li>
						<?php endif; ?>
					
					</ul>
				</nav>
			</div>
		</nav>
	</div>

	<!-- Start Welcome area -->
	<div class="all-content-wrapper">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="logo-pro">
						<a href="index.html"><img class="main-logo"
								src="<?php echo base_url('assets/img/logo/logoipc.jpg'); ?>" alt="" /></a>
					</div>
				</div>
			</div>
		</div>
		<div class="header-advance-area">
			<div class="header-top-area">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<div class="header-top-wraper">
								<div class="row">
									<div class="col-lg-1 col-md-0 col-sm-1 col-xs-12">
										<div class="menu-switcher-pro">
											<button type="button" id="sidebarCollapse"
												class="btn bar-button-pro header-drl-controller-btn btn-info navbar-btn">
												<i class="fa fa-bars fa-3x"></i>
											</button>
										</div>
									</div>
									<div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
										<div class="header-top-menu tabl-d-n">
											<ul class="nav navbar-nav mai-top-nav"
												style="margin-left: -40px; margin-bottom: -10px; margin-top: -5px; letter-spacing: 1px;">
												<li class="nav-item">
													<a href="#" class="nav-link">
														<h3>Sistem Informasi Manajemen Proyek</h1>
															<h3>PT. Pelabuhan Indonesia II (Persero) Cabang Jambi
																</h1>
													</a>
												</li>
											</ul>
										</div>
									</div>
									<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
										<div class="header-right-info">
											<ul class="nav navbar-nav mai-top-nav header-right-menu">
												<li class="nav-item dropdown">
													<a href="#" data-toggle="dropdown" role="button"
														aria-expanded="false" class="nav-link dropdown-toggle">
														<i class="fa fa-user adminpro-user-rounded header-riht-inf"
															aria-hidden="true"></i>
														<span
															class="admin-name"><?php echo $this->session->userdata('user')->nama_lengkap; ?></span>
														<i
															class="fa fa-angle-down adminpro-icon adminpro-down-arrow"></i>
													</a>
													<ul role="menu"
														class="dropdown-header-top author-log dropdown-menu animated zoomIn">
														<li>
															<a href="<?php echo base_url("index.php/user/{$this->session->userdata('user')->id}/edit"); ?>">
																<span class="fa fa-gear"></span> &nbsp;Edit
															</a>
															<a href="<?php echo base_url('index.php/logout'); ?>"
																onclick='return confirm("Apakah anda yakin akan logout?");'>
																<span class="fa fa-lock author-log-ic"></span>Log
																Out
																(<?php echo $this->session->userdata("user")->tipe_user; ?>)
															</a>
														</li>
													</ul>
												</li>

											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Mobile Menu start -->
			<div class="mobile-menu-area">
				<div class="container">
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<div class="mobile-menu">
								<nav id="dropdown">
									<ul class="mobile-menu-nav">
										<li>
											<ul class="collapse dropdown-header-top">
												<?php if(in_array($this->session->userdata('user')->tipe_user, ['superadmin', 'admin', 'manager'])) : ?>
												<li>
													<a href='<?php echo base_url("index.php/awal"); ?>'
														class='<?php echo $this->uri->segment(1) == "awal" ? "active" : ""; ?>'><strong>Dashboard</strong></a>
												</li>
												<?php endif; ?>
												<!-- untuk mengatur hak akses menu admin -->
												<?php if($this->session->userdata('user')->tipe_user == "admin"): ?>
												<li>
													<a href='<?php echo base_url("index.php/user"); ?>'
														class='<?php echo $this->uri->segment(1) == "user" ? "active" : ""; ?>'><strong>Data
															User</strong></a>
												</li>
												<li>
													<a href='<?php echo base_url("index.php/proyek"); ?>'
														class='<?php echo $this->uri->segment(1) == "proyek" ? "active" : ""; ?>'><strong>Data
															Proyek</strong></a>
												</li>
												<li>
													<a href='<?php echo base_url("index.php/uraian_kerja"); ?>'
														class='<?php echo $this->uri->segment(1) == "uraian_kerja" ? "active" : ""; ?>'><strong>Uraian
															Kerja</strong></a>
												</li>
												<li>
													<a href='<?php echo base_url("index.php/jadwal_rencana"); ?>'
														class='<?php echo $this->uri->segment(1) == "jadwal_rencana" ? "active" : ""; ?>'><strong>Jadwal
															Rencana</strong></a>
												</li>
												<li>
													<a href='<?php echo base_url("index.php/realisasi"); ?>'
														class='<?php echo $this->uri->segment(1) == "realisasi" ? "active" : ""; ?>'><strong>Realisasi</strong></a>
												</li>
												<li>
													<a href='<?php echo base_url("index.php/laporan"); ?>'
														class='<?php echo $this->uri->segment(1) == "laporan" ? "active" : ""; ?>'><strong>Laporan</strong></a>
												</li>
												<li>
													<a href='<?php echo base_url("index.php/tagihan"); ?>'
														class='<?php echo $this->uri->segment(1) == "tagihan" ? "active" : ""; ?>'><strong>Tagihan</strong></a>
												</li>
												<?php endif; ?>

												<!-- untuk mengatur hak akses menu manager -->
												<?php if($this->session->userdata('user')->tipe_user == "manager"): ?>
												<li>
													<a href='<?php echo base_url("index.php/laporan"); ?>'
														class='<?php echo $this->uri->segment(1) == "laporan" ? "active" : ""; ?>'><strong>Laporan</strong></a>
												</li>
												<?php endif; ?>

												<!-- untuk mengatur hak akses menu rekanan -->
												<?php if($this->session->userdata('user')->tipe_user == "rekanan"): ?>
												<li>
													<a href='<?php echo base_url("index.php/realisasi"); ?>'
														class='<?php echo $this->uri->segment(1) == "realisasi" ? "active" : ""; ?>'><strong>Realisasi</strong></a>
												</li>
												<li>
													<a href='<?php echo base_url("index.php/laporan"); ?>'
														class='<?php echo $this->uri->segment(1) == "laporan" ? "active" : ""; ?>'><strong>Laporan</strong></a>
												</li>
												<li>
													<a href='<?php echo base_url("index.php/tagihan"); ?>'
														class='<?php echo $this->uri->segment(1) == "tagihan" ? "active" : ""; ?>'><strong>Tagihan</strong></a>
												</li>
												<?php endif; ?>
											</ul>
										</li>
									</ul>
								</nav>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="data-table-area mg-tb-15">
			<div class="container-fluid">