<?php 
require_once '../../config/db_connect.php';
$kelas=$_POST['kelas'];
$smt=$_POST['smt'];
$mapel=$_POST['mapel'];
?>
				<div class="modal-header">
					<h5 class="modal-title">Lingkup Materi</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<input type="hidden" class="form-control" id="kelas" name="kelas" value="<?=$kelas;?>">
					<input type="hidden" class="form-control" id="smt" name="smt" value="<?=$smt;?>">
					<input type="hidden" class="form-control" id="mapel" name="mapel" value="<?=$mapel;?>">
					<div class="mb-4">
                      <label class="form-label" for="example-text-input">Kode Lingkup Materi</label>
                      <input type="text" class="form-control" id="n_proyek" name="n_proyek" placeholder="Kode LM">
                    </div>
					<div class="mb-4">
                      <label class="form-label" for="example-text-input">Deskripsi Lingkup Materi</label>
					  <textarea class="form-control" id="d_proyek" name="d_proyek" rows="4" placeholder="Deskripsi LM.."></textarea>
                    </div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary">Simpan</button>
					<button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
				</div>
				