<body>

	<!-- Navigation Bar-->
	<header id="topnav">

		<!-- Topbar Start -->
		<div class="navbar-custom">
			<div class="container-fluid">
				<ul class="list-unstyled topnav-menu float-right mb-0">

					<li class="dropdown notification-list">
						<!-- Mobile menu toggle-->
						<a class="navbar-toggle nav-link">
							<div class="lines">
								<span></span>
								<span></span>
								<span></span>
							</div>
						</a>
						<!-- End mobile menu toggle-->
					</li>

					<li class="d-none d-sm-block">
						<form class="app-search">
							<div class="app-search-box">
								<div class="input-group">
									<input type="text" class="form-control" placeholder="Search...">
									<div class="input-group-append">
										<button class="btn" type="submit">
											<i class="fe-search"></i>
										</button>
									</div>
								</div>
							</div>
						</form>
					</li>
					<li class="dropdown notification-list">
						<a href="<?php echo base_url() ?>index.php/home/logout" class="nav-link right-bar-toggle waves-effect">
							<i class="fas fa-power-off"></i>
						</a>
					</li>

				</ul>

				<!-- LOGO -->
				<div class="logo-box">
					<a href="<?php echo base_url('home')?>" class="logo text-center">
						<span class="logo-lg">
							<img src="<?php echo base_url();?>assets/images/logo-aski.png" alt="" height="24">
							<!-- <span class="logo-lg-text-light">UBold</span> -->
						</span>
						<span class="logo-sm">
							<!-- <span class="logo-sm-text-dark">U</span> -->
							<!-- <img src="<?php echo base_url();?>assets/images/logo-sm.png" alt="" height="24"> -->
						</span>
					</a>
				</div>

				<ul class="list-unstyled topnav-menu topnav-menu-left m-0">

					<li class="dropdown d-none d-lg-block">
						<a class="nav-link dropdown-toggle waves-effect waves-light" href="<?php echo base_url('home')?>" role="button"
							aria-haspopup="false" aria-expanded="false">
							Home
						</a>
					</li>

					<li class="dropdown ">
						<button class="btn btn-secondary dropdown-toggle " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false" style="border-top-width: 15px; border-bottom-width: 20px;">
							Master Data
						</button>
						
						<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
							<a class="dropdown-item" href="<?php echo base_url('home/dataBarang')?>">Data Barang</a>
							<a class="dropdown-item" href="<?php echo base_url('home/dataKanban')?>">Data Kanban</a>
						</div>
					</li>

					<li class="dropdown d-none d-lg-block">
						<a class="nav-link dropdown-toggle waves-effect waves-light" href="<?php echo base_url('home/listBarang')?>" role="button"
							aria-haspopup="false" aria-expanded="false">
							List Barang
						</a>
					</li>

					<li class="dropdown d-none d-lg-block">
						<a class="nav-link dropdown-toggle waves-effect waves-light" href="<?php echo base_url('home/barangMasuk')?>" role="button"
							aria-haspopup="false" aria-expanded="false">
							Barang Masuk
						</a>
					</li>

					<li class="dropdown d-none d-lg-block">
						<a class="nav-link dropdown-toggle waves-effect waves-light" href="<?php echo base_url('home/barangKeluar')?>" role="button"
							aria-haspopup="false" aria-expanded="false">
							Barang Keluar
						</a>
					</li>

                   
                          
				</ul>
			</div> <!-- end container-fluid-->
		</div>
		<!-- end Topbar -->

		<!-- end navbar-custom -->

	</header>
	<!-- End Navigation Bar-->

	<!-- ============================================================== -->
	<!-- Start Page Content here -->
	<!-- ============================================================== -->
