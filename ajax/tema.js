"use strict"; 
var temaTable;
$(document).ready(function() {
	var kelas=$('#kelas').val();
		var tapel=$('#tapel').val();
		var smt=$('#smt').val();
		temaTable = $('#temaTable').DataTable( {
			"destroy":true,
			"dom": '<"row"<"col-lg-6"l><"col-lg-6"f>><"table-responsive"t>p',
			"searching": false,
			"ajax": "modul/administrasi/temaku.php?kelas="+kelas+"&smt="+smt,
			"order": []
		} );
		$('.judul').html("Daftar Tema Kelas "+kelas+" Semester "+smt);
	$('#kelas').change(function(){
			//Mengambil value dari option select provinsi kemudian parameternya dikirim menggunakan ajax
		var kelas = $('#kelas').val();
		var smt=$('#smt').val();
		temaTable = $('#temaTable').DataTable( {
			"destroy":true,
			"dom": '<"row"<"col-lg-6"l><"col-lg-6"f>><"table-responsive"t>p',
			"searching": false,
			"ajax": "modul/administrasi/temaku.php?kelas="+kelas+"&smt="+smt,
			"order": []
		} );
		$('.judul').html("Daftar Tema Kelas "+kelas+" Semester "+smt);
	});
		$('#editTema').on('show.bs.modal', function (e) {
            var rowid = $(e.relatedTarget).data('tema');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url : 'modul/administrasi/edit-tema.php',
                data :  'rowid='+ rowid,
				beforeSend: function()
						{	
							$(".tema-data").html('<i class="fa fa-spinner fa-pulse fa-fw"></i> Loading ...');
						},
                success : function(data){
                $('.tema-data').html(data);//menampilkan data ke dalam modal
                }
            });
         });
		$("#addTemaModalBtn").on('click', function() {
			// reset the form 
			$("#createTemaForm")[0].reset();
			
			// submit form
			$("#createTemaForm").unbind('submit').bind('submit', function() {

				$(".text-danger").remove();

				var form = $(this);

				

					//submi the form to server
					$.ajax({
						url : form.attr('action'),
						type : form.attr('method'),
						data : form.serialize(),
						dataType : 'json',
						success:function(response) {

							// remove the error 
							$(".form-group").removeClass('has-error').removeClass('has-success');

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
								// reset the form
								$("#tambahTema").modal('hide');

								// reload the datatables
								temaTable.ajax.reload(null, false);
								$("#createTemaForm")[0].reset();
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
			}); // /submit form for create member
		}); // /add modal
		$(document).on('click', '#hapus-tema', function(e){
			e.preventDefault();
			var tema = $(this).data('tema');
			Swal.fire({
			  title: 'Peringatan!',
			  text: 'Yakin akan menghapus tema ini?',
			  icon: 'warning',
			  showCancelButton: true,
			  confirmButtonColor: '#3085d6',
			  cancelButtonColor: '#d33',
			  cancelButtonText: 'Batal',
			  confirmButtonText: 'Ya, hapus!'
			}).then((result) => {
			  if (result.isConfirmed) {
				$.ajax({
					type : 'POST',
					url : 'modul/administrasi/hapus-tema.php',
					data :  'tema='+tema,
					dataType : 'json',
					success: function (response) {
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
						temaTable.ajax.reload(null, false);						
					}
				});
			  }
			})
		});
		$("#updateTemaForm").unbind('submit').bind('submit', function() {
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
						temaTable.ajax.reload(null, false);
						$("#editTema").modal('hide');
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