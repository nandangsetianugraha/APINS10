"use strict";
var tpTable;
	$(document).ready(function() {
		
		$('#kelas').change(function(){
			//Mengambil value dari option select kd kemudian parameternya dikirim menggunakan ajax
			var kelas = $('#kelas').val();
			var tapel = $('#tapel').val();
			var smt = $('#smt').val();
			var proyek = $('#proyek').val();
			$.ajax({
				type : 'GET',
				url : 'modul/proyek/daftar-proyek.php',
				data :  'kelas='+kelas+'&proyek='+proyek+'&smt='+smt+'&tapel='+tapel,
				beforeSend: function()
				{	
					$("#loading").show();
					$(".loader").show();
				},
				success: function (data) {
					$("#loading").hide();
					$(".loader").hide();
					//jika data berhasil didapatkan, tampilkan ke dalam option select mp
					$("#proyek").html(data);
					$("#siswa").html('<option value="0">Pilih Siswa</option>');
					$("#nilaiHarian").html('<div class="alert alert-info alert-dismissible"><h4><i class="icon fa fa-info"></i> Informasi</h4>Silahkan Pilih Proyek</div>');
				}
			});
		});
		$('#proyek').change(function(){
			var kelas = $('#kelas').val();
			var tapel = $('#tapel').val();
			var smt = $('#smt').val();
			var proyek = $('#proyek').val();
			$.ajax({
				type : 'GET',
				url : 'modul/proyek/daftar-siswa.php',
				data :  'kelas='+kelas+'&proyek='+proyek+'&smt='+smt+'&tapel='+tapel,
				beforeSend: function()
				{	
					$("#loading").show();
					$(".loader").show();
				},
				success: function (data) {
					$("#loading").hide();
					$(".loader").hide();
					//jika data berhasil didapatkan, tampilkan ke dalam option select mp
					$("#siswa").html(data);
					$("#nilaiHarian").html('<div class="alert alert-info alert-dismissible"><h4><i class="icon fa fa-info"></i> Informasi</h4>Silahkan Pilih Siswa</div>');
				}
			});
		});
		$('#siswa').change(function(){
			var kelas = $('#kelas').val();
			var tapel = $('#tapel').val();
			var smt = $('#smt').val();
			var proyek = $('#proyek').val();
			var siswa = $('#siswa').val();
			$.ajax({
				type : 'GET',
				url : 'modul/proyek/nilai-proyek.php',
				data :  'kelas='+kelas+'&proyek='+proyek+'&smt='+smt+'&tapel='+tapel+'&siswa='+siswa,
				beforeSend: function()
				{	
					$("#loading").show();
					$(".loader").show();
				},
				success: function (data) {
					$("#loading").hide();
					$(".loader").hide();
					//jika data berhasil didapatkan, tampilkan ke dalam option select mp
					$("#nilaiHarian").html(data);
				}
			});
		});
	});
	
	function highlightEdit(editableObj) {
		$(editableObj).css("background","#FFF0000");
	} 
	function savePilihan(siswa,kelas,tapel,smt,proyek,idel,dimensi,nilai) {
		// no change change made then return false
		// send ajax to update value
		$.ajax({
			url: "modul/proyek/savePilihan.php",
			cache: false,
			data:'id='+siswa+'&kelas='+kelas+'&smt='+smt+'&tapel='+tapel+'&proyek='+proyek+'&idel='+idel+'&dimensi='+dimensi+'&nilai='+nilai,
			success: function(response)  {
				console.log(response);
				// set updated value as old value
					
				
			}          
	   });
	}