<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="sparkline9-list responsive-mg-b-30">
			<div class="sparkline9-hd">
				<?php $this->Helper->showMsgAlert(); ?>
				<div class="main-sparkline9-hd">
					<h1>UPDATE URAIAN KERJA</h1>
				</div>
			</div>
			<div class="sparkline9-graph">
				<div class="basic-login-form-ad">
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<div class="basic-login-inner">

								<form action="<?php echo base_url("index.php/uraian_kerja/{$data->id}/update"); ?>" method='post'>
									<div class="form-group-inner">
										<div class="row">
											<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
												<label class="login2">NAMA PROYEK</label>
											</div>
											<div class="col-lg-9 col-md-8 col-sm-8 col-xs-12">
												<select class="form-control custom-select-value" name="proyek_id" required>
													<option value=''>-- PILIH PROYEK --</option>
													<?php foreach($proyeks as $proyek): ?>
														<option value='<?php echo $proyek->id; ?>' <?php echo (set_value("proyek_id") == "" && $data->proyek_id == $proyek->id) || (set_value("proyek_id") == $proyek->id) ? "selected": ""; ?> ><?php echo $proyek->nama_proyek; ?></option>
													<?php endforeach; ?>
												</select>
												<?php echo "<label class='text-danger'>" . form_error('proyek_id') . "</label>"; ?>
											</div>
										</div>
									</div>
									<div class="form-group-inner">
										<div class="row">
											<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
												<label class="login2">ID URAIAN KERJA</label>
											</div>
											<div class="col-lg-9 col-md-8 col-sm-8 col-xs-12">
												<input name='id_uraian_kerja' type="number" class="form-control bg-dark color-orange"
													value='<?php echo $data->id ?? $id_uraian_kerja ?? set_value('id_uraian_kerja'); ?>' readonly required>
												<?php echo "<label class='text-danger'>" . form_error('id_uraian_kerja') . "</label>"; ?>
											</div>
										</div>
									</div>
									
									<div class="form-group-inner">
										<div class="row">
											<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
												<label class="login2">JUDUL URAIAN KERJA</label>
											</div>
											<div class="col-lg-9 col-md-8 col-sm-8 col-xs-12">
												<textarea name='judul_uraian_kerja' class="form-control"
													placeholder="Input Judul Uraian Kerja" required maxlength='255'><?php echo $data->judul_uraian_kerja ?? set_value('judul_uraian_kerja'); ?></textarea>
												<?php echo "<label class='text-danger'>" . form_error('judul_uraian_kerja') . "</label>"; ?>
											</div>
										</div>
									</div>

									<div class="form-group-inner">
										<div class="row">
											<div class="col-xs-12 text-center">
												<label class="login2">LIST URAIAN KERJA</label>
											</div>
										</div>
									</div>
									<div class="form-group-inner">
										<div class="row">
											<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
												<label class="login2">JUMLAH LIST URAIAN</label>
											</div>
											<div class="col-lg-9 col-md-8 col-sm-8 col-xs-12">
												<input type="number" value='<?php echo set_value('jumlah_list_uraian_kerja') != "" ? set_value('jumlah_list_uraian_kerja') : count($this->UraianKerja->uraianKerjaDetails($data->id)); ?>' id='jumlah_list_uraian_kerja'
												name='jumlah_list_uraian_kerja' class="form-control" placeholder="Input Jumlah List Uraian Kerja" required max='20' min='1'>
												<?php echo "<label class='text-danger'>" . form_error('jumlah_list_uraian_kerja') . "</label>"; ?>
											</div>
										</div>
									</div>
									<!-- list_uraian_kerja_hidden untuk menambah inputan ketika  -->
									<div id='list_uraian_kerja_hidden'>
										<div class='list_uraian_kerja_detail'>
											<hr>
											<input type="hidden" name='id[]'>
											<div class="form-group-inner">
												<div class="row">
													<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
														<label class="login2">NAMA URAIAN</label>
													</div>
													<div class="col-lg-9 col-md-8 col-sm-8 col-xs-12">
														<textarea name='uraian_kerja[]' class="form-control" placeholder="Input Uraian Kerja" maxlength='255'></textarea>
													</div>
												</div>
											</div>
											<div class="form-group-inner">
												<div class="row">
													<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
														<label class="login2">SATUAN</label>
													</div>
													<div class="col-lg-9 col-md-8 col-sm-8 col-xs-12">
														<!-- <select class="form-control custom-select-value" name="satuan[]">
															<option value=''>-- PILIH SATUAN --</option>
															<option value='unit'>UNIT</option>
															<option value='m'>M</option>
															<option value='Ls'>Ls</option>
														</select> -->
														<input type="text"
															name='satuan[]' class="form-control" placeholder="Input Satuan" value=''>
													</div>
												</div>
											</div>
											<div class="form-group-inner">
												<div class="row">
													<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
														<label class="login2">VOLUME</label>
													</div>
													<div class="col-lg-9 col-md-8 col-sm-8 col-xs-12">
														<input type="number" value=''
															name='volume[]' class="form-control" placeholder="Input Volume" max='9999'>
													</div>
												</div>
											</div>
											<div class="form-group-inner">
												<div class="row">
													<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
														<label class="login2">BOBOT KONTRAK (%)</label>
													</div>
													<div class="col-lg-9 col-md-8 col-sm-8 col-xs-12">
														<input type="number" value=''
															name='bobot_kontrak[]' class="form-control" placeholder="Input Bobot Kontrak dalam persen" max='100'>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div id='list_uraian_kerja'>
										<?php 
										$index = 1; 

										$uraian_kerja_details = $this->UraianKerja->uraianKerjaDetails($data->id);

										(int) $uraian_kerja_detail_count = set_value("jumlah_list_uraian_kerja") != "" ? set_value("jumlah_list_uraian_kerja") : count($uraian_kerja_details);
										
										for ( $i = 0; $i < $uraian_kerja_detail_count; $i++ ) {
											$uraian_kerja_detail = $uraian_kerja_details[$i]; ?>

											<div class='list_uraian_kerja_detail'>
												<hr>
												
												<input type="hidden" name='id[]' value='<?php echo $uraian_kerja_detail->id; ?>'>
												<div class="form-group-inner">
													<div class="row">
														<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
															<label class="login2">NAMA URAIAN</label>
														</div>
														<div class="col-lg-9 col-md-8 col-sm-8 col-xs-12">
															<textarea name='uraian_kerja[]' class="form-control" placeholder="Input Uraian Kerja" maxlength='255'><?php echo set_value("uraian_kerja[$index]") == "" ? $uraian_kerja_detail->uraian_kerja : set_value("uraian_kerja[$index]"); ?></textarea>
															<?php echo "<label class='text-danger'>" . form_error("uraian_kerja[$index]") . "</label>"; ?>
														</div>
													</div>
												</div>
												<div class="form-group-inner">
													<div class="row">
														<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
															<label class="login2">SATUAN</label>
														</div>
														<div class="col-lg-9 col-md-8 col-sm-8 col-xs-12">
															<!-- <select class="form-control custom-select-value" name="satuan[]">
																<option value=''>-- PILIH SATUAN --</option>
																<option value='unit' <?php echo (set_value("satuan[$index]") == "" && $uraian_kerja_detail->satuan == "unit") || (set_value("satuan[$index]") == "unit" && $uraian_kerja_detail->satuan == "unit") ? "selected": ""; ?>>UNIT</option>
																<option value='m' <?php echo (set_value("satuan[$index]") == "" && $uraian_kerja_detail->satuan == "m") || (set_value("satuan[$index]") == "m" && $uraian_kerja_detail->satuan == "m") ? "selected": ""; ?>>M </option>
																<option value='Ls' <?php echo (set_value("satuan[$index]") == "" && $uraian_kerja_detail->satuan == "Ls") || (set_value("satuan[$index]") == "Ls" && $uraian_kerja_detail->satuan == "Ls") ? "selected": ""; ?>>Ls</option>
															</select> -->
															<input type="text"
															name='satuan[]' class="form-control" placeholder="Input Satuan" value='<?php echo $uraian_kerja_detail->satuan ?? set_value("satuan[$index]"); ?>'>
															<?php echo "<label class='text-danger'>" . form_error("satuan[$index]") . "</label>"; ?>
														</div>
													</div>
												</div>
												<div class="form-group-inner">
													<div class="row">
														<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
															<label class="login2">VOLUME</label>
														</div>
														<div class="col-lg-9 col-md-8 col-sm-8 col-xs-12">
															<input type="number" value='<?php echo set_value("volume[$index]") == "" ? $uraian_kerja_detail->volume : set_value("volume[$index]"); ?>'
																name='volume[]' class="form-control" placeholder="Input Volume" max='9999'>
															<?php echo "<label class='text-danger'>" . form_error("volume[$index]") . "</label>"; ?>
														</div>
													</div>
												</div>
												<div class="form-group-inner">
													<div class="row">
														<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
															<label class="login2">BOBOT KONTRAK (%)</label>
														</div>
														<div class="col-lg-9 col-md-8 col-sm-8 col-xs-12">
															<input type="number" value='<?php echo set_value("bobot_kontrak[$index]") == "" ? $uraian_kerja_detail->bobot_kontrak :  set_value("bobot_kontrak[$index]"); ?>'
																name='bobot_kontrak[]' class="form-control" placeholder="Input Bobot Kontrak dalam persen" max='100'>
															<?php echo "<label class='text-danger'>" . form_error("bobot_kontrak[$index]") . "</label>"; ?>
														</div>
													</div>
												</div>
											</div>
										<?php $index++; } ?>
										<!-- AKAN MUNCUL DISINI FORM TAMBAH -->
									</div>
																		
									<div class="login-btn-inner">
										<div class="row">
											<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12"></div>
											<div class="col-lg-9 col-md-8 col-sm-8 col-xs-12">
												<div class="login-horizental">
													<input type='submit' class="btn btn-sm btn-primary" value='UPDATE'>
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
