"use strict"; 
var temaTable;
$(document).ready(function() {
	var kelas = $('#kelas').val();
	var tapel = $('#tapel').val();
	var smt = $('#smt').val();
	var proyek = $('#proyek').val();
	temaTable = $('#temaTable').DataTable( {
		"destroy":true,
		"dom": '<"row"<"col-lg-6"l><"col-lg-6"f>><"table-responsive"t>p',
		"searching": false,
		"ajax": "modul/proyek/peta-proyek.php?proyek="+proyek,
		"order": []
	} );
	
	$('#kelas').change(function(){
			//Mengambil value dari option select kd kemudian parameternya dikirim menggunakan ajax
		var kelas = $('#kelas').val();
		var tapel = $('#tapel').val();
		var smt = $('#smt').val();
		$.ajax({
			type : 'GET',
			url : 'modul/proyek/proyek.php',
			data :  'kelas='+kelas+'&smt='+smt+'&tapel='+tapel,
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
			}
		});
	});
	$('#proyek').change(function(){
		var kelas = $('#kelas').val();
		var tapel = $('#tapel').val();
		var smt = $('#smt').val();
		var proyek = $('#proyek').val();
		temaTable = $('#temaTable').DataTable( {
			"destroy":true,
			"dom": '<"row"<"col-lg-6"l><"col-lg-6"f>><"table-responsive"t>p',
			"searching": false,
			"ajax": "modul/proyek/peta-proyek.php?proyek="+proyek,
			"order": []
		} );
			
	});
	
	$('#editProyek').on('show.bs.modal', function (e) {
           var rowid = $(e.relatedTarget).data('tema');
           //menggunakan fungsi ajax untuk pengambilan data
           $.ajax({
                type : 'post',
                url : 'modul/proyek/edit-proyek.php',
                data :  'rowid='+ rowid,
				beforeSend: function()
						{	
							$(".fetched-data1").html('<i class="fa fa-spinner fa-pulse fa-fw"></i> Loading ...');
						},
                success : function(data){
                $('.fetched-data1').html(data);//menampilkan data ke dalam modal
                }
            });
         });
		
		$("#buatproyek").unbind('submit').bind('submit', function() {
			var form = $(this);
			//submi the form to server
			$.ajax({
				url : form.attr('action'),
				type : form.attr('method'),
				data : form.serialize(),
				dataType : 'json',
				beforeSend: function()
						{	
							$("#loading").show();
							$(".loader").show();
						},
				success:function(response) {
					$("#loading").hide();
					$(".loader").hide();
					if(response.success == true) {
						$("#addProyek").modal('hide');
						
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
						var tapel = $('#tapel').val();
						var smt = $('#smt').val();
						$('#temaTable').DataTable().ajax.reload();
						//$("#createKDFormk")[0].reset();
						// this function is built in function of datatables;
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
					}  // /else
				} // success  
			}); // ajax subit 				
			return false;
		}); // /submit form for Tujuan
		
		$("#ubahproyek").unbind('submit').bind('submit', function() {
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
						var tapel = $('#tapel').val();
						var smt = $('#smt').val();
						var mp = $('#mp').val();
						temaTable.ajax.reload(null, false);
						$("#editProyek").modal('hide');
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

	$('#addProyek').on('show.bs.modal', function (e) {
            var kelas = $('#kelas').val();
			var tapel = $('#tapel').val();
			var smt = $('#smt').val();
			var proyek = $('#proyek').val();
			if(kelas==0 || proyek==0){
				Swal.fire("Kesalahan","Isi Dahulu Kelas sama Mapelnya","error");
			}else{
			//menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url : 'modul/proyek/m_peta.php',
                data :  'kelas='+ kelas+"&smt="+smt+"&tapel="+tapel+"&proyek="+proyek,
				beforeSend: function()
						{	
							$("#loading").show();
							$(".loader").show();
						},
                success : function(data){
					$("#loading").hide();
					$(".loader").hide();
					$('.fetched-data').html(data);//menampilkan data ke dalam modal
                }
            });
			}
        });

	function removePeta(id = null) {
		if(id) {
			// click on remove button
			
			Swal.fire({
			  title: 'Yakin dihapus?',
			  text: "Apakah anda yakin menghapus Pemetaan Proyek ini?",
			  icon: 'warning',
			  showCancelButton: true,
			  confirmButtonColor: '#3085d6',
			  cancelButtonColor: '#d33',
			  confirmButtonText: 'Ya, Hapus!'
			}).then((result) => {
			  if (result.isConfirmed) {
				$.ajax({
						url: 'modul/proyek/hapus-peta.php',
						type: 'post',
						data: {member_id : id},
						dataType: 'json',
						success:function(response) {
							if(response.success == true) {						
								// refresh the table
								var kelas = $('#kelas').val();
								var tapel = $('#tapel').val();
								var smt = $('#smt').val();
								var proyek = $('#proyek').val();
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