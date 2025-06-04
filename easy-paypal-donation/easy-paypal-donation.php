<?php

if (!defined('ABSPATH')) {
	exit;
} // Exit if accessed directly

/*
Plugin Name: Accept Donations with PayPal & Stripe
Plugin URI: https://wordpress.org/plugins/easy-paypal-donation/
Description: A simple and easy way to accept PayPal donations on your website.
Tags: donation, donate, donations, charity, paypal, paypal donation, ecommerce, gateway, payment, paypal button, paypal donation, paypal donate, paypal payment, paypal plugin
Author: Scott Paterson
Author URI: https://wpplugin.org
License: GPL2
Version: 1.5.1
Text Domain: easy-paypal-donation
Domain Path: /languages
*/

/*  Copyright 2014-2025 Scott Paterson

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/

//// variables
// plugin function 	  = wpedon
// shortcode 		  = wpedon

if (file_exists(dirname(__FILE__).'/vendor/autoload.php')) {
	require_once dirname(__FILE__).'/vendor/autoload.php';
}

define('WPEDON_FREE_DIR_PATH', plugin_dir_path(__FILE__));
define('WPEDON_FREE_VERSION_NUM', '1.5.1');
define( 'WPEDON_FREE_PPCP_API', 'https://wpplugin.org/ppcp-wpedon/');
define( 'WPEDON_FREE_STRIPE_CONNECT_ENDPOINT', 'https://wpplugin.org/stripe-wpedon/connect.php');

define( 'WPEDON_FREE_URL', plugin_dir_url( __FILE__ ) );
define( 'WPEDON_FREE_BASENAME', plugin_basename(__FILE__) );

include_once('helpers/Option.php');
include_once('helpers/Template.php');
include_once('helpers/Func.php');

// Load text domain for translations
function wpedon_load_textdomain() {
    load_plugin_textdomain('easy-paypal-donation', false, dirname(plugin_basename(__FILE__)) . '/languages');
}
add_action('plugins_loaded', 'wpedon_load_textdomain');


// Add deactivation survey
function wpedon_enqueue_deactivation_survey() {
    if (get_current_screen() && get_current_screen()->id === 'plugins') {
        wp_enqueue_script('wpedon-deactivation-survey', plugins_url('assets/js/deactivation-survey.js', __FILE__), array('jquery'), WPEDON_FREE_VERSION_NUM, true);
        wp_localize_script('wpedon-deactivation-survey', 'wpedonDeactivationSurvey', array(
            'pluginVersion' => WPEDON_FREE_VERSION_NUM,
            'deactivationOptions' => array(
                'upgraded_to_pro' => __('I upgraded to the Pro version', 'easy-paypal-donation'),
                'no_longer_needed' => __('I no longer need the plugin', 'easy-paypal-donation'),
                'found_better' => __('I found a better plugin', 'easy-paypal-donation'),
                'not_working' => __('The plugin is not working', 'easy-paypal-donation'),
                'fees_expensive' => __('The fees are too high', 'easy-paypal-donation'),
                'temporary' => __('It\'s a temporary deactivation', 'easy-paypal-donation'),
                'other' => __('Other', 'easy-paypal-donation')
            ),
            'strings' => array(
                'title' => __('Accept Donations with PayPal & Stripe Deactivation', 'easy-paypal-donation'),
                'description' => __('If you have a moment, please let us know why you are deactivating. All submissions are anonymous and we only use this feedback to improve this plugin.', 'easy-paypal-donation'),
                'otherPlaceholder' => __('Please tell us more...', 'easy-paypal-donation'),
                'skipButton' => __('Skip & Deactivate', 'easy-paypal-donation'),
                'submitButton' => __('Submit & Deactivate', 'easy-paypal-donation'),
                'cancelButton' => __('Cancel', 'easy-paypal-donation'),
                'betterPluginQuestion' => __('What is the name of the plugin?', 'easy-paypal-donation'),
                'notWorkingQuestion' => __('We\'re sorry to hear that. Can you describe the issue?', 'easy-paypal-donation'),
                'errorRequired' => __('Error: Please complete the required field.', 'easy-paypal-donation')
            )
        ));
    }
}
add_action('admin_enqueue_scripts', 'wpedon_enqueue_deactivation_survey');

register_activation_hook(__FILE__, function () {
	$pro_plugin = 'paypal-donation-pro/easy-paypal-donation-pro.php';
	if (is_plugin_active($pro_plugin)) {
		deactivate_plugins($pro_plugin);
	}
	\WPEasyDonation\Helpers\Option::init();
	
	// Set transient for activation notice
	set_transient('wpedon_activation_notice_' . get_current_user_id(), true);
});

register_deactivation_hook(__FILE__, function () {});
if ( !empty( get_option( 'wpedon_settingsoptions' ) ) ) {
	\WPEasyDonation\Helpers\Option::oldOptions();
}

// public shortcode
include_once('includes/public_shortcode.php');

if (class_exists('WPEasyDonation\Init')) {
	WPEasyDonation\Init::registerServices();
}
