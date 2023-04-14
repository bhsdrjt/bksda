<ol class="breadcrumb bc-3">
    <li>
        <a href="<?php echo base_url() ?>app">
            <i class="fa fa-KEE"></i>App</a>
    </li>
    <li>
        <a href="<?php echo base_url() ?>app/KEE">
            <i class="fa fa-KEE"></i>Kee</a>
    </li>
    <li class="active">
        <strong>Tambah Kee</strong>
    </li>
</ol>

<h3>Lihat Data Kee </h3>
<div class="panel panel-primary" data-collapsed="0">
			
<div class="panel-heading">
	<div class="panel-title">
		Lihat Kee
	</div>
	
	<div class="panel-options">
		<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
	</div>
</div>

<div class="panel-body">
<a href="<?php echo base_url('app/kee') ?>" class="btn btn-primary btn-s-xs">
				<i class="fa fa-arrow-left"></i> Kembali</a>
				
				<hr/>
	<form role="form" class="form-horizontal validate"  action="<?php echo base_url() ?>app/keedit"	method="post"  enctype="multipart/form-data" id="form"> 	
	<div class="row">
			<div class="col-md-6">
			<input type="hidden" name="<?=$csrf['name']?>" value="<?=$csrf['hash']?>">
            <input type="hidden" name="id_KEE" value="<?=$data['id_kee']?>">
				<div class="form-group">
					<label class="col-lg-4 control-label">Jenis KEE</label>
					<div class="col-lg-8">
						<p  class="form-control-static" > : <?php echo $data['jenis'] ?> </p>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-4 control-label">Lokasi</label>
					<div class="col-lg-8">
					<p  class="form-control-static" > : <?php echo $data['lokasi'] ?></p>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-4 control-label">Luas</label>
					<div class="col-lg-8">
					<p  class="form-control-static" > : <?php echo $data['luas'] ?></p>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-4 control-label">Bentuk Pengelolaan</label>
					<div class="col-lg-8">
						<p  class="form-control-static" > : <?php echo $data['bentuk'] ?></p>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-4 control-label">SK</label>
					<div class="col-lg-8">
					<p  class="form-control-static" > :<?php echo $data['sk'] ?> </p>
						
					</div>
				</div>
		
			<div class="form-group">
					<label class="col-lg-4 control-label">Nilai Ekosistem Penting</label>
					<div class="col-lg-8">
					<p  class="form-control-static" > : <?php echo $data['nilai'] ?></p>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-4 control-label">Keterangan</label>
					<div class="col-lg-8">
					<p  class="form-control-static" > : <?php echo $data['keterangan'] ?></p>
					</div>
				</div>
				<div class="form-group">
						<label class="col-lg-4 control-label">Dokumen</label>
						<div class="col-lg-8">
							<p  class="form-control-static" > : <a href="<?php echo base_url("/assets/images/kee/".$data['dokumen']."") ?>" target="_blank" class="btn btn-default <?php if($data['dokumen']=="") echo "disabled" ?>" ><i class="fa fa-download"></i> download</a></p>
						</div>
					</div>
				
			</div>
			<div class="col-md-6">
                <div class="form-group">
						<label class="col-sm-4 control-label">Foto</label>
						<div class="col-sm-8">
					
						
									<img src="<?php echo base_url()."assets/images/kee/".$data['foto'] ?>" class="thumbnail" style="max-width: 300px; height: 200px;" alt="...">
					
							
						
					</div>
				</div>
			
		
			
				

			</div>
		</div>
		
	
</div>
<footer class="panel-footer text-right bg-light lter">
	
		</form>	
</footer>

</div>
