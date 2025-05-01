<div style="width:98%;">
	<form method='post' action='<?php echo esc_url($_SERVER["REQUEST_URI"]); ?>'>
		<table width="100%">
            <tr>
                <td valign="bottom" width="85%">
					<br />
					<span style="font-size:20pt;"><?php _e('View Donation', 'easy-paypal-donation'); ?></span>
				</td>
                <td valign="bottom">
					<a href="<?= get_admin_url(null, 'admin.php?page=wpedon_menu'); ?>"
                       class="button-secondary" style="font-size: 14px;height: 30px;float: right;"><?php _e('View All Donations', 'easy-paypal-donation'); ?></a>
				</td>
            </tr>
        </table>

		<br />
        <div id="wpedon-free-message"></div>

		<div style="background-color:#fff;padding:8px;border: 1px solid #CCCCCC;">
            <br />
			<span style="font-size:16pt;">
                <?php _e('Donation', 'easy-paypal-donation'); ?>
                #<?= esc_html($args['post_id']); ?> 
                <?php _e('Details', 'easy-paypal-donation'); ?>
            </span>
			<br />
            <br />

			<table width="350px">
				<tr>
					<td>
                        <b><?php _e('Transaction', 'easy-paypal-donation'); ?></b>
                    </td>
				</tr>
				<?php if ($args['payment_method'] === 'paypal'): ?>
					<tr>
						<td><?php _e('PayPal Transaction ID:', 'easy-paypal-donation'); ?></td>
						<td>
							<?php if ( !empty( $args['capture_id'] ) ) { ?>
                                <a target="_blank" href="https://www.<?= $args['mode'] === 'sandbox' ? 'sandbox' : ''; ?>.paypal.com/activity/payment/<?= $args['capture_id']; ?>"><?php echo $args['capture_id']; ?></a>
							<?php } else { ?>
							    <a target="_blank" href="https://www.paypal.com/us/cgi-bin/webscr?cmd=_view-a-trans&id=<?php echo $args['txn_id']; ?>">
								<?php echo $args['txn_id']; ?></a>
							<?php } ?>
						</td>
					</tr>
				<?php elseif ($args['payment_method'] === 'stripe') : ?>
					<tr>
						<td>
							<?php _e('Stripe Transaction ID:', 'easy-paypal-donation'); ?>
						</td>
						<td>
							<?php echo $args['txn_id']; ?>
						</td>
					</tr>
				<?php endif; ?>
                <tr>
                    <td>
                        <?php _e('Donation Date:', 'easy-paypal-donation'); ?>
                    </td>
                    <td>
                      <?php $post_timestamp = get_post_timestamp($args['post_id']); echo wp_date(get_option('date_format') . ' ' . get_option('time_format'), strtotime($post_timestamp));  ?>
                    </td>
                </tr>
                <tr>
                    <td><br /></td>
                    <td></td>
                </tr>
                <tr>
                    <td><b><?php _e('Item', 'easy-paypal-donation'); ?></b></td>
                </tr>
                <tr>
                    <td><?php _e('Purpose / Name:', 'easy-paypal-donation'); ?> </td>
                    <td><?php echo esc_html($args['title']); ?></td>
                </tr>
                <tr>
                    <td><?php _e('Amount:', 'easy-paypal-donation'); ?> </td>
                    <td><?php echo esc_html( number_format((float)$args['amount'], 2)  ); ?></td>
                </tr>
                <tr>
                    <td><?php _e('Recurring:', 'easy-paypal-donation'); ?> </td>
                    <td><?=esc_html($args['recurring']);?></td>
                </tr>
                <tr>
                    <td><?php _e('Donation ID:', 'easy-paypal-donation'); ?> </td>
                    <td><?php echo esc_html($args['donation_id']); ?></td>
                </tr>
                <tr>
                    <td><br /></td>
                    <td></td>
                </tr>
                <tr>
                    <td><b><?php _e('Payer', 'easy-paypal-donation'); ?></b></td>
                </tr>
                <tr>
                    <td><?php _e('Payer Email:', 'easy-paypal-donation'); ?> </td>
                    <td><?php echo esc_html($args['payer_email']); ?></td>
                </tr>
                <tr>
                    <td><?php _e('Payer Currency:', 'easy-paypal-donation'); ?> </td>
                    <td><?php echo esc_html(strtoupper($args['payer_currency'])); ?></td>
                </tr>
                <tr>
                    <td></td>
                </tr>
				<?php if ( $args['payment_method'] === 'paypal' && !empty( $args['paypal_connection_type'] ) && $args['paypal_connection_type'] === 'ppcp' ) { ?>
                    <tr>
                        <td colspan="2">
                            <br />
                            <div>
                                <button class="button button-primary button-large" id="wpedon-free-paypal-order-refund" <?= strtolower( $args['payment_status'] ) !== 'completed' ? 'disabled' : ''; ?>><?php _e('Refund', 'easy-paypal-donation'); ?></button>
                                <span class="spinner"></span>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                    </tr>
				<?php } ?>
            </table>
			<input type="hidden" name="update">
		</div>

		<div style="text-align:right">
			<?php _e('Note: If donation was set by donor as recurring on PayPal then', 'easy-paypal-donation'); ?><br />
			<?php _e('the Purpose / Name and Donation ID fields will be unavailable.', 'easy-paypal-donation'); ?>
		</div>
	</form>

</div>