"use strict"; 
var KD1;
var KD2;
$(document).ready(function() {
	var kelas=$('#kelas').val();
	var tapel=$('#tapel').val();
	var smt=$('#smt').val();
	var mp=$('#mp').val();
	KD1 = $('#KD1').DataTable( {
		"destroy":true,
		"dom": '<"row"<"col-lg-6"l><"col-lg-6"f>><"table-responsive"t>p',
		"searching": false,
		"ajax": "modul/administrasi/kkmku.php?kelas="+kelas+"&tapel="+tapel+"&mapel="+mp,
		"order": []
	} );
	$('#kelas').change(function(){
			//Mengambil value dari option select provinsi kemudian parameternya dikirim menggunakan ajax
		var kelas=$('#kelas').val();
		var tapel=$('#tapel').val();
		var smt=$('#smt').val();
		var mp=$('#mp').val();
		$.ajax({
			type : 'GET',
			url : 'modul/administrasi/mpl.php',
			data :  'kelas=' +kelas,
			success: function (data) {
				//jika data berhasil didapatkan, tampilkan ke dalam option select mp
				$("#mp").html(data);
			}
		});
		$.ajax({
			type : 'GET',
			url : 'modul/administrasi/cek-kkm.php',
			data :  'kelas=' +kelas+'&tapel='+tapel+'&mapel='+mp,
			dataType: 'json',
			success: function (response) {
				//jika data berhasil didapatkan, tampilkan ke dalam option select mp
				$('#kkmmapel').html(response.kkmmapel);
				$('#kkmkelas').html(response.kkmkelas);
				$('#kkmsekolah').html(response.kkmsekolah);
			}
		});
		KD1 = $('#KD1').DataTable( {
			"destroy":true,
			"dom": '<"row"<"col-lg-6"l><"col-lg-6"f>><"table-responsive"t>p',
			"searching": false,
			"ajax": "modul/administrasi/kkmku.php?kelas="+kelas+"&tapel="+tapel+"&mapel="+mp,
			"order": []
		} );
	});
	$('#mp').change(function(){
			//Mengambil value dari option select provinsi kemudian parameternya dikirim menggunakan ajax
		var kelas=$('#kelas').val();
		var tapel=$('#tapel').val();
		var smt=$('#smt').val();
		var mp=$('#mp').val();
		KD1 = $('#KD1').DataTable( {
			"destroy":true,
			"dom": '<"row"<"col-lg-6"l><"col-lg-6"f>><"table-responsive"t>p',
			"searching": false,
			"ajax": "modul/administrasi/kkmku.php?kelas="+kelas+"&tapel="+tapel+"&mapel="+mp,
			"order": []
		} );
		$.ajax({
			type : 'GET',
			url : 'modul/administrasi/cek-kkm.php',
			data :  'kelas=' +kelas+'&tapel='+tapel+'&mapel='+mp,
			dataType: 'json',
			success: function (response) {
				//jika data berhasil didapatkan, tampilkan ke dalam option select mp
				$('#kkmmapel').html(response.kkmmapel);
				$('#kkmkelas').html(response.kkmkelas);
				$('#kkmsekolah').html(response.kkmsekolah);
			}
		});
	});
});

	function highlightEdit(editableObj) {
			$(editableObj).css("background","#FFF0000");
		} 
	function saveKKM(editableObj,column,kelas,tapel,mpid,kda,jenis) {
			// no change change made then return false
		if($(editableObj).attr('data-old_value') === editableObj.innerHTML)
		return false;
		// send ajax to update value
		$(editableObj).css("background","#FFF url(loader.gif) no-repeat right");
		$.ajax({
			url: "modul/administrasi/saveKKM.php",
			cache: false,
			data:'column='+column+'&value='+editableObj.innerHTML+'&kelas='+kelas+'&tapel='+tapel+'&mp='+mpid+'&kda='+kda+'&jenis='+jenis,
			dataType: 'json',
			success: function(response)  {
				console.log(response);
				if(response.success == true) {
					$('#kkmku').html(response.kkmnya);
					$('#'+response.KD).val(response.rata);
				}
				$(editableObj).attr('data-old_value',editableObj.innerHTML);
				$(editableObj).css("background","#FFF url(checkup.png) no-repeat right");	
					
				// set updated value as old value
				
				
			}          
		});
	};
	
	function removeKD(id = null) {
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
						url: 'modul/administrasi/hapus-KD.php',
						type: 'post',
						data: {member_id : id},
						dataType: 'json',
						success:function(response) {
							if(response.success == true) {						
								// refresh the table
								var kelas = $('#kelas').val();
								var smt=$('#smt').val();
								var mp=$('#mp').val();
								KD1.ajax.reload(null, false);
								KD2.ajax.reload(null, false);
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