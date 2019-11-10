
<!-- Static Table Start -->
<div class="data-table-area mg-tb-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="sparkline13-list">
					<div class="sparkline13-hd">
						<div class="main-sparkline13-hd">
							<?php echo $this->Helper->showMsgAlert(); ?>
                        </div>
                        <div class="main-sparkline13-hd">
                            <h1>Data Proyek</h1>
                        </div>
                    </div>
                    <div class="sparkline13-graph">
                        <div class="datatable-dashv1-list custom-datatable-overright">
                            <div id="toolbar">
                                <a id='inputBaru' class="inputAllProyek btn btn-primary btn-small color-orange" href='<?php echo base_url('index.php/proyek/create'); ?>'>+Proyek Baru</a>
                                <form id='deleteAllForm' action='<?php echo base_url('index.php/proyek/deleteall'); ?>' method='post'>
                                    <input name='deleteAllInput' type='hidden' value=''/>
                                </form>
                                <button id='deleteAllProyek' class="deleteAllProyek btn btn-danger btn-small color-orange" form='deleteAllForm' onclick='return confirm("yakin akan menghapus semua data yang telah dipilih?");' type='submit'>- Proyek</button>
                                <select class="form-control toolbar">
                                    <option value="basic">Export Basic</option>
                                    <option value="all">Export All</option>
                                    <option value="selected">Export Selected</option>
                                </select>
                            </div>
                            
                            <table id="table" data-toggle="table" data-pagination="true" data-search="true"
                                data-show-columns="false" data-show-pagination-switch="false"
                                data-show-refresh="true" data-key-events="true" data-show-toggle="true"
                                data-resizable="true" data-cookie="true" data-cookie-id-table="saveId"
                                data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                <thead>
                                    <tr>
                                        <th data-field="checkbox" data-checkbox="true"></th>
                                        <th data-field="no">No.</th>
                                        <th data-field="id">ID PROYEK</th>
                                        <th data-field="nama_proyek">NAMA PROYEK</th>
                                        <th data-field="nomor_kontrak">NOMOR KONTRAK</th>
                                        <th data-field="nilai_kontrak">NILAI KONTRAK</th>
                                        <th data-field="tipe_user">NAMA REKANAN</th>
                                        <th data-field="tanggal_mulai">TANGGAL MULAI</th>
                                        <th data-field="tanggal_selesai">TANGGAL SELESAI</th>
                                        <th data-field="aksi">AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php 
                                        $no = 0;
                                        foreach($datas as $data)
                                        {
                                            $no += 1;
                                            $urlEdit = base_url("index.php/proyek/$data->id/edit");
                                            $urlDestroy = base_url("index.php/proyek/$data->id/destroy");
                                            
                                            // if($no == 3) break;
												echo "
											<tr>
												<td></td>
												<td>$no</td>
												<td>$data->id</td>
												<td>$data->nama_proyek</td>
												<td>$data->nomor_kontrak</td>
												<td>{$this->Helper->toIdr($data->nilai_kontrak)}</td>
												<td>{$this->Proyek->user($data->user_id)->nama_lengkap}</td>
												<td>{$this->Helper->toDate($data->tanggal_mulai)}</td>
												<td>{$this->Helper->toDate($data->tanggal_selesai)}</td>
												<td class='datatable-ct'>
													<a href='{$urlEdit}'>
														<i class='fa fa-edit'></i>
													</a>
													<a href='{$urlDestroy}' onclick='return confirm(\"yakin akan menghapus data proyek ini?\");'>
														<i class='fa fa-trash'></i>
													</a>
												</td>
											</tr>";
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
//digunakan untuk merubah column yang terlihat saat diexport
var ignoreColumn = [0, 1, 9];

// untuk menambahkan lik search di form
var form_action_url = "<?php echo base_url('index.php/proyek/search'); ?>";

// untuk menambahkan default value di form
var input_default_value = "<?php echo $this->input->post('nama_proyek'); ?>";

// untuk menambahkan name apa yang dicari
var input_name = 'nama_proyek';

// untuk menambahkan placeholder sehingga user tau akan mencari berdasarkan apa
var input_placeholder = "Nama Proyek";

// untuk membuat link reload data table
var locationHref = "<?php echo base_url('index.php/proyek'); ?>";
</script>
