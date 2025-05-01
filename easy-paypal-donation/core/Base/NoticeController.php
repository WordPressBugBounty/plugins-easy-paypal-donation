<?php

namespace WPEasyDonation\Base;

use WPEasyDonation\Helpers\Template;

class NoticeController
{
	/**
	 * init services
	 */
	public function register() {
		add_action('admin_notices', array($this, 'activation_notice'));
		add_action('admin_notices', array($this, 'stripe_connect_error_notice'));
		add_action('admin_notices', array($this, 'stripe_connect_notice'));
		add_action('admin_notices',  array($this, 'ppcp_notice'));
		add_action('admin_init', array($this, 'stripe_connect_notice_dismiss'));
		add_action('admin_init', array($this, 'ppcp_notice_dismiss'));
		add_action('admin_notices', array($this, 'localhost_notice'));
	}

	/**
	 * Show admin activation notice
	 */
	function activation_notice() {
		$transient_key = 'wpedon_activation_notice_' . get_current_user_id();
		if (get_transient($transient_key)) {
			$settings_url = get_admin_url(null, 'admin.php?page=wpedon_settings');
			?>
			<div class="notice notice-info">
				<p>
					<?php _e('Accept Donations with PayPal & Stripe is now active!', 'easy-paypal-donation'); ?> 
					<a href="<?php echo esc_url($settings_url); ?>"><?php _e('Click here to configure your payment settings.', 'easy-paypal-donation'); ?></a>
				</p>
			</div>
			<?php
			delete_transient($transient_key);
		}
	}

	/**
	 * Stripe Connect error notice.
	 */
	function stripe_connect_error_notice() {
		if (empty($_GET['wpedon_error']) || $_GET['wpedon_error'] != 'stripe-connect-handler') {
			return;
		}
		Template::getTemplate('notice/stripe_connect_error.php');
	}

	/**
	 * Show admin notice for Stripe Connect.
	 */
	function stripe_connect_notice() {
		$options = \WPEasyDonation\Helpers\Option::get();
		$mode = intval( $options['mode_stripe'] ) === 2 ? 'live' : 'sandbox';
		$acct_id_key = 'acct_id_' . $mode;
		if ( !empty( $options[$acct_id_key] ) || !empty( $options['stripe_connect_notice_dismissed'] )  ||
			( isset( $_GET['page'] ) && $_GET['page'] == 'wpedon_settings' && isset( $_GET['tab'] ) && $_GET['tab'] == 4 ) ) return;
		Template::getTemplate('notice/stripe_connect_notice.php');
	}

	/**
	 * Show admin notice for PayPal Commerce Platform.
	 */
	function ppcp_notice() {
		$options = \WPEasyDonation\Helpers\Option::get();
		$env = intval( $options['mode'] ) === 2 ? 'live' : 'sandbox';
		$connected = !empty( $options['ppcp_onboarding'][$env] ) && !empty( $options['ppcp_onboarding'][$env]['seller_id'] );
		if ( $connected || !empty( $options['ppcp_notice_dismissed'] ) ||
			( isset( $_GET['page'] ) && $_GET['page'] == 'wpedon_settings' && isset( $_GET['tab'] ) && $_GET['tab'] == 3 ) ) return;
		Template::getTemplate('notice/ppcp_notice.php');
	}

	/**
	 * Show localhost environment notice
	 */
	function localhost_notice() {
		// Check if we're on the donations page
		if (!isset($_GET['page']) || $_GET['page'] !== 'wpedon_menu') {
			return;
		}

		// Check if site is running on localhost
		$is_localhost = in_array($_SERVER['REMOTE_ADDR'], array('127.0.0.1', '::1')) || 
						strpos($_SERVER['HTTP_HOST'], 'localhost') !== false ||
						strpos($_SERVER['HTTP_HOST'], '.local') !== false;

		if ($is_localhost) {
			?>
			<div class="notice notice-warning">
				<p>
					<?php _e('Your website appears to be a testing website / a localhost environment - Please note that "payment status" may not change to "completed" until your website is public on the internet.', 'easy-paypal-donation'); ?>
				</p>
			</div>
			<?php
		}
	}

	/**
	 * Dismiss admin notice for Stripe Connect.
	 */
	function stripe_connect_notice_dismiss() {
		if (empty($_GET['wpedon_admin_stripe_connect_notice_dismiss'])) {
			return;
		}

		$options = \WPEasyDonation\Helpers\Option::get();
		$options['stripe_connect_notice_dismissed'] = 1;
		\WPEasyDonation\Helpers\Option::update($options);
		die();
	}

	/**
	 * Dismiss admin notice for PayPal Commerce Platform.
	 */
	function ppcp_notice_dismiss() {
		if (empty($_GET['wpedon_admin_ppcp_notice_dismiss'])) {
			return;
		}

		$options = \WPEasyDonation\Helpers\Option::get();
		$options['ppcp_notice_dismissed'] = 1;
		\WPEasyDonation\Helpers\Option::update($options);
		die();
	}
}