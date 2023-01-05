"use strict"; 
var temaTable;
var kelas = $('#kelas').val();
var tapel = $('#tapel').val();
var smt = $('#smt').val();
$(document).ready(function(){
	var kelas = $('#kelas').val();
	var tapel = $('#tapel').val();
	var smt = $('#smt').val();
	temaTable = $('#kt_table_users').DataTable( {
			"destroy":true,
			"dom": '<"row"<"col-lg-6"l><"col-lg-6"f>><"table-responsive"t>p',
			"searching": true,
			"paging":false,
			"ajax": "modul/rapor/data-kesehatan.php?kelas="+kelas+"&tapel="+tapel+"&smt="+smt
		} );
	
	$('#caridata').on( 'keyup', function () {
		temaTable.search( this.value ).draw();
	} );
	$('#kelas').change(function(){
		var kelas = $('#kelas').val();
		var tapel = $('#tapel').val();
		var smt = $('#smt').val();
		temaTable = $('#kt_table_users').DataTable( {
			"destroy":true,
			"dom": '<"row"<"col-lg-6"l><"col-lg-6"f>><"table-responsive"t>p',
			"searching": true,
			"paging":false,
			"ajax": "modul/rapor/data-kesehatan.php?kelas="+kelas+"&tapel="+tapel+"&smt="+smt
		} );
	});
	$('#modalkesehatan').on('show.bs.modal', function (e) {
        var rowid = $(e.relatedTarget).data('pdid');
		var rowsmt = $(e.relatedTarget).data('smt');
		var rowtapel = $(e.relatedTarget).data('tapel');
		var rowkelas = $(e.relatedTarget).data('kelas');
        //menggunakan fungsi ajax untuk pengambilan data
        $.ajax({
            type : 'post',
            url : 'modul/rapor/m_kesehatan.php',
            data :  'rowid='+ rowid +'&smt='+rowsmt+'&tapel='+rowtapel+'&kelas='+rowkelas,
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
	$("#kesehatanForm").unbind('submit').bind('submit', function() {
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
						temaTable.ajax.reload(null, false);
						$("#modalkesehatan").modal('hide');
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
