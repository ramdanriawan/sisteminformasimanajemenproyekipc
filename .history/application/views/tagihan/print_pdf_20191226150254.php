<?php date_default_timezone_set('Asia/Jakarta'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Print Ke Excel</title>

    <style>
        table, th, td {
            border: 1px solid black; 
        }
        .no-border {
            border: none;
        }
        .no-border-right {
            border-right: none;
        }
        .padding-16 {
            padding-right: 16px;
        }
        .no-border-bottom {
            border-bottom: 1px solid white;
        }
        .no-border-bottom-top {
            border-top: 1px solid white;
            border-bottom: 1px solid white;
        }
        table.no-border {
            border: none;
            
        }
    </style>
</head>
<body>

    <table class='no-border' style='border-collapse: collapse;'  cellpadding="2">
        <thead>
            <tr>
                <td colspan='5' class='no-border'>
                    <h2 style='text-align:center;'>
                        <u>INVOICE</u>
                    </h2>
                </td>
            </tr>
            <tr>
                <td class='no-border'>Kepada</td>
                <td colspan='4' class='padding-16 no-border'>: PT. Pelabuhan Indonesia II (Persero) Cabang Jambi</td>
            </tr>
            <tr>
                <td class='no-border'>Alamat</td>
                <td colspan='4' class='no-border'>: Jl. Raya Pelabuhan KML 9 Talang Duku Jambi</td>
            </tr>
            <tr>
                <td class='no-border'>Nama Pekerjaan</td>
                <td colspan='4' class='no-border' style='text-wrap: wrap;'>: <?php echo $proyek->nama_proyek; ?></td>
            </tr>
            
            <tr>
                <td colspan='5' class='no-border'></td>
            </tr>
            <tr>
                <td colspan='5' class='no-border'></td>
            </tr>
            <tr>
                <td colspan='5' class='no-border'></td>
            </tr>
            <tr>
                <td colspan='5' class='no-border'></td>
            </tr>
            <tr>
                <td colspan='5' class='no-border'></td>
            </tr>
            <tr>
                <td colspan='5' class='no-border'></td>
            </tr>
            <tr>
                <td class='no-border'>Nomor Kontrak</td>
                <td colspan='4' class='no-border'>: <?php echo $proyek->nomor_kontrak; ?></td>
            </tr>
            <tr>
                <td class='no-border'>Tanggal Kontrak</td>
                <td colspan='4' class='no-border'>: <?php echo date('d-M-y', strtotime($proyek->tanggal_mulai)); ?></td>
            </tr>
            
            <tr>
                <td colspan='5' class='no-border'></td>
            </tr>
            <tr>
                <td colspan='5' class='no-border'></td>
            </tr>
            <tr>
                <td colspan='5' class='no-border'></td>
            </tr>
            <tr>
                <td colspan='5' class='no-border'></td>
            </tr>
            <tr>
                <td colspan='5' class='no-border'></td>
            </tr>
            <tr>
                <td colspan='5' class='no-border'></td>
            </tr>
        </thead>
    </table>

    <table cellpadding="2"  style='border-collapse: collapse;'>
        <thead>
            <tr style='text-align: left;'>
                <th>NO</th>
                <th>DESCRIPTION</th>
                <th>QTY</th>
                <th>PRICE</th>
                <th>TOTAL</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td colspan='5' class='no-border-bottom-top'></td>
            </tr>
            <tr>
                <td class='no-border-bottom-top'>1</td>
                <td class='no-border-bottom-top'><?php echo $data->nama_tagihan; ?> </td>
                <td class='no-border-bottom-top'>1</td>
                <td class='no-border-bottom-top'><?php echo $this->Helper->toIdr($data->nilai_tagihan); ?></td>
                <td class='no-border-bottom-top'><?php echo $this->Helper->toIdr($data->nilai_tagihan); ?></td>
            </tr>
            <tr>
                <td colspan='5' class='no-border'></td>
            </tr>
            <tr>
                <td colspan='5' class='no-border'></td>
            </tr>
            <tr>
                <td colspan='5' class='no-border'></td>
            </tr>
            <tr>
                <td colspan='5' class='no-border'></td>
            </tr>
            <tr>
                <td colspan='5' class='no-border'></td>
            </tr>
            <tr>
                <td colspan='5' class='no-border'></td>
            </tr>
            <tr>
                <td colspan='5' class='no-border'></td>
            </tr>
            <tr>
                <td colspan='5' class='no-border'></td>
            </tr>
            <tr>
                <td colspan='5' class='no-border'></td>
            </tr>
            <tr>
                <td colspan='5' class='no-border'></td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <td colspan='4'>
                    <strong>Total</strong>
                </td>
                <td style='text-align: center;'>
                    <strong><?php echo $this->Helper->toIdr($data->nilai_tagihan); ?></strong>
                </td>
            </tr>
            
            <tr>
                <td >
                    <strong>Terbilang</strong>
                </td>
                <td colspan='4'>
                    <strong><?php echo ucwords($this->Helper->terbilang($data->nilai_tagihan)).' Rupiah'; ?></strong>
                </td>
            </tr>
            <tr>
                <td colspan='5'>
                    Note:
                    <pre><?php echo $data->note; ?></pre>
                </td>
            </tr>
            <tr>
                <td colspan='4' class='no-border'></td>
            </tr>
            <tr>
                <td colspan='4' class='no-border'></td>
            </tr>
            <tr>
                <td colspan='4' class='no-border'></td>
            </tr>
            <tr>
                <td colspan='4' class='no-border'></td>
            </tr>
            <tr>
                <td colspan='5' class='no-border-bottom no-border'></td>
            </tr>
            <tr>
                <td colspan='5' style='text-align: right; padding-right: 30px;'>
                    <div style='width: 200px; float: right; text-align: center;'>
                        Jambi, <?php echo date('d-M-Y'); ?> <br>
                        PT. DATA SOLUSINDO
                    </div>
                    <div style='clear: both;'></div>
                    <div style='width: 200px; float: right; text-align: center; padding: 30px 0'>
                    
                    </div>
                    <div style='clear: both;'></div>
                    <div style='width: 200px; float: right; text-align: center;'>
                        <strong>
                            <u>Yogi Saputra</u><br>
                            Direktur
                        </strong>
                    </div>
                </td>
            </tr>
            
        </tfoot>
    </table>

    <script>
        print();
    </script>
</body>
</html>