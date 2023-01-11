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
			"ajax": "modul/siswa/rombel.php?kelas="+kelas+"&smt="+smt+"&tapel="+tapel
		} );
	
	$('#caridata').on( 'keyup', function () {
		temaTable.search( this.value ).draw();
	} );
	$('#kelas').change(function(){
			//Mengambil value dari option select provinsi kemudian parameternya dikirim menggunakan ajax
		var kelas = $('#kelas').val();
		var tapel = $('#tapel').val();
		var smt = $('#smt').val();
		temaTable = $('#kt_table_users').DataTable( {
			"destroy":true,
			"dom": '<"row"<"col-lg-6"l><"col-lg-6"f>><"table-responsive"t>p',
			"searching": true,
			"paging":true,
			"ajax": "modul/siswa/rombel.php?kelas="+kelas+"&smt="+smt+"&tapel="+tapel
		} );
	});
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
	$(document).on('click', '#keluarRombel', function(e){
		e.preventDefault();
		var siswa = $(this).data('siswa');
		var tapel = $(this).data('tapel');
		var smt = $(this).data('smt');
		var kelas = $(this).data('kelas');
		Swal.fire({
		  title: 'Peringatan!',
		  text: 'Yakin akan mengeluarkan peserta didik dari Kelas '+kelas+' ?',
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
					setTimeout(function () {window.open(urls+"rombel","_self");},1000)
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
	
	
	//rombel 
	var tapel = $('#tpl').val();
		var ids = $('#ids').val();
		var urls = $('#urls').val();
		$("#kompetensiTable").dataTable({
			"destroy":true,
		  "searching": false,
		  "paging":false,
		  "ajax": urls+"modul/siswa/raportk.php?tapel="+tapel+"&ids="+ids
		});
		$("#manageMemberTable").dataTable({
			"destroy":true,
		  "searching": false,
		  "paging":false,
		  "ajax": urls+"modul/siswa/raport.php?tapel="+tapel+"&ids="+ids
		});
		$("#tabelEkskul").dataTable({
			"destroy":true,
		  "searching": false,
		  "paging":false,
		  "ajax": urls+"modul/siswa/ekskul.php?tapel="+tapel+"&ids="+ids
		});
		$("#tabelSaran").dataTable({
			"destroy":true,
		  "searching": false,
		  "paging":false,
		  "ajax": urls+"modul/siswa/saran.php?tapel="+tapel+"&ids="+ids
		});
		$("#tabelTB").dataTable({
			"destroy":true,
		  "searching": false,
		  "paging":false,
		  "ajax": urls+"modul/siswa/tb.php?tapel="+tapel+"&ids="+ids
		});
		$("#tabelPrestasi").dataTable({
			"destroy":true,
		  "searching": false,
		  "paging":false,
		  "ajax": urls+"modul/siswa/prestasiku.php?tapel="+tapel+"&ids="+ids
		});
		$("#tabelAbsensi").dataTable({
			"destroy":true,
		  "searching": false,
		  "paging":false,
		  "ajax": urls+"modul/siswa/absensi.php?tapel="+tapel+"&ids="+ids
		});
		$('#tpl').change(function(){
			var tapel = $('#tpl').val();
			var ids = $('#ids').val();
			var urls = $('#urls').val();
			$("#kompetensiTable").dataTable({
				"destroy":true,
			  "searching": false,
			  "paging":false,
			  "ajax": urls+"modul/siswa/raportk.php?tapel="+tapel+"&ids="+ids
			});
			$("#manageMemberTable").dataTable({
				"destroy":true,
			  "searching": false,
			  "paging":false,
			  "ajax": urls+"modul/siswa/raport.php?tapel="+tapel+"&ids="+ids
			});
			$("#tabelEkskul").dataTable({
				"destroy":true,
			  "searching": false,
			  "paging":false,
			  "ajax": urls+"modul/siswa/ekskul.php?tapel="+tapel+"&ids="+ids
			});
			$("#tabelSaran").dataTable({
				"destroy":true,
			  "searching": false,
			  "paging":false,
			  "ajax": urls+"modul/siswa/saran.php?tapel="+tapel+"&ids="+ids
			});
			$("#tabelTB").dataTable({
				"destroy":true,
			  "searching": false,
			  "paging":false,
			  "ajax": urls+"modul/siswa/tb.php?tapel="+tapel+"&ids="+ids
			});
			$("#tabelPrestasi").dataTable({
				"destroy":true,
			  "searching": false,
			  "paging":false,
			  "ajax": urls+"modul/siswa/prestasiku.php?tapel="+tapel+"&ids="+ids
			});
			$("#tabelAbsensi").dataTable({
				"destroy":true,
			  "searching": false,
			  "paging":false,
			  "ajax": urls+"modul/siswa/absensi.php?tapel="+tapel+"&ids="+ids
			});
		});
});