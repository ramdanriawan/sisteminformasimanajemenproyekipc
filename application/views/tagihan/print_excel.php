<?php date_default_timezone_set("Asia/Jakarta"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Print Ke Excel</title>
    <script src='<?php echo base_url("assets/js/xlsx.full.min.js"); ?>'></script>
    <script src="<?php echo base_url("assets/js/node_modules/jquery/dist/jquery.min.js"); ?>"></script>
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
    <button style='background-color: #2b982b; color: white; box-shadow: 5px 5px grey; letter-spacing: 1px; padding: 10px 20px;' onclick='exportToExcel("xlsx")'>
        PRINT TO EXCEL
    </button>

    <table cellpadding="2"  style='border-collapse: collapse;' id='table1'>
        <thead>
            <tr>
                <td colspan='5' class='no-border'>
                    <h2 style='text-align:center;'>
                        <u>INVOICE</u>
                    </h2>
                </td>
            </tr>
            <tr>
                <td colspan='5' class='no-border'></td>
            </tr>
            <tr>
                <td colspan='5' class='no-border'></td>
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
                <td colspan='4' class='no-border'>: <?php echo $proyek->nama_proyek; ?></td>
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
                    <strong><?php echo ucwords($this->Helper->terbilang($data->nilai_tagihan)) . " Rupiah"; ?></strong>
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
                <td colspan='5'  class='no-border-bottom no-border' style='text-align: right; padding-right: 30px;'>
                    <div style='width: 200px; float: right; text-align: center;'>
                        Jambi, <?php echo date("d-M-Y"); ?>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan='5'  class='no-border-bottom no-border' style='text-align: right; padding-right: 30px;'>
                    <div style='width: 200px; float: right; text-align: center;'>
                        PT. DATA SOLUSINDO
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan='5'  class='no-border-bottom no-border'>
                    <div style='width: 200px; float: right; text-align: center;'>
                    
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan='5'  class='no-border-bottom no-border'>
                    <div style='width: 200px; float: right; text-align: center;'>
                    
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan='5'  class='no-border-bottom no-border'>
                    <div style='width: 200px; float: right; text-align: center;'>
                    
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan='5'  class='no-border-bottom no-border'>
                    <div style='width: 200px; float: right; text-align: center;'>
                    
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan='5'  class='no-border-bottom no-border'>
                    <div style='width: 200px; float: right; text-align: center;'>
                        <strong>
                            <u>Yogi Saputra</u><br>
                        </strong>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan='5'  class='no-border-bottom no-border'>
                    <div style='width: 200px; float: right; text-align: center;'>
                        <strong>
                            Direktur
                        </strong>
                    </div>
                </td>
            </tr>
            
        </tfoot>
    </table>

<script>
    // settingan untuk sheet js
	function exportToExcel(type, fn, dl) {
		var elt = document.getElementById('table1');
        
        var wb = XLSX.utils.table_to_book(elt, {
			sheet: "Invoice"
		});
        
        return dl ?
			XLSX.write(wb, {
				bookType: type,
				bookSST: true,
				type: 'base64'
            }) :
            
			XLSX.writeFile(wb, fn || ('invoice' + '.' + (type || 'xlsx')));
	}

</script>

</body>
</html>