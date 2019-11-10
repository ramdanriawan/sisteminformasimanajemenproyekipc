// untuk membuat format angka nilai uang dengan cleave js
var settings = {
	delimiter: '.',
	numeralDecimalMark: ',',
	numeral: true,
	numericOnly: true,
	prefix: 'Rp'
};

if ($('.cleave1').length)
{
	var cleave1 = new Cleave($('.cleave1'), settings);
}

$(document).ready(function () {
	// settingan untuk sheet js
	function exportToExcel(type, fn, dl) {
		var elt = document.getElementById('tabel1');
		var wb = XLSX.utils.table_to_book(elt, {
			sheet: "Laporan"
		});
		return dl ?
			XLSX.write(wb, {
				bookType: type,
				bookSST: true,
				type: 'base64'
			}) :
			XLSX.writeFile(wb, fn || ('laporan_' + $('#laporanLabaRugi').attr('periode') + '.' + (type || 'xlsx')));
	}

	// mengubah nilai tiap td jika ada perubahan berapa minggu
	$(document).on('change', '#minggu_ke', function () {

		$('td.bobot_rencana').data('minggu-ke', parseInt($(this).val()));
	});

	// untuk menyimpan jadwal rencana
	$(document).on('click', '.inputSimpanJadwalRencana', function (e) {
		var total_bobot_rencana_setiap_uraian_kerja = 0;
		var indexUraianKerja = 0;
		var data_jadwal_rencana = [];
		// e.preventDefault();

		if (!confirm('Konfirmasi perubahan data bobot rencana minggu ke ' + $('#minggu_ke').val() + "?") )
		{
			e.preventDefault(); console.log('');
			
		}

		if (parseInt($('#minggu_ke').val()) > $('#minggu_ke').attr('max'))
		{
			e.preventDefault();
			alert("Maksimal minggu adalah " + $('#minggu_ke').attr('max'));
			
			return;
		}

		if (isNaN($('td.bobot_rencana').text())) 
		{
			e.preventDefault();
			alert("Nilai yang boleh diinput hanyalah angka!");

			return;
		}

		$.each($('td.bobot_rencana'), function(index, el){
			
			if (! isNaN($('td.bobot_rencana').eq(index).text()) )
			{
				if ( parseInt($('td.bobot_rencana').eq(index).text()) > 100 )
				{
					e.preventDefault();
					alert("Nilai maksimum untuk bobot rencana adalah 100!");

					return;
				}

				let list_data_jadwal_rencana = {
					id: parseInt($('td.bobot_rencana').eq(index).data('bobot-rencana-id')),
					uraian_kerja_detail_id: parseInt($('td.bobot_rencana').eq(index).data('uraian-kerja-detail-id')),
					minggu_ke: parseInt($('#minggu_ke').val()),
					bobot_rencana: parseInt($('td.bobot_rencana').eq(index).text())
				};
				
				data_jadwal_rencana.push(list_data_jadwal_rencana);
				
				if (parseInt($('td.bobot_rencana').eq(index).data('uraian-kerja-index')) == indexUraianKerja)
				{
					total_bobot_rencana_setiap_uraian_kerja += parseInt($('td.bobot_rencana').eq(index).text());
					
					if (total_bobot_rencana_setiap_uraian_kerja > 100)
					{
						alert("Maksimum total bobot rencana untuk masing masing uraian kerja adalah 100!");
						e.preventDefault();
						return false;
					}
				}
				else 
				{
					total_bobot_rencana_setiap_uraian_kerja = parseInt($('td.bobot_rencana').eq(index).text());
					
					if (total_bobot_rencana_setiap_uraian_kerja > 100) {
						alert("Maksimum total bobot rencana untuk masing masing uraian kerja adalah 100!");
						e.preventDefault();
						return false;
					}
					indexUraianKerja++;
				}
			}
			
		});

		if (data_jadwal_rencana.length == 0)
		{
			e.preventDefault();
			alert("Tidak ada data yang perlu disimpan!");

			return;
		}

		$('#inputHiddenSimpanJadwalRencana').val(JSON.stringify(data_jadwal_rencana));
	});

	// untuk menyimpan realisasi (hasil copasan dari jadwal rencana karena kodingnya mirip)
	$(document).on('click', '.inputSimpanRealisasi', function (e) {
		// var total_bobot_rencana_setiap_uraian_kerja = 0;
		// var indexUraianKerja = 0;
		var data_jadwal_rencana = [];
		// e.preventDefault();

		if (!confirm('Konfirmasi perubahan data volume realisasi minggu ke ' + $('#minggu_ke').val() + "?") )
		{
			e.preventDefault();
		}

		if (parseInt($('#minggu_ke').val()) > $('#minggu_ke').attr('max'))
		{
			e.preventDefault();
			alert("Maksimal minggu adalah " + $('#minggu_ke').attr('max'));
			
			return;
		}

		if (isNaN($('td.bobot_rencana').text())) 
		{
			e.preventDefault();
			alert("Nilai yang boleh diinput hanyalah angka!");

			return;
		}

		$.each($('td.bobot_rencana'), function(index, el){
			
			if (! isNaN($('td.bobot_rencana').eq(index).text()) )
			{
				// if ( parseInt($('td.bobot_rencana').eq(index).text()) > 100 )
				// {
				// 	e.preventDefault();
				// 	alert("Nilai maksimum untuk volume realisasi adalah 100!");

				// 	return;
				// }

				let list_data_jadwal_rencana = {
					id: parseInt($('td.bobot_rencana').eq(index).data('bobot-rencana-id')),
					// uraian_kerja_id: parseInt($('td.bobot_rencana').eq(index).data('uraian-kerja-id')),
					uraian_kerja_detail_id: parseInt($('td.bobot_rencana').eq(index).data('uraian-kerja-detail-id')),
					minggu_ke: parseInt($('#minggu_ke').val()),
					volume_realisasi: parseInt($('td.bobot_rencana').eq(index).text())
				};
				
				data_jadwal_rencana.push(list_data_jadwal_rencana);
				
			// if (parseInt($('td.bobot_rencana').eq(index).data('uraian-kerja-index')) == indexUraianKerja)
			// {
			// 	total_bobot_rencana_setiap_uraian_kerja += parseInt($('td.bobot_rencana').eq(index).text());
				
			// 	if (total_bobot_rencana_setiap_uraian_kerja > 100)
			// 	{
			// 		alert("Maksimum total bobot rencana untuk masing masing uraian kerja adalah 100!");
			// 		e.preventDefault();
			// 		return false;
			// 	}
			// }
			// else 
			// {
			// 	total_bobot_rencana_setiap_uraian_kerja = parseInt($('td.bobot_rencana').eq(index).text());
				
			// 	if (total_bobot_rencana_setiap_uraian_kerja > 100) {
			// 		alert("Maksimum total bobot rencana untuk masing masing uraian kerja adalah 100!");
			// 		e.preventDefault();
			// 		return false;
			// 	}
			// 	indexUraianKerja++;
			// }
			}
			
		});

		if (data_jadwal_rencana.length == 0)
		{
			e.preventDefault();
			alert("Tidak ada data yang perlu disimpan!");

			return;
		}

		$('#inputHiddenSimpanJadwalRencana').val(JSON.stringify(data_jadwal_rencana));
	});

	// untuk menghilangkan editable di beberapa td
	$.each($('.td_not_editable_a'), function(index, el) {
		var textForNotEditA = $('.td_not_editable_a').eq(index).text();
		$('.td_not_editable_a').eq(index).find('a').remove();
		$('.td_not_editable_a').eq(index).text(textForNotEditA);
	});

	// untuk membuat live search proyek dan jadwal rencana minggu ke
	$('#proyeks').on('keypress', function () {
		$.ajax({
			url: urlCariProyek,
			method: "POST",
			data: {
				q: $(this).val(),
			},
			success: function (response) {
				// variabel tanpa awalan var
				availableTags = JSON.parse(response);
				proyeks = [];

				$.each(availableTags, function (index, el) {
					proyeks.push("Id: " + el.id + ", Nama Proyek: " + el.nama_proyek);
				});

				$("#proyeks").autocomplete({
					source: proyeks,
					minLength: 1
				});

				$("#submit").click(function () {
					$('#id_proyek').val('');
					
					$('#id_proyek').val(availableTags[proyeks.indexOf($("#proyeks").val())].id);
					
					console.log(availableTags);
					console.log(proyeks);
					console.log($("#proyeks").val());
					console.log(availableTags[0].id);
					

					if ($("#submit").data('jadwal-rencana') != 1)
					{
						location.href = locationHrefTampilkanBerdasarkanProyek + parseInt($('#id_proyek').val());
					}
				});

			}
		});
	});

	// untuk menambah inputan list uraian kerja
	$('#jumlah_list_uraian_kerja').on('change', function () {
		
		var jumlah_list_uraian_kerja = parseInt($(this).val());
		var list_uraian_kerja_detail = $('.list_uraian_kerja_detail');

		if (jumlah_list_uraian_kerja >= list_uraian_kerja_detail.length)
		{
			$('#list_uraian_kerja').append($('#list_uraian_kerja_hidden').html());
		}

		else
		{
			let input_list_uraian_kerja_detail = $('#list_uraian_kerja .list_uraian_kerja_detail:last-child').find('input, textarea, select');

			mulai: for( var a = 0; a < 1; a++ )
			{
				for (var i = 0; i < input_list_uraian_kerja_detail.length; i++)
				{
					if ( input_list_uraian_kerja_detail.eq(i).val() !== "" )
					{
						if ( confirm('Beberapa inputan terakhir tidak kosong, yakin akan menghapus?') )
						{
							continue;
						}else 
						{
							$(this).val(parseInt($(this).val()) + 1)
							break mulai;
						}
					}
				}

				$('#list_uraian_kerja .list_uraian_kerja_detail:last-child').remove();
			}
		}
	});

	// untuk nambahin form
	$('div.search input').wrap(`<form action='${form_action_url}' method='post'></form>`).attr('name', input_name).attr('value', input_default_value).attr('placeholder', `Cari ${input_placeholder}`);

	// untuk collapse sidebar
	$(document).on('click', '#sidebarCollapse', function(){
		$('#sidebar').toggleClass('active');
	});

	// untuk mereload ulang halaman data table
	$('button[name=refresh]').click(function(){
		location.href = locationHref;
	});

	// untuk mendelete semua data yang terchecked
	$(document).on('click', '#deleteAllUsers, #deleteAllProyek', function (e) {

		var tdSelected = [];

		$.each($('#table tbody tr.selected').find('td:eq(2)'), function (index, el) {
			tdSelected.push(parseInt($('#table tbody tr.selected').find('td:eq(2)').eq(index).text()));
		});

		$('input[name=deleteAllInput]').val(JSON.stringify(tdSelected));
	});

	// khusus untuk mendelete semua uraian kerja dan uraian kerja details yang terchecked
	$(document).on('click', '#deleteAllUraianKerjaDanUraianKerjaDetails', function(e){
		
		var deleteAllData = {
			tdSelectedUraianKerja: [],
			tdSelectedUraianKerjaDetails: []
		};

		$.each($('#table tbody tr.selected').find('td:eq(2)'), function(index, el){
			if (! isNaN($('#table tbody tr.selected').find('td.uraian_kerja').eq(index).text()) )
			{
				deleteAllData.tdSelectedUraianKerja.push(parseInt($('#table tbody tr.selected').find('td.uraian_kerja').eq(index).text()));
			}
			
			if (! isNaN($('#table tbody tr.selected').find('td.uraian_kerja_details').eq(index).text()) )
			{
				deleteAllData.tdSelectedUraianKerjaDetails.push(parseInt($('#table tbody tr.selected').find('td.uraian_kerja_details').eq(index).text()));
			}
		});

		$('input[name=deleteAllInput]').val(JSON.stringify(deleteAllData));
	});

	// untuk menampilkan data bobot rencana
	$('#formTampilkan').on('submit', function (e) {
		if ($('#id_proyek').val() == "" || $('#proyeks').val() == "") {
			e.preventDefault();

			alert('Belum ada proyek yang dipilih!');

			return;
		}

		// e.preventDefault();
		// console.log($(this).serialize());
		$(this).submit();
		
	});

});