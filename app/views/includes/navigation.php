
	<header>
		<div class="container-fluid position-relative no-side-padding">
			<a href="#" class="logo"><img src="images/logo.png" alt="Logo Image"></a>
			<div class="menu-nav-icon" data-nav-menu="#main-menu"><i class="ion-navicon"></i></div>
			<ul class="main-menu visible-on-click" id="main-menu">
				<li><a href="<?php echo URLROOT; ?>/index">Home</a></li>
				<li><a href="<?php echo URLROOT; ?>/Category">Categories</a></li>
				<li><a href="#">Features</a></li>
				<li class="btn-login">
					<?php if(isset($_SESSION['user_id'])) : ?>
						<a href="<?php echo URLROOT; ?>/users/logout">Log out</a>
					<?php else : ?>
						<a href="<?php echo URLROOT; ?>/users/login">Login</a>
					<?php endif; ?>
				</li>
			</ul><!-- main-menu -->
		</div><!-- conatiner -->
	</header>
