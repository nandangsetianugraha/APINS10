"use strict"; 
var temaTable;
$(document).ready(function() {
	$('#tanggal').datepicker({
		format: 'yyyy-mm-dd',
		autoclose:true
	});
	$('#waktu').timepicker({ timeFormat: 'HH:mm' });
	var tanggal=$('#tanggal').val();
	var tapel=$('#tapel').val();
	var smt=$('#smt').val();
	var urls = $('#urls').val();
		temaTable = $('#temaTable').DataTable( {
			"destroy":true,
			"dom": '<"row"<"col-lg-6"l><"col-lg-6"f>><"table-responsive"t>p',
			"searching": true,
			"ajax": urls+"modul/kepegawaian/data-absen.php?tanggal="+tanggal,
			"order": []
		} );
	$('#tanggal').change(function(){
			//Mengambil value dari option select provinsi kemudian parameternya dikirim menggunakan ajax
		var tanggal=$('#tanggal').val();
		var tapel=$('#tapel').val();
		var smt=$('#smt').val();
		var urls = $('#urls').val();
		temaTable = $('#temaTable').DataTable( {
			"destroy":true,
			"dom": '<"row"<"col-lg-6"l><"col-lg-6"f>><"table-responsive"t>p',
			"searching": true,
			"ajax": urls+"modul/kepegawaian/data-absen.php?tanggal="+tanggal,
			"order": []
		} );
	});
	
		$('#editTema').on('show.bs.modal', function (e) {
            var rowid = $(e.relatedTarget).data('tema');
			var tanggal=$('#tanggal').val();
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url : 'modul/kepegawaian/e_absen.php',
                data :  'rowid='+ rowid+'&tanggal='+tanggal,
				beforeSend: function()
						{	
							$(".tema-data").html('<i class="fa fa-spinner fa-pulse fa-fw"></i> Loading ...');
						},
                success : function(data){
                $('.tema-data').html(data);//menampilkan data ke dalam modal
                }
            });
         });
		
		$("#updateTemaForm").unbind('submit').bind('submit', function() {
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
						var tanggal=$('#tanggal').val();
						var tapel=$('#tapel').val();
						var smt=$('#smt').val();
						var urls = $('#urls').val();
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