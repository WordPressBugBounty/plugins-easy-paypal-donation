<?php
if (!defined('ABSPATH')) {
	exit;
} // Exit if accessed directly
?>

<div class="notice notice-warning is-dismissible wpedon-ppcp-connect-notice" data-dismiss-url="<?= add_query_arg( 'wpedon_admin_ppcp_notice_dismiss', 1, admin_url() ); ?>">
	<p>
		<?php
		echo '<b>' . esc_html__('Important', 'easy-paypal-donation') . '</b> - ';
		echo esc_html__('\'Accept Donations with PayPal & Stripe\' now uses PayPal Commerce Platform.', 'easy-paypal-donation');
		echo '<br /><br />';
		echo '<u><b>' . esc_html__('PayPal Standard is now a Legacy product.', 'easy-paypal-donation') . '</b></u>';
		echo '<br /><br />';
		echo '<b><u>' . esc_html__('If you use PayPal, please update to PayPal Commerce Platform.', 'easy-paypal-donation') . '</u></b>';
		?>
	</p>
	<p>
        <?php $ppcp = new \WPEasyDonation\Base\PpcpController(); ?>
		<a class="wpedon-ppcp-button"
		   href="<?= $ppcp->connect_tab_url( 'general'  ); ?>"
		>
			<img class="wpedon-ppcp-paypal-logo" style="max-height:25px" src="<?= WPEDON_FREE_URL; ?>/assets/images/paypal-logo.png" alt="paypal-logo" />
			<br />
			<?php _e('Get Started', 'easy-paypal-donation'); ?>
		</a>
	</p>
	<br />
	<?php _e('WPPlugin LLC is an official PayPal Partner. Pay as you go pricing: 1% per-transaction fee + PayPal fees.', 'easy-paypal-donation'); ?>
</div>