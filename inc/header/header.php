
<header id="header" class="container">
	<!-- Logo -->
	<div id="site-title">
		<h1>
			<a href="<?php echo get_home_url(); ?>" alt="Relmatch360">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.png" alt="Logo" class="logo-img">
			</a>
		</h1>
	</div>
	<!-- Logo -->
	<!-- Header Nav Login/Register -->
	<div id="pageNavigationTop">

		<nav class="main-menu">
			<?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
		</nav>

        <nav class="mobile-menu">
            <ul>
                <li class="toggle-menu"><a href="#"><i class="fa fa-bars fa-lg" aria-hidden="true" title="Toggle navigation"></i></a></li>
                <?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
            </ul>
        </nav>

		<button class="btn btn-green btn-login"><?php _e('Login', 'realmatch360'); ?></button>

		<nav class="language-selector">
			<?php do_action('icl_language_selector'); ?>
		</nav>





		<!-- Login formular -->
		<div class="login-dialog hide">
			<form class="form-horizontal form-login" role="form"  style="width:220px;">
				<div class="form-group">
					<div class="col-lg-12">
						<!--[if lt IE 9 ]>
						<div class="control-label pull-left"><?php _e('E-Mail', 'realmatch360'); ?></div>
						<![endif]-->
						<input type="text" class="form-control placeholderFix" name="username" placeholder="<?php _e('E-Mail', 'realmatch360'); ?>" >
					</div>
				</div>
				<div class="form-group">
					<div class="col-lg-12">
						<!--[if lt IE 9 ]>
						<div class="control-label pull-left"><?php _e('Password', 'realmatch360'); ?></div>
						<![endif]-->
						<input type="password" class="form-control" name="password" placeholder="<?php _e('Password', 'realmatch360'); ?>" >
					</div>
				</div>
				<div class="form-group">
					<div class="col-lg-12">
						<input type="checkbox" name="rememberMe" value="true"><?php _e('Remember Me', 'realmatch360'); ?><br>
					</div>
				</div>
				<div class="form-group">
					<div class="col-lg-12">
						<input type="hidden"  name="msregion" value="">
						<button type="submit" data-loading-text="<?php _e('Checking...', 'realmatch360'); ?>" class="btn btn-default col-lg-12 btn-login-ajax"><?php _e('Login', 'realmatch360'); ?></button>
					</div>
				</div>

				<div class="form-group">
					<div style="text-align:center;" class="col-lg-12">
						<a style="color:#095b60; " href="http://realmatch360.com/app/access/forgotPassword.html">
							<span><?php _e('Forgot Password?', 'realmatch360'); ?></span>
						</a>
					</div>
				</div>

			</form>
			<div class="alert alert-status-0 alert-danger hide form-error-alert" style="line-height: 1px;"><?php _e('Login failed.', 'realmatch360'); ?></div>
			<div class="alert alert-status-3 alert-danger hide form-error-alert" style="line-height: 1px;"><?php _e('Login failed.', 'realmatch360'); ?></div>
		</div>
		<!-- Login Formular -->
	</div>
	<!-- Header Nav/Login -->
</header>




