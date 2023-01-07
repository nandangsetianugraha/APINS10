"use strict"; 
var temaTable;
$(document).ready(function(){
	var kelas = $('#kelas').val();
	var tapel = $('#tapel').val();
	var smt = $('#smt').val();
	temaTable = $('#kt_table_users').DataTable( {
			"destroy":true,
			"dom": '<"row"<"col-lg-6"l><"col-lg-6"f>><"table-responsive"t>p',
			"searching": true,
			"paging":true,
			"ajax": "modul/siswa/siswakosong.php?smt="+smt+"&tapel="+tapel
		} );
	
	$('#caridata').on( 'keyup', function () {
		temaTable.search( this.value ).draw();
	} );
	
	$('#mutasikan').on('show.bs.modal', function (e) {
		var siswa = $(e.relatedTarget).data('siswa');
		var smt = $(e.relatedTarget).data('smt');
		var tapel = $(e.relatedTarget).data('tapel');
		//menggunakan fungsi ajax untuk pengambilan data
        $.ajax({
            type : 'get',
            url : 'modul/siswa/mutasikan.php',
            data :  'siswa='+siswa+'&smt='+smt+'&tapel='+tapel,
			beforeSend: function()
			{	
				$(".mutasikan-data").html('<i class="fa fa-spinner fa-pulse fa-fw"></i> Loading ...');
			},
            success : function(data){
                $('.mutasikan-data').html(data);//menampilkan data ke dalam modal
            }
        });
    });
	$("#mutasiForm").unbind('submit').bind('submit', function() {
		var form = $(this);
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
					})
					$("#mutasikan").modal('hide');
					temaTable.ajax.reload(null, false);
					$("#mutasiForm")[0].reset();
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
	$('#tempatkan').on('show.bs.modal', function (e) {
		var siswa = $(e.relatedTarget).data('siswa');
		var smt = $(e.relatedTarget).data('smt');
		var tapel = $(e.relatedTarget).data('tapel');
		//menggunakan fungsi ajax untuk pengambilan data
        $.ajax({
            type : 'get',
            url : 'modul/siswa/tempatkan.php',
            data :  'siswa='+siswa+'&smt='+smt+'&tapel='+tapel,
			beforeSend: function()
			{	
				$(".tempatkan-data").html('<i class="fa fa-spinner fa-pulse fa-fw"></i> Loading ...');
			},
            success : function(data){
                $('.tempatkan-data').html(data);//menampilkan data ke dalam modal
            }
        });
    });
	$("#penempatanForm").unbind('submit').bind('submit', function() {
		var form = $(this);
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
					})
					$("#tempatkan").modal('hide');
					temaTable.ajax.reload(null, false);
					$("#penempatanForm")[0].reset();
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
	$(document).on('click', '#keluarRombel', function(e){
		e.preventDefault();
		var siswa = $(this).data('siswa');
		var tapel = $(this).data('tapel');
		var smt = $(this).data('smt');
		Swal.fire({
		  title: 'Peringatan!',
		  text: 'Yakin akan mengeluarkan peserta didik dari rombel?',
		  icon: 'warning',
		  showCancelButton: true,
		  confirmButtonColor: '#3085d6',
		  cancelButtonColor: '#d33',
		  cancelButtonText: 'Batal',
		  confirmButtonText: 'Ya, keluarkan!'
		}).then((result) => {
		  if (result.isConfirmed) {
			$.ajax({
				type : 'POST',
				url : 'modul/siswa/keluar-rombel.php',
				data :  'siswa='+siswa+'&smt='+smt+'&tapel='+tapel,
				dataType : 'json',
				beforeSend: function()
				{	
					$("#loading").show();
					$(".loader").show();
				},
				success: function (response) {
					$("#loading").hide();
					$(".loader").hide();
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
	$(document).on('click', '#lanjutkan', function(e){
		e.preventDefault();
		var kelas = $('#kelas').val();
		var tapel = $(this).data('tapel');
		var smt = $(this).data('smt');
		Swal.fire({
		  title: 'Peringatan!',
		  text: 'Lanjutkan Semester?',
		  icon: 'warning',
		  showCancelButton: true,
		  confirmButtonColor: '#3085d6',
		  cancelButtonColor: '#d33',
		  cancelButtonText: 'Tidak',
		  confirmButtonText: 'Ya, Lanjutkan!'
		}).then((result) => {
		  if (result.isConfirmed) {
			$.ajax({
				type : 'POST',
				url : 'modul/siswa/lanjutkan.php',
				data :  'kelas='+kelas+'&smt='+smt+'&tapel='+tapel,
				dataType : 'json',
				beforeSend: function()
				{	
					$("#loading").show();
					$(".loader").show();
				},
				success: function (response) {
					$("#loading").hide();
					$(".loader").hide();
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
					var kelas = $('#kelas').val();
					var tapel = $('#tapel').val();
					var smt = $('#smt').val();
					temaTable.ajax.reload(null, false);
					$("#loading").hide();
					$(".loader").hide();
				}
			});
		  }
		})
	});
	$(document).on('click', '#luluskan', function(e){
		e.preventDefault();
		//var kelas = $('#kelas').val();
		var tapel = $(this).data('tapel');
		var smt = $(this).data('smt');
		let nsmt1=tapel.substr(0,4);
		let nsmt2=tapel.substr(5,4);
		let smtbaru=(nsmt1-1)+'/'+(nsmt2-1);
		Swal.fire({
		  title: 'Peringatan!',
		  text: 'Luluskan Siswa Kelas 6 Tahun Pelajaran '+smtbaru+'?',
		  icon: 'warning',
		  showCancelButton: true,
		  confirmButtonColor: '#3085d6',
		  cancelButtonColor: '#d33',
		  cancelButtonText: 'Tidak',
		  confirmButtonText: 'Ya, Luluskan!'
		}).then((result) => {
		  if (result.isConfirmed) {
			$.ajax({
				type : 'POST',
				url : 'modul/siswa/luluskan.php',
				data :  'smt='+smt+'&tapel='+tapel,
				dataType : 'json',
				beforeSend: function()
				{	
					$("#loading").show();
					$(".loader").show();
				},
				success: function (response) {
					$("#loading").hide();
					$(".loader").hide();
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
					var kelas = $('#kelas').val();
					var tapel = $('#tapel').val();
					var smt = $('#smt').val();
					temaTable.ajax.reload(null, false);	
					$("#loading").hide();
					$(".loader").hide();
				}
			});
		  }
		})
	});
});