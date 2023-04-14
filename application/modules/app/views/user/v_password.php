<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Ganti Password | <?php echo $data['username'] ?></h4>
				</div>
<form role="form" class="validate"  action="<?php echo base_url() ?>app/gantipasswordproses"	method="post"  enctype="multipart/form-data" id="form"> 

<div class="modal-body">

<div class="row">
						<div class="col-md-6">
							<input type="hidden" name="username" id="username" value="<?php echo $data['username'] ?>">
							<input type="hidden" name="<?=$csrf['name']?>" value="<?=$csrf['hash']?>">
							<div class="form-group">
								<label for="field-1" class="control-label">Password</label>
								
								<input type="password" class="form-control" id="password" name="password" placeholder="Password">
							</div>	
							
						</div>
						
						<div class="col-md-6">
							
							<div class="form-group">
								<label for="field-2" class="control-label">Konfirmasi Password</label>
								
								<input type="password" class="form-control" id="kpassword" name="kpassword" placeholder="Konfirmasi Password">
							</div>	
						
						</div>
					</div>

		
		

		</div>
		<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
					<button type="submit" class="btn btn-primary">Simpan</button>
				</div>

				</form>