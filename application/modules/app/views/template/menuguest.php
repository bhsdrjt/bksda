<?php
$menu = $this->router->fetch_class();
$submenu = $this->router->fetch_method();
?>
<ul id="main-menu" class="main-menu">
	<!-- add class "multiple-expanded" to allow multiple submenus to open -->
	<!-- class "auto-inherit-active-class" will automatically add "active" class for parent elements who are marked already with class "active" -->

	<li class="<?= ($submenu == "index") ? "active root-level" : ""; ?> ">
		<a href="<?php echo base_url() ?>app">
			<i class="fa fa-home"></i>
			<span class="title">Beranda </span>
		</a>
	</li>


	<li class="<?= ($submenu == "eksplor" ||  $submenu == "kawasanlihat") ? "active root-level" : ""; ?> ">
		<a href="<?php echo base_url() ?>app/eksplor">
			<i class="fa fa-compass"></i>
			<span class="title">Eksplor Kawasan </span>
		</a>
	</li>
	<li class="<?= ($submenu == "lihatTsl") ? " active" : ""; ?>">
		<a href="<?php echo base_url() ?>app/lihatTsl">
			<i class="fa fa-file"></i>
			<span class="title"> Lihat Izin TSL </span>
		</a>
	</li>

	<li class="<?= ($submenu == "satwa" || $submenu == "satwatambah"  || $submenu == "satwaedit" || $submenu == "satwalihat" || $submenu == "penangkar" || $submenu == "penangkartambah"  || $submenu == "penangkaredit" || $submenu == "penangkarlihat" || $submenu == "pengedar" || $submenu == "pengedartambah"  || $submenu == "pengedaredit" || $submenu == "pengedarlihat" || $submenu == "lemkon" || $submenu == "lemkontambah"  || $submenu == "lemkonedit" || $submenu == "lemkonlihat") ? "opened active root-level" : ""; ?> has-sub ">
		<a href="">
			<i class="fa fa-list"></i>
			<span class="title">Izin TSL</span>
		</a>
		<ul>
			<li class="<?= ($submenu == "penangkar" || $submenu == "penangkartambah"  || $submenu == "penangkaredit" || $submenu == "penangkarlihat") ? " active" : ""; ?>">
				<a href="<?php echo base_url() ?>app/penangkar">
					<span class="title">Penangkar</span>
				</a>
			</li>
			<li class="<?= ($submenu == "pengedar" || $submenu == "pengedartambah"  || $submenu == "pengedaredit" || $submenu == "pengedarlihat") ? " active" : ""; ?>">
				<a href="<?php echo base_url() ?>app/pengedar">
					<span class="title">Pengedar</span>
				</a>
			</li>
			<li class="<?= ($submenu == "lemkon" || $submenu == "lemkontambah"  || $submenu == "lemkonedit" || $submenu == "lemkonlihat") ? " active" : ""; ?>">
				<a href="<?php echo base_url() ?>app/lemkon">
					<span class="title">Lembaga Konservasi</span>
				</a>
			</li>
		</ul>
	</li>
	<li class="">
		<a href="<?php echo base_url() ?>app/login/logout">
			<i class="fa  fa-sign-out"></i>
			<span class="title">Log Out </span>
		</a>
	</li>
</ul>