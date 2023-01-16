var temaTable;
$(document).ready(function() {
	$('#tanggal').datepicker({
		format: 'yyyy-mm-dd',
		autoclose:true
	});
	var bulan=$('#bulanku').val();
	var tahun=$('#tahunku').val();
	var idptk=$('#idptk').val();
	var urls = $('#urls').val();
		temaTable = $('#temaTable').DataTable( {
			"destroy":true,
			"dom": '<"row"<"col-lg-6"l><"col-lg-6"f>><"table-responsive"t>p',
			"searching": true,
			"ajax": urls+"modul/kepegawaian/absensi.php?bulan="+bulan+"&tahun="+tahun+"&idptk="+idptk,
			"order": []
		} );
	$('#bulanku').change(function(){
			//Mengambil value dari option select provinsi kemudian parameternya dikirim menggunakan ajax
		var bulan=$('#bulanku').val();
		var tahun=$('#tahunku').val();
		var idptk=$('#idptk').val();
		var urls = $('#urls').val();
		temaTable = $('#temaTable').DataTable( {
			"destroy":true,
			"dom": '<"row"<"col-lg-6"l><"col-lg-6"f>><"table-responsive"t>p',
			"searching": true,
			"ajax": urls+"modul/kepegawaian/absensi.php?bulan="+bulan+"&tahun="+tahun+"&idptk="+idptk,
			"order": []
		} );
	});
	
	$('#tahunku').change(function(){
			//Mengambil value dari option select provinsi kemudian parameternya dikirim menggunakan ajax
		var bulan=$('#bulanku').val();
		var tahun=$('#tahunku').val();
		var idptk=$('#idptk').val();
		var urls = $('#urls').val();
		temaTable = $('#temaTable').DataTable( {
			"destroy":true,
			"dom": '<"row"<"col-lg-6"l><"col-lg-6"f>><"table-responsive"t>p',
			"searching": true,
			"ajax": urls+"modul/kepegawaian/absensi.php?bulan="+bulan+"&tahun="+tahun+"&idptk="+idptk,
			"order": []
		} );
	});
});