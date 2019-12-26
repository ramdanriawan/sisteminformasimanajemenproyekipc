
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
                            <h1>DASHBOARD</h1>
                            <h1>Selamat datang. Berikut daftar proyek dan progress saat ini:</h1>
                        </div>
                    </div>
                    <div class="sparkline13-graph">
                        <div class="datatable-dashv1-list custom-datatable-overright">
                            
                            <table id="table" data-toggle="table" data-pagination="false" data-search="false"
                                data-show-columns="false" data-show-pagination-switch="false"
                                data-show-refresh="false" data-key-events="false" data-show-toggle="false"
                                data-resizable="false" data-cookie="false" data-cookie-id-table="saveId"
                                data-show-export="false" data-click-to-select="false" data-toolbar="false">
                                <thead>
                                    <tr>
                                        <th data-field="checkbox" data-checkbox="false"></th>
                                        <th data-field="no">No.</th>
                                        <th data-field="id">ID PROYEK</th>
                                        <th data-field="nama_proyek">NAMA PROYEK</th>
                                        <th data-field="nomor_kontrak">NOMOR KONTRAK</th>
                                        <th data-field="tipe_user">NAMA REKANAN</th>
                                        <th data-field="progress">PROGRESS</th>
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
                                            
                                             
                                            if ( $data->progress < 34 )
                                            {
                                                $warna_progress_bar = "bg-danger";
                                            }else if ( $data->progress < 67  )
                                            {
                                                $warna_progress_bar = "bg-warning";
                                            }else if ( $data->progress < 99 )
                                            {
                                                $warna_progress_bar = "bg-info";
                                            }else if ( $data->progress < 101 )
                                            {
                                                $warna_progress_bar = "bg-success";
                                            }


                                            // if($no == 3) break;
												echo "
											<tr>
												<td></td>
												<td>$no</td>
												<td>$data->id</td>
												<td>$data->nama_proyek</td>
												<td>$data->nomor_kontrak</td>
												<td>{$this->Proyek->user($data->user_id)->nama_lengkap}</td>
                                                <td>
                                                    <div class='progress'>
                                                        <div class='progress-bar progress-bar-striped {$warna_progress_bar}' role='progressbar' style='width: {$data->progress}%' aria-valuenow='{$data->progress}' aria-valuemin='0' aria-valuemax='100'>{$data->progress}%</div>
                                                    </div>
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