
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
                            <h1>Data Realisasi</h1>
                        </div>
                        <div class="sparkline10-graph">
                            <div class="basic-login-form-ad">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="basic-login-inner inline-basic-form">
                                            <form
                                                action="<?php echo base_url('index.php/realisasi/tampilkan_berdasarkan_proyek'); ?>"
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
                                <button type='submit' form='formSimpanJadwalRencana' class="inputSimpanRealisasi btn btn-primary btn-small color-orange" >SIMPAN REALISASI</button>
                                <form id='formSimpanJadwalRencana' action='<?php echo base_url('index.php/realisasi/store'); ?>' method='post'>
                                    <input name='inputHiddenSimpanJadwalRencana' id='inputHiddenSimpanJadwalRencana' type='hidden' value=''/>
                                </form>
                                <select class="form-control toolbar">
                                    <option value="">-- Export --</option>
                                    <option value="all">Export All</option>
                                </select>
                            </div>
                            
                            <table id="table" data-toggle="table" data-pagination="true" data-search="true"
                                data-show-columns="false" data-show-pagination-switch="false"
                                data-show-refresh="true" data-key-events="true" data-show-toggle="true"
                                data-resizable="true" data-cookie="true" data-cookie-id-table="saveId"
                                data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                <thead>
                                    <tr>
                                        <th data-field="no">No.</th>
                                        <th data-field="id">ID</th>
                                        <th data-field="nilai_kontrak">URAIAN KERJA</th>
                                        <th data-field="tipe_user">SATUAN</th>
                                        <th data-field="tanggal_mulai">VOLUME</th>
                                        <th data-field="bobot_kontrak">BOBOT <br/> KONTRAK (%)</th>
                                        <th data-field="bobot_rencana">BOBOT <br/> RENCANA (%)</th>
                                        <th data-field="volume_realisasi" data-editable="true">Volume <br/> Realisasi</th>
                                        <th data-field="item">Item (%)</th>
                                        <th data-field="bobot_realisasi">Bobot <br/> Realisasi (%)</th>
                                        <th data-field="deviasi">Deviasi (%)</th>
                                    </tr>
                                    <tr>
                                        <th  class='text-align-center'>(0)</th>
                                        <th  class='text-align-center'>(1)</th>
                                        <th  class='text-align-center'>(2)</th>
                                        <th  class='text-align-center'>(3)</th>
                                        <th  class='text-align-center'>(4)</th>
                                        <th  class='text-align-center'>(5)</th>
                                        <th  class='text-align-center'>(6)</th>
                                        <th  class='text-align-center' data-field="volume_realisasi" data-editable="true">(7)</th>
                                        <th  class='text-align-center'>(8) = (7) / (4) *<br/> 100</th>
                                        <th  class='text-align-center'>(9) = (8) / (100) *<br/> (5)</th>
                                        <th  class='text-align-center'>(10) = (9) - (6)</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                        $bobotKontrakTotal = 0;
                                        $bobotRencanaTotal = 0;
                                        $totalBobotRealisasi = 0;
                                        $totalDeviasi = 0;
                                        $data = $uraian_kerja;
                                        $uraianKerjaIndex = 0;
                                        $no = 0;
                                        $minggu_ke = $minggu_ke ?? 1;

                                        // jika user mencari maka tidak perlu foreach jika tidak maka perlu foreach
                                        if (!$uraian_kerja) {
                                            foreach ($datas as $data) {
                                                ++$no;

                                                // if($no == 3) break;
                                                echo "
                                                <tr class='bg-secondary'>
                                                    <td>$no</td>
                                                    <td class='uraian_kerja'>$data->id</td>
                                                    <td class='text-align-left'>$data->judul_uraian_kerja</td>
                                                    <td>---</td>
                                                    <td>---</td>
                                                    <td class='td_not_editable_a'>-</td>
                                                    <td class='td_not_editable_a'>-</td>
                                                    <td class='td_not_editable_a'>-</td>
                                                    <td class='td_not_editable_a'>-</td>
                                                    <td class='td_not_editable_a'>-</td>
                                                    <td class='td_not_editable_a'>-</td>
                                                </tr>";

                                                $alpha = 'a';
                                                foreach ($this->UraianKerja->uraianKerjaDetails($data->id) as $uraianKerjaDetail) {
                                                    $bobotKontrakTotal += $uraianKerjaDetail->bobot_kontrak;
                                                    $bobotRencana = $this->UraianKerjaDetail->jadwalRencana($uraianKerjaDetail->id, $minggu_ke)->bobot_rencana > 0 ? $this->UraianKerjaDetail->jadwalRencana($uraianKerjaDetail->id, $minggu_ke)->bobot_rencana : '0';
                                                    $bobotRencanaTotal += $bobotRencana;

                                                    $realisasi = $this->UraianKerjaDetail->realisasi($uraianKerjaDetail->id, $minggu_ke);
                                                    // $item = $volumeRealisasi / $uraianKerjaDetail->volume * 100;//(8) = (7) / (4) * 100
                                                    // $bobotRealisasi = $item / 100 * $uraianKerjaDetail->bobot_kontrak;//(9) = (8) / (100) * (5)
                                                    // $deviasi = $bobotRealisasi - $bobotRencana;//(10) = (9) - (6)
                                                    $totalBobotRealisasi += $realisasi->bobot;
                                                    $totalDeviasi += $realisasi->deviasi;

                                                    $realisasiVolumeRealisasi = $realisasi->volume_realisasi != '' ? $realisasi->volume_realisasi : 0;
                                                    $realisasiItem = $realisasi->item != '' ? $realisasi->item : 0;
                                                    $realisasiBobot = $realisasi->bobot != '' ? $realisasi->bobot : 0;
                                                    $realisasiDeviasi = $realisasi->deviasi != '' ? $realisasi->deviasi : 0;
                                                    // if($no == 3) break;
                                                    echo "
                                                <tr>
                                                    <td>$alpha</td>
                                                    <td class='uraian_kerja_details'>$uraianKerjaDetail->id</td>
                                                    <td class='text-align-left'>{$uraianKerjaDetail->uraian_kerja}</td>
                                                    <td>{$uraianKerjaDetail->satuan}</td>
                                                    <td>{$uraianKerjaDetail->volume}</td>
                                                    <td>{$uraianKerjaDetail->bobot_kontrak}</td>
                                                    <td>{$bobotRencana}</td>
                                                    <td class='bobot_rencana' data-uraian-kerja-index='$uraianKerjaIndex' data-uraian-kerja-detail-id='$uraianKerjaDetail->id' data-minggu-ke='{$minggu_ke}' data-bobot-rencana-id='{$realissi->id}' data-uraian-kerja-id='{$data->id}'>{$realisasiVolumeRealisasi}</td>
                                                    <td>{$realisasiItem}</td>
                                                    <td>{$realisasiBobot}</td>
                                                    <td>{$realisasiDeviasi}</td>
                                                </tr>";

                                                    ++$alpha;
                                                }
                                                ++$uraianKerjaIndex;
                                            }
                                        } else {
                                            ++$no;

                                            // if($no == 3) break;
                                            echo "
                                            <tr class='bg-secondary'>
                                                <td>$no</td>
                                                <td class='uraian_kerja'>$data->id</td>
                                                <td  class='text-align-left'>$data->judul_uraian_kerja</td>
                                                <td>---</td>
                                                <td>---</td>
                                                <td class='td_not_editable_a'>-</td>
                                                <td class='td_not_editable_a'>-</td>
                                                <td class='td_not_editable_a'>-</td>
                                                <td class='td_not_editable_a'>-</td>
                                                <td class='td_not_editable_a'>-</td>
                                                <td class='td_not_editable_a'>-</td>
                                            </tr>";

                                            $alpha = 'a';
                                            foreach ($this->UraianKerja->uraianKerjaDetails($data->id) as $uraianKerjaDetail) {
                                                $bobotKontrakTotal += $uraianKerjaDetail->bobot_kontrak;
                                                $bobotRencana = $this->UraianKerjaDetail->jadwalRencana($uraianKerjaDetail->id, $minggu_ke)->bobot_rencana > 0 ? $this->UraianKerjaDetail->jadwalRencana($uraianKerjaDetail->id, $minggu_ke)->bobot_rencana : '0';
                                                $bobotRencanaTotal += $bobotRencana;

                                                $realisasi = $this->UraianKerjaDetail->realisasi($uraianKerjaDetail->id, $minggu_ke);
                                                // $item = $volumeRealisasi / $uraianKerjaDetail->volume * 100;//(8) = (7) / (4) * 100
                                                // $bobotRealisasi = $item / 100 * $uraianKerjaDetail->bobot_kontrak;//(9) = (8) / (100) * (5)
                                                // $deviasi = $bobotRealisasi - $bobotRencana;//(10) = (9) - (6)
                                                $totalBobotRealisasi += $realisasi->bobot;
                                                $totalDeviasi += $realisasi->deviasi;

                                                $realisasiVolumeRealisasi = $realisasi->volume_realisasi != '' ? $realisasi->volume_realisasi : 0;
                                                $realisasiItem = $realisasi->item != '' ? $realisasi->item : 0;
                                                $realisasiBobot = $realisasi->bobot != '' ? $realisasi->bobot : 0;
                                                $realisasiDeviasi = $realisasi->deviasi != '' ? $realisasi->deviasi : 0;
                                                // if($no == 3) break;
                                                echo "
                                                <tr>
                                                    <td>$alpha</td>
                                                    <td class='uraian_kerja_details'>$uraianKerjaDetail->id</td>
                                                    <td class='text-align-left'>{$uraianKerjaDetail->uraian_kerja}</td>
                                                    <td>{$uraianKerjaDetail->satuan}</td>
                                                    <td>{$uraianKerjaDetail->volume}</td>
                                                    <td>{$uraianKerjaDetail->bobot_kontrak}</td>
                                                    <td>{$bobotRencana}</td>
                                                    <td class='bobot_rencana' data-uraian-kerja-index='$uraianKerjaIndex' data-uraian-kerja-detail-id='$uraianKerjaDetail->id' data-minggu-ke='{$minggu_ke}' data-bobot-rencana-id='{$realissi->id}' data-uraian-kerja-id='{$data->id}'>{$realisasiVolumeRealisasi}</td>
                                                    <td>{$realisasiItem}</td>
                                                    <td>{$realisasiBobot}</td>
                                                    <td>{$realisasiDeviasi}</td>
                                                </tr>";

                                                ++$alpha;
                                            }
                                            ++$uraianKerjaIndex;
                                        }

                                    ?>

                                    <?php if ($uraian_kerja): ?>
                                    <tr>
                                        <td colspan='5' class='td_not_editable_a text-align-center'>Total</td>
                                        <td><?php echo $bobotKontrakTotal; ?>%</td>
                                        <td><?php echo $bobotRencanaTotal; ?>%</td>
                                        <td></td>
                                        <td></td>
                                        <td><?php echo $totalBobotRealisasi; ?></td>
                                        <td><?php echo $totalDeviasi; ?></td>
                                    </tr>
                                    <?php endif; ?>
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
var ignoreColumn = [];

// untuk menambahkan lik search di form
var form_action_url = "<?php echo base_url('index.php/realisasi/search'); ?>";

// untuk menambahkan default value di form
var input_default_value = "<?php echo $this->input->post('no_uraian_kerja'); ?>";

// untuk menambahkan name apa yang dicari
var input_name = 'judul_uraian_kerja';

// untuk menambahkan placeholder sehingga user tau akan mencari berdasarkan apa
var input_placeholder = "Hanya bisa filter";

// untuk membuat link reload data table
var locationHref = "<?php echo base_url('index.php/realisasi'); ?>";

// url cari proyek untuk mencari proyek berdasarkan nama proyek dan juga id
var urlCariProyek = "<?php echo base_url('index.php/uraian_kerja/cari_proyek'); ?>";

// url untuk menampilkan berdasarkan proyek
locationHrefTampilkanBerdasarkanProyek = "<?php echo base_url('index.php/uraian_kerja/tampilkan_berdasarkan_proyek'); ?>/";
</script>
