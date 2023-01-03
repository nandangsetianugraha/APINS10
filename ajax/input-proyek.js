"use strict";
var manageProyek;
	$(document).ready(function() {
		var kelas = $('#kelas').val();
		var tapel = $('#tapel').val();
		var smt = $('#smt').val();
		$("#manageProyek").dataTable({
		  pageLength: 5,
          lengthMenu: [
             [5, 10, 20],
             [5, 10, 20],
          ],
          autoWidth: !1,
		  responsive: !0,
		  "destroy":true,
		  "searching": true,
		  "paging":true,
		  "ajax": "modul/proyek/data-proyek.php?kelas="+kelas+"&smt="+smt+"&tapel="+tapel,
		  "columnDefs": [
			{ "sortable": false, "targets": [5] }
		  ]
		});
		$('#kelas').change(function(){
			var kelas = $('#kelas').val();
			var tapel = $('#tapel').val();
			var smt = $('#smt').val();
			$("#manageProyek").dataTable({
			  pageLength: 5,
			  lengthMenu: [
				 [5, 10, 20],
				 [5, 10, 20],
			  ],
			  autoWidth: !1,
			  responsive: !0,
			  "destroy":true,
			  "searching": true,
			  "paging":true,
			  "ajax": "modul/proyek/data-proyek.php?kelas="+kelas+"&smt="+smt+"&tapel="+tapel,
			  "columnDefs": [
				{ "sortable": false, "targets": [5] }
			  ]
			});
		});
		$('#modalsiswa').on('show.bs.modal', function (e) {
            var rowid = $(e.relatedTarget).data('siswa');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url : 'modul/siswa/modal_siswa.php',
                data :  'rowid='+ rowid,
				beforeSend: function()
						{	
							$("#loading").show();
							$(".loader").show();
						},
                success : function(data){
					$("#loading").hide();
					$(".loader").hide();
					$('.fetched-data').html(data);//menampilkan data ke dalam modal
                }
            });
        });
		$("#buatproyek").unbind('submit').bind('submit', function() {
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
						$("#addProyek").modal('hide');
						
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
						$('#manageProyek').DataTable().ajax.reload();
						//$("#createKDFormk")[0].reset();
						// this function is built in function of datatables;
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
		}); // /submit form for Tujuan
		
	});
	function removeProyek(id = null) {
		if(id) {
			// click on remove button
			
			Swal.fire({
			  title: 'Yakin dihapus?',
			  text: "Apakah anda yakin menghapus Proyek ini?",
			  icon: 'warning',
			  showCancelButton: true,
			  confirmButtonColor: '#3085d6',
			  cancelButtonColor: '#d33',
			  confirmButtonText: 'Ya, Hapus!'
			}).then((result) => {
			  if (result.isConfirmed) {
				$.ajax({
						url: 'modul/proyek/hapus-proyek.php',
						type: 'post',
						data: {member_id : id},
						dataType: 'json',
						success:function(response) {
							if(response.success == true) {						
								// refresh the table
								var kelas = $('#kelas').val();
								var tapel = $('#tapel').val();
								var smt = $('#smt').val();
								$('#manageProyek').DataTable().ajax.reload();
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
	$('#addProyek').on('show.bs.modal', function (e) {
            var kelas = $('#kelas').val();
			var tapel = $('#tapel').val();
			var smt = $('#smt').val();
			//menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url : 'modul/proyek/m_proyek.php',
                data :  'kelas='+ kelas+"&smt="+smt+"&tapel="+tapel,
				beforeSend: function()
						{	
							$("#loading").show();
							$(".loader").show();
						},
                success : function(data){
					$("#loading").hide();
					$(".loader").hide();
					$('.fetched-data').html(data);//menampilkan data ke dalam modal
                }
            });
        });
	$('#editProyek').on('show.bs.modal', function (e) {
            var rowid = $(e.relatedTarget).data('proyek');
			//menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url : 'modul/proyek/e_proyek.php',
                data :  'rowid='+ rowid,
				beforeSend: function()
						{	
							$("#loading").show();
							$(".loader").show();
						},
                success : function(data){
					$("#loading").hide();
					$(".loader").hide();
					$('.fetched-data1').html(data);//menampilkan data ke dalam modal
                }
            });
        });