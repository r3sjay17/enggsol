<?php
$header_wide_boxed = Kirki::get_option( 'tm-dione', 'header_wide_boxed' );
$sidemenu_enable = Kirki::get_option( 'tm-dione', 'sidemenu_enable' );
$header_dark_light = Kirki::get_option( 'tm-dione', 'header_dark_light' );

$sticky_header_enable = Kirki::get_option( 'tm-dione', 'sticky_header_enable' );

global $header_class, $dark_light_logo, $hide_main_nav;

if(empty($hide_main_nav)) {
	$hide_main_nav = Kirki::get_option( 'tm-dione', 'hide_main_nav' );
}
if(empty($dark_light_logo)) {
	switch ($header_dark_light) {
		case 'dark':
			$dark_light_logo = 'light';
			break;
		case 'light':
			$dark_light_logo = 'dark';
			break;
	}
}

if ( $header_wide_boxed == 'boxed' ) {
	$header_container_cl = 'container header-container';
} else {
	$header_container_cl = 'container-fluid padding-x-70-lg header-container';
}
?>
<?php tha_header_before(); ?>

    <div class="side-contacts">
        
        <a href="#" class="request-quote jobseeker" alt="jobseeker">  </a>
        <a href="#" class="request-quote employer" alt="employer">  </a>
        
    </div>


	<!-- *********************** HEADER ************************ -->
	<header class="header <?php echo esc_attr( $header_class ) ?> <?php echo esc_attr( $header_dark_light ) ?>">
		<div class="<?php echo esc_attr( $header_container_cl ) ?>">
			<div class="row row-xs-center header-row">
				<div class="col-xs-4 hidden-md-up">
					<div class="pull-left mobile-menu-container">
						<div id="open-left" class="mobile-menu-btn">
							<svg id="menu-bar" class="menu-bar" viewBox="0 0 24 13" version="1.1"
							     xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve"
							     x="0px" y="0px" width="24px" height="13px"
								>
								<g id="menu-bar-rect" class="menu-bar-rect">
									<rect x="0" y="0.5" width="24" height="2" />
									<rect x="0" y="5.5" width="24" height="2" />
									<rect x="0" y="10.5" width="24" height="2" />
								</g>
							</svg>
						</div>
					</div>
				</div>
				<!-- /.mobile-menu-btn -->
				<div class="col-xs-4 col-md-3 text-xs-center text-md-left logo">
					<?php
					$logo = tm_get_logo();
					if ( $logo ) { ?>
						<a id="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
							<img
								src="<?php echo esc_url( $logo ); ?>" alt="<?php bloginfo( 'name' ); ?>" data-sticky="<?php echo esc_url( tm_get_logo('sticky') ) ?>" data-origin="<?php echo esc_url( $logo ); ?>" />
						</a>
					<?php } else { ?>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>"
						   rel="home"><?php bloginfo( 'name' ); ?></a>
					<?php } ?>
				</div>
                
                
                <div class="col-xs-9 col-md-9 text-xs-center text-md-right hidden-sm hidden-xs">
                    
                    <ul class="top-holder">
                        <li>    
                            <?php dynamic_sidebar( 'top-slider' );?> 
                        </li>
                        
                        <li>
                            
                            <?php if ( Kirki::get_option( 'tm-dione', 'search_enable' ) == 1 ) { ?>
                                <div class="search-icon pull-right">
                                    <a href="#search" class="show-amazing-search"><i class="pe-7s-search"></i></a>
                                </div>
                            <?php } ?>

                        </li>
                    </ul>
                
                    
                    
                    
				</div>
                
                
                
			</div>
		</div>
        
        
        
        <div class="custom-menu-wrapper">
        
                <div class="container">

                        <div class="col-sm-12 hidden-sm-down">

                            <div class="left-menu">
                                <?php wp_nav_menu( array( 'theme_location' => 'main-left-menu' )); ?>
                            </div>


                            <div class="right-menu">

                                <?php if($hide_main_nav != 1): ?>
                                <!-- PRIMARY-MENU -->
                                <nav id="site-navigation" class="main-navigation">
                                    <?php
                                    $args_menu = array(
                                        'theme_location'  => 'primary',
                                        'container_class' => 'primary-menu okayNav menu',
                                    );
                                    if ( class_exists( 'TM_Walker_Nav_Menu' )) {
                                        $args_menu['menu_class'] = 'clearfix TMWalkerMenu';
                                        $args_menu['walker'] = new TM_Walker_Nav_Menu;
                                    }

                                    global $main_menu_id;
                                    if(!empty($main_menu_id)) {
                                        $args_menu['menu_id'] = $args_menu['menu'] = $main_menu_id;
                                    }
                                    wp_nav_menu( $args_menu );
                                    ?>
                                </nav>
                                <!-- #site-navigation -->
                            <?php endif; ?>
                            </div>

                        </div>

                </div>
        
        </div>
        
        
	</header>
	<!-- // HEADER -->
<?php tha_header_after(); ?>
