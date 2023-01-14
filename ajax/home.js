$(document).ready(function(){
	//$('#tempat_crop').hide();
	var idptk = $('#idptks').val();
	var urls = $('#urls').val();
	$('#tanggal').datepicker({
		format: 'yyyy-mm-dd',
		autoclose:true
	});
	$('#tanggal').change(function(){
			//Mengambil value dari option select provinsi kemudian parameternya dikirim menggunakan ajax
		var tanggal=$('#tanggal').val();
		var idptk = $('#idptks').val();
		var urls = $('#urls').val();
		$.ajax({
            type : 'post',
            url : 'modul/kepegawaian/lihat_absen.php',
            data :  'rowid='+ idptk +'&tanggal='+tanggal,
			beforeSend: function()
			{	
				$(".absen-pegawai").html('<i class="fa fa-spinner fa-pulse fa-fw"></i> Loading ...');
			},
            success : function(data){
				$('.absen-pegawai').html(data);//menampilkan data ke dalam modal
            }
        });
	});
		
	$image_crop = $('#image_demo').croppie({
		enableExif: true,
		viewport: {
		  width:200,
		  height:200,
		  type:'square' //circle
		},
		boundary:{
		  width:300,
		  height:300
		}    
	});

	$('#insert_image').on('change', function(){
		var reader = new FileReader();
		reader.onload = function (event) {
		  $image_crop.croppie('bind', {
			url: event.target.result
		  }).then(function(){
			console.log('jQuery bind complete');
		  });
		}
		reader.readAsDataURL(this.files[0]);
		$('#tempat_crop').show();
		$('#statistik').hide();
	});

	$('.crop_image').click(function(event){
		$image_crop.croppie('result', {
		  type: 'canvas',
		  size: 'viewport'
		}).then(function(response){
		  $.ajax({
			url:urls+'images/upload-ptk.php?idp='+idptk,
			type:'POST',
			data:{"image":response},
			beforeSend: function()
			{	
				$("#loading").show();
				$(".loader").show();
			},
			success:function(data){
				$("#loading").hide();
				$(".loader").hide();
			  $('#tempat_crop').hide();
			  $('#statistik').show();
			  $('#uploaded_image').html(data);
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
				  title: 'Photo Profil berhasil diubah'
				})
			  setTimeout(function () {window.open(urls,"_self");},1000)
			}
		  })
		});
	  });

	$("#ubahForm").unbind('submit').bind('submit', function() {
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
	$("#ubahPassw").unbind('submit').bind('submit', function() {
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
	}
