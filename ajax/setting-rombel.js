"use strict"; 
var temaTable;
$(document).ready(function() {
	var ptapel = $('#ptapel').val();
	var smt = $('#smt').val();
	temaTable = $('#temaTable').DataTable( {
		"destroy":true,
		"dom": '<"row"<"col-lg-6"l><"col-lg-6"f>><"table-responsive"t>p',
		"searching": false,
		"ajax": "modul/setting/daftar-rombel.php?tapel="+ptapel,
		"order": []
	} );
	
	$('#ptapel').change(function(){
			//Mengambil value dari option select kd kemudian parameternya dikirim menggunakan ajax
			var ptapel = $('#ptapel').val();
			var smt = $('#smt').val();
			temaTable = $('#temaTable').DataTable( {
				"destroy":true,
				"dom": '<"row"<"col-lg-6"l><"col-lg-6"f>><"table-responsive"t>p',
				"searching": false,
				"ajax": "modul/setting/daftar-rombel.php?tapel="+ptapel,
				"order": []
			} );
		});
	$('#editProyek').on('show.bs.modal', function (e) {
        var rowid = $(e.relatedTarget).data('tema');
        //menggunakan fungsi ajax untuk pengambilan data
        $.ajax({
            type : 'post',
            url : 'modul/setting/e_rombel.php',
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
						var ptapel = $('#ptapel').val();
						var smt = $('#smt').val();
						temaTable = $('#temaTable').DataTable( {
							"destroy":true,
							"dom": '<"row"<"col-lg-6"l><"col-lg-6"f>><"table-responsive"t>p',
							"searching": false,
							"ajax": "modul/setting/daftar-rombel.php?tapel="+ptapel,
							"order": []
						} );
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
						var ptapel = $('#ptapel').val();
						var smt = $('#smt').val();
						temaTable = $('#temaTable').DataTable( {
							"destroy":true,
							"dom": '<"row"<"col-lg-6"l><"col-lg-6"f>><"table-responsive"t>p',
							"searching": false,
							"ajax": "modul/setting/daftar-rombel.php?tapel="+ptapel,
							"order": []
						} );
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
        var ptapel = $('#ptapel').val();
		var smt = $('#smt').val();
			//menggunakan fungsi ajax untuk pengambilan data
        $.ajax({
                type : 'post',
                url : 'modul/setting/m_rombel.php',
                data :  'tapel='+ptapel+"&smt="+smt,
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
	});

	function removeRombel(id = null) {
		if(id) {
			// click on remove button
			
			Swal.fire({
			  title: 'Yakin dihapus?',
			  text: "Apakah anda yakin menghapus Rombel ini?",
			  icon: 'warning',
			  showCancelButton: true,
			  confirmButtonColor: '#3085d6',
			  cancelButtonColor: '#d33',
			  confirmButtonText: 'Ya, Hapus!'
			}).then((result) => {
			  if (result.isConfirmed) {
				$.ajax({
						url: 'modul/setting/hapus-rombel.php',
						type: 'post',
						data: {member_id : id},
						dataType: 'json',
						success:function(response) {
							if(response.success == true) {						
								// refresh the table
								var ptapel = $('#ptapel').val();
								var smt = $('#smt').val();
								temaTable = $('#temaTable').DataTable( {
									"destroy":true,
									"dom": '<"row"<"col-lg-6"l><"col-lg-6"f>><"table-responsive"t>p',
									"searching": false,
									"ajax": "modul/setting/daftar-rombel.php?tapel="+ptapel,
									"order": []
								} );
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