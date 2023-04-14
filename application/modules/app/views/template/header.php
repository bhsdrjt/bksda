<?php   
	$nama = $this->session->userdata("nama");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="description" content="Neon Admin Panel" />
	<meta name="author" content="" />

	<link rel="apple-touch-icon" sizes="57x57" href="<?php echo base_url() ?>assets/images/favicon/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="<?php echo base_url() ?>assets/images/favicon/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo base_url() ?>assets/images/favicon/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url() ?>assets/images/favicon/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo base_url() ?>assets/images/favicon/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="<?php echo base_url() ?>assets/images/favicon/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="<?php echo base_url() ?>assets/images/favicon/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="<?php echo base_url() ?>assets/images/favicon/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url() ?>assets/images/favicon/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="<?php echo base_url() ?>assets/images/favicon/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url() ?>assets/images/favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="<?php echo base_url() ?>assets/images/favicon/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url() ?>assets/images/favicon/favicon-16x16.png">
	<link rel="manifest" href="<?php echo base_url() ?>assets/images/favicon/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="<?php echo base_url() ?>assets/images/favicon/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">

	<title>SITRoom | BKSDA KALSEL</title>

	<link rel="stylesheet" href="<?php echo base_url() ?>assets/back-end/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/back-end/css/font-icons/entypo/css/entypo.css" media="screen">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/back-end/css/font-icons/font-awesome/css/font-awesome.css">
	<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/back-end/css/bootstrap.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/back-end/js/uikit/css/uikit.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/back-end/css/neon-core.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/back-end/css/neon-theme.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/back-end/css/neon-forms.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/back-end/js/confirm/jquery-confirm.min.css">

	

	<link rel="stylesheet" href="<?php echo base_url() ?>assets/back-end/css/custom.css">
	
	<style>
		.error {
			font-size: 10px
		}
		#image-preview{
			display:none;
			width : 150px;
		}	
		.modal-open .ui-datepicker{z-index: 2000!important}
		
		blockquote {
			margin-top:0px;
		}
	
	</style>
	<script src="<?php echo base_url() ?>assets/back-end/js/jquery-1.11.3.min.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDlLPXcLq7pSW7BLzTYFJRl_HFXibychG4&sensor=false" type="text/javascript"></script>
	<!--[if lt IE 9]><script src="assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>
	<?php
		$nama = $this->session->userdata("nama");
		$foto = ($this->session->userdata("foto")!=""?$this->session->userdata("foto"):"default.png");
		$jabatan = $this->session->userdata("jabatan");
		$rule = $this->session->userdata("rule");
	?>
<body class="page-body" style="font-size:12px;color:#666666">
<div class="page-container"><!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->
	<div class="sidebar-menu menu2">
		<div class="sidebar-menu-inner">
			<header class="logo-env">
				<!-- logo -->
				<div class="logo">
					<a href="<?php echo base_url() ?>">
						<img src="<?php echo base_url() ?>assets/images/pu.png" width="50" style="margin-right:5px" alt="" />
						<span style="font-weight:bold;color:#fff;font-size:18px;"> SITROOM </span> 
					</a>
				</div>
				<!-- logo collapse icon -->
				<div class="sidebar-collapse">
					<a href="#" class="sidebar-collapse-icon"><!-- add class "with-animation" if you want sidebar to have animation during expanding/collapsing transition -->
						<i class="entypo-menu"></i>
					</a>
				</div>			
				<!-- open/close menu icon (do not remove if you want to enable menu on mobile devices) -->
				<div class="sidebar-mobile-menu visible-xs">
					<a href="#" class="with-animation"><!-- add class "with-animation" to support animation -->
						<i class="entypo-menu"></i>
					</a>
				</div>
			</header>
			<?php 
				switch ($rule) {
					case "administrator" : $this->load->view("template/menu");
					break;
					case "user" : $this->load->view("template/menuuser");
					break;
					case "guest" : $this->load->view("template/menuguest");
					break;
				}
			?>
	</div>
</div>
<div class="main-content ">		
		<div class="row hidden-print">
			<!-- Profile Info and Notifications -->
			<div class="col-md-6 col-sm-8 clearfix">
				<ul class="user-info pull-left pull-none-xsm">
					<!-- Profile Info -->
					<li class="profile-info dropdown"><!-- add class "pull-right" if you want to place this from right -->
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<img src="<?php echo base_url() ?>assets/images/foto/<?php echo $foto?>" alt="" class="img-circle" width="44" />
							<span style="float:right;margin-top:10px">
							<?php echo $nama ?> <br/>
							<small style="color:#7c7c7c"><?php echo $jabatan ?>  <i class="fa fa-caret-down"></i></small>
							</span>
						</a>
						<ul class="dropdown-menu">
							<!-- Reverse Caret -->
							<li class="caret"></li>
							<!-- Profile sub-links -->
						
							<li>
								<a href="<?php echo base_url() ?>app/login/logout">
									<i class="entypo-logout"></i>
									Log Out
								</a>
							</li>
						</ul>
					</li>
				</ul>
				<ul class="user-info pull-left pull-right-xs pull-none-xsm">	
					<!-- Message Notifications -->
					<!-- Task Notifications -->
				</ul>
			</div>
			<!-- Raw Links -->
			<div class="col-md-6 col-sm-4 clearfix hidden-xs">
				<ul class="list-inline links-list pull-right">
					<!-- Language Selector -->
					<li class="sep"></li>
					<li>
						<a href="<?php echo base_url() ?>app/login/logout">
							Log Out <i class="entypo-logout right"></i>
						</a>
					</li>
				</ul>
			</div>
		</div>
		<hr style="margin-top:0px" class="hidden-print"/>

		