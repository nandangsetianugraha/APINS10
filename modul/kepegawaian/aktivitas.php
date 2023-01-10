													<?php 
													require_once '../../config/db_connect.php'; 
													session_start();
													$level=$_SESSION['level'];
													$idku=$_GET['idptk'];
													$jns = isset($_GET['jns']) ? $_GET['jns'] : '0';
													?>
													<div class="card-body">
														<ul class="widget-todo-list">
															<?php 
															if($jns==0){
																if($level==11){
																	$logs = $connect->query("select * from log order by logDate desc limit 5");
																}else{
																	$logs = $connect->query("select * from log where ptk_id='$idku' order by logDate desc limit 5");
																};
															}else{
																$logs = $connect->query("select * from log where ptk_id='$idku' order by logDate desc limit 5");
															};
															$jlogs=$logs->num_rows;
															if($jlogs>0){
																while($mlogs=$logs->fetch_assoc()){
																	$idlog=$mlogs['id'];
																	$iduser=$mlogs['ptk_id'];
																	$nama=$connect->query("select * from ptk where ptk_id='$iduser'")->fetch_assoc();
															?>
															<li>
																<div class="checkbox-custom checkbox-default">
																	<input type="checkbox" id="todoListItem2" class="todo-check">
																	<label class="todo-label" for="todoListItem2"><span>[<?=$mlogs['logDate'];?>] <?=$nama['nama'];?> - <?=$mlogs['activity'];?></span></label>
																</div>
																<div class="todo-actions">
																	<a href="#" onclick="removeAktivitas(<?=$idlog;?>)">
																		<i class="fas fa-times"></i>
																	</a>
																</div>
															</li>
															<?php }}else{ ?>
															<li>
																<div class="checkbox-custom checkbox-default">
																	<input type="checkbox" id="todoListItem2" class="todo-check">
																	<label class="todo-label" for="todoListItem2"><span>Belum ada Aktivitas</span></label>
																</div>
																<div class="todo-actions">
																	<a class="todo-remove" href="#">
																		<i class="fas fa-times"></i>
																	</a>
																</div>
															</li>
															<?php } ?>															
														</ul>
													</div>