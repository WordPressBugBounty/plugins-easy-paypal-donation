<div id="wpedon-ppcp-status-table">
	<table>
		<tr>
			<?php if ( $args['button_id'] === 'general' ): ?>
				<td class="wpedon-cell-left">
					<b><?php _e('Connection status:', 'easy-paypal-donation'); ?> </b>
				</td>
			<?php endif; ?>
			<td>
				<div class="notice inline wpedon-ppcp-connect notice-<?php echo $args['notice_type']; ?>">
					<p>
						<?php if ( !empty( $args['status']['legal_name'] ) ): ?>
							<strong><?php echo $args['status']['legal_name']; ?></strong>
							<br>
						<?php endif; ?>
						<?php echo !empty( $args['status']['primary_email'] ) ? $args['status']['primary_email'] . ' — ' : ''; ?><?php _e('Administrator (Owner)', 'easy-paypal-donation'); ?>
					</p>
				</div>
				<div>
					<?php $reconnect_mode = $args['status']['env'] === 'live' ? 'sandbox' : 'live'; ?>
					<?php _e('Your PayPal account is connected in', 'easy-paypal-donation'); ?> <strong><?php echo $args['status']['env']; ?></strong> <?php _e('mode.', 'easy-paypal-donation'); ?>
					<a href="#TB_inline?&inlineId=wpedon-ppcp-setup-account-modal" class="wpedon-ppcp-onboarding-start thickbox" data-connect-mode="<?php echo $reconnect_mode; ?>">
						<?php _e('Connect in', 'easy-paypal-donation'); ?> <strong><?php echo $reconnect_mode; ?></strong> <?php _e('mode', 'easy-paypal-donation'); ?>
					</a> <?php _e('or', 'easy-paypal-donation'); ?> <a href="#" id="wpedon-ppcp-disconnect" data-button-id="<?php echo $args['button_id']; ?>"><?php _e('disconnect this account', 'easy-paypal-donation'); ?></a>.
				</div>

				<?php if ( $args['status']['mode'] === 'error' ): ?>
					<p>
						<strong><?php _e('There were errors connecting your PayPal account. Resolve them in your account settings, by contacting support or by reconnecting your PayPal account.', 'easy-paypal-donation'); ?></strong>
					</p>
					<?php if ( !empty( $args['status']['errors'] ) ): ?>
						<p>
							<strong><?php _e('See below for more details.', 'easy-paypal-donation'); ?></strong>
						</p>
						<ul class="wpedon-ppcp-list wpedon-ppcp-list-error">
							<?php foreach ( $args['status']['errors'] as $error ): ?>
								<li><?php echo $error; ?></li>
							<?php endforeach; ?>
						</ul>
					<?php endif; ?>
				<?php elseif ( !empty( $args['status']['warnings'] ) ): ?>
					<p>
						<strong><?php _e('Please review the warnings below and resolve them in your account settings or by contacting support.', 'easy-paypal-donation'); ?></strong>
					</p>
					<ul class="wpedon-ppcp-list wpedon-ppcp-list-warning">
						<?php foreach ( $args['status']['warnings'] as $warning ): ?>
							<li><?php echo $warning; ?></li>
						<?php endforeach; ?>
					</ul>
				<?php endif; ?>

				<?php if ( $args['show_links'] ): ?>
					<ul class="wpedon-ppcp-list">
						<li><a href="https://www.paypal.com/myaccount/settings/" target="_blank"><?php _e('PayPal account settings', 'easy-paypal-donation'); ?></a></li>
						<li><a href="https://www.paypal.com/us/smarthelp/contact-us" target="_blank"><?php _e('PayPal support', 'easy-paypal-donation'); ?></a></li>
					</ul>
				<?php endif; ?>
			</td>
		</tr>
	</table>

	<?php if ( $args['show_settings'] &&  $args['button_id'] === 'general' ): ?>
		<table>
			<tr>
				<td colspan="2">
					<br />
					<h3><?php _e('Payments Methods Accepted', 'easy-paypal-donation'); ?></h3>
				</td>
			</tr>
			<tr>
				<td class="wpedon-cell-left">
					<b><?php _e('PayPal:', 'easy-paypal-donation'); ?></b>
				</td>
				<td>
					<label>
						<input type="radio" name="ppcp_funding_paypal" value="1" <?php echo !empty( $args['options']['ppcp_funding_paypal'] ) ? 'checked ' : ''; ?>/>
						<?php _e('On', 'easy-paypal-donation'); ?>
					</label>
					&nbsp;
					&nbsp;
					<label>
						<input type="radio" name="ppcp_funding_paypal" value="0" <?php echo empty( $args['options']['ppcp_funding_paypal'] ) ? 'checked ' : ''; ?>/>
						<?php _e('Off', 'easy-paypal-donation'); ?>
					</label>
				</td>
			</tr>
			<tr>
				<td class="wpedon-cell-left">
					<b><?php _e('PayPal PayLater:', 'easy-paypal-donation'); ?></b>
				</td>
				<td>
					<label>
						<input type="radio" name="ppcp_funding_paylater" value="1" <?php echo !empty( $args['options']['ppcp_funding_paylater'] ) ? 'checked ' : ''; ?>/>
						<?php _e('On', 'easy-paypal-donation'); ?>
					</label>
					&nbsp;
					&nbsp;
					<label>
						<input type="radio" name="ppcp_funding_paylater" value="0" <?php echo empty( $args['options']['ppcp_funding_paylater'] ) ? 'checked ' : ''; ?>/>
						<?php _e('Off', 'easy-paypal-donation'); ?>
					</label>
				</td>
			</tr>
			<tr>
				<td class="wpedon-cell-left">
					<b><?php _e('Venmo:', 'easy-paypal-donation'); ?></b>
				</td>
				<td>
					<label>
						<input type="radio" name="ppcp_funding_venmo" value="1" <?php echo !empty( $args['options']['ppcp_funding_venmo'] ) ? 'checked ' : ''; ?>/>
						<?php _e('On', 'easy-paypal-donation'); ?>
					</label>
					&nbsp;
					&nbsp;
					<label>
						<input type="radio" name="ppcp_funding_venmo" value="0" <?php echo empty( $args['options']['ppcp_funding_venmo'] ) ? 'checked ' : ''; ?>/>
						<?php _e('Off', 'easy-paypal-donation'); ?>
					</label>
				</td>
			</tr>
			<tr>
				<td class="wpedon-cell-left">
					<b><?php _e('Local Alternative Payment Methods:', 'easy-paypal-donation'); ?></b>
				</td>
				<td>
					<label>
						<input type="radio" name="ppcp_funding_alternative" value="1" <?php echo !empty( $args['options']['ppcp_funding_alternative'] ) ? 'checked ' : ''; ?>/>
						<?php _e('On', 'easy-paypal-donation'); ?>
					</label>
					&nbsp;
					&nbsp;
					<label>
						<input type="radio" name="ppcp_funding_alternative" value="0" <?php echo empty( $args['options']['ppcp_funding_alternative'] ) ? 'checked ' : ''; ?>/>
						<?php _e('Off', 'easy-paypal-donation'); ?>
					</label>
				</td>
			</tr>
			<tr>
				<td class="wpedon-cell-left">
					<b><?php _e('Credit & Debit Cards:', 'easy-paypal-donation'); ?></b>
				</td>
				<td>
					<label>
						<input type="radio" name="ppcp_funding_cards" value="1" <?php echo !empty( $args['options']['ppcp_funding_cards'] ) ? 'checked ' : ''; ?>/>
						<?php _e('On', 'easy-paypal-donation'); ?>
					</label>
					&nbsp;
					&nbsp;
					<label>
						<input type="radio" name="ppcp_funding_cards" value="0" <?php echo empty( $args['options']['ppcp_funding_cards'] ) ? 'checked ' : ''; ?>/>
						<?php _e('Off', 'easy-paypal-donation'); ?>
					</label>
				</td>
			</tr>

			<?php if ( $args['status']['mode'] === 'advanced' ) { ?>
				<tr>
					<td class="wpedon-cell-left">
						<b><?php _e('Advanced Credit & Debit Cards (ACDC):', 'easy-paypal-donation'); ?></b>
					</td>
					<td>
						<label>
							<input type="radio" name="ppcp_funding_advanced_cards" value="1" <?php echo !empty( $args['options']['ppcp_funding_advanced_cards'] ) ? 'checked ' : ''; ?>/>
							<?php _e('On', 'easy-paypal-donation'); ?>
						</label>
						&nbsp;
						&nbsp;
						<label>
							<input type="radio" name="ppcp_funding_advanced_cards" value="0" <?php echo empty( $args['options']['ppcp_funding_advanced_cards'] ) ? 'checked ' : ''; ?>/>
							<?php _e('Off', 'easy-paypal-donation'); ?>
						</label>
					</td>
				</tr>
				<tr>
					<td class="wpedon-cell-left">
						<b><?php _e('ACDC Button text:', 'easy-paypal-donation'); ?></b>
					</td>
					<td>
						<input type="text" name="ppcp_acdc_button_text" value="<?php echo $args['options']['ppcp_acdc_button_text']; ?>" />
						<br />
						<?php _e('Payment button text', 'easy-paypal-donation'); ?>
					</td>
				</tr>
			<?php } ?>

			<tr>
				<td colspan="2">
					<br />
					<h3><?php _e('PayPal Checkout Buttons', 'easy-paypal-donation'); ?></h3>
				</td>
			</tr>
			<tr>
				<td class="wpedon-cell-left">
					<b><?php _e('Layout:', 'easy-paypal-donation'); ?></b>
				</td>
				<td>
					<label>
						<input type="radio" name="ppcp_layout" value="horizontal" <?php echo $args['options']['ppcp_layout'] === 'horizontal' ? 'checked ' : ''; ?>/>
						<?php _e('Horizontal', 'easy-paypal-donation'); ?>
					</label>
					&nbsp;
					&nbsp;
					<label>
						<input type="radio" name="ppcp_layout" value="vertical" <?php echo $args['options']['ppcp_layout'] === 'vertical' ? 'checked ' : ''; ?>/>
						<?php _e('Vertical', 'easy-paypal-donation'); ?>
					</label>
				</td>
			</tr>
			<tr>
				<td class="wpedon-cell-left">
					<b><?php _e('Color:', 'easy-paypal-donation'); ?></b>
				</td>
				<td>
					<label>
						<input type="radio" name="ppcp_color" value="gold" <?php echo $args['options']['ppcp_color'] === 'gold' ? 'checked ' : ''; ?>/>
						<?php _e('Gold', 'easy-paypal-donation'); ?>
					</label>
					&nbsp;
					&nbsp;
					<label>
						<input type="radio" name="ppcp_color" value="blue" <?php echo $args['options']['ppcp_color'] === 'blue' ? 'checked ' : ''; ?>/>
						<?php _e('Blue', 'easy-paypal-donation'); ?>
					</label>
					&nbsp;
					&nbsp;
					<label>
						<input type="radio" name="ppcp_color" value="black" <?php echo $args['options']['ppcp_color'] === 'black' ? 'checked ' : ''; ?>/>
						<?php _e('Black', 'easy-paypal-donation'); ?>
					</label>
					&nbsp;
					&nbsp;
					<label>
						<input type="radio" name="ppcp_color" value="silver" <?php echo $args['options']['ppcp_color'] === 'silver' ? 'checked ' : ''; ?>/>
						<?php _e('Silver', 'easy-paypal-donation'); ?>
					</label>
					&nbsp;
					&nbsp;
					<label>
						<input type="radio" name="ppcp_color" value="white" <?php echo $args['options']['ppcp_color'] === 'white' ? 'checked ' : ''; ?>/>
						<?php _e('White', 'easy-paypal-donation'); ?>
					</label>
				</td>
			</tr>
			<tr>
				<td class="wpedon-cell-left">
					<b><?php _e('Shape:', 'easy-paypal-donation'); ?></b>
				</td>
				<td>
					<label>
						<input type="radio" name="ppcp_shape" value="rect" <?php echo $args['options']['ppcp_shape'] === 'rect' ? 'checked ' : ''; ?>/>
						<?php _e('Rectangle', 'easy-paypal-donation'); ?>
					</label>
					&nbsp;
					&nbsp;
					<label>
						<input type="radio" name="ppcp_shape" value="pill" <?php echo $args['options']['ppcp_shape'] === 'pill' ? 'checked ' : ''; ?>/>
						<?php _e('Pill', 'easy-paypal-donation'); ?>
					</label>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<br />
				</td>
			</tr>
			<tr>
				<td class="wpedon-cell-left">
					<b><?php _e('Height:', 'easy-paypal-donation'); ?></b>
				</td>
				<td>
					<input type="number" name="ppcp_height" value="<?php echo $args['options']['ppcp_height']; ?>" min="25" max="55" />
					<br />
					<?php _e('25 - 55, a value around 40 is recommended', 'easy-paypal-donation'); ?>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<br />
				</td>
			</tr>
			<tr>
				<td class="wpedon-cell-left">
					<b><?php _e('Width:', 'easy-paypal-donation'); ?></b>
				</td>
				<td>
					<input type="number" name="ppcp_width" value="<?php echo $args['options']['ppcp_width']; ?>" />
					<br />
					<?php _e('Max buttons width in pixels', 'easy-paypal-donation'); ?>
				</td>
			</tr>
		</table>
		<br />
	<?php endif; ?>
</div>