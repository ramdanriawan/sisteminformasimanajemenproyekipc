<div class="row">
	<div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">

		<div class="sparkline9-list responsive-mg-b-30">
			<div class="sparkline9-hd">
				<?php $this->Helper->showMsgAlert(); ?>
				<div class="main-sparkline9-hd">
					<h1>INPUT PROYEK BARU</h1>
				</div>
			</div>
			<div class="sparkline9-graph">
				<div class="basic-login-form-ad">
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<div class="basic-login-inner">

								<form action="<?php echo base_url('index.php/proyek/store'); ?>" method='post'>
									<div class="form-group-inner">
										<div class="row">
											<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
												<label class="login2">ID PROYEK</label>
											</div>
											<div class="col-lg-9 col-md-8 col-sm-8 col-xs-12">
												<input name='id' type="number" class="form-control bg-dark color-orange"
													value='<?php echo $id ?? set_value('id'); ?>' readonly required>
												<?php echo "<label class='text-danger'>" . form_error('id') . "</label>"; ?>
											</div>
										</div>
									</div>
									<div class="form-group-inner">
										<div class="row">
											<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
												<label class="login2">NAMA PROYEK</label>
											</div>
											<div class="col-lg-9 col-md-8 col-sm-8 col-xs-12">
												<textarea name='nama_proyek' class="form-control"
													placeholder="Input Nama Proyek" required maxlength='255'><?php echo set_value('nama_proyek'); ?></textarea>
												<?php echo "<label class='text-danger'>" . form_error('nama_proyek') . "</label>"; ?>
											</div>
										</div>
									</div>
									<div class="form-group-inner">
										<div class="row">
											<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
												<label class="login2">NOMOR KONTRAK</label>
											</div>
											<div class="col-lg-9 col-md-8 col-sm-8 col-xs-12">
												<input name='nomor_kontrak'
													value='<?php echo set_value('nomor_kontrak'); ?>' type="text"
													class="form-control" placeholder="Input Nomor Kontrak" required maxlength='40'>
												<?php echo "<label class='text-danger'>" . form_error('nomor_kontrak') . "</label>"; ?>
											</div>
										</div>
									</div>
									<div class="form-group-inner">
										<div class="row">
											<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
												<label class="login2">NILAI KONTRAK</label>
											</div>
											<div class="col-lg-9 col-md-8 col-sm-8 col-xs-12">
												<input name='nilai_kontrak' type="text" class="form-control cleave1"
													value='<?php echo set_value('nilai_kontrak'); ?>' required maxlength="21">
												<?php echo "<label class='text-danger'>" . form_error('nomor_kontrak') . "</label>"; ?>
											</div>
										</div>
									</div>
									<div class="form-group-inner">
										<div class="row">
											<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
												<label class="login2">NAMA REKANAN</label>
											</div>
											<div class="col-lg-9 col-md-8 col-sm-8 col-xs-12">
												<select class="form-control custom-select-value" name="user_id" required>
													<?php foreach($users as $user): ?>
														<option value='<?php echo $user->id; ?>' <?php echo set_value('user_id') == $user->id ? "selected" : ""; ?>><?php echo $user->nama_lengkap; ?></option>
													<?php endforeach; ?>
												</select>
												<?php echo "<label class='text-danger'>" . form_error('user_id') . "</label>"; ?>
											</div>
										</div>
									</div>
									<div class="form-group-inner">
										<div class="row">
											<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
												<label class="login2">TANGGAL MULAI</label>
											</div>
											<div class="col-lg-9 col-md-8 col-sm-8 col-xs-12">
												<input type="date" value='<?php echo set_value('tanggal_mulai'); ?>'
													name='tanggal_mulai' class="form-control" placeholder="Input Tanggal Mulai" required max=''>
												<?php echo "<label class='text-danger'>" . form_error('tanggal_mulai') . "</label>"; ?>
											</div>
										</div>
									</div>
									<div class="form-group-inner">
										<div class="row">
											<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
												<label class="login2">TANGGAL SELESAI</label>
											</div>
											<div class="col-lg-9 col-md-8 col-sm-8 col-xs-12">
												<input type="date" value='<?php echo set_value('tanggal_selesai'); ?>'
													name='tanggal_selesai' class="form-control" placeholder="Input Tanggal Selesai" required>
												<?php echo "<label class='text-danger'>" . form_error('tanggal_selesai') . "</label>"; ?>
											</div>
										</div>
									</div>
																		
									<div class="login-btn-inner">
										<div class="row">
											<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12"></div>
											<div class="col-lg-9 col-md-8 col-sm-8 col-xs-12">
												<div class="login-horizental">
													<button class="btn btn-sm btn-primary" type="submit">SIMPAN</button>
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
