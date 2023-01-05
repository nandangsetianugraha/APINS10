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
			"paging":false,
			"ajax": "modul/penilaian/spiritual.php?kelas="+kelas+"&tapel="+tapel+"&smt="+smt
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
			"ajax": "modul/penilaian/spiritual.php?kelas="+kelas+"&tapel="+tapel+"&smt="+smt
		} );
	});
});

	function removespiritual(id = null) {
		if(id) {
			// click on remove button
			
			Swal.fire({
			  title: 'Yakin dihapus?',
			  text: "Apakah anda yakin menghapus Nilai ini?",
			  icon: 'warning',
			  showCancelButton: true,
			  confirmButtonColor: '#3085d6',
			  cancelButtonColor: '#d33',
			  confirmButtonText: 'Ya, Hapus!'
			}).then((result) => {
			  if (result.isConfirmed) {
				$.ajax({
						url: 'modul/penilaian/hapus-spiritual.php',
						type: 'post',
						data: {member_id : id},
						dataType: 'json',
						success:function(response) {
							if(response.success == true) {						
								// refresh the table
								var smt=$('#smt').val();
								var tapel=$('#tapel').val();
								var kelas=$('#kelas').val();
								temaTable.ajax.reload(null, false);
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

	function savespiritual(siswa,kelas,smt,tapel,jenis,nilai) {
		// no change change made then return false
		// send ajax to update value
		$.ajax({
			url: "modul/penilaian/savespiritual.php",
			cache: false,
			data:'id='+siswa+'&kelas='+kelas+'&smt='+smt+'&tapel='+tapel+'&jenis='+jenis+'&nilai='+nilai,
			success: function(response)  {
				console.log(response);
				var smt=$('#smt').val();
				var tapel=$('#tapel').val();
				var kelas=$('#kelas').val();
				temaTable.ajax.reload(null, false);
				// set updated value as old value
					
				
			}          
	   });
	}
