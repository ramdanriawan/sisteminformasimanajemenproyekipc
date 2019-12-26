
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
                            <h1>Data Uraian Kerja</h1>
                        </div>
                        <div class="sparkline10-graph">
                            <div class="basic-login-form-ad">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="basic-login-inner inline-basic-form">
                                        <f
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                        <div class="form-group">
                                                            <select id="id_proyek" class="form-control" name="id_proyek">
                                                                <option>--PILIH PROYEK--</option>
                                                                <?php foreach ($proyeks as $proyek): ?>
                                                                    <option value='<?php echo $proyek->id; ?>'><?php echo "ID: $proyek->id | $proyek->nama_proyek"; ?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                        <!-- <input type="text" id='proyeks' class="form-control basic-ele-mg-b-10 responsive-mg-b-10" placeholder="Cari id / nama proyek" value='<?php echo $q ?? ''; ?>'>
                                                        <input type="hidden" id='id_proyek' class="form-control basic-ele-mg-b-10 responsive-mg-b-10" name='id_proyek'> -->
                                                    </div>
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 jarakBtnTampilkan">
                                                        <div class="login-btn-inner">
                                                            <div class="row">
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                    <button class="btn btn-sm btn-primary" type="button" id='submit'>Tampilkan</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="sparkline13-graph">
                        <div class="datatable-dashv1-list custom-datatable-overright">
                            <div id="toolbar">
                                <a id='inputBaru' class="inputAllUraianKerja btn btn-primary btn-small color-orange" href='<?php echo base_url('index.php/uraian_kerja/create/'.$proyek_id ?? ''); ?>'>+Uraian Kerja Baru</a>
                                <form id='deleteAllForm' action='<?php echo base_url('index.php/uraian_kerja/deleteall'); ?>' method='post'>
                                    <input name='deleteAllInput' type='hidden' value=''/>
                                </form>
                                <button id='deleteAllUraianKerjaDanUraianKerjaDetails' class="deleteAllUraianKerja btn btn-danger btn-small color-orange" form='deleteAllForm' onclick='return confirm("yakin akan menghapus semua data yang telah dipilih?");' type='submit'>- Uraian Kerja</button>
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
                                        <th data-field="id">ID</th>
                                        <th data-field="nilai_kontrak">URAIAN KERJA</th>
                                        <th data-field="tipe_user">SATUAN</th>
                                        <th data-field="tanggal_mulai">VOLUME</th>
                                        <th data-field="tanggal_selesai">BOBOT <br/> KONTRAK (%)</th>
                                        <th data-field="aksi">AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                        $no = 0;
                                        $bobotKontrakTotal = 0;
                                        foreach ($datas as $data) {
                                            ++$no;
                                            $urlEdit = base_url("index.php/uraian_kerja/$data->id/edit");
                                            $urlDestroy = base_url("index.php/uraian_kerja/$data->id/destroy");

                                            // if($no == 3) break;
                                            echo "
											<tr class='bg-secondary'>
												<td></td>
												<td>$no</td>
												<td class='uraian_kerja'>$data->id</td>
												<td>$data->judul_uraian_kerja</td>
												<td>-</td>
												<td>-</td>
												<td>-</td>
												<td class='datatable-ct'>
													<a href='{$urlEdit}'>
														<i class='fa fa-edit'></i>
													</a>
													<a href='{$urlDestroy}' onclick='return confirm(\"yakin akan menghapus data uraian ini?\");'>
														<i class='fa fa-trash'></i>
													</a>
												</td>
											</tr>";

                                            $alpha = 'a';
                                            foreach ($this->UraianKerja->uraianKerjaDetails($data->id) as $uraianKerjaDetail) {
                                                $bobotKontrakTotal += $uraianKerjaDetail->bobot_kontrak;
                                                $urlDestroy = base_url("index.php/uraian_kerja_detail/$uraianKerjaDetail->id/destroy");

                                                // if($no == 3) break;
                                                echo "
                                                <tr>
                                                    <td></td>
                                                    <td>$alpha</td>
                                                    <td class='uraian_kerja_details'>$uraianKerjaDetail->id</td>
                                                    <td>{$uraianKerjaDetail->uraian_kerja}</td>
                                                    <td>{$uraianKerjaDetail->satuan}</td>
                                                    <td>{$uraianKerjaDetail->volume}</td>
                                                    <td>{$uraianKerjaDetail->bobot_kontrak}</td>
                                                    <td class='datatable-ct'>
													    <a href='{$urlDestroy}' onclick='return confirm(\"yakin akan menghapus data uraian ini?\");'>
														    <i class='fa fa-trash'></i>
													    </a>
                                                    </td>
                                                </tr>";

                                                ++$alpha;
                                            }
                                        }
                                    ?>

                                    <tr>
                                        <td class='hilangkanCheckbox'></td>
                                        <td colspan='5' class='text-align-center'>JUMLAH</td>
                                        <td>
                                            <strong><?php echo $bobotKontrakTotal; ?>%</strong>
                                        </td>
                                        <td></td>
                                    </tr>
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
var ignoreColumn = [0, 7];

// untuk menambahkan lik search di form
var form_action_url = "<?php echo base_url('index.php/uraian_kerja/search'); ?>";

// untuk menambahkan default value di form
var input_default_value = "<?php echo $this->input->post('no_uraian_kerja'); ?>";

// untuk menambahkan name apa yang dicari
var input_name = 'judul_uraian_kerja';

// untuk menambahkan placeholder sehingga user tau akan mencari berdasarkan apa
var input_placeholder = "Judul Uraian Kerja";

// untuk membuat link reload data table
var locationHref = "<?php echo base_url('index.php/uraian_kerja'); ?>";

// url cari proyek untuk mencari proyek berdasarkan nama proyek dan juga id
var urlCariProyek = "<?php echo base_url('index.php/uraian_kerja/cari_proyek'); ?>";

// url untuk menampilkan berdasarkan proyek
locationHrefTampilkanBerdasarkanProyek = "<?php echo base_url('index.php/uraian_kerja/tampilkan_berdasarkan_proyek'); ?>/";
</script>
