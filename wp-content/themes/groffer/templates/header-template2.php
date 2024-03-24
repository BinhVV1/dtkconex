<?php
  #Redux global variable
  global $groffer_redux;
  #WooCommerce global variable
  global $woocommerce;
  $cart_url = "#";
  if ( class_exists( 'WooCommerce' ) ) {
    $cart_url = wc_get_cart_url();
  }
  #YITH Wishlist rul
  if( function_exists( 'YITH_WCWL' ) ){
      $wishlist_url = YITH_WCWL()->get_wishlist_url();
  }else{
      $wishlist_url = '#';
  }
?>
<?php  
if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
  if ( groffer_redux('groffer_top_header_info_switcher') == true) {
      echo groffer_my_banner_header();
  }
} ?>
<header class="header-v2">
  <div class="navbar navbar-default" id="groffer-main-head">
      <div class="container">
        <div class="row">
          <div class="navbar-header col-md-2 col-sm-12">

            <?php if ( !class_exists( 'mega_main_init' ) ) { ?> 
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                  <span class="sr-only"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
              </button>
            <?php } ?>

            <?php do_action('groffer_before_mobile_navigation_burger'); ?>

            <?php echo groffer_logo(); ?>
          </div>
              
             
          <div class="first-part col-md-10 col-sm-12">

          <?php if (class_exists('WooCommerce')) : ?>
            <div class="col-md-3 search-form-product">
              <div class="groffer-header-searchform">
                <form name="header-search-form" method="GET" class="woocommerce-product-search menu-search" action="<?php echo esc_url(home_url('/')); ?>">
                  <input type="hidden" value="product" name="post_type">
                  <input type="text"  name="s" class="search-field" id="keyword" onkeyup="ibid_fetch_products()" maxlength="128" value="<?php echo esc_attr(get_search_query()); ?>" placeholder="<?php esc_attr_e('I am searching for ...', 'groffer'); ?>">
                  <button type="submit" class="btn btn-primary"><i class="fa fa-search" aria-hidden="true"></i></button>
                  <input type="hidden" name="post_type" value="product" />
                </form>
                <div id="datafetch"></div> 
              </div>
            </div>
          <?php endif; ?>
        <nav class="col-md-7 navbar bottom-navbar-default" id="modeltheme-main-head">
        <div class="container">
          <div class="row row-0">
            <!-- NAV MENU -->
            <div id="navbar" class="navbar-collapse collapse col-md-9">
              <div class="bot_nav_wrap">
                <ul class="menu nav navbar-nav pull-left nav-effect nav-menu">
                <?php
                  if ( has_nav_menu( 'primary' ) ) {
                    $defaults = array(
                      'menu'            => '',
                      'container'       => false,
                      'container_class' => '',
                      'container_id'    => '',
                      'menu_class'      => 'menu',
                      'menu_id'         => '',
                      'echo'            => true,
                      'fallback_cb'     => false,
                      'before'          => '',
                      'after'           => '',
                      'link_before'     => '',
                      'link_after'      => '',
                      'items_wrap'      => '%3$s',
                      'depth'           => 0,
                      'walker'          => ''
                    );
                    $defaults['theme_location'] = 'primary';
                    wp_nav_menu( $defaults );
                  }else{
                    echo '<p class="no-menu text-right">';
                      echo esc_html__('Primary navigation menu is missing.', 'groffer');
                    echo '</p>';
                  }
                ?>
              </ul>
             </div>
            </div>

          </div>
        </div>
    </nav>
    <nav class="navbar bottom-menu-wrapper"></nav>
           <?php if (class_exists('WooCommerce')) { ?>
              <div class="col-md-2 menu-products">
            <?php } else { ?>
              <div class="col-md-12 menu-products">
              <?php } ?>
                <div class="my-account-navbar">
                  <ul>
                  <?php if ( class_exists('woocommerce')) { ?>
                    <?php if (is_user_logged_in()) { ?> 
                      <div id="dropdown-user-profile" class="ddmenu">
                        
                        <li id="nav-menu-register" class="nav-menu-account">
                          <span class="top-register"><?php echo esc_html__('My Account','groffer'); ?></span>
                        </li>
                        <ul>
                          <li><a href="<?php echo esc_url(get_permalink( get_option('woocommerce_myaccount_page_id') )); ?>"><i class="icon-layers icons"></i> <?php echo esc_html__('My Dashboard','groffer'); ?></a></li>
                          
                          <?php if (class_exists('Dokan_Vendor') && dokan_is_user_seller( dokan_get_current_user_id() )) {  ?>            
                            <li><a href="<?php echo esc_url( home_url().'/dashboard' ); ?>"><i class="icon-trophy icons"></i> <?php echo esc_html__('Vendor Dashboard','groffer'); ?></a></li>
                          <?php } ?>
                          
                          <?php if (class_exists('WCFM')) { ?>
                            <li><a href="<?php echo apply_filters( 'wcfm_dashboard_home', get_wcfm_page() ); ?>"><i class="icon-trophy icons"></i> <?php echo esc_html__('Vendor Dashboard','groffer'); ?></a></li>
                          <?php } ?>
                          
                          <?php if (class_exists('WCMp')) { 
                            $current_user = wp_get_current_user();
                            if (is_user_wcmp_vendor($current_user)) {
                                $dashboard_page_link = wcmp_vendor_dashboard_page_id() ? get_permalink(wcmp_vendor_dashboard_page_id()) : '#';
                                echo apply_filters('wcmp_vendor_goto_dashboard', '<li><a href="' . esc_url($dashboard_page_link) . '"><i class="icon-trophy icons"></i> ' . esc_html__('Vendor Dashboard','groffer') . '</a></li>');
                            }
                          } ?>
                          
                          <?php if (class_exists('WC_Vendors')) { ?>
                            <?php if (get_option('wcvendors_vendor_dashboard_page_id') != '') { ?>
                              <li><a href="<?php echo esc_url( get_permalink(get_option('wcvendors_vendor_dashboard_page_id')) ); ?>"><i class="icon-trophy icons"></i> <?php echo esc_html__('Vendor Dashboard','groffer'); ?></a></li>
                            <?php } ?>
                          <?php } ?>
                          
                          <li><a href="<?php echo esc_url(get_permalink(get_option('woocommerce_myaccount_page_id')).'orders'); ?>"><i class="icon-bag icons"></i> <?php echo esc_html__('My Orders','groffer'); ?></a></li>
                          <li><a href="<?php echo esc_url(get_permalink(get_option('woocommerce_myaccount_page_id')).'edit-account'); ?>"><i class="icon-user icons"></i> <?php echo esc_html__('Account Details','groffer'); ?></a></li>
                          <div class="dropdown-divider"></div>
                          <li><a href="<?php echo esc_url(wp_logout_url( home_url() )); ?>"><i class="icon-logout icons"></i> <?php echo esc_html__('Log Out','groffer'); ?></a></li>
                        </ul>
                      </div>
                    <?php } else { ?> <!-- logged out -->
                      <li id="nav-menu-login" class="groffer-logoin">               
                        <a href="<?php echo esc_url('#'); ?>" class="lrm-login lrm-hide-if-logged-in">
                          <span class="top-register"><?php echo esc_html__('My Account','groffer'); ?></span>
                          <?php do_shortcode('[nextend_social_login provider="google"]'); ?>
                        </a>
                      </li>
                    <?php } ?>
                  <?php } ?>
                  </ul>
                </div>
            </div>
        </div>
      </div>
  </div>

  <!-- BOTTOM BAR -->
    
  </div>
</header>