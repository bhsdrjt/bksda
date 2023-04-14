<ol class="breadcrumb bc-3">
	<li>
		<a href="<?php echo base_url() ?>app">
			<i class="fa fa-user"></i>Data resort</a>
	</li>
	<li class="active">
		<strong>Lihat Data resort</strong>
	</li>
</ol>

<h3>Data Detil resort</h3>
<div class="panel panel-primary" data-collapsed="0">

		<input type="hidden" name="<?=$csrf['name']?>" value="<?=$csrf['hash']?>">
		<div class="panel-body">
		<?php
			$rule = $this->session->userdata("rule");
			switch ($rule) {
				case "administrator" : $link = base_url('app/resort');
				break;
				case "user" : $link = base_url('app');
				break;
				case "guest" : $link = base_url('app');
				break;
			}
		?>
			<a href="<?php echo $link  ?>" class="btn btn-primary btn-s-xs">
				<i class="fa fa-arrow-left"></i> Kembali</a>
				
				<hr/>
			<div class="row">
				<div class="col-md-5">
					<div class="form-group row">
						<label class="col-lg-4 control-label">Nama SKW</label>
						<div class="col-lg-8">
							<p  class="form-control-static" > : <?php echo $data['namawilayah']; ?> </p>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-lg-4 control-label">Nama Resort</label>
						<div class="col-lg-8">
							<p  class="form-control-static" > : <?php echo $data['namaresort']; ?> </p>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-lg-4 control-label">Koordinat Lintang  Resort </label>
						<div class="col-lg-8">
							<p  class="form-control-static" > : <?php echo $data['lintang']; ?> </p>
						</div>
					</div>
					
					<div class="form-group row">
						<label class="col-lg-4 control-label">Koordinat Bujur  Resort</label>
						<div class="col-lg-8">
							<p  class="form-control-static" > : <?php echo $data['bujur']; ?></p>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-lg-4 control-label">_________________</label>
						<div class="col-lg-8">
							<p  class="form-control-static" ></p>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-lg-4 control-label">Kepala Resort</label>
						<div class="col-lg-8">
							<p  class="form-control-static" > : <?php echo $data['kepala']; ?></p>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-lg-4 control-label">Contact Person Kepala Resort</label>
						<div class="col-lg-8">
							<p  class="form-control-static" > : <?php echo $data['kontak']; ?></p>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-lg-4 control-label">Keterangan</label>
						<div class="col-lg-8">
							<p  class="form-control-static" > : <?php echo $data['keterangan']; ?></p>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-lg-4 control-label">Foto</label>
						<div class="col-lg-8"><p>
							  <?php
										$foto = ( $data["foto"]!=""?$data["foto"]:"default.png");
									?>
								<img src="<?php echo base_url() ?>assets/images/foto/<?php echo $foto  ?>" alt=""  width="150px" class="thumbnail"/>
						</p></div>
					</div>
					
				</div>

				<div class="col-md-7">
					

			
				
						
						<div id="map-canvas" style="height: 400px;"> </div>
						
				
				</div>
			</div>
			
		</div>
		
	</form>
</div>
