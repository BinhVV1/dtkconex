<?php
/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @see http://tgmpluginactivation.com/configuration/ for detailed documentation.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.6.0
 * @author     Thomas Griffin, Gary Jones, Juliette Reinders Folmer
 * @copyright  Copyright (c) 2011, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/TGMPA/TGM-Plugin-Activation
 */
require_once get_template_directory() . '/inc/tgm/class-tgm-plugin-activation.php';
add_action( 'tgmpa_register', 'groffer_register_plugins' );
/**
 * Register the required plugins for this theme.
 *
 * In this example, we register five plugins:
 * - one included with the TGMPA library
 * - two from an external source, one from an arbitrary source, one from a GitHub repository
 * - two from the .org repo, where one demonstrates the use of the `is_callable` argument
 *
 * The variables passed to the `tgmpa()` function should be:
 * - an array of plugin arrays;
 * - optionally a configuration array.
 * In that case, the TGMPA default settings will be used.
 *
 * This function is hooked into `tgmpa_register`, which is fired on the WP `init` action on priority 10.
 */
function groffer_register_plugins() {
    /**
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $plugins = array(
        // This is an example of how to include a plugin pre-packaged with a theme.
        array(
            'name'                  => esc_html__('WPBakery Page Builder', 'groffer'), // The plugin name
            'slug'                  => 'js_composer', // The plugin slug (typically the folder name)
            'source'                => esc_url('http://modeltheme.com/TFPLUGINS/js_composer.zip'), // The plugin source.
            'required'              => true, // If false, the plugin is only 'recommended' instead of required
            'version'               => '6.10', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
            'force_activation'      => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
            'force_deactivation'    => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
            'external_url'          => '', // If set, overrides default API URL and points to an external URL
        ),
        array(
            'name'                  => esc_html__('Revolution Slider', 'groffer'), // The plugin name
            'slug'                  => 'revslider', // The plugin slug (typically the folder name)
            'source'                => esc_url('http://modeltheme.com/TFPLUGINS/revslider.zip'), // The plugin source.
            'required'              => true, // If false, the plugin is only 'recommended' instead of required
            'version'               => '6.6.10', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
            'force_activation'      => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
            'force_deactivation'    => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
            'external_url'          => '', // If set, overrides default API URL and points to an external URL
        ),
        array(
            'name'                  => esc_html__('ModelTheme Framework', 'groffer'), // The plugin name
            'slug'                  => 'modeltheme-framework', // The plugin slug (typically the folder name)
            'source'                => esc_url('http://modeltheme.com/TFPLUGINS/groffer/modeltheme-framework.zip'), // The plugin source.
            'required'              => true, // If false, the plugin is only 'recommended' instead of required
            'version'               => '1.0', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
            'force_activation'      => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
            'force_deactivation'    => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
            'external_url'          => '', // If set, overrides default API URL and points to an external URL
        ),
        array(
            'name'                  => esc_html__('WooCommerce','groffer'), // The plugin name
            'slug'                  => 'woocommerce', // The plugin slug (typically the folder name)
            'required'              => true, // If false, the plugin is only 'recommended' instead of required
        ),
        array(
            'name'                  => esc_html__('YITH WooCommerce Wishlist','groffer'), // The plugin name
            'slug'                  => 'yith-woocommerce-wishlist', // The plugin slug (typically the folder name)
            'required'              => false, // If false, the plugin is only 'recommended' instead of required
        ),
        array(
            'name'                  => esc_html__('YITH WooCommerce Compare','groffer'), // The plugin name
            'slug'                  => 'yith-woocommerce-compare', // The plugin slug (typically the folder name)
            'required'              => false, // If false, the plugin is only 'recommended' instead of required
        ),
        array(
            'name'                  => esc_html__('Redux Framework','groffer'), // The plugin name
            'slug'                  => 'redux-framework', // The plugin slug (typically the folder name)
            'required'              => true, // If false, the plugin is only 'recommended' instead of required
        ),
        array(
            'name'                  => esc_html__('Addons for WPBakery Page Builder','groffer'), // The plugin name
            'slug'                  => 'addons-for-visual-composer', // The plugin slug (typically the folder name)
            'required'              => false, // If false, the plugin is only 'recommended' instead of required
        ),
        array(
            'name'                  => esc_html__('Contact Form 7','groffer'), // The plugin name
            'slug'                  => 'contact-form-7', // The plugin slug (typically the folder name)
            'required'              => false, // If false, the plugin is only 'recommended' instead of required
        ),
        array(
            'name'                  => esc_html__('MailChimp for WordPress', 'groffer'), // The plugin name
            'slug'                  => 'mailchimp-for-wp', // The plugin slug (typically the folder name)
            'required'              => false, // If false, the plugin is only 'recommended' instead of required
        ),
        array(
            'name'                  => esc_html__('AJAX Login and Registration modal popup + inline form', 'groffer'), // The plugin name
            'slug'                  => 'ajax-login-and-registration-modal-popup', // The plugin slug (typically the folder name)
            'required'              => false, // If false, the plugin is only 'recommended' instead of required
        ),
    );
    /*
     * Array of configuration settings. Amend each line as needed.
     *
     * TGMPA will start providing localized text strings soon. If you already have translations of our standard
     * strings available, please help us make TGMPA even better by giving us access to these translations or by
     * sending in a pull-request with .po file(s) with the translations.
     *
     * Only uncomment the strings in the config array if you want to customize the strings.
     */
    $config = array(
        'id'           => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
        'default_path' => '',                      // Default absolute path to bundled plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'parent_slug'  => 'themes.php',            // Parent menu slug.
        'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false,                   // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.
   
    );
    tgmpa( $plugins, $config );
}
