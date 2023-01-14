$(document).ready(function(){
	$("#ubahForm").unbind('submit').bind('submit', function() {
		var form = $(this);
		//submi the form to server
		$.ajax({
			url : form.attr('action'),
			type : form.attr('method'),
			data : form.serialize(),
			dataType : 'json',
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
					});
					setTimeout(function () {window.open("./","_self");},1000)
					//setTimeout(function () {window.open("./","_self");},1000)
					// reset the form
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
					  icon: 'error',
					  title: response.messages
					});
				}  // /else
			} // success  
		}); // ajax subit 				
		return false;
	}); // /submit form for create member
	
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
								//temaTable.ajax.reload(null, false);
								var tapel=$('#tapel').val();
								$.ajax({
									type : 'get',
									url : 'modul/setting/daftar-tapel.php',
									data :  'tapel='+ tapel,
									beforeSend: function()
											{	
												
											},
									success : function(data){
										$("#ptapel").html(data);
									}
								});
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
})
