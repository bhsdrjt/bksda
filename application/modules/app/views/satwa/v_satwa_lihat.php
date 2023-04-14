<ol class="breadcrumb bc-3">
    <li>
        <a href="<?php echo base_url() ?>app">
            <i class="fa fa-satwas"></i>App</a>
    </li>
    <li>
        <a href="<?php echo base_url() ?>app/satwa">
            <i class="fa fa-satwa"></i>Satwa</a>
    </li>
    <li class="active">
        <strong>Tambah Satwa</strong>
    </li>
</ol>

<h3>Lihat Data Satwa </h3>
<div class="panel panel-primary" data-collapsed="0">
			
<div class="panel-heading">
	<div class="panel-title">
		Edit Satwa
	</div>
	
	<div class="panel-options">
		<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
	</div>
</div>

<div class="panel-body">
<a href="<?php echo base_url('app/satwa') ?>" class="btn btn-primary btn-s-xs">
				<i class="fa fa-arrow-left"></i> Kembali</a>
				
				<hr/>
	<form role="form" class="form-horizontal validate"  action="<?php echo base_url() ?>app/satwaedit"	method="post"  enctype="multipart/form-data" id="form"> 	
	<div class="row">
			<div class="col-md-6">
			<input type="hidden" name="<?=$csrf['name']?>" value="<?=$csrf['hash']?>">
            <input type="hidden" name="id_satwa" value="<?=$data['id_satwa']?>">
				<div class="form-group">
					<label class="col-lg-4 control-label">Nomor Seri *</label>
					<div class="col-lg-8">
						<p  class="form-control-static" > : <?php echo $data['noseri'] ?> </p>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-4 control-label">Nama Pemilik *</label>
					<div class="col-lg-8">
					<p  class="form-control-static" > : <?php echo $data['pemilik'] ?></p>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-4 control-label">Alamat *</label>
					<div class="col-lg-8">
					<p  class="form-control-static" > : <?php echo $data['alamat'] ?></p>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-4 control-label">Email</label>
					<div class="col-lg-8">
						<p  class="form-control-static" > : <?php echo $data['email'] ?></p>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-4 control-label">Jenis Satwa*</label>
					<div class="col-lg-8">
					<p  class="form-control-static" > :<?php echo $data['jenis'] ?> </p>
						
					</div>
				</div>
		
			<div class="form-group">
					<label class="col-lg-4 control-label">Nama Satwa*</label>
					<div class="col-lg-8">
					<p  class="form-control-static" > : <?php echo $data['namasatwa'] ?></p>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-4 control-label">Jumlah*</label>
					<div class="col-lg-8">
					<p  class="form-control-static" > : <?php echo $data['jumlah'] ?></p>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-4 control-label">Di Pelihara Sejak</label>
					<div class="col-lg-8">
						<p  class="form-control-static" > : <?php echo tgl_indo($data['sejak']) ?></p>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-4 control-label">Asal Usul Satwa*</label>
					<div class="col-lg-8">
					<p  class="form-control-static" > : <?php echo $data['usul'] ?></p>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label class="col-lg-4 control-label">Sumber Satwa*</label>
					<div class="col-lg-8">
					<p  class="form-control-static" > : <?php echo $data['sumber'] ?></p>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-4 control-label">Genetik atau Kawin Silang*</label>
					<div class="col-lg-8">
						<p  class="form-control-static" > : <?php echo $data['genetik'] ?></p>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-4 control-label">Kesehatan*</label>
					<div class="col-lg-8">
						<p  class="form-control-static" > : <?php echo $data['kesehatan'] ?></p>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-4 control-label">Waktu Pendataan*</label>
					<div class="col-lg-8">
						<p  class="form-control-static" > :  <?php echo tgl_indo($data['waktu']) ?></p>
					</div>
				</div>
                <div class="form-group">
						<label class="col-sm-4 control-label">Foto</label>
						<div class="col-sm-8">
					
						
									<img src="<?php echo base_url()."assets/images/satwa/".$data['foto'] ?>" class="thumbnail" style="max-width: 300px; height: 200px;" alt="...">
					
							
						
					</div>
				</div>
			
		
			
				

			</div>
		</div>
		
	
</div>
<footer class="panel-footer text-right bg-light lter">
	
		</form>	
</footer>

</div>
