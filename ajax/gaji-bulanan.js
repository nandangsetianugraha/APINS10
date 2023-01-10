var temaTable;
$(document).ready(function(){
	var tapel = $('#tapel').val();
	var smt = $('#smt').val();
	var urls=$('#urls').val();
	var bulan=$('#bulan').val();
	var tahun=$('#tahun').val();
	temaTable = $('#kt_table_users').DataTable( {
			"destroy":true,
			"dom": '<"row"<"col-lg-6"l><"col-lg-6"f>><"table-responsive"t>p',
			"searching": true,
			"paging":true,
			"ajax": "modul/kepegawaian/bulanan.php?bln="+bulan+"&thn="+tahun,
		} );
	
	$('#bulan').change(function(){
			//Mengambil value dari option select provinsi kemudian parameternya dikirim menggunakan ajax
			var bulan=$('#bulan').val();
			var tahun=$('#tahun').val();
			temaTable = $('#kt_table_users').DataTable( {
				"destroy":true,
				"dom": '<"row"<"col-lg-6"l><"col-lg-6"f>><"table-responsive"t>p',
				"searching": true,
				"paging":true,
				"ajax": "modul/kepegawaian/bulanan.php?bln="+bulan+"&thn="+tahun,
			} );
	});
	$('#tahun').change(function(){
			//Mengambil value dari option select provinsi kemudian parameternya dikirim menggunakan ajax
			var bulan=$('#bulan').val();
			var tahun=$('#tahun').val();
			temaTable = $('#kt_table_users').DataTable( {
				"destroy":true,
				"dom": '<"row"<"col-lg-6"l><"col-lg-6"f>><"table-responsive"t>p',
				"searching": true,
				"paging":true,
				"ajax": "modul/kepegawaian/bulanan.php?bln="+bulan+"&thn="+tahun,
			} );
	});
	
	$('#caridata').on( 'keyup', function () {
		temaTable.search( this.value ).draw();
	} );
	
	$(document).on('click', '#cetakRekapGaji', function(e){
		
			e.preventDefault();
			var bulan=$('#bulan').val();
			var tahun=$('#tahun').val();
			PopupCenter('cetak/rekapgaji.php?bln='+bulan+'&thn='+tahun, 'Cetak Invoice',800,800);
			
		});
	$(document).on('click', '#cetakSlipGaji', function(e){
		
			e.preventDefault();
			var bulan=$('#bulan').val();
			var tahun=$('#tahun').val();
			PopupCenter('cetak/slipgaji.php?bln='+bulan+'&thn='+tahun, 'Cetak Invoice',800,800);
			
		});
	
})

function PopupCenter(pageURL, title,w,h) {
	var left = (screen.width/2)-(w/2);
	var top = (screen.height/2)-(h/2);
	var targetWin = window.open (pageURL, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width='+w+', height='+h+', top='+top+', left='+left);
};

	function highlightEdit(editableObj) {
		$(editableObj).css("background","#FFF0000");
	} 
	function simpankes(editableObj,column,id,bln,thn) {
		// no change change made then return false
		if($(editableObj).attr('data-old_value') === editableObj.innerHTML)
		return false;
		// send ajax to update value
		$(editableObj).css("background","#FFF url(loader.gif) no-repeat right");
		$.ajax({
			url: "modul/kepegawaian/saveBul.php",
			cache: false,
			data:'column='+column+'&value='+editableObj.innerHTML+'&id='+id+'&bln='+bln+'&thn='+thn,
			success: function(response)  {
				console.log(response);
				// set updated value as old value
				$(editableObj).attr('data-old_value',editableObj.innerHTML);
				$(editableObj).css("background","#FFF url(checkup.png) no-repeat right");				
			}          
	   });
	}

	
