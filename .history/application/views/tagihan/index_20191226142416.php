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
                            <h1>Data Tagihan</h1>
                        </div>
                        <div class="sparkline10-graph">
                            <div class="basic-login-form-ad">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="basic-login-inner inline-basic-form">
                                            <form
                                                action="<?php echo base_url('index.php/uraian_kerja/tampilkan_berdasarkan_proyek'); ?>"
                                                method='post'>
                                                <div class="form-group-inner">
                                                    <div class="row">
                                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                            <div class="form-group">
                                                                <select id="id_proyek" class="form-control"
                                                                    name="id_proyek">
                                                                    <option>--PILIH PROYEK--</option>
                                                                    <?php foreach ($proyeks as $proyek): ?>
                                                                    <option value='<?php echo $proyek->id ?? ''; ?>'
                                                                        <?php if ($proyek->id == $proyek_id): echo 'selected'; endif; ?>>
                                                                        <?php echo "ID: $proyek->id | $proyek->nama_proyek"; ?>
                                                                    </option>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                            </div>
                                                            <!-- <input type="text" id='proyeks' class="form-control basic-ele-mg-b-10 responsive-mg-b-10" placeholder="Cari id / nama proyek" value='<?php echo $q ?? ''; ?>'>
                                                        <input type="hidden" id='id_proyek' class="form-control basic-ele-mg-b-10 responsive-mg-b-10" name='id_proyek'> -->
                                                        </div>
                                                        <div
                                                            class="col-lg-3 col-md-3 col-sm-3 col-xs-12 jarakBtnTampilkan">
                                                            <div class="login-btn-inner">
                                                                <div class="row">
                                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                        <button class="btn btn-sm btn-primary"
                                                                            type="submit" id='submit'>Tampilkan</button>
                                                                    </div>
                                                                </div>
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
                    <div class="sparkline13-graph">
                        <div class="datatable-dashv1-list custom-datatable-overright">
                            <div id="toolbar">
                                <a id='inputBaru' class="inputAllUraianKerja btn btn-primary btn-small color-orange"
                                    href='<?php echo base_url('index.php/tagihan/create/'.$proyek_id ?? ''); ?>'>+Tagihan
                                    Baru</a>
                                <form id='deleteAllForm' action='<?php echo base_url('index.php/tagihan/deleteall'); ?>'
                                    method='post'>
                                    <input name='deleteAllInput' type='hidden' value='' />
                                </form>
                                <button id='deleteAllUraianKerjaDanUraianKerjaDetails'
                                    class="deleteAllUraianKerja btn btn-danger btn-small color-orange"
                                    form='deleteAllForm'
                                    onclick='return confirm("yakin akan menghapus semua data yang telah dipilih?");'
                                    type='submit'>-Tagihan</button>
                                <select class="form-control toolbar">
                                    <option value="basic">Export Basic</option>
                                    <option value="all">Export All</option>
                                    <option value="selected">Export Selected</option>
                                </select>
                            </div>

                            <table id="table" data-toggle="table" data-pagination="true" data-search="true"
                                data-show-columns="false" data-show-pagination-switch="false" data-show-refresh="true"
                                data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true"
                                data-toolbar="#toolbar">
                                <thead>
                                    <tr>
                                        <th data-field="checkbox" data-checkbox="true"></th>
                                        <th data-field="no">No.</th>
                                        <th data-field="id">ID</th>
                                        <th data-field="nama_tagihan">NAMA TAGIHAN</th>
                                        <th data-field="tanggal">TANGGAL</th>
                                        <th data-field="presentase">PRESENTASE</th>
                                        <th data-field="nilai_tagihan">NILAI TAGIHAN</th>
                                        <th data-field="note">NOTE</th>
                                        <th data-field="aksi">AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                        $no = 0;
                                        $bobotKontrakTotal = 0;
                                        $totalPresentase = 0;
                                        $totalNilaiTagihan = 0;

                                        foreach ($datas as $data) {
                                            ++$no;
                                            $urlEdit = base_url("index.php/tagihan/$data->id/edit");
                                            $urlDestroy = base_url("index.php/tagihan/$data->id/destroy");
                                            $urlPrintExcel = base_url("index.php/tagihan/{$data->id}/print_excel");
                                            $urlPrintPdf = base_url("index.php/tagihan/{$data->id}/print_pdf");
                                            $totalPresentase += $data->presentase;
                                            $totalNilaiTagihan += $data->nilai_tagihan;

                                            // if($no == 3) break;
                                            echo "
											<tr>
												<td></td>
												<td>$no</td>
												<td class='uraian_kerja'>$data->id</td>
												<td>$data->nama_tagihan</td>
												<td>{$data->tanggal}</td>
												<td>{$data->presentase}%</td>
												<td>{$this->Helper->toIdr($data->nilai_tagihan)}</td>
                                                <td>
                                                    <pre>{$data->note}</pre>
                                                </td>
												<td class='datatable-ct'>
													<a href='{$urlEdit}'>
														<i class='fa fa-edit'></i>
													</a>
													<a href='{$urlDestroy}' onclick='return confirm(\"yakin akan menghapus data uraian ini?\");'>
														<i class='fa fa-trash'></i>
													</a>
													<a href='{$urlPrintExcel}'>
														<i class='fa fa-file-excel-o'></i>
													</a> 
													<a href='{$urlPrintPdf}'>
														<i class='fa fa-file-pdf-o'></i>
													</a>
												</td>
											</tr>";
                                        }
                                    ?>

                                    <tr>
                                        <td></td>
                                        <td colspan='4' class='text-align-center'>JUMLAH</td>
                                        <td><?php echo $totalPresentase; ?>%</td>
                                        <td><?php echo $this->Helper->toIdr($totalNilaiTagihan); ?></td>
                                        <td colspan='2'></td>
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
    var ignoreColumn = [0, 8];

    // untuk menambahkan lik search di form
    var form_action_url = "<?php echo base_url('index.php/tagihan/search'); ?>";

    // untuk menambahkan default value di form
    var input_default_value = "<?php echo $this->input->post('nama_tagihan'); ?>";

    // untuk menambahkan name apa yang dicari
    var input_name = 'nama_tagihan';

    // untuk menambahkan placeholder sehingga user tau akan mencari berdasarkan apa
    var input_placeholder = "Nama Tagihan";

    // untuk membuat link reload data table
    var locationHref = "<?php echo base_url('index.php/tagihan'); ?>";

    // url cari proyek untuk mencari proyek berdasarkan nama proyek dan juga id
    var urlCariProyek = "<?php echo base_url('index.php/uraian_kerja/cari_proyek'); ?>";

    // url untuk menampilkan berdasarkan proyek
    locationHrefTampilkanBerdasarkanProyek =
        "<?php echo base_url('index.php/tagihan/tampilkan_berdasarkan_proyek'); ?>/";

    var exportTypes = ['excel', 'pdf', 'doc'];
</script>