"use strict"; 
var temaTable;
$(document).ready(function(){
	$('#tglabsen').datepicker({
		format: 'yyyy-mm-dd',
		autoclose:true
	});
	var tabsen=$('#tglabsen').val();
	var kelas = $('#kelas').val();
	var tapel = $('#tapel').val();
	var smt = $('#smt').val();
	$.ajax({
				type : 'get',
				url : 'modul/siswa/cek_absen.php',
				data :  'kelas='+kelas+'&tapel='+tapel+'&tgl='+tabsen+'&smt='+smt,
				dataType : 'json',
				success : function(data){
					$('#sakit').html(data.sakit);
					$('#ijin').html(data.ijin);
					$('#alfa').html(data.alfa);
				}
			});
	temaTable = $('#kt_table_users').DataTable( {
			"destroy":true,
			"searching": true,
			"paging":false,
			"ajax": "modul/siswa/absensiku.php?kelas="+kelas+"&tapel="+tapel+"&tgl="+tabsen+"&smt="+smt
		} );
	
	$('#caridata').on( 'keyup', function () {
		temaTable.search( this.value ).draw();
	} );
	$('#kelas').change(function(){
		var tabsen=$('#tglabsen').val();
		var kelas = $('#kelas').val();
		var tapel = $('#tapel').val();
		var smt = $('#smt').val();
		$.ajax({
				type : 'get',
				url : 'modul/siswa/cek_absen.php',
				data :  'kelas='+kelas+'&tapel='+tapel+'&tgl='+tabsen+'&smt='+smt,
				dataType : 'json',
				beforeSend: function()
				{	
					$("#loading").show();
					$(".loader").show();
				},
				success : function(data){
					$("#loading").hide();
					$(".loader").hide();
					$('#sakit').html(data.sakit);
					$('#ijin').html(data.ijin);
					$('#alfa').html(data.alfa);
				}
			});
		temaTable = $('#kt_table_users').DataTable( {
			"destroy":true,
			"searching": true,
			"paging":false,
			"ajax": "modul/siswa/absensiku.php?kelas="+kelas+"&tapel="+tapel+"&tgl="+tabsen+"&smt="+smt
		} );
	});
	$('#tglabsen').change(function(){
			//Mengambil value dari option select kd kemudian parameternya dikirim menggunakan ajax
			var tabsen=$('#tglabsen').val();
			var smt=$('#smt').val();
			var tapel=$('#tapel').val();
			var kelas=$('#kelas').val();
			$.ajax({
				type : 'get',
				url : 'modul/siswa/cek_absen.php',
				data :  'kelas='+kelas+'&tapel='+tapel+'&tgl='+tabsen+'&smt='+smt,
				dataType : 'json',
				beforeSend: function()
				{	
					$("#loading").show();
					$(".loader").show();
				},
				success : function(data){
					$("#loading").hide();
					$(".loader").hide();
					$('#sakit').html(data.sakit);
					$('#ijin').html(data.ijin);
					$('#alfa').html(data.alfa);
				}
			});
			temaTable = $('#kt_table_users').DataTable( {
				"destroy":true,
				"searching": true,
				"paging":false,
				"ajax": "modul/siswa/absensiku.php?kelas="+kelas+"&tapel="+tapel+"&tgl="+tabsen+"&smt="+smt
			} );
		});
});

	function removeAbsen(id = null) {
		if(id) {
			// click on remove button
			
			Swal.fire({
			  title: 'Yakin dihapus?',
			  text: "Apakah anda yakin menghapus absensi ini?",
			  icon: 'warning',
			  showCancelButton: true,
			  confirmButtonColor: '#3085d6',
			  cancelButtonColor: '#d33',
			  confirmButtonText: 'Ya, Hapus!'
			}).then((result) => {
			  if (result.isConfirmed) {
				$.ajax({
						url: 'modul/siswa/hapus-absen.php',
						type: 'post',
						data: {member_id : id},
						dataType: 'json',
						success:function(response) {
							if(response.success == true) {						
								// refresh the table
								var tabsen=$('#tglabsen').val();
								var smt=$('#smt').val();
								var tapel=$('#tapel').val();
								var kelas=$('#kelas').val();
								$.ajax({
									type : 'get',
									url : 'modul/siswa/cek_absen.php',
									data :  'kelas='+kelas+'&tapel='+tapel+'&tgl='+tabsen+'&smt='+smt,
									dataType : 'json',
									success : function(data){
										$('#sakit').html(data.sakit);
										$('#ijin').html(data.ijin);
										$('#alfa').html(data.alfa);
									}
								});
								temaTable.ajax.reload(null, false);
							} else {
								Swal.fire("Kesalahan",response.messages,"error");
							}
						}
					});
			  }
			})
			
		} else {
			Swal.fire("Kesalahan","Error Sistem","error");
		}
	}

	function saveAbsen(tanggal,siswa,tapel,smt,kelas,absensi) {
		// no change change made then return false
		// send ajax to update value
		$.ajax({
			url: "modul/siswa/saveAbsen.php",
			cache: false,
			data:'tgl='+tanggal+'&kelas='+kelas+'&smt='+smt+'&tapel='+tapel+'&id='+siswa+'&absensi='+absensi,
			success: function(response)  {
				console.log(response);
				var tabsen=$('#tglabsen').val();
				var smt=$('#smt').val();
				var tapel=$('#tapel').val();
				var kelas=$('#kelas').val();
				$.ajax({
					type : 'get',
					url : 'modul/siswa/cek_absen.php',
					data :  'kelas='+kelas+'&tapel='+tapel+'&tgl='+tabsen+'&smt='+smt,
					dataType : 'json',
					success : function(data){
						$('#sakit').html(data.sakit);
						$('#ijin').html(data.ijin);
						$('#alfa').html(data.alfa);
					}
				});
				temaTable.ajax.reload(null, false);
				// set updated value as old value
					
				
			}          
	   });
	}
