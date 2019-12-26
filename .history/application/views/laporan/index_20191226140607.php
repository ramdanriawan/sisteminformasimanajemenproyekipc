<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="sparkline13-list">
            <div class="sparkline13-hd">
                <div class="main-sparkline13-hd">
                    <?php echo $this->Helper->showMsgAlert(); ?>
                </div>
                <div class="main-sparkline13-hd">
                    <h1>Data Laporan</h1>
                </div>
            </div>
            <div class="sparkline13-graph">
                <form id="formTampilkan"
                    action='<?php echo base_url('index.php/laporan/tampilkanBerdasarkanProyek'); ?>' method='post'>
                    <div class="basic-login-form-ad">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="basic-login-inner inline-basic-form">
                                    <div class="form-group-inner">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                <label for='proyeks'>Pilih proyek: </label>
                                                <select id="id_proyek" class="form-control" name="id_proyek">
                                                    <option>--PILIH PROYEK--</option>
                                                    <?php foreach ($proyeks as $proyekData): ?>
                                                    <option value='<?php echo $pproyekData->id ?? ''; ?>'
                                                        <?php if ($proyek->id == $proyek_id): echo 'selected'; endif; ?>>
                                                        <?php echo "ID: $proyek->id | $proyek->nama_proyek"; ?>
                                                    </option>
                                                    <?php endforeach; ?>
                                                </select>
                                                <!-- <input type="text" id='proyeks'
                                                    class="form-control basic-ele-mg-b-10 responsive-mg-b-10"
                                                    placeholder="Cari id / nama proyek" value='<?php echo $q ?? ''; ?>' 
                                                    required
                                                    > -->
                                                <!-- <input type="hidden" id='id_proyek'
                                                    class="form-control basic-ele-mg-b-10 responsive-mg-b-10"
                                                    name='id_proyek'
                                                    value="<?php echo $proyek_id; ?>"
                                                    > -->
                                                <?php echo form_error('id_proyek'); ?>
                                            </div>
                                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                                <label for='minggu_ke'>Minggu Ke: </label>
                                                <input type="number" id='minggu_ke' name='minggu_ke'
                                                    class="form-control basic-ele-mg-b-10 responsive-mg-b-10"
                                                    placeholder="Minggu ke" value='<?php echo $minggu_ke ?? ''; ?>'
                                                    min='1' max='100' required>
                                                <?php echo form_error('minggu_ke'); ?>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                <div class="login-btn-inner">
                                                    <div class="row">
                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                            <label style='color: white;'>---</label><br>
                                                            <button class="btn btn-sm btn-primary" type="submit"
                                                                id='submit'>Tampilkan</button>
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
                </form>
            </div>
            <div class="sparkline13-graph">
                <div class="datatable-dashv1-list custom-datatable-overright">

                    <table id="table" data-toggle="table" data-pagination="false" data-search="false"
                        data-show-columns="false" data-show-pagination-switch="false" data-show-refresh="false"
                        data-key-events="false" data-show-toggle="false" data-resizable="true" data-cookie="true"
                        data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="false">
                        <thead>
                            <tr>
                                <th colspan='16'></th>
                            </tr>
                            <tr>
                                <th colspan='16' class='text-align-center'>LAPORAN REALISASI PEKERJAAN</th>
                            </tr>
                            <tr>
                                <th colspan='16'></th>
                            </tr>
                            <tr>
                                <th></th>
                                <th style='text-align:left;'>Periode</th>
                                <th>: &nbsp;&nbsp;<?php echo $periode_awal.' s/d '.$periode_akhir; ?></th>
                                <th colspan='13'></th>
                            </tr>
                            <tr>
                                <th></th>
                                <th>Minggu Ke</th>
                                <th>: &nbsp;&nbsp;<?php echo $minggu_ke; ?></th>
                                <th colspan='13'></th>
                            </tr>
                            <tr>
                                <th></th>
                                <th>Kontraktor</th>
                                <th>: &nbsp;&nbsp;<?php echo $this->Proyek->user($proyek->user_id)->nama_lengkap; ?>
                                </th>
                                <th colspan='13'></th>
                            </tr>
                            <tr>
                                <th></th>
                                <th>Nama Proyek</th>
                                <th>: &nbsp;&nbsp;<?php echo $proyek->nama_proyek; ?></th>
                                <th colspan='13'></th>
                            </tr>
                            <tr>
                                <th></th>
                                <th>Nomor Kontrak</th>
                                <th>: &nbsp;&nbsp;<?php echo $proyek->nomor_kontrak; ?></th>
                                <th colspan='13'></th>
                            </tr>
                            <tr>
                                <th></th>
                                <th>Nilai Kontrak</th>
                                <th>: &nbsp;&nbsp;<?php echo $this->Helper->toIdr($proyek->nilai_kontrak); ?></th>
                                <th colspan='13'></th>
                            </tr>
                            <tr>
                                <th></th>
                                <th>Tanggal Mulai</th>
                                <th>: &nbsp;&nbsp;<?php echo $tanggal_mulai; ?></th>
                                <th colspan='13'></th>
                            </tr>
                            <tr>
                                <th></th>
                                <th>Tanggal Selesai</th>
                                <th>: &nbsp;&nbsp;<?php echo $tanggal_selesai; ?></th>
                                <th colspan='13'></th>
                            </tr>
                            <tr>
                                <th></th>
                                <th>Waktu Pekerjaan</th>
                                <th>: &nbsp;&nbsp;<?php echo $waktu_pekerjaan; ?> Hari Kalender</th>
                                <th colspan='13'></th>
                            </tr>
                            <tr>
                                <th colspan='16'></th>
                            </tr>
                            <tr>
                                <th data-field="no" rowspan='3'>No.</th>
                                <th data-field="nilai_kontrak" rowspan='3'>URAIAN KERJA</th>
                                <th data-field="tipe_user" rowspan='3'>SATUAN</th>
                                <th data-field="tanggal_mulai" rowspan='2' colspan='2'>KONTRAK</th>
                                <th data-field="tipe_user" colspan='9' class='text-center line-height-50'>progres
                                    PEKERJAAN FISIK MINGGUAN</th>
                                <th data-field="bobot_kontrak" rowspan='3'>progres<br> RENCANA (%)</th>
                                <th data-field="deviasi" rowspan='3'>Deviasi /<br> SELISIH (%)</th>
                            </tr>
                            <tr>

                                <th colspan='3'>
                                    S.D. MINGGU LALU
                                </th>
                                <th colspan='3'>
                                    MINGGU INI
                                </th>
                                <th colspan='3'>
                                    S.D. MINGGU INI
                                </th>
                            </tr>
                            <tr>
                                <!-- kontrak -->
                                <th>
                                    Volume
                                </th>
                                <th>
                                    Bobot (%)
                                </th>

                                <!-- s/d minggu ini -->
                                <th>
                                    Volume
                                </th>
                                <th>
                                    % Item
                                </th>
                                <th>
                                    % Bobot
                                </th>

                                <th>
                                    Volume
                                </th>
                                <th>
                                    % Item
                                </th>
                                <th>
                                    % Bobot
                                </th>

                                <th>
                                    Volume
                                </th>
                                <th>
                                    % Item
                                </th>
                                <th>
                                    % Bobot
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $no = 0;
                                $bobotKontrakTotal = 0;
                                foreach ($datas as $data) {
                                    ++$no;
                                    // if($no == 3) break;
                                    echo "
                                    <tr class='bg-secondary'>
                                        <td>$no</td>
                                        <td>$data->judul_uraian_kerja</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                    </tr>";

                                    $alpha = 'a';
                                    $realisasiMingguLaluBobotTotal = 0;
                                    $realisasiMingguIniBobotTotal = 0;
                                    $realisasiSampaiMingguIniBobotTotal = 0;
                                    $progresRencanaTotal = 0;
                                    $deviasiTotal = 0;
                                    foreach ($this->UraianKerja->uraianKerjaDetails($data->id) as $uraianKerjaDetail) {
                                        $bobotKontrakTotal += $uraianKerjaDetail->bobot_kontrak;
                                        $jadwalRencana = $this->UraianKerjaDetail->jadwalRencana($uraianKerjaDetail->id, $minggu_ke);
                                        $realisasiMingguLalu = $this->UraianKerjaDetail->realisasi($uraianKerjaDetail->id, $minggu_ke - 1);
                                        $realisasiMingguIni = $this->UraianKerjaDetail->realisasi($uraianKerjaDetail->id, $minggu_ke);

                                        $realisasiSampaiMingguIniVolumeRealisasi = $realisasiMingguIni->volume_realisasi + $realisasiMingguLalu->volume_realisasi;
                                        $realisasiSampaiMingguIniItem = $realisasiMingguIni->item + $realisasiMingguLalu->item;
                                        $realisasiSampaiMingguIniBobot = $realisasiMingguIni->bobot + $realisasiMingguLalu->bobot;

                                        $deviasi = $realisasiSampaiMingguIniBobot - $jadwalRencana->bobot_rencana;

                                        $realisasiMingguLaluBobotTotal += $realisasiMingguLalu->bobot;
                                        $realisasiMingguIniBobotTotal += $realisasiMingguIni->bobot;
                                        $realisasiSampaiMingguIniBobotTotal += $realisasiSampaiMingguIniBobot;

                                        $progresRencanaTotal += $jadwalRencana->bobot_rencana;
                                        $deviasiTotal += $deviasi;
                                        // if($no == 3) break;
                                        echo "
                                        <tr>
                                            <td>$alpha</td>
                                            <td>{$uraianKerjaDetail->uraian_kerja}</td>
                                            <td>{$uraianKerjaDetail->satuan}</td>
                                            <td>{$uraianKerjaDetail->volume}</td>
                                            <td>{$uraianKerjaDetail->bobot_kontrak}</td>
                                            <td>{$realisasiMingguLalu->volume_realisasi}</td>
                                            <td>{$realisasiMingguLalu->item}</td>
                                            <td>{$realisasiMingguLalu->bobot}</td>
                                            <td>{$realisasiMingguIni->volume_realisasi}</td>
                                            <td>{$realisasiMingguIni->item}</td>
                                            <td>{$realisasiMingguIni->bobot}</td>
                                            <td>{$realisasiSampaiMingguIniVolumeRealisasi}</td>
                                            <td>{$realisasiSampaiMingguIniItem}</td>
                                            <td>{$realisasiSampaiMingguIniBobot}</td>
                                            <td>{$jadwalRencana->bobot_rencana}</td>
                                            <td>{$deviasi}</td>
                                        </tr>";

                                        ++$alpha;
                                    }
                                }
                            ?>

                            <tr>
                                <td colspan='4' class='td_not_editable_a text-align-center'>Total</td>
                                <td><?php echo $bobotKontrakTotal; ?></td>
                                <td></td>
                                <td></td>
                                <td><?php echo $realisasiMingguLaluBobotTotal; ?></td>

                                <td></td>
                                <td></td>
                                <td><?php echo $realisasiMingguIniBobotTotal; ?></td>


                                <td></td>
                                <td></td>
                                <td><?php echo $realisasiSampaiMingguIniBobotTotal; ?></td>

                                <td><?php echo $progresRencanaTotal; ?></td>
                                <td><?php echo $deviasiTotal; ?></td>
                            </tr>
                            <tr>
                                <td colspan='16'></td>
                            </tr>
                            <tr>
                                <td colspan='9' rowspan='4'></td>
                                <td colspan='4'>Monitoring progres S/D tanggal</td>
                                <td colspan='3'><?php echo $periode_akhir; ?></td>
                            </tr>
                            <tr>
                                <td colspan='4'>progres rencana</td>
                                <td colspan='2'>(%)</td>
                                <td><?php echo $progresRencanaTotal; ?></td>
                            </tr>
                            <tr>
                                <td colspan='4'>progres aktual</td>
                                <td colspan='2'>(%)</td>
                                <td><?php echo $realisasiSampaiMingguIniBobotTotal; ?></td>
                            </tr>
                            <tr>
                                <td colspan='4'>devisiasi</td>
                                <td colspan='2'>(%)</td>
                                <td><?php echo $deviasiTotal; ?></td>
                            </tr>
                            <tr></tr>
                            <tr></tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan='16'></td>
                            </tr>
                            <tr>
                                <td colspan='16'></td>
                            </tr>
                            <tr>
                                <th></th>
                                <th colspan='5' rowspan='4' class='text-align-center'>
                                    DGM OPERASI & TEKNIK <br>
                                    PT. PELABUHAN INDONESIA II (PERSERO) <br>
                                    CABANG JAMBI
                                </th>
                                <th colspan='5' rowspan='4' class='text-align-center'>
                                    DIPERIKSA OLEH <br>
                                    ASISTEN DGM TEKNIK (PERSERO) <br>
                                </th>
                                <th colspan='5' rowspan='4' class='text-align-center'>
                                    DIAJUKAN OLEH <br>
                                    PT. DATA SOLUSINDO <br>
                                </th>
                            </tr>

                            <tr>
                                <th></th>
                                <th colspan='5'></th>
                                <th colspan='5'></th>
                                <th colspan='5'></th>
                            </tr>
                            <tr>
                                <th></th>
                                <th colspan='5'></th>
                                <th colspan='5'></th>
                                <th colspan='5'></th>
                            </tr>
                            <tr>
                                <th></th>
                                <th colspan='5'></th>
                                <th colspan='5'></th>
                                <th colspan='5'></th>
                            </tr>
                            <tr>
                                <th></th>
                                <th colspan='5'></th>
                                <th colspan='5'></th>
                                <th colspan='5'></th>
                            </tr>
                            <tr>
                                <th></th>
                                <th colspan='5' class='text-align-center'>
                                    TRI SUSILO PRAWOKO
                                    (NIPP. 265105688)
                                </th>
                                <th colspan='5' class='text-align-center'>
                                    ISPIN ROZALI
                                    (NIPP. 272026830)
                                </th>
                                <th colspan='5' class='text-align-center'>
                                    YOGI SAPUTRA
                                    (Direktur)
                                </th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // url cari proyek untuk mencari proyek berdasarkan nama proyek dan juga id
    var urlCariProyek = "<?php echo base_url('index.php/uraian_kerja/cari_proyek'); ?>";
    var ignoreColumn = [];
    var exportTypes = ['png', 'excel'];
    var form_action_url = "";
    var input_name = "";
    var input_default_value = "";
    var input_placeholder = "";
    var input_placeholder = "";
</script>