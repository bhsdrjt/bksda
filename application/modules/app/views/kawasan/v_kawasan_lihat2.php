<ol class="breadcrumb bc-3">
	<li>
		<a href="<?php echo base_url() ?>app">
			<i class="fa fa-user"></i>Data kawasan</a>
	</li>
	<li class="active">
		<strong>Lihat Data kawasan</strong>
	</li>
</ol>

<h3>Data Detil kawasan</h3>
<div class="panel panel-primary" data-collapsed="0">

		<input type="hidden" name="<?=$csrf['name']?>" value="<?=$csrf['hash']?>">
		<div class="panel-body">
			<a href="<?php echo base_url('app/kawasan') ?>" class="btn btn-primary btn-s-xs">
				<i class="fa fa-arrow-left"></i> Kembali</a>
				
				<hr/>
			<div class="row">
				<div class="col-md-5">
					<div class="form-group">
						<label class="col-lg-4 control-label">Nama SKW</label>
						<div class="col-lg-8">
							<p  class="form-control-static" > : <?php echo $data['namawilayah']; ?> </p>
						</div>
					</div>
					<div class="form-group">
						<label class="col-lg-4 control-label">Nama kawasan</label>
						<div class="col-lg-8">
							<p  class="form-control-static" > : <?php echo $data['namakawasan']; ?> </p>
						</div>
					</div>
					<div class="form-group">
						<label class="col-lg-4 control-label">Koordinat Lintang  kawasan </label>
						<div class="col-lg-8">
							<p  class="form-control-static" > : <?php echo $data['lintang']; ?> </p>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-lg-4 control-label">Koordinat Bujur  kawasan</label>
						<div class="col-lg-8">
							<p  class="form-control-static" > : <?php echo $data['bujur']; ?></p>
						</div>
					</div>
					<div class="form-group">
						<label class="col-lg-4 control-label">SK Penetapan</label>
						<div class="col-lg-8">
							<p  class="form-control-static" > : <a href="<?php echo base_url("/assets/images/sk/".$data['sk']."") ?>" target="_blank" class="btn btn-default <?php if($data['sk']=="") echo "disabled" ?>" ><i class="fa fa-download"></i> download</a></p>
						</div>
					</div>
					
					
				</div>

				<div class="col-md-7">
					

			
				
						
						<div id="map-canvas" style="height: 400px;"> </div>
						
				
				</div>
			</div>
			
		</div>
		
	</form>
</div>
