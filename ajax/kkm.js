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
		KD1 = $('#KD1').DataTable( {
			"destroy":true,
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
			"searching": false,
			"ajax": "modul/administrasi/kkmku.php?kelas="+kelas+"&tapel="+tapel+"&mapel="+mp,
			"order": []
		} );
	});
		$('#formKDP').on('show.bs.modal', function (e) {
            var kelas = $('#kelas').val();
			var smt=$('#smt').val();
			var mp=$('#mp').val();
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url : 'modul/administrasi/modal-KD.php',
                data :  'rowid=3&kelas='+kelas+'&smt='+smt+'&mp='+mp,
				beforeSend: function()
						{	
							$(".tema-data").html('<i class="fa fa-spinner fa-pulse fa-fw"></i> Loading ...');
						},
                success : function(data){
                $('.tema-data').html(data);//menampilkan data ke dalam modal
                }
            });
         });
		 $('#formKDK').on('show.bs.modal', function (e) {
            var kelas = $('#kelas').val();
			var smt=$('#smt').val();
			var mp=$('#mp').val();
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url : 'modul/administrasi/modal-KD.php',
                data :  'rowid=4&kelas='+kelas+'&smt='+smt+'&mp='+mp,
				beforeSend: function()
						{	
							$(".tema-data").html('<i class="fa fa-spinner fa-pulse fa-fw"></i> Loading ...');
						},
                success : function(data){
                $('.tema-data').html(data);//menampilkan data ke dalam modal
                }
            });
         });
		
		$("#KDPForm").unbind('submit').bind('submit', function() {
			var form = $(this);

			$.ajax({
				url: form.attr('action'),
				type: form.attr('method'),
				data: form.serialize(),
				dataType: 'json',
				success:function(response) {
					if(response.success == true) {
						const Toast = Swal.mixin({
						  toast: true,
						  position: 'top-right',
						  iconColor: 'white',
						  customClass: {
							popup: 'colored-toast'
						  },
						  showConfirmButton: false,
						  timer: 1500,
						  timerProgressBar: true
						})
						Toast.fire({
						  icon: 'success',
						  title: response.messages
						})
						var kelas = $('#kelas').val();
						var smt=$('#smt').val();
						var mp=$('#mp').val();
						KD1.ajax.reload(null, false);
						$("#formKDP").modal('hide');
					} else {
						const Toast = Swal.mixin({
						  toast: true,
						  position: 'top-right',
						  iconColor: 'white',
						  customClass: {
							popup: 'colored-toast'
						  },
						  showConfirmButton: false,
						  timer: 1500,
						  timerProgressBar: true
						})
						Toast.fire({
						  icon: 'success',
						  title: response.messages
						})
					}
				} // /success
			}); // /ajax
			return false;
		});
		
		$("#KDKForm").unbind('submit').bind('submit', function() {
			var form = $(this);

			$.ajax({
				url: form.attr('action'),
				type: form.attr('method'),
				data: form.serialize(),
				dataType: 'json',
				success:function(response) {
					if(response.success == true) {
						const Toast = Swal.mixin({
						  toast: true,
						  position: 'top-right',
						  iconColor: 'white',
						  customClass: {
							popup: 'colored-toast'
						  },
						  showConfirmButton: false,
						  timer: 1500,
						  timerProgressBar: true
						})
						Toast.fire({
						  icon: 'success',
						  title: response.messages
						})
						var kelas = $('#kelas').val();
						var smt=$('#smt').val();
						var mp=$('#mp').val();
						KD2.ajax.reload(null, false);
						$("#formKDK").modal('hide');
					} else {
						const Toast = Swal.mixin({
						  toast: true,
						  position: 'top-right',
						  iconColor: 'white',
						  customClass: {
							popup: 'colored-toast'
						  },
						  showConfirmButton: false,
						  timer: 1500,
						  timerProgressBar: true
						})
						Toast.fire({
						  icon: 'success',
						  title: response.messages
						})
					}
				} // /success
			}); // /ajax
			return false;
		});
});

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