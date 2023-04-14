<?php
	$menu = $this->router->fetch_class();
	$submenu = $this->router->fetch_method();
?>
			<ul id="main-menu" class="main-menu">
				<!-- add class "multiple-expanded" to allow multiple submenus to open -->
				<!-- class "auto-inherit-active-class" will automatically add "active" class for parent elements who are marked already with class "active" -->
				
				<li  class="<?= ($submenu == "index") ? "active root-level" : ""; ?> ">
					<a href="<?php echo base_url() ?>app">
						<i class="fa fa-home"></i>
						<span class="title">Beranda </span>
					</a>
				</li>
				
			
				<li  class="<?= ($submenu == "eksplor" ||  $submenu == "kawasanlihat") ? "active root-level" : ""; ?> ">
					<a href="<?php echo base_url() ?>app/eksplor">
						<i class="fa fa-compass"></i>
						<span class="title">Eksplor Kawasan </span>
					</a>
				</li>
				<li  class="">
					<a href="<?php echo base_url() ?>app/login/logout">
						<i class="fa  fa-sign-out"></i>
						<span class="title">Log Out </span>
					</a>
				</li>
			</ul>
	