<!doctype html>
<html class="no-js" lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Login | jeweler - Material Admin Template</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- favicon
		============================================ -->
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url("assets/img/favicon.ico"); ?>">
	<!-- Google Fonts
		============================================ -->
	<link href="https://fonts.googleapis.com/css?family=Play:400,700" rel="stylesheet">
	<!-- Bootstrap CSS
		============================================ -->
	<link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.min.css"); ?>">
	<!-- Bootstrap CSS
		============================================ -->
	<link rel="stylesheet" href="<?php echo base_url("assets/css/font-awesome.min.css"); ?>">
	<!-- owl.carousel CSS
		============================================ -->
	<link rel="stylesheet" href="<?php echo base_url("assets/css/owl.carousel.css"); ?>">
	<link rel="stylesheet" href="<?php echo base_url("assets/css/owl.theme.css"); ?>">
	<link rel="stylesheet" href="<?php echo base_url("assets/css/owl.transitions.css"); ?>">

	<!-- main CSS
		============================================ -->
	<link rel="stylesheet" href="<?php echo base_url("assets/css/main.css"); ?>">

	<!-- style CSS
		============================================ -->
	<link rel="stylesheet" href="<?php echo base_url("assets/css/style.css"); ?>">
	<!-- responsive CSS
		============================================ -->
	<link rel="stylesheet" href="<?php echo base_url("assets/css/responsive.css"); ?>">
</head>

<body style="background: white; height: auto !important;">
	<div class="color-line"></div>

	<div class="container-fluid" style="padding-top: 20px;">
		<div class="row">
			<div class="col-md-4 col-md-4 col-sm-12 col-xs-12 col-md-offset-4 text-center">
				<img src="<?php echo base_url("assets/img/logo/Logo IPC jpg.jpg"); ?>" alt="">
				<p>
			</div>
			<div class="col-md-4 col-md-4 col-sm-12 col-xs-12 col-md-offset-4"
				style="background: #00A9E0; border-radius: 20px;">
				<div class="text-center m-b-md custom-login">
					<p></p>
					<p>
						<h3>SISTEM INFORMASI MANAJEMEN PROYEK</h3>
						<p>PT. Pelabuhan Indonesia II (Persero) Cabang Jambi</p>
				</div>
				<div class="hpanel">
					<div class="panel-body">
						<form action="<?php base_url('index.php/cekLogin'); ?>" method='post' id="loginForm">
							<div class="form-group">
								<label class="control-label" for="username">Username</label>
								<input type="text" placeholder="example@gmail.com" title="Please enter you username" required=""
									value="<?php echo $this->session->flashdata('old')["username"]; ?>" name="username" id="username" class="form-control" maxlength='15'>
									<?php 
										if ( $this->session->flashdata('error') )
										{
											echo "<label class='text-danger'>Username atau password salah!</label>";
										}
									?>
							</div>
							<div class="form-group">
								<label class="control-label" for="password">Password</label>
								<input type="password" title="Please enter your password" placeholder="******" required="" value="<?php echo $this->session->flashdata('old')["password"]; ?>"
									name="password" id="password" class="form-control"  maxlength='15'>
							</div>

							<button class="btn btn-warning btn-block loginbtn" type='submit'>Login</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>


</body>

</html>
