"use strict"; 
var temaTable;
$(document).ready(function(){
	var stst = $('#stst').val();
	var tapel = $('#tapel').val();
	var smt = $('#smt').val();
	var urls=$('#urls').val();
	temaTable = $('#kt_table_users').DataTable( {
			"destroy":true,
			"dom": '<"row"<"col-lg-6"l><"col-lg-6"f>><"table-responsive"t>p',
			"searching": true,
			"paging":true,
			"ajax": urls+"modul/kepegawaian/daftar-pengguna.php?status="+stst+"&smt="+smt+"&tapel="+tapel
		} );
	
	$('#caridata').on( 'keyup', function () {
		temaTable.search( this.value ).draw();
	} );
	$('#stst').change(function(){
			//Mengambil value dari option select provinsi kemudian parameternya dikirim menggunakan ajax
		var stst = $('#stst').val();
		var tapel = $('#tapel').val();
		var smt = $('#smt').val();
		temaTable = $('#kt_table_users').DataTable( {
			"destroy":true,
			"dom": '<"row"<"col-lg-6"l><"col-lg-6"f>><"table-responsive"t>p',
			"searching": true,
			"paging":true,
			"ajax": urls+"modul/kepegawaian/daftar-pengguna.php?status="+stst+"&smt="+smt+"&tapel="+tapel
		} );
	});
	$('#upload_image').on('change', function(e){
		e.preventDefault();
		var idptks = $('#idptks').val();
		var urls=$('#urls').val();
		$.ajax({
			url: urls+"images/upload.php",
			type: "POST",
			data: new FormData(this),
			contentType: false,
			cache: false,
			processData:false,
			success:function(data)
			{
			  //$('#uploadimageModal').modal('hide');
			  $('#uploaded_image').html(data);
			  //swal('Foto Profil berhasil diubah', {buttons: false,timer: 1000,});
			  setTimeout(function () {window.open(urls+"ptk","_self");},1000)
			}
		  });
	});
	
	
	$("#updatePTK").unbind('submit').bind('submit', function() {
		var form = $(this);
		var urls=$('#urls').val();
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
					setTimeout(function () {window.open(urls+"pengguna","_self");},1000)
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
	$("#ubahPassw").unbind('submit').bind('submit', function() {
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
					setTimeout(function () {window.open("./logout.php","_self");},1000)
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
	$(document).on('click', '#cetaksuratSK', function(e){
		e.preventDefault();
		var id = $(this).data('id');
		var idptk = $(this).data('ptk');
		if(id==0){
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
		}else{
			PopupCenter('https://simas.sdi-aljannah.web.id/cetak/surat-pengangkatan.php?id='+id+'&idptk='+idptk,'SK Pengangkatan',800,800);
		}
		
		
	});

	
	
})

function PopupCenter(pageURL, title,w,h) {
	var left = (screen.width/2)-(w/2);
	var top = (screen.height/2)-(h/2);
	var targetWin = window.open (pageURL, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width='+w+', height='+h+', top='+top+', left='+left);
};

	function removeAktivitas(id = null) {
		if(id) {
			// click on remove button
			
			Swal.fire({
			  title: 'Yakin dihapus?',
			  text: "Apakah anda yakin menghapus Aktivitas ini?",
			  icon: 'warning',
			  showCancelButton: true,
			  confirmButtonColor: '#3085d6',
			  cancelButtonColor: '#d33',
			  confirmButtonText: 'Ya, Hapus!'
			}).then((result) => {
			  if (result.isConfirmed) {
				$.ajax({
						url: 'modul/kepegawaian/hapus-aktivitas.php',
						type: 'post',
						data: {member_id : id},
						dataType: 'json',
						success:function(response) {
							if(response.success == true) {						
								// refresh the table
								var idptks = $('#idptks').val();
								$.ajax({
									type : 'GET',
									url : 'modul/kepegawaian/aktivitas.php',
									data :  'idptk='+idptks,
									beforeSend: function()
									{	
										$("#loading").show();
										$(".loader").show();
									},
									success: function (data) {
										$("#loading").hide();
										$(".loader").hide();
										//jika data berhasil didapatkan, tampilkan ke dalam option select mp
										$("#collapse1One").html(data);
									}
								});
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
	};
	function removePengguna(id = null) {
		if(id) {
			// click on remove button
			
			Swal.fire({
			  title: 'Yakin dinonaktifkan?',
			  text: "Apakah anda yakin Menonaktifkan Pengguna ini?",
			  icon: 'warning',
			  showCancelButton: true,
			  confirmButtonColor: '#3085d6',
			  cancelButtonColor: '#d33',
			  confirmButtonText: 'Ya!'
			}).then((result) => {
			  if (result.isConfirmed) {
				$.ajax({
						url: 'modul/kepegawaian/non-pengguna.php',
						type: 'post',
						data: {member_id : id},
						dataType: 'json',
						success:function(response) {
							if(response.success == true) {						
								// refresh the table
								var stst = $('#stst').val();
								var tapel = $('#tapel').val();
								var smt = $('#smt').val();
								var urls = $('#urls').val();
								temaTable = $('#kt_table_users').DataTable( {
									"destroy":true,
									"dom": '<"row"<"col-lg-6"l><"col-lg-6"f>><"table-responsive"t>p',
									"searching": true,
									"paging":true,
									"ajax": urls+"modul/kepegawaian/daftar-pengguna.php?status="+stst+"&smt="+smt+"&tapel="+tapel
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
	
	function AktifPengguna(id = null) {
		if(id) {
			// click on remove button
			
			Swal.fire({
			  title: 'Informasi',
			  text: "Apakah anda yakin Aktivasi Pengguna ini?",
			  icon: 'warning',
			  showCancelButton: true,
			  confirmButtonColor: '#3085d6',
			  cancelButtonColor: '#d33',
			  confirmButtonText: 'Ya!'
			}).then((result) => {
			  if (result.isConfirmed) {
				$.ajax({
						url: 'modul/kepegawaian/aktif-pengguna.php',
						type: 'post',
						data: {member_id : id},
						dataType: 'json',
						success:function(response) {
							if(response.success == true) {						
								// refresh the table
								var stst = $('#stst').val();
								var tapel = $('#tapel').val();
								var smt = $('#smt').val();
								var urls = $('#urls').val();
								temaTable = $('#kt_table_users').DataTable( {
									"destroy":true,
									"dom": '<"row"<"col-lg-6"l><"col-lg-6"f>><"table-responsive"t>p',
									"searching": true,
									"paging":true,
									"ajax": urls+"modul/kepegawaian/daftar-pengguna.php?status="+stst+"&smt="+smt+"&tapel="+tapel
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
