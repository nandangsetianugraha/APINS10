<?phprequire_once '../../config/db_connect.php';
$kelas=$_GET['kelas'];$proyek=$_GET['proyek'];$tapel=$_GET['tapel'];$smt=$_GET['smt'];$siswa=$_GET['siswa'];
$ab=substr($kelas,0,1);if($ab==1 or $ab==2){	$fase="A";}elseif($ab==3 or $ab==4){	$fase="B";}else{	$fase="C";};$sql = "select * from pemetaan_proyek where proyek='$proyek' order by dimensi asc";$query = $connect->query($sql);//$mapel=$connect->query("select * from mata_pelajaran where id_mapel='$mp'")->fetch_assoc();	while($s=$query->fetch_assoc()) {		$iddimensi=$s['dimensi'];		$ndimensi=$connect->query("select * from dimensi_proyek where id_dimensi='$iddimensi'")->fetch_assoc();		$nomor=1;	?>	Dimensi : <?=$ndimensi['nama_dimensi'];?>	<table class="table table-striped table-borderless table-vcenter">        <thead>            <tr>                <th>No</th>				<th>Capaian</th>				<th colspan="4">Penilaian</th>            </tr>        </thead>        <tbody>			<?php 			$sql1 = "select * from elemen_proyek where dimensi='$iddimensi' and fase='$fase'";			$query1 = $connect->query($sql1);			while($n=$query1->fetch_assoc()) {				$idel=$n['id_elemen'];				$ada = $connect->query("select * from penilaian_proyek where peserta_didik_id='$siswa' AND kelas='$kelas' AND smt='$smt' AND tapel='$tapel' AND proyek='$proyek' and id_elemen='$idel'")->num_rows;				if($ada>0){					$utt=$connect->query("select * from penilaian_proyek where peserta_didik_id='$siswa' AND kelas='$kelas' AND smt='$smt' AND tapel='$tapel' AND proyek='$proyek' and id_elemen='$idel'")->fetch_assoc();					$ncek=$utt['nilai'];					if($ncek==0){						$stat1='checked';						$stat2='';						$stat3='';						$stat4='';					}elseif($ncek==1){						$stat1='';						$stat2='checked';						$stat3='';						$stat4='';					}elseif($ncek==2){						$stat1='';						$stat2='';						$stat3='checked';						$stat4='';					}else{						$stat1='';						$stat2='';						$stat3='';						$stat4='checked';					};				}else{					$stat1='';					$stat2='';					$stat3='';					$stat4='';				};			?>			<tr>				<td><?=$nomor;?></td>				<td><b><?=$n['sub_elemen'];?></b><br/>				<?=$n['capaian'];?></td>								<td>					<div class="radio-custom">						<input onClick="savePilihan('<?=$siswa;?>','<?=$kelas;?>','<?=$tapel;?>','<?=$smt;?>','<?=$proyek;?>','<?=$idel;?>','<?=$iddimensi;?>','0')" class="form-check-input" type="radio" id="example-<?=$idel;?>-default1" name="pilihan-<?=$idel;?>" value="0" <?=$stat1;?>>						<label for="radioExample1">BB</label>					</div>				</td>				<td>					<div class="radio-custom">						<input onClick="savePilihan('<?=$siswa;?>','<?=$kelas;?>','<?=$tapel;?>','<?=$smt;?>','<?=$proyek;?>','<?=$idel;?>','<?=$iddimensi;?>','1')" class="form-check-input" type="radio" id="example-<?=$idel;?>-default1" name="pilihan-<?=$idel;?>" value="1" <?=$stat2;?>>						<label for="radioExample1">MB</label>					</div>				</td>				<td>					<div class="radio-custom">						<input onClick="savePilihan('<?=$siswa;?>','<?=$kelas;?>','<?=$tapel;?>','<?=$smt;?>','<?=$proyek;?>','<?=$idel;?>','<?=$iddimensi;?>','2')" class="form-check-input" type="radio" id="example-<?=$idel;?>-default1" name="pilihan-<?=$idel;?>" value="2" <?=$stat3;?>>						<label for="radioExample1">BSH</label>					</div>				</td>				<td>					<div class="radio-custom">						<input onClick="savePilihan('<?=$siswa;?>','<?=$kelas;?>','<?=$tapel;?>','<?=$smt;?>','<?=$proyek;?>','<?=$idel;?>','<?=$iddimensi;?>','3')" class="form-check-input" type="radio" id="example-<?=$idel;?>-default1" name="pilihan-<?=$idel;?>" value="3" <?=$stat4;?>>						<label for="radioExample1">BSB</label>					</div>				</td>							</tr>			<?php 			$nomor=$nomor+1;			}			?>                          </tbody>    </table><?php };
?><script>	$("#tpTable").DataTable({pageLength:30,lengthMenu:[[10,20,30],[10,20,30]],autoWidth:!1});	</script>