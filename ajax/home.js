"use strict"; 
$(document).ready(function(){
	/**
	$('#upload_image').on('change', function(){
		var idptks = $('#idptks').val();
		$.ajax({
			url:"images/uploadfoto.php?idp="+idptks,
			type: "POST",
			data:{"image": response},
			success:function(data)
			{
			  $('#uploadimageModal').modal('hide');
			  $('#uploaded_image').html(data);
			  //swal('Foto Profil berhasil diubah', {buttons: false,timer: 1000,});
			  setTimeout(function () {window.open("./","_self");},1000)
			}
		  });
	});
	**/
	
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
})
function PopupCenter(pageURL, title,w,h) {
	var left = (screen.width/2)-(w/2);
	var top = (screen.height/2)-(h/2);
	var targetWin = window.open (pageURL, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width='+w+', height='+h+', top='+top+', left='+left);
};
