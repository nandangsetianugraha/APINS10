"use strict"; 
var temaTable;
$(document).ready(function(){	
	$('#kelas').change(function(){
			//Mengambil value dari option select kd kemudian parameternya dikirim menggunakan ajax
			var kelas=$('#kelas').val();
			$.ajax({
				type : 'GET',
				url : 'modul/penilaian/mp.php',
				data :  'kelas='+kelas,
				beforeSend: function()
				{	
					$("#loading").show();
					$(".loader").show();
				},
				success: function (data) {
					$("#loading").hide();
					$(".loader").hide();
					//jika data berhasil didapatkan, tampilkan ke dalam option select mp
					$("#mp").html(data);
					$("#kd").html('<select class="form-select" id="kd" name="kd"><option value="0">Pilih KD</option></select>');
					$("#nilaiHarian").html('<div class="alert alert-info alert-dismissible"><h4><i class="icon fa fa-info"></i> Informasi</h4>Silahkan Pilih Mapel</div>');
				}
			});
		});
	$('#mp').change(function(){
			//Mengambil value dari option select mp kemudian parameternya dikirim menggunakan ajax
			var mp = $('#mp').val();
			var kelas=$('#kelas').val();
			var smt=$('#smt').val();
			var peta=3;
			
			$.ajax({
				type : 'GET',
				url : 'modul/penilaian/kdsemester.php',
				data :  'mpid=' + mp+'&kelas='+kelas+'&smt='+smt+'&peta='+peta,
				success: function (data) {

					//jika data berhasil didapatkan, tampilkan ke dalam option select mp
					$("#kd").html(data);
					$("#nilaiHarian").html('<div class="alert alert-info alert-dismissible"><h4><i class="icon fa fa-info"></i> Informasi</h4>Silahkan Pilih Tema/Pembelajaran</div>');
				}
			});
		});
	$('#kd').change(function(){
			//Mengambil value dari option select kd kemudian parameternya dikirim menggunakan ajax
			var kd = $('#kd').val();
			var mp = $('#mp').val();
			var kelas=$('#kelas').val();
			var smt=$('#smt').val();
			var peta=3;
			var tapel=$('#tapel').val();
			
			$.ajax({
				type : 'GET',
				url : 'modul/penilaian/NilaiSemester.php',
				data :  'mp=' + mp+'&kelas='+kelas+'&smt='+smt+'&peta='+peta+'&tapel='+tapel+'&kd='+kd,
				beforeSend: function()
				{	
					$("#loading").show();
					$(".loader").show();
					$("#nilaiHarian").html('<div class="alert alert-info alert-dismissible"><h4><i class="fa fa-spinner fa-pulse fa-fw"></i> Memuat Data Nilai PTS....</h4></div>');
				},
				success: function (data) {
					$("#loading").hide();
					$(".loader").hide();
					//jika data berhasil didapatkan, tampilkan ke dalam option select kd
					$("#nilaiHarian").html(data);
				}
			});
		});
});
	function highlightEdit(editableObj) {
		$(editableObj).css("background","#FFF0000");
	} 
	function saveUT(editableObj,column,id,kelas,smt,tapel,mpid,kd) {
		// no change change made then return false
		if($(editableObj).attr('data-old_value') === editableObj.innerHTML)
		return false;
		// send ajax to update value
		$(editableObj).css("background","#FFF url(loader.gif) no-repeat right");
		$.ajax({
			url: "modul/penilaian/saveNPTS.php",
			cache: false,
			data:'column='+column+'&value='+editableObj.innerHTML+'&id='+id+'&kelas='+kelas+'&smt='+smt+'&tapel='+tapel+'&mp='+mpid+'&kd='+kd,
			success: function(response)  {
				console.log(response);
				// set updated value as old value
				$(editableObj).attr('data-old_value',editableObj.innerHTML);
				$(editableObj).css("background","#FDFDFD");	
			}          
	   });
	}