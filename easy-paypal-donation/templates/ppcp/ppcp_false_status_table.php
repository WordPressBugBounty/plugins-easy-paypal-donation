<table id="wpedon-ppcp-status-table" class="wpedon-ppcp-initial-view-table">
	<?php if ( $args['button_id'] === 'general' ): ?>
		<tr>
			<td>
				<img class="wpedon-ppcp-paypal-logo" src="<?php echo $args['url']; ?>assets/images/paypal-logo.png" alt="<?php _e('PayPal logo', 'easy-paypal-donation'); ?>" />
			</td>
			<td class="wpedon-ppcp-align-right wpedon-ppcp-icons">
				<img class="wpedon-ppcp-paypal-methods" src="<?php echo $args['url']; ?>assets/images/paypal-express.png" alt="<?php _e('PayPal Express', 'easy-paypal-donation'); ?>" />
				<img class="wpedon-ppcp-paypal-methods" src="<?php echo $args['url']; ?>assets/images/paypal-advanced.png" alt="<?php _e('PayPal Advanced', 'easy-paypal-donation'); ?>" />
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<h3 class="wpedon-ppcp-title"><?php _e('PayPal: The all-in-one checkout solution', 'easy-paypal-donation'); ?></h3>
				<ul class="wpedon-ppcp-list">
					<li><?php _e('Help drive conversion by offering customers a seamless checkout experience', 'easy-paypal-donation'); ?></li>
					<li><?php _e('Securely accepts all major credit/debit cards and local payment methods with the strength of the PayPal network', 'easy-paypal-donation'); ?></li>
					<li><?php _e('WPPlugin LLC is an official PayPal Partner. Pay as you go pricing: 1% per-transaction fee + PayPal fees.', 'easy-paypal-donation'); ?></li>
				</ul>
			</td>
		</tr>
	<?php endif; ?>
	<tr>
		<td>
			<a href="#TB_inline?&inlineId=wpedon-ppcp-setup-account-modal" class="wpedon-ppcp-button wpedon-ppcp-onboarding-start thickbox" data-connect-mode-default="<?php echo $args['default_env']; ?>" data-connect-mode="<?php echo $args['env']; ?>"><?php _e('Get started', 'easy-paypal-donation'); ?></a>
		</td>
		<?php if ( $args['button_id'] === 'general' ): ?>
			<td class="wpedon-ppcp-align-right">
				<a href="https://www.paypal.com/us/webapps/mpp/merchant-fees#statement-2" class="wpedon-ppcp-link" target="_blank"><?php _e('View our simple and transparent pricing', 'easy-paypal-donation'); ?></a>
			</td>
		<?php endif; ?>
	</tr>
</table>