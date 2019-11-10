<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="sparkline9-list responsive-mg-b-30">
			<div class="sparkline9-hd">
				<?php $this->Helper->showMsgAlert(); ?>
				<div class="main-sparkline9-hd">
					<h1>INPUT TAGIHAN BARU</h1>
				</div>
			</div>
			<div class="sparkline9-graph">
				<div class="basic-login-form-ad">
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<div class="basic-login-inner">

								<form action="<?php echo base_url("index.php/tagihan/store"); ?>" method='post'>
									<div class="form-group-inner">
										<div class="row">
											<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
												<label class="login2">NAMA PROYEK</label>
											</div>
											<div class="col-lg-9 col-md-8 col-sm-8 col-xs-12">
												<select class="form-control custom-select-value" name="proyek_id" required>
													<option value=''>-- PILIH PROYEK --</option>
													<?php foreach($proyeks as $proyek): ?>
														<option value='<?php echo $proyek->id; ?>' <?php echo (set_value("proyek_id") == "" && $proyek_id == $proyek->id) || (set_value("proyek_id") == $proyek->id) ? "selected": ""; ?> ><?php echo $proyek->nama_proyek; ?></option>
													<?php endforeach; ?>
												</select>
												<?php echo "<label class='text-danger'>" . form_error('proyek_id') . "</label>"; ?>
											</div>
										</div>
									</div>
									<div class="form-group-inner">
										<div class="row">
											<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
												<label class="login2">ID TAGIHAN</label>
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
												<label class="login2">NAMA TAGIHAN</label>
											</div>
											<div class="col-lg-9 col-md-8 col-sm-8 col-xs-12">
												<input name='nama_tagihan' class="form-control"
													placeholder="Input Nama Tagihan" required maxlength='255' value='<?php echo set_value('nama_tagihan'); ?>'>
												<?php echo "<label class='text-danger'>" . form_error('nama_tagihan') . "</label>"; ?>
											</div>
										</div>
									</div>
									<div class="form-group-inner">
										<div class="row">
											<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
												<label class="login2">TANGGAL</label>
											</div>
											<div class="col-lg-9 col-md-8 col-sm-8 col-xs-12">
												<input type="date" value='<?php echo set_value('tanggal'); ?>'
												name='tanggal' class="form-control" placeholder="Input Tanggal" required max='255'>
												<?php echo "<label class='text-danger'>" . form_error('tanggal') . "</label>"; ?>
											</div>
										</div>
									</div>

									<div class="form-group-inner">
										<div class="row">
											<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
												<label class="login2">PRESENTASE (%)</label>
											</div>
											<div class="col-lg-9 col-md-8 col-sm-8 col-xs-12">
												<input name='presentase' type="number" class="form-control"
													value='<?php echo set_value('presentase'); ?>' min='1' max='100' required>
												<?php echo "<label class='text-danger'>" . form_error('presentase') . "</label>"; ?>
											</div>
										</div>
									</div>

									<div class="form-group-inner">
										<div class="row">
											<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
												<label class="login2">NILAI TAGIHAN</label>
											</div>
											<div class="col-lg-9 col-md-8 col-sm-8 col-xs-12">
												<input name='nilai_tagihan' type="text" class="cleave1 form-control"
													value='<?php echo set_value('nilai_tagihan'); ?>' required>
												<?php echo "<label class='text-danger'>" . form_error('nilai_tagihan') . "</label>"; ?>
											</div>
										</div>
									</div>

									
									<div class="form-group-inner">
										<div class="row">
											<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
												<label class="login2">NOTE</label>
											</div>
											<div class="col-lg-9 col-md-8 col-sm-8 col-xs-12">
												<textarea name='note' class="form-control"
													placeholder="Input Note" required maxlength='255'><?php echo set_value('note'); ?></textarea>
												<?php echo "<label class='text-danger'>" . form_error('note') . "</label>"; ?>
											</div>
										</div>
									</div>
																		
									<div class="login-btn-inner">
										<div class="row">
											<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12"></div>
											<div class="col-lg-9 col-md-8 col-sm-8 col-xs-12">
												<div class="login-horizental">
													<input type='submit' class="btn btn-sm btn-primary" value='SIMPAN'>
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
