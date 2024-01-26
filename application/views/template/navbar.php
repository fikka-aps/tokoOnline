<!-- Logo desktop -->
<a href="#" class="logo">
	<img src="assets/images/icons/logo-os.png" alt="IMG-LOGO">
</a>

<!-- Menu desktop -->
<div class="menu-desktop">
	<ul class="main-menu">
		<li>
			<a href="<?=base_url('home')?>">Home</a>
		</li>

		<li>
			<a href="about.html">About</a>
		</li>
	</ul>
</div>

<!-- Icon header -->
<div class="wrap-icon-header flex-w flex-r-m">

	<a href="pesanan" class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11" data-notify="0">
		<i class="zmdi zmdi-shopping-cart"></i>
	</a>

	<a class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
		<i class="zmdi zmdi-account-circle"></i>
	</a>

	<div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
		<a class="dropdown-item" href="<?= base_url('logout') ?>">
			<i class="ti-power-off text-primary"></i>
			Logout
		</a>
	</div>
</div>

</nav>
</div>
</div>

<!-- Header Mobile -->
<div class="wrap-header-mobile">
	<!-- Logo moblie -->
	<div class="logo-mobile">
		<a href="index.html"><img src="assets/images/icons/logo-os.png" alt="IMG-LOGO"></a>
	</div>

	<!-- Icon header -->
	<div class="wrap-icon-header flex-w flex-r-m m-r-15">

		<a href="pesanan" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti" data-notify="0">
			<i class="zmdi zmdi-shopping-cart"></i>
		</a>
	</div>

	<!-- Button show menu -->
	<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
		<span class="hamburger-box">
			<span class="hamburger-inner"></span>
		</span>
	</div>
</div>


<!-- Menu Mobile -->
<div class="menu-mobile">

	<ul class="main-menu-m">
		<li>
			<a href="home.html">Home</a>
		</li>

		<li>
			<a href="product.html">Shop</a>
		</li>

		<li>
			<a href="about.html">About</a>
		</li>
	</ul>
</div>
</header>