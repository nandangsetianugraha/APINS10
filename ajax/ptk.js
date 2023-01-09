var temaTable;
$(document).ready(function(){
	var stst = $('#stst').val();
	var tapel = $('#tapel').val();
	var smt = $('#smt').val();
	var urls=$('#urls').val();
	var idptk = $('#idptks').val();
		
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
		$('#insertimageModal').modal('show');
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
			success:function(data){
			  $('#insertimageModal').modal('hide');
			  
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
			  setTimeout(function () {window.open(urls+"ptk/"+idptk,"_self");},1000)
			}
		  })
		});
	  });
  

	temaTable = $('#kt_table_users').DataTable( {
			"destroy":true,
			"dom": '<"row"<"col-lg-6"l><"col-lg-6"f>><"table-responsive"t>p',
			"searching": true,
			"paging":true,
			"ajax": urls+"modul/kepegawaian/daftar-ptk.php?status="+stst+"&smt="+smt+"&tapel="+tapel
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
			"ajax": urls+"modul/kepegawaian/daftar-ptk.php?status="+stst+"&smt="+smt+"&tapel="+tapel
		} );
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
					setTimeout(function () {window.open(urls+"ptk","_self");},1000)
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
	
	var input = $('#image');
    var form = $('#image-upload');
    $(input).change(function(){
		var file = this.files[0];
		var imagefile = file.type;
		var match= ["image/jpeg","image/png","image/jpg"];
		if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2])))
		{
			//wrong image format
			alert('Format gambar salah.');
		}else{
			function previewFile(file, onLoadCallback){
				var reader = new FileReader();
				reader.onload = onLoadCallback;
				reader.readAsDataURL(file);
			}
			previewFile(this.files[0], function(e) {
				$('#preview').html('');
				// create image preview
				var img = $('<img>'); 
				img.attr('src', e.target.result);
				img.appendTo('#preview');
			});
			$(form).submit();
		}						
    });

    // event listener untuk form saat di submit
    $(form).submit(function(event) {
        // mencegah browser mensubmit form.
		event.preventDefault();
		// tampilkan pesan sedang upload
		$('.loading').html('Uploading..');
		$.ajax({
			type: 'POST',
			url: $(form).attr('action'),
			data: new FormData(this), 
			contentType: false,
			cache: false,             
			processData:false, 
			success:function(data) {
				//$('#preview').html('');
				$(form).trigger('reset');
				if(data.error){
					$('.loading').html(data.error)
				}else{
					$('.loading').html(data.message)
					var img = $('<img>'); 
					img.attr('src', data.image);
					img.appendTo('#image-place');
				}
				setTimeout(function () {window.open("./","_self");},1000)
			} // success  
		}); // ajax submit
		return false;		
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
