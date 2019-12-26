<div class="row">
	<div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">

		<div class="sparkline9-list responsive-mg-b-30">
			<div class="sparkline9-hd">
				<?php $this->Helper->showMsgAlert(); ?>
				<div class="main-sparkline9-hd">
					<h1>EDIT USER <?php echo $user->username; ?></h1>
				</div>
			</div>
			<div class="sparkline9-graph">
				<div class="basic-login-form-ad">
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<div class="basic-login-inner">
								<form action="<?php echo base_url("index.php/user/{$user->id}/update"); ?>" method='post'>
									<div class="form-group-inner">
										<div class="row">
											<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
												<label class="login2">ID USER</label>
											</div>
											<div class="col-lg-9 col-md-8 col-sm-8 col-xs-12">
												<input name='id' type="number" class="form-control bg-dark color-orange"
													value='<?php echo $user->id ?? set_value('id'); ?>' readonly  required>
												<?php echo "<label class='text-danger'>" . form_error('id') . "</label>"; ?>
											</div>
										</div>
									</div>
									<div class="form-group-inner">
										<div class="row">
											<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
												<label class="login2">USERNAME</label>
											</div>
											<div class="col-lg-9 col-md-8 col-sm-8 col-xs-12">
												<input name='username' type="text"
													value='<?php echo $user->username; ?>' class="form-control bg-dark color-orange"
													placeholder="Input Username" readonly  required>
												<?php echo "<label class='text-danger'>" . form_error('username') . "</label>"; ?>
											</div>
										</div>
									</div>
									<div class="form-group-inner">
										<div class="row">
											<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
												<label class="login2">NAMA</label>
											</div>
											<div class="col-lg-9 col-md-8 col-sm-8 col-xs-12">
												<input name='nama_lengkap'
													value='<?php echo $user->nama_lengkap; ?>' type="text"
													class="form-control" placeholder="Input Nama Lengkap"  required>
												<?php echo "<label class='text-danger'>" . form_error('nama_lengkap') . "</label>"; ?>
											</div>
										</div>
									</div>
									<div class="form-group-inner">
										<div class="row">
											<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
												<label class="login2">PASSWORD</label>
											</div>
											<div class="col-lg-9 col-md-8 col-sm-8 col-xs-12">
												<input type="password" value=''
													name='password' class="form-control" placeholder="Input Password" required>
												<?php echo "<label class='text-danger'>" . form_error('password') . "</label>"; ?>
											</div>
										</div>
									</div>
									<div class="form-group-inner">
										<div class="row">
											<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
												<label class="login2">KONFIRM PASSWORD</label>
											</div>
											<div class="col-lg-9 col-md-8 col-sm-8 col-xs-12">
												<input type="password" value='<?php echo set_value('password_confirmation'); ?>'
													name='password_confirmation' class="form-control" placeholder="Input Konfirmasi Password" required>
												<?php echo "<label class='text-danger'>" . form_error('password_confirmation') . "</label>"; ?>
											</div>
										</div>
									</div>
									<?php if( in_array($user->tipe_user, ["admin", "rekanan", "manager"] ) && $this->session->userdata('user')->tipe_user == "superadmin"): ?>
									<div class="form-group-inner">
										<div class="row">
											<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
												<label class="login2">TIPE USER</label>
											</div>
											<div class="col-lg-9 col-md-8 col-sm-8 col-xs-12">
												<select class="form-control custom-select-value" name="tipe_user" required>
													<option value='manager'
														<?php echo $user->tipe_user == "manager" ? "selected" : ""; ?>>
														Manager</option>
													<option value='rekanan'
														<?php echo $user->tipe_user == "rekanan" ? "selected" : ""; ?>>
														Rekanan</option>
													<option value='admin'
														<?php echo $user->tipe_user == "admin" ? "selected" : ""; ?>>
														Admin</option>
												</select>
												<?php echo "<label class='text-danger'>" . form_error('tipe_user') . "</label>"; ?>
											</div>
										</div>
									</div>
									<?php elseif( in_array($user->tipe_user, ["rekanan", "manager"] ) && $this->session->userdata('user')->tipe_user == "admin"): ?>
									<div class="form-group-inner">
										<div class="row">
											<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
												<label class="login2">TIPE USER</label>
											</div>
											<div class="col-lg-9 col-md-8 col-sm-8 col-xs-12">
												<select class="form-control custom-select-value" name="tipe_user" required>
													<option value='manager'
														<?php echo $user->tipe_user == "manager" ? "selected" : ""; ?>>
														Manager</option>
													<option value='rekanan'
														<?php echo $user->tipe_user == "rekanan" ? "selected" : ""; ?>>
														Rekanan</option>
												</select>
												<?php echo "<label class='text-danger'>" . form_error('tipe_user') . "</label>"; ?>
											</div>
										</div>
									</div>
									<?php elseif($user->tipe_user == "superadmin" && $this->session->userdata('user')->tipe_user == "superadmin"): ?>
									<div class="form-group-inner">
										<div class="row">
											<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
												<label class="login2">TIPE USER</label>
											</div>
											<div class="col-lg-9 col-md-8 col-sm-8 col-xs-12">
												<select class="form-control custom-select-value" name="tipe_user">
													<option value='superadmin'
														<?php echo $user->tipe_user == "superadmin" ? "selected" : ""; ?>>
														Superadmin</option>
												</select>
												<?php echo "<label class='text-danger'>" . form_error('tipe_user') . "</label>"; ?>
											</div>
										</div>
									</div>
									<?php elseif($user->tipe_user == "admin" && $this->session->userdata('user')->tipe_user == "admin"): ?>
									<div class="form-group-inner">
										<div class="row">
											<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
												<label class="login2">TIPE USER</label>
											</div>
											<div class="col-lg-9 col-md-8 col-sm-8 col-xs-12">
												<select class="form-control custom-select-value" name="tipe_user">
													<option value='superadmin'
														<?php echo $user->tipe_user == "admin" ? "selected" : ""; ?>>
														Admin</option>
												</select>
												<?php echo "<label class='text-danger'>" . form_error('tipe_user') . "</label>"; ?>
											</div>
										</div>
									</div>
									<?php endif; ?>

									<div class="login-btn-inner">
										<div class="row">
											<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12"></div>
											<div class="col-lg-9 col-md-8 col-sm-8 col-xs-12">
												<div class="login-horizental">
													<button class="btn btn-sm btn-primary" type="submit">UPDATE</button>
													<button class="btn btn-sm bg-dark" type="reset">BATAL</button>
												</div>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
