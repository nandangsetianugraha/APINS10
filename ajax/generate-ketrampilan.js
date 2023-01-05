"use strict"; 
var temaTable;
var kelas = $('#kelas').val();
var tapel = $('#tapel').val();
var smt = $('#smt').val();
$(document).ready(function(){
	var kelas = $('#kelas').val();
	var tapel = $('#tapel').val();
	var smt = $('#smt').val();
	var mp = $('#mp').val();
	temaTable = $('#kt_table_users').DataTable( {
			"destroy":true,
			"dom": '<"row"<"col-lg-6"l><"col-lg-6"f>><"table-responsive"t>p',
			"searching": true,
			"paging":false,
			"ajax": "modul/rapor/rapor-ketrampilan.php?kelas="+kelas+"&tapel="+tapel+"&smt="+smt+"&mp="+mp,
		} );
	
	$('#caridata').on( 'keyup', function () {
		temaTable.search( this.value ).draw();
	} );
	$('#kelas').change(function(){
		var kelas = $('#kelas').val();
		var tapel = $('#tapel').val();
		var smt = $('#smt').val();
		var mp = $('#mp').val();
		$.ajax({
			type : 'GET',
			url : 'modul/administrasi/mpl.php',
			data :  'kelas=' +kelas,
			success: function (data) {
				//jika data berhasil didapatkan, tampilkan ke dalam option select mp
				$("#mp").html(data);
			}
		});
		/**
		temaTable = $('#kt_table_users').DataTable( {
			"destroy":true,
			"searching": true,
			"paging":false,
			"ajax": "modul/rapor/rapor-pengetahuan.php?kelas="+kelas+"&tapel="+tapel+"&smt="+smt+"&mp="+mp,
		} );
		**/
	});
	$('#mp').change(function(){
		var kelas = $('#kelas').val();
		var tapel = $('#tapel').val();
		var smt = $('#smt').val();
		var mp = $('#mp').val();
		temaTable = $('#kt_table_users').DataTable( {
			"destroy":true,
			"dom": '<"row"<"col-lg-6"l><"col-lg-6"f>><"table-responsive"t>p',
			"searching": true,
			"paging":false,
			"ajax": "modul/rapor/rapor-ketrampilan.php?kelas="+kelas+"&tapel="+tapel+"&smt="+smt+"&mp="+mp,
		} );
	});
	
	$(document).on('click', '#getRaport', function(e){
		e.preventDefault();
		var ukelas = $(this).data('kelas');
		var utapel = $(this).data('tapel');			// it will get id of clicked row
		var usmt = $(this).data('smt');
		var updid = $(this).data('pdid');
		var ump = $(this).data('mp');
		$.ajax({
            type : 'post',
            url : 'modul/rapor/generate-ketrampilan.php',
            data :  'kelas='+ukelas+'&tapel='+utapel+'&smt='+usmt+'&mp='+ump+'&pdid='+updid,
			dataType: 'json',
			beforeSend: function()
			{	
				$("#loading").show();
				$(".loader").show();
			},
            success : function(response){
				$("#loading").hide();
				$(".loader").hide();
				var kelas = $('#kelas').val();
				var tapel = $('#tapel').val();
				var smt = $('#smt').val();
				var mp = $('#mp').val();
				temaTable.ajax.reload(null, false);
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
        });			
	});
	
	$('#modalekskul').on('show.bs.modal', function (e) {
        var rowid = $(e.relatedTarget).data('id');
        //menggunakan fungsi ajax untuk pengambilan data
        $.ajax({
            type : 'post',
            url : 'modul/rapor/m_ketrampilan.php',
            data :  'rowid='+ rowid,
			beforeSend: function()
			{	
				$("#loading").show();
				$(".loader").show();
			},
            success : function(data){
				$("#loading").hide();
				$(".loader").hide();
				$('.kesehatan-data').html(data);//menampilkan data ke dalam modal
            }
        });
    });
	$("#ekskulForm").unbind('submit').bind('submit', function() {
			var form = $(this);

			$.ajax({
				url: form.attr('action'),
				type: form.attr('method'),
				data: form.serialize(),
				dataType: 'json',
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
						var kelas = $('#kelas').val();
						var tapel = $('#tapel').val();
						var smt = $('#smt').val();
						var mp = $('#mp').val();
						temaTable.ajax.reload(null, false);
						$("#modalekskul").modal('hide');
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