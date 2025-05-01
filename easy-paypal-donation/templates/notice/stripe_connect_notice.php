<?php
if (!defined('ABSPATH')) {
	exit;
} // Exit if accessed directly
?>

<div class="notice notice-warning is-dismissible wpedon-stripe-connect-notice" data-dismiss-url="<?= add_query_arg( 'wpedon_admin_stripe_connect_notice_dismiss', 1, admin_url() ); ?>">
	<p>
		<?php
		echo '<b>' . esc_html__('Important', 'easy-paypal-donation') . '</b> - ';
		echo esc_html__('\'Accept Donations with PayPal & Stripe\' now uses Stripe Connect. Stripe Connect improves security and allows for easier setup.', 'easy-paypal-donation');
		echo '<br /><br />';
		echo esc_html__('If you use Stripe, please use Stripe Connect.', 'easy-paypal-donation') . ' ';
		echo esc_html__('Have questions: see the', 'easy-paypal-donation') . ' ';
		echo '<a target="_blank" href="https://wpplugin.org/documentation/stripe-connect/">';
		echo esc_html__('documentation', 'easy-paypal-donation');
		echo '</a>.';
		?>
	</p>
	<p>
		<?php $stripe = new \WPEasyDonation\Base\Stripe(); ?>
		<a href="<?= $stripe->connect_url(); ?>" class="stripe-connect-btn">
			<span><?php _e('Connect with Stripe', 'easy-paypal-donation'); ?></span>
		</a>
	</p>
	<br />
	<?php _e('WPPlugin LLC is an official Stripe Partner. Pay as you go pricing: 1% per-transaction fee + Stripe fees.', 'easy-paypal-donation'); ?>
</div>