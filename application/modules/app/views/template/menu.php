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
				<li class="<?= ($submenu == "inputpal" || $submenu == "inputarea" || $submenu == "inputsatwa" || $submenu == "inputtumbuhan" || $submenu == "inputwisata" || $submenu == "inputgangguan" || $submenu == "inputsosial" || $submenu == "inputdaya") ? "opened active root-level" : ""; ?> has-sub ">
					<a href="">
						<i class="fa fa-list"></i>
						<span class="title">Input Laporan</span>
					</a>
					<ul>
						<li  class="<?= ($submenu == "inputpal") ? " active" : ""; ?>">
							<a href="<?php echo base_url() ?>app/inputpal">
								<i class="fa fa-map-marker"></i>
								<span class="title">PAL Batas Wilayah</span>
							</a>
						</li>
						<li  class="<?= ($submenu == "inputarea") ? " active" : ""; ?>">
							<a href="<?php echo base_url() ?>app/inputarea">
								<i class="fa fa-circle-o"></i>
								<span class="title">Area Terbuka</span>
							</a>
						</li>
						<li  class="<?= ($submenu == "inputsatwa") ? " active" : ""; ?>">
							<a href="<?php echo base_url() ?>app/inputsatwa">
								<i class="fa fa-paw"></i>
								<span class="title">Satwa Liar</span>
							</a>
						</li>
						<li  class="<?= ($submenu == "inputtumbuhan") ? " active" : ""; ?>">
							<a href="<?php echo base_url() ?>app/inputtumbuhan">
								<i class="fa fa-leaf"></i>
								<span class="title">Tumbuhan</span>
							</a>
						</li>
						<li  class="<?= ($submenu == "inputwisata") ? " active" : ""; ?>">
							<a href="<?php echo base_url() ?>app/inputwisata">
								<i class="fa fa-sun-o"></i>
								<span class="title">Wisata Alam</span>
							</a>
						</li>
						<li  class="<?= ($submenu == "inputgangguan") ? " active" : ""; ?>">
							<a href="<?php echo base_url() ?>app/inputgangguan">
								<i class="fa fa-warning"></i>
								<span class="title">Gangguan</span>
							</a>
						</li>
						<li  class="<?= ($submenu == "inputsosial") ? " active" : ""; ?>">
							<a href="<?php echo base_url() ?>app/inputsosial">
								<i class="fa fa-users"></i>
								<span class="title">Sosial Ekonomi</span>
							</a>
						</li>
						<li  class="<?= ($submenu == "inputdaya") ? " active" : ""; ?>">
							<a href="<?php echo base_url() ?>app/inputdaya">
								<i class="fa fa-user-secret"></i>
								<span class="title">Pemberdayaan Masyarakat</span>
							</a>
						</li>
						
					</ul>
				</li>
				<li  class="<?= ($submenu == "laporanlihat" ||$submenu == "laporanedit" || $submenu == "laporandetail" ) ? "active root-level" : ""; ?> ">
					<a href="<?php echo base_url() ?>app/laporanlihat">
						<i class="fa fa-file"></i>
						<span class="title">Lihat Laporan </span>
					</a>
				</li>
			
				<li  class="<?= ($submenu == "eksplor" ||  $submenu == "kawasanlihat") ? "active root-level" : ""; ?> ">
					<a href="<?php echo base_url() ?>app/eksplor">
						<i class="fa fa-compass"></i>
						<span class="title">Eksplor Kawasan </span>
					</a>
				</li>
			
			
				
				<li class="<?= ($submenu == "skw" || $submenu == "skwlihat" || $submenu == "resort" || $submenu == "resortlihat" || $submenu == "kawasan" || $submenu == "editkawasan" ) ? "opened active root-level" : ""; ?> has-sub ">
					<a href="">
						<i class="fa fa-star"></i>
						<span class="title">Data Master</span>
					</a>
					<ul>
						<li  class="<?= ($submenu == "skw" || $submenu == "skwlihat") ? " active" : ""; ?>">
							<a href="<?php echo base_url() ?>app/skw">
								<span class="title">Data SKW</span>
							</a>
						</li>
						<li  class="<?= ($submenu == "resort" || $submenu == "resortlihat" ) ? " active" : ""; ?>">
							<a href="<?php echo base_url() ?>app/resort">
								<span class="title">Data Resort</span>
							</a>
						</li>
						<li  class="<?= ($submenu == "kawasan" || $submenu == "editkawasan"  ) ? " active" : ""; ?>">
							<a href="<?php echo base_url() ?>app/kawasan">
								<span class="title">Data Kawasan</span>
							</a>
						</li>
					
							
			
					
					</ul>
				</li>
				<li  class="<?= ($submenu == "user" || $submenu == "usertambah"  || $submenu == "useredit" ) ? "active root-level" : ""; ?> ">
					<a href="<?php echo base_url() ?>app/user">
						<i class="fa fa-users"></i>
						<span class="title">User </span>
					</a>
				</li>
				<li  class="<?= ($submenu == "satwa" || $submenu == "satwatambah"  || $submenu == "satwaedit" || $submenu == "satwalihat" ) ? "active root-level" : ""; ?> ">
					<a href="<?php echo base_url() ?>app/satwa">
						<i class="fa  fa-paw"></i>
						<span class="title">Pendataan Satwa </span>
					</a>
				</li>
				<li  class="<?= ($submenu == "kee" || $submenu == "keetambah"  || $submenu == "keeedit" || $submenu == "keelihat" ) ? "active root-level" : ""; ?> ">
					<a href="<?php echo base_url() ?>app/kee">
						<i class="fa fa-image"></i>
						<span class="title">Data KEE </span>
					</a>
				</li>
				<li class="<?= ($submenu == "carikoordinat" || $submenu == "profil" || $submenu == "tentang" || $submenu == "password" || $submenu == "pengaturan" || $submenu == "poligon" ) ? "opened active root-level" : ""; ?> has-sub ">
					<a href="">
						<i class="fa fa-plus"></i>
						<span class="title">Ekstra</span>
					</a>
					<ul>
						<li  class="<?= ($submenu == "profil") ? " active" : ""; ?>">
							<a href="<?php echo base_url() ?>app/profil">
								<span class="title">Profil</span>
							</a>
						</li>
						<li  class="<?= ($submenu == "password") ? " active" : ""; ?>">
							<a href="<?php echo base_url() ?>app/password">
								<span class="title">Ganti Password</span>
							</a>
						</li>
						<li  class="<?= ($submenu == "poligon" ) ? " active" : ""; ?>">
							<a href="<?php echo base_url() ?>app/poligon">
								<span class="title">Poligon</span>
							</a>
						</li>
						<li  class="<?= ($submenu == "carikoordinat") ? " active" : ""; ?>">
							<a href="<?php echo base_url() ?>app/carikoordinat">
								<span class="title">Cari Koordinat</span>
							</a>
						</li>
						<li  class="<?= ($submenu == "pengaturan" ) ? " active" : ""; ?>">
							<a href="<?php echo base_url() ?>app/pengaturan">
								<span class="title">Pengaturan</span>
							</a>
						</li>
						<li  class="<?= ($submenu == "tentang" ) ? " active" : ""; ?>">
							<a href="<?php echo base_url() ?>app/tentang">
								<span class="title">Tentang</span>
							</a>
						</li>
					</ul>
				</li>
				<li  class="">
					<a href="<?php echo base_url() ?>app/login/logout">
						<i class="fa  fa-sign-out"></i>
						<span class="title">Log Out </span>
					</a>
				</li>
			</ul>
	