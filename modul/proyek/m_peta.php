<?php 
require_once '../../config/db_connect.php';
$proyek=$_POST['proyek'];
?>
				<div class="block block-rounded shadow-none mb-0">
                  <div class="block-header block-header-default">
                    <h3 class="block-title">PEMETAAN PROJEK</h3>
                    <div class="block-options">
                      <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fa fa-times"></i>
                      </button>
                    </div>
                  </div>
                  <div class="block-content fs-sm">
                    <div class="mb-4">
                      <label class="form-label" for="example-text-input">Dimensi</label>
					  <input type="hidden" class="form-control" id="proyek" name="proyek" value="<?=$proyek;?>">
					  
					  <select class="form-select" id="dimensi" name="dimensi">
							<option value="0">Pilih Dimensi</option>
							<?php 
							$sql4 = "select * from dimensi_proyek order by id_dimensi asc";
							$query4 = $connect->query($sql4);
							$ck=0;
							while($nk=$query4->fetch_assoc()){
							?>
							<option value="<?=$nk['id_dimensi'];?>"><?=$nk['nama_dimensi'];?></option>
							<?php
							};
							?>
					  </select>
                    </div>
				  </div>
                  <div class="block-content block-content-full block-content-sm text-end border-top">
                    <button type="button" class="btn btn-alt-secondary" data-bs-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-alt-primary">Simpan</button>
                  </div>
                </div>
				