"use strict";
var manageMemberTable;
	$(document).ready(function() {
		var kelas=$('#kelas').val();
		var mp=$('#mp').val();
		var smt=$('#smt').val();
		var tapel=$('#tapel').val();
		manageMemberTable = $('#manageMemberTable').DataTable( {
			pageLength: 5,
			lengthMenu: [
			 [5, 10, 20],
			 [5, 10, 20],
			],
			autoWidth: !1,
			responsive: !0,
			"destroy":true,
			"dom": '<"row"<"col-lg-6"l><"col-lg-6"f>><"table-responsive"t>p',
			"searching": false,
			"paging":false,
			"ajax": "modul/rapor/rapor-ikm.php?kelas="+kelas+"&tapel="+tapel+"&smt="+smt+'&mp='+mp,
			"order": []
		} );
		$('#kelas').change(function(){
			//Mengambil value dari option select kd kemudian parameternya dikirim menggunakan ajax
			var kelas=$('#kelas').val();
			$.ajax({
				type : 'GET',
				url : 'modul/materi/mp.php',
				data :  'kelas='+kelas,
				beforeSend: function()
				{	
					$("#loading").show();
					$(".loader").show();
				},
				success: function (data) {
					$("#loading").hide();
					$(".loader").hide();
					//jika data berhasil didapatkan, tampilkan ke dalam option select mp
					$("#mp").html(data);
				}
			});
		});
		$('#mp').change(function(){
			//Mengambil value dari option select kd kemudian parameternya dikirim menggunakan ajax
			var kelas=$('#kelas').val();
			var mp=$('#mp').val();
			var smt=$('#smt').val();
			var tapel=$('#tapel').val();
			manageMemberTable = $('#manageMemberTable').DataTable( {
				pageLength: 5,
				lengthMenu: [
				 [5, 10, 20],
				 [5, 10, 20],
				],
				autoWidth: !1,
				responsive: !0,
				"destroy":true,
				"dom": '<"row"<"col-lg-6"l><"col-lg-6"f>><"table-responsive"t>p',
				"searching": false,
				"paging":false,
				"ajax": "modul/rapor/rapor-ikm.php?kelas="+kelas+"&tapel="+tapel+"&smt="+smt+'&mp='+mp,
				"order": []
			} );
		});
		
		$(document).on('click', '#getRaport', function(e){
			e.preventDefault();
			var ukelas = $(this).data('kelas');
			var utapel = $(this).data('tapel');			// it will get id of clicked row
			var usmt = $(this).data('smt');
			var ump = $(this).data('mp');
			var updid = $(this).data('pdid');
			$.ajax({
				type : 'POST',
				url : 'modul/rapor/simpan-rapor.php',
				data :  'kelas='+ukelas+'&mp='+ump+'&smt='+usmt+'&tapel='+utapel+'&pdid='+updid,
				dataType : 'json',
				beforeSend: function()
				{	
					$("#loading").show();
					$(".loader").show();
				},
				success:function(response) {
					$("#loading").hide();
					$(".loader").hide();
					if(response.success === true) {
						//$("#modalmateri").modal('hide');
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
						//swal(response.messages, {buttons: false,timer: 2000,});
						manageMemberTable.ajax.reload(null, false);
					} else {
						Swal.fire("Kesalahan",response.messages,"error");
						manageMemberTable.ajax.reload(null, false);
					}  // /else
				} // success 
			});			
		});
		
		$('#editProyek').on('show.bs.modal', function (e) {
            var rowid = $(e.relatedTarget).data('tema');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url : 'modul/rapor/e_rapor.php',
                data :  'rowid='+ rowid,
				beforeSend: function()
						{	
							$(".fetched-data1").html('<i class="fa fa-spinner fa-pulse fa-fw"></i> Loading ...');
						},
                success : function(data){
                $('.fetched-data1').html(data);//menampilkan data ke dalam modal
                }
            });
        });
		$("#ubahproyek").unbind('submit').bind('submit', function() {
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
						var kelas=$('#kelas').val();
						var mp=$('#mp').val();
						var smt=$('#smt').val();
						var tapel=$('#tapel').val();
						manageMemberTable.ajax.reload(null, false);
						$("#editProyek").modal('hide');
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
	
	function highlightEdit(editableObj) {
		$(editableObj).css("background","#FFF0000");
	} 
	function saveAkhirSumatif(editableObj,column,id,kelas,smt,tapel,mpid) {
		// no change change made then return false
		if($(editableObj).attr('data-old_value') === editableObj.innerHTML)
		return false;
		// send ajax to update value
		$(editableObj).css("background","#FFF url(loader.gif) no-repeat right");
		$.ajax({
			url: "modul/penilaian/saveAkhirSumatif.php",
			cache: false,
			data:'column='+column+'&value='+editableObj.innerHTML+'&id='+id+'&kelas='+kelas+'&smt='+smt+'&tapel='+tapel+'&mp='+mpid,
			success: function(response)  {
				console.log(response);
				// set updated value as old value
				$(editableObj).attr('data-old_value',editableObj.innerHTML);
				$(editableObj).css("background","#FFF url(checkup.png) no-repeat right");	
				
			}          
	   });
	}