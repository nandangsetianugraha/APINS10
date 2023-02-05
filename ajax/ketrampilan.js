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
					$("#tema").html('<select class="form-select" id="tema" name="tema"><option value="0">Pilih Tema</option></select>');
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
			var peta=4;
			
			$.ajax({
				type : 'GET',
				url : 'modul/penilaian/tm.php',
				data :  'mpid=' + mp+'&kelas='+kelas+'&smt='+smt+'&peta='+peta,
				success: function (data) {

					//jika data berhasil didapatkan, tampilkan ke dalam option select mp
					$("#tema").html(data);
					$("#kd").html('<select class="form-select" id="kd" name="kd"><option value="0">Pilih KD</option></select>');
					$("#nilaiHarian").html('<div class="alert alert-info alert-dismissible"><h4><i class="icon fa fa-info"></i> Informasi</h4>Silahkan Pilih Tema/Pembelajaran</div>');
				}
			});
		});
	$('#tema').change(function(){
			//Mengambil value dari option select mp kemudian parameternya dikirim menggunakan ajax
			var mp = $('#mp').val();
			var kelas=$('#kelas').val();
			var smt=$('#smt').val();
			var peta=4;
			var tema=$('#tema').val();
			
			$.ajax({
				type : 'GET',
				url : 'modul/penilaian/kd.php',
				data :  'mpid=' + mp+'&kelas='+kelas+'&smt='+smt+'&peta='+peta+'&tema='+tema,
				success: function (data) {

					//jika data berhasil didapatkan, tampilkan ke dalam option select mp
					$("#kd").html(data);
					$("#nilaiHarian").html('<div class="alert alert-info alert-dismissible"><h4><i class="icon fa fa-info"></i> Informasi</h4>Silahkan Pilih Kompetensi Dasar (KD)</div>');
				}
			});
		});
	$('#kd').change(function(){
			//Mengambil value dari option select kd kemudian parameternya dikirim menggunakan ajax
			var kd = $('#kd').val();
			var mp = $('#mp').val();
			var kelas=$('#kelas').val();
			var smt=$('#smt').val();
			var peta=4;
			var tema=$('#tema').val();
			var tapel=$('#tapel').val();
			
			$.ajax({
				type : 'GET',
				url : 'modul/penilaian/NilaiKet.php',
				data :  'mp=' + mp+'&kelas='+kelas+'&smt='+smt+'&peta='+peta+'&tema='+tema+'&tapel='+tapel+'&kd='+kd,
				beforeSend: function()
				{	
					$("#loading").show();
					$(".loader").show();
					$("#nilaiHarian").html('<div class="alert alert-info alert-dismissible"><h4><i class="fa fa-spinner fa-pulse fa-fw"></i> Memuat Data Nilai Ketrampilan....</h4></div>');
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
	function saveHarian(editableObj,column,id,kelas,smt,tapel,mpid,kd,jns,tema) {
		// no change change made then return false
		if($(editableObj).attr('data-old_value') === editableObj.innerHTML)
		return false;
		// send ajax to update value
		$(editableObj).css("background","#FFF url(loader.gif) no-repeat right");
		$.ajax({
			url: "modul/penilaian/saveKet.php",
			cache: false,
			data:'column='+column+'&value='+editableObj.innerHTML+'&id='+id+'&kelas='+kelas+'&smt='+smt+'&tapel='+tapel+'&mp='+mpid+'&kd='+kd+'&jns='+jns+'&tema='+tema,
			success: function(response)  {
				console.log(response);
				// set updated value as old value
				$(editableObj).attr('data-old_value',editableObj.innerHTML);
				$(editableObj).css("background","#FFF url(checkup.png) no-repeat right");	
				
			}          
	   });
	}