"use strict"; 
$(document).ready(function(){
	$('#upload_image').on('change', function(e){
		e.preventDefault();
		var idptks = $('#idptks').val();
		$.ajax({
			url:"images/uploadfoto.php",
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
			  setTimeout(function () {window.open("./","_self");},1000)
			}
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
