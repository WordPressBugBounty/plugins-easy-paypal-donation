<div style="width:98%;">
    <form method='post'>
		<?php
		$post_id = intval($_GET['product']);
		$post_data = get_post($post_id);
		$title = $post_data->post_title;
		$siteurl = get_site_url();
		?>
        <table width="100%">
            <tr>
                <td valign="bottom" width="85%">
                    <br/>
                    <span style="font-size:20pt;"><?php _e('Edit PayPal & Stripe Donation Button', 'easy-paypal-donation'); ?></span>
                </td>
                <td valign="bottom">
                    <input type="submit" class="button-primary" style="font-size: 14px;height: 30px;float: right;"
                           value="<?php _e('Save PayPal & Stripe Donation Button', 'easy-paypal-donation'); ?>">
                </td>
                <td valign="bottom">
                    <a href="<?= get_admin_url(null, 'admin.php?page=wpedon_buttons'); ?>" class="button-secondary"
                       style="font-size: 14px;height: 30px;float: right;"><?php _e('View All Donation Buttons', 'easy-paypal-donation'); ?></a>
                </td>
            </tr>
        </table>

		<?php if (isset($args['error']) && isset($args['message'])): ?>
            <div class='error'><p><?= esc_html($args['message']); ?></p></div>
		<?php endif; ?>
		<?php if (!isset($args['error']) && $args['message']): ?>
            <div class='updated'><p><?= esc_html($args['message']); ?></p></div>
		<?php endif; ?>
        <br/>
        <div style="background-color:#fff;padding:8px;border: 1px solid #CCCCCC;"><br/>
            <table>
                <tr>
                    <td>
                        <b><?php _e('Shortcode', 'easy-paypal-donation'); ?></b>
                    </td>
                    <td></td>
                    </td></td>
                </tr>
                <tr>
                    <td>
                        <?php _e('Shortcode:', 'easy-paypal-donation'); ?>
                    </td>
                    <td>
                        <input type="text" readonly value="<?php echo "[wpedon id=$post_id]"; ?>">
                    </td>
                    <td>
                        <?php _e('Put this in a page, post, PayPal widget, or', 'easy-paypal-donation'); ?> <a target="_blank"
                                                                       href="https://wpplugin.org/documentation/?document=2314"><?php _e('in
                            your theme', 'easy-paypal-donation'); ?></a>,
                        <?php _e('to show the PayPal button on your site. You can also use the button inserter found above the page or post editor.', 'easy-paypal-donation'); ?>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td><br/></td>
                    <td></td>
                </tr>
                <tr>
                    <td><b><?php _e('Main', 'easy-paypal-donation'); ?></b></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td><?php _e('Purpose / Name:', 'easy-paypal-donation'); ?></td>
                    <td>
                        <input type="text" required name="wpedon_button_name" value="<?php echo esc_attr($title); ?>">
                    </td>
                    <td><?php _e('The purpose of the donation. If blank, customer enters purpose.', 'easy-paypal-donation'); ?></td>
                </tr>
	            <?php $price_type = get_post_meta( $post_id, 'wpedon_button_price_type', true ); ?>
                <tr>
                    <td>
                        <?php _e('Donation Amount Type:', 'easy-paypal-donation'); ?>
                    </td>
                    <td>
                        <label>
                            <input type="radio" name="wpedon_button_price_type" value="fixed" <?= $price_type !== 'manual' ? 'checked' : ''; ?> /> <?php _e('Fixed value', 'easy-paypal-donation'); ?>
                        </label>

                        <label>
                            <input type="radio" name="wpedon_button_price_type" value="manual" <?= $price_type === 'manual' ? 'checked' : ''; ?> /> <?php _e('Manual entry', 'easy-paypal-donation'); ?>
                        </label>
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td><?php _e('Donation Amount', 'easy-paypal-donation'); ?><span id="wpedon-amount-label" <?= $price_type === 'manual' ? '' : 'style="display:none;"'; ?>><?php _e(' (default)', 'easy-paypal-donation'); ?></span>:</td>
                    <td>
                        <input type="text" name="wpedon_button_price"
                               value="<?php echo esc_attr(get_post_meta($post_id, 'wpedon_button_price', true)); ?>" />
                    </td>
                    <td><?php _e('Required - Example format: 6.99', 'easy-paypal-donation'); ?> <b><u><?php _e('Minimum amount for PayPal & Stripe is $1.00', 'easy-paypal-donation'); ?></u></b> <?php _e('If using dropdown fields, enter 1.00', 'easy-paypal-donation'); ?>
                    </td>
                </tr>
                <tr>
                    <td><?php _e('Donation ID:', 'easy-paypal-donation'); ?></td>
                    <td>
                        <input type="text" name="wpedon_button_id"
                               value="<?php echo esc_attr(get_post_meta($post_id, 'wpedon_button_id', true)); ?>">
                    </td>
                    <td> <?php _e('Optional - Example: S12T-Gec-RS.', 'easy-paypal-donation'); ?></td>
                </tr>
                <tr>
                    <td></td>
                    <td><br/></td>
                    <td></td>
                </tr>
                <tr>
                    <td><b><?php _e('Language & Currency', 'easy-paypal-donation'); ?></b></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td><br/></td>
                    <td></td>
                </tr>
                <tr>
                    <td><?php _e('Language:', 'easy-paypal-donation'); ?></td>
                    <td>
                        <select name="wpedon_button_language" style="width: 190px">
							<?php $wpedon_button_language = get_post_meta($post_id, 'wpedon_button_language', true); ?>
                            <option <?php if ($wpedon_button_language == "0") {
								echo "SELECTED";
							} ?> value="0"><?php _e('Default Language', 'easy-paypal-donation'); ?>
                            </option>
                            <option <?php if ($wpedon_button_language == "1") {
								echo "SELECTED";
							} ?> value="1"><?php _e('Danish', 'easy-paypal-donation'); ?>
                            </option>
                            <option <?php if ($wpedon_button_language == "2") {
								echo "SELECTED";
							} ?> value="2"><?php _e('Dutch', 'easy-paypal-donation'); ?>
                            </option>
                            <option <?php if ($wpedon_button_language == "3") {
								echo "SELECTED";
							} ?> value="3"><?php _e('English', 'easy-paypal-donation'); ?>
                            </option>
                            <option <?php if ($wpedon_button_language == "20") {
								echo "SELECTED";
							} ?> value="20"><?php _e('English - UK', 'easy-paypal-donation'); ?>
                            </option>
                            <option <?php if ($wpedon_button_language == "4") {
								echo "SELECTED";
							} ?> value="4"><?php _e('French', 'easy-paypal-donation'); ?>
                            </option>
                            <option <?php if ($wpedon_button_language == "5") {
								echo "SELECTED";
							} ?> value="5"><?php _e('German', 'easy-paypal-donation'); ?>
                            </option>
                            <option <?php if ($wpedon_button_language == "6") {
								echo "SELECTED";
							} ?> value="6"><?php _e('Hebrew', 'easy-paypal-donation'); ?>
                            </option>
                            <option <?php if ($wpedon_button_language == "7") {
								echo "SELECTED";
							} ?> value="7"><?php _e('Italian', 'easy-paypal-donation'); ?>
                            </option>
                            <option <?php if ($wpedon_button_language == "8") {
								echo "SELECTED";
							} ?> value="8"><?php _e('Japanese', 'easy-paypal-donation'); ?>
                            </option>
                            <option <?php if ($wpedon_button_language == "9") {
								echo "SELECTED";
							} ?> value="9"><?php _e('Norwegian', 'easy-paypal-donation'); ?>
                            </option>
                            <option <?php if ($wpedon_button_language == "10") {
								echo "SELECTED";
							} ?> value="10"><?php _e('Polish', 'easy-paypal-donation'); ?>
                            </option>
                            <option <?php if ($wpedon_button_language == "11") {
								echo "SELECTED";
							} ?> value="11"><?php _e('Portuguese', 'easy-paypal-donation'); ?>
                            </option>
                            <option <?php if ($wpedon_button_language == "12") {
								echo "SELECTED";
							} ?> value="12"><?php _e('Russian', 'easy-paypal-donation'); ?>
                            </option>
                            <option <?php if ($wpedon_button_language == "13") {
								echo "SELECTED";
							} ?> value="13"><?php _e('Spanish', 'easy-paypal-donation'); ?>
                            </option>
                            <option <?php if ($wpedon_button_language == "14") {
								echo "SELECTED";
							} ?> value="14"><?php _e('Swedish', 'easy-paypal-donation'); ?>
                            </option>
                            <option <?php if ($wpedon_button_language == "15") {
								echo "SELECTED";
							} ?> value="15"><?php _e('Simplified Chinese -China only', 'easy-paypal-donation'); ?>
                            </option>
                            <option <?php if ($wpedon_button_language == "16") {
								echo "SELECTED";
							} ?> value="16"><?php _e('Traditional Chinese - Hong Kong only', 'easy-paypal-donation'); ?>
                            </option>
                            <option <?php if ($wpedon_button_language == "17") {
								echo "SELECTED";
							} ?> value="17"><?php _e('Traditional Chinese - Taiwan only', 'easy-paypal-donation'); ?>
                            </option>
                            <option <?php if ($wpedon_button_language == "18") {
								echo "SELECTED";
							} ?> value="18"><?php _e('Turkish', 'easy-paypal-donation'); ?>
                            </option>
                            <option <?php if ($wpedon_button_language == "19") {
								echo "SELECTED";
							} ?> value="19"><?php _e('Thai', 'easy-paypal-donation'); ?>
                            </option>
                        </select>
                    </td>
                    <td><?php _e('Optional - Will override settings page value.', 'easy-paypal-donation'); ?></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td><br/></td>
                    <td></td>
                </tr>
                <tr>
                    <td><?php _e('Currency:', 'easy-paypal-donation'); ?></td>
                    <td>
                        <select name="wpedon_button_currency" style="width: 190px">
							<?php $wpedon_button_currency = get_post_meta($post_id, 'wpedon_button_currency', true); ?>
                            <option <?php if ($wpedon_button_currency == "0") {
								echo "SELECTED";
							} ?> value="0"><?php _e('Default Currency', 'easy-paypal-donation'); ?>
                            </option>
                            <option <?php if ($wpedon_button_currency == "1") {
								echo "SELECTED";
							} ?> value="1"><?php _e('Australian Dollar - AUD', 'easy-paypal-donation'); ?>
                            </option>
                            <option <?php if ($wpedon_button_currency == "2") {
								echo "SELECTED";
							} ?> value="2"><?php _e('Brazilian Real - BRL', 'easy-paypal-donation'); ?>
                            </option>
                            <option <?php if ($wpedon_button_currency == "3") {
								echo "SELECTED";
							} ?> value="3"><?php _e('Canadian Dollar - CAD', 'easy-paypal-donation'); ?>
                            </option>
                            <option <?php if ($wpedon_button_currency == "4") {
								echo "SELECTED";
							} ?> value="4"><?php _e('Czech Koruna - CZK', 'easy-paypal-donation'); ?>
                            </option>
                            <option <?php if ($wpedon_button_currency == "5") {
								echo "SELECTED";
							} ?> value="5"><?php _e('Danish Krone - DKK', 'easy-paypal-donation'); ?>
                            </option>
                            <option <?php if ($wpedon_button_currency == "6") {
								echo "SELECTED";
							} ?> value="6"><?php _e('Euro - EUR', 'easy-paypal-donation'); ?>
                            </option>
                            <option <?php if ($wpedon_button_currency == "7") {
								echo "SELECTED";
							} ?> value="7"><?php _e('Hong Kong Dollar - HKD', 'easy-paypal-donation'); ?>
                            </option>
                            <option <?php if ($wpedon_button_currency == "8") {
								echo "SELECTED";
							} ?> value="8"><?php _e('Hungarian Forint - HUF', 'easy-paypal-donation'); ?>
                            </option>
                            <option <?php if ($wpedon_button_currency == "9") {
								echo "SELECTED";
							} ?> value="9"><?php _e('Israeli New Sheqel - ILS', 'easy-paypal-donation'); ?>
                            </option>
                            <option <?php if ($wpedon_button_currency == "10") {
								echo "SELECTED";
							} ?> value="10"><?php _e('Japanese Yen - JPY', 'easy-paypal-donation'); ?>
                            </option>
                            <option <?php if ($wpedon_button_currency == "11") {
								echo "SELECTED";
							} ?> value="11"><?php _e('Malaysian Ringgit - MYR', 'easy-paypal-donation'); ?>
                            </option>
                            <option <?php if ($wpedon_button_currency == "12") {
								echo "SELECTED";
							} ?> value="12"><?php _e('Mexican Peso - MXN', 'easy-paypal-donation'); ?>
                            </option>
                            <option <?php if ($wpedon_button_currency == "13") {
								echo "SELECTED";
							} ?> value="13"><?php _e('Norwegian Krone - NOK', 'easy-paypal-donation'); ?>
                            </option>
                            <option <?php if ($wpedon_button_currency == "14") {
								echo "SELECTED";
							} ?> value="14"><?php _e('New Zealand Dollar - NZD', 'easy-paypal-donation'); ?>
                            </option>
                            <option <?php if ($wpedon_button_currency == "15") {
								echo "SELECTED";
							} ?> value="15"><?php _e('Philippine Peso - PHP', 'easy-paypal-donation'); ?>
                            </option>
                            <option <?php if ($wpedon_button_currency == "16") {
								echo "SELECTED";
							} ?> value="16"><?php _e('Polish Zloty - PLN', 'easy-paypal-donation'); ?>
                            </option>
                            <option <?php if ($wpedon_button_currency == "17") {
								echo "SELECTED";
							} ?> value="17"><?php _e('Pound Sterling - GBP', 'easy-paypal-donation'); ?>
                            </option>
                            <option <?php if ($wpedon_button_currency == "18") {
								echo "SELECTED";
							} ?> value="18"><?php _e('Russian Ruble - RUB', 'easy-paypal-donation'); ?>
                            </option>
                            <option <?php if ($wpedon_button_currency == "19") {
								echo "SELECTED";
							} ?> value="19"><?php _e('Singapore Dollar - SGD', 'easy-paypal-donation'); ?>
                            </option>
                            <option <?php if ($wpedon_button_currency == "20") {
								echo "SELECTED";
							} ?> value="20"><?php _e('Swedish Krona - SEK', 'easy-paypal-donation'); ?>
                            </option>
                            <option <?php if ($wpedon_button_currency == "21") {
								echo "SELECTED";
							} ?> value="21"><?php _e('Swiss Franc - CHF', 'easy-paypal-donation'); ?>
                            </option>
                            <option <?php if ($wpedon_button_currency == "22") {
								echo "SELECTED";
							} ?> value="22"><?php _e('Taiwan New Dollar - TWD', 'easy-paypal-donation'); ?>
                            </option>
                            <option <?php if ($wpedon_button_currency == "23") {
								echo "SELECTED";
							} ?> value="23"><?php _e('Thai Baht - THB', 'easy-paypal-donation'); ?>
                            </option>
                            <option <?php if ($wpedon_button_currency == "24") {
								echo "SELECTED";
							} ?> value="24"><?php _e('Turkish Lira - TRY', 'easy-paypal-donation'); ?>
                            </option>
                            <option <?php if ($wpedon_button_currency == "25") {
								echo "SELECTED";
							} ?> value="25"><?php _e('U.S. Dollar - USD', 'easy-paypal-donation'); ?>
                            </option>
                        </select>
                    </td>
                    <td><?php _e('Optional - Will override settings page value.', 'easy-paypal-donation'); ?></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td><br/></td>
                    <td></td>
                </tr>
                <tr>
                    <td><b><?php _e('PayPal', 'easy-paypal-donation'); ?></b></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr class="wpedon-product-connection-row">
                    <td>
                        <?php _e('PayPal Account:', 'easy-paypal-donation'); ?>
                    </td>
                    <td>
						<?php $ppcp = new \WPEasyDonation\Base\PpcpController();
						$ppcp->status_markup($post_id); ?>
                    </td>
                    <td> <?php _e('Optional - Will override settings page value.', 'easy-paypal-donation'); ?></td>
                </tr>
                <tr>
                    <td colspan="3">
                        <br/>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <b><?php _e('PayPal Payments Methods Accepted', 'easy-paypal-donation'); ?></b>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php _e('PayPal:', 'easy-paypal-donation'); ?>
                    </td>
                    <td>
						<?php $ppcp_funding_paypal = get_post_meta($post_id, 'ppcp_funding_paypal', true); ?>
                        <select name="ppcp_funding_paypal" class="wpedon-button-settings-select">
                            <option value="" <?php echo !in_array($ppcp_funding_paypal, ['0', '1']) ? 'selected' : ''; ?>>
                                <?php _e('Default Value', 'easy-paypal-donation'); ?>
                            </option>
                            <option value="1" <?php echo $ppcp_funding_paypal == '1' ? 'selected' : ''; ?>><?php _e('On', 'easy-paypal-donation'); ?></option>
                            <option value="0" <?php echo $ppcp_funding_paypal == '0' ? 'selected' : ''; ?>><?php _e('Off', 'easy-paypal-donation'); ?></option>
                        </select>
                    </td>
                    <td> <?php _e('Optional - Will override settings page value.', 'easy-paypal-donation'); ?></td>
                </tr>
                <tr>
                    <td>
                        <?php _e('PayPal PayLater:', 'easy-paypal-donation'); ?>
                    </td>
                    <td>
						<?php $ppcp_funding_paylater = get_post_meta($post_id, 'ppcp_funding_paylater', true); ?>
                        <select name="ppcp_funding_paylater" class="wpedon-button-settings-select">
                            <option value="" <?php echo !in_array($ppcp_funding_paylater, ['0', '1']) ? 'selected' : ''; ?>>
                                <?php _e('Default Value', 'easy-paypal-donation'); ?>
                            </option>
                            <option value="1" <?php echo $ppcp_funding_paylater == '1' ? 'selected' : ''; ?>><?php _e('On', 'easy-paypal-donation'); ?></option>
                            <option value="0" <?php echo $ppcp_funding_paylater == '0' ? 'selected' : ''; ?>><?php _e('Off', 'easy-paypal-donation'); ?>
                            </option>
                        </select>
                    </td>
                    <td> <?php _e('Optional - Will override settings page value.', 'easy-paypal-donation'); ?></td>
                </tr>
                <tr>
                    <td>
                        <?php _e('Venmo:', 'easy-paypal-donation'); ?>
                    </td>
                    <td>
						<?php $ppcp_funding_venmo = get_post_meta($post_id, 'ppcp_funding_venmo', true); ?>
                        <select name="ppcp_funding_venmo" class="wpedon-button-settings-select">
                            <option value="" <?php echo !in_array($ppcp_funding_venmo, ['0', '1']) ? 'selected' : ''; ?>>
                                <?php _e('Default Value', 'easy-paypal-donation'); ?>
                            </option>
                            <option value="1" <?php echo $ppcp_funding_venmo == '1' ? 'selected' : ''; ?>><?php _e('On', 'easy-paypal-donation'); ?></option>
                            <option value="0" <?php echo $ppcp_funding_venmo == '0' ? 'selected' : ''; ?>><?php _e('Off', 'easy-paypal-donation'); ?></option>
                        </select>
                    </td>
                    <td> <?php _e('Optional - Will override settings page value.', 'easy-paypal-donation'); ?></td>
                </tr>
                <tr>
                    <td>
                        <?php _e('Local Alternative Payment Methods:', 'easy-paypal-donation'); ?>
                    </td>
                    <td>
						<?php $ppcp_funding_alternative = get_post_meta($post_id, 'ppcp_funding_alternative', true); ?>
                        <select name="ppcp_funding_alternative" class="wpedon-button-settings-select">
                            <option value="" <?php echo !in_array($ppcp_funding_alternative, ['0', '1']) ? 'selected' : ''; ?>>
                                <?php _e('Default Value', 'easy-paypal-donation'); ?>
                            </option>
                            <option value="1" <?php echo $ppcp_funding_alternative == '1' ? 'selected' : ''; ?>><?php _e('On', 'easy-paypal-donation'); ?>
                            </option>
                            <option value="0" <?php echo $ppcp_funding_alternative == '0' ? 'selected' : ''; ?>><?php _e('Off', 'easy-paypal-donation'); ?>
                            </option>
                        </select>
                    </td>
                    <td> <?php _e('Optional - Will override settings page value.', 'easy-paypal-donation'); ?></td>
                </tr>
                <tr>
                    <td>
                        <?php _e('Credit & Debit Cards:', 'easy-paypal-donation'); ?>
                    </td>
                    <td>
						<?php $ppcp_funding_cards = get_post_meta($post_id, 'ppcp_funding_cards', true); ?>
                        <select name="ppcp_funding_cards" class="wpedon-button-settings-select">
                            <option value="" <?php echo !in_array($ppcp_funding_cards, ['0', '1']) ? 'selected' : ''; ?>>
                                <?php _e('Default Value', 'easy-paypal-donation'); ?>
                            </option>
                            <option value="1" <?php echo $ppcp_funding_cards == '1' ? 'selected' : ''; ?>><?php _e('On', 'easy-paypal-donation'); ?></option>
                            <option value="0" <?php echo $ppcp_funding_cards == '0' ? 'selected' : ''; ?>><?php _e('Off', 'easy-paypal-donation'); ?></option>

                        </select>
                    </td>
                    <td> <?php _e('Optional - Will override settings page value.', 'easy-paypal-donation'); ?></td>
                </tr>
                <tr>
                    <td>
                        <?php _e('Advanced Credit & Debit Cards (ACDC):', 'easy-paypal-donation'); ?>
                    </td>
                    <td>
						<?php $ppcp_funding_advanced_cards = get_post_meta($post_id, 'ppcp_funding_advanced_cards', true); ?>
                        <select name="ppcp_funding_advanced_cards" class="wpedon-button-settings-select">
                            <option value="" <?php echo !in_array($ppcp_funding_advanced_cards, ['0', '1']) ? 'selected' : ''; ?>>
                                <?php _e('Default Value', 'easy-paypal-donation'); ?>
                            </option>
                            <option value="1" <?php echo $ppcp_funding_advanced_cards == '1' ? 'selected' : ''; ?>><?php _e('On', 'easy-paypal-donation'); ?>
                            </option>
                            <option value="0" <?php echo $ppcp_funding_advanced_cards == '0' ? 'selected' : ''; ?>><?php _e('Off', 'easy-paypal-donation'); ?>
                            </option>
                        </select>
                    </td>
                    <td> <?php _e('Optional - Will override settings page value.', 'easy-paypal-donation'); ?></td>
                </tr>
                <tr>
                    <td>
                        <?php _e('ACDC Button text:', 'easy-paypal-donation'); ?>
                    </td>
                    <td>
                        <input type="text" name="wpedon_button_ppcp_acdc_button_text"
                               value="<?php echo get_post_meta($post_id, 'wpedon_button_ppcp_acdc_button_text', true); ?>"/>
                    </td>
                    <td> <?php _e('Optional - Will override settings page value.', 'easy-paypal-donation'); ?></td>
                </tr>
                <tr>
                    <td colspan="3">
                        <br/>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <b><?php _e('PayPal Checkout Buttons', 'easy-paypal-donation'); ?></b>
                    </td>
                </tr>

                <tr>
                    <td>
                        <?php _e('Layout:', 'easy-paypal-donation'); ?>
                    </td>
                    <td>
						<?php $ppcp_layout = get_post_meta($post_id, 'ppcp_layout', true); ?>
                        <select name="ppcp_layout" class="wpedon-button-settings-select">
                            <option value="" <?php echo !in_array($ppcp_layout, ['horizontal', 'vertical']) ? 'selected' : ''; ?>>
                                <?php _e('Default Value', 'easy-paypal-donation'); ?>
                            </option>
                            <option value="horizontal" <?php echo $ppcp_layout == 'horizontal' ? 'selected' : ''; ?>>
                                <?php _e('Horizontal', 'easy-paypal-donation'); ?>
                            </option>
                            <option value="vertical" <?php echo $ppcp_layout == 'vertical' ? 'selected' : ''; ?>>
                                <?php _e('Vertical', 'easy-paypal-donation'); ?>
                            </option>
                        </select>
                    </td>
                    <td> <?php _e('Optional - Will override settings page value.', 'easy-paypal-donation'); ?></td>
                </tr>
                <tr>
                    <td>
                        <?php _e('Color:', 'easy-paypal-donation'); ?>
                    </td>
                    <td>
						<?php $ppcp_color = get_post_meta($post_id, 'ppcp_color', true); ?>
                        <select name="ppcp_color" class="wpedon-button-settings-select">
                            <option value="" <?php echo !in_array($ppcp_color, ['gold', 'blue', 'black', 'silver', 'white']) ? 'selected' : ''; ?>>
                                <?php _e('Default Value', 'easy-paypal-donation'); ?>
                            </option>
                            <option value="gold" <?php echo $ppcp_color == 'gold' ? 'selected' : ''; ?>><?php _e('Gold', 'easy-paypal-donation'); ?></option>
                            <option value="blue" <?php echo $ppcp_color == 'blue' ? 'selected' : ''; ?>><?php _e('Blue', 'easy-paypal-donation'); ?></option>
                            <option value="black" <?php echo $ppcp_color == 'black' ? 'selected' : ''; ?>><?php _e('Black', 'easy-paypal-donation'); ?></option>
                            <option value="silver" <?php echo $ppcp_color == 'silver' ? 'selected' : ''; ?>><?php _e('Silver', 'easy-paypal-donation'); ?>
                            </option>
                            <option value="white" <?php echo $ppcp_color == 'white' ? 'selected' : ''; ?>><?php _e('White', 'easy-paypal-donation'); ?></option>
                        </select>
                    </td>
                    <td> <?php _e('Optional - Will override settings page value.', 'easy-paypal-donation'); ?></td>
                </tr>
                <tr>
                    <td>
                        <?php _e('Shape:', 'easy-paypal-donation'); ?>
                    </td>
                    <td>
						<?php $ppcp_shape = get_post_meta($post_id, 'ppcp_shape', true); ?>
                        <select name="ppcp_shape" class="wpedon-button-settings-select">
                            <option value="" <?php echo !in_array($ppcp_shape, ['rect', 'pill']) ? 'selected' : ''; ?>>
                                <?php _e('Default Value', 'easy-paypal-donation'); ?>
                            </option>
                            <option value="rect" <?php echo $ppcp_shape == 'rect' ? 'selected' : ''; ?>><?php _e('Rectangle', 'easy-paypal-donation'); ?>
                            </option>
                            <option value="pill" <?php echo $ppcp_shape == 'pill' ? 'selected' : ''; ?>><?php _e('Pill', 'easy-paypal-donation'); ?></option>
                        </select>
                    </td>
                    <td> <?php _e('Optional - Will override settings page value.', 'easy-paypal-donation'); ?></td>
                </tr>
                <tr>
                    <td>
                        <?php _e('Height:', 'easy-paypal-donation'); ?>
                    </td>
                    <td>
                        <input type="number" name="ppcp_height"
                               value="<?php echo get_post_meta($post_id, 'ppcp_height', true); ?>" min="25" max="55"/>
                        <br/>
                        <?php _e('25 - 55, a value around 40 is recommended', 'easy-paypal-donation'); ?>
                        &nbsp;
                        &nbsp;
                    </td>
                    <td> <?php _e('Optional - Will override settings page value.', 'easy-paypal-donation'); ?></td>
                </tr>
                <tr>
                    <td>
                        <?php _e('PayPal buttons width:', 'easy-paypal-donation'); ?>
                    </td>
                    <td>
                        <input type="number" name="wpedon_button_ppcp_width"
                               value="<?php echo get_post_meta($post_id, 'wpedon_button_ppcp_width', true); ?>"/>
                        <br/>
                        <?php _e('Max buttons width in pixels', 'easy-paypal-donation'); ?>
                        &nbsp;
                        &nbsp;
                    </td>
                    <td> <?php _e('Optional - Will override settings page value.', 'easy-paypal-donation'); ?></td>
                </tr>
                <tr>
                    <td><?php _e('PayPal Sandbox Mode:', 'easy-paypal-donation'); ?></td>
					<?php $paypal_mode = get_post_meta($post_id, '_wpedon_paypal_mode', true); ?>
                    <td id="paypal-mode">
                        <select name="mode" class="wpedon-button-settings-select">
                            <option value="" <?php echo !in_array($paypal_mode, ['1', '2']) ? 'selected' : ''; ?>>
                                <?php _e('Default Value', 'easy-paypal-donation'); ?>
                            </option>
                            <option value="1" <?php echo $paypal_mode == '1' ? 'selected' : ''; ?>><?php _e('On (Sandbox mode)', 'easy-paypal-donation'); ?>
                            </option>
                            <option value="2" <?php echo $paypal_mode == '2' ? 'selected' : ''; ?>><?php _e('Off (Live mode)', 'easy-paypal-donation'); ?>
                            </option>
                        </select>
                    </td>
                    <td> <?php _e('Optional - Will override settings page value.', 'easy-paypal-donation'); ?></td>
                </tr>
                <tr>
                    <td colspan="3">
                        <br/>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <b><?php _e('Stripe', 'easy-paypal-donation'); ?></b>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php _e('Disable Stripe:', 'easy-paypal-donation'); ?>
                    </td>
                    <td>
						<?php $disable_stripe = get_post_meta($post_id, 'wpedon_button_disable_stripe', true); ?>
                        <select name="wpedon_button_disable_stripe" class="wpedon-button-settings-select">
                            <option value="0" <?php if ($disable_stripe == "0") {
								echo "selected";
							} ?>><?php _e('Default Value', 'easy-paypal-donation'); ?>
                            </option>
                            <option value="1" <?php if ($disable_stripe == "1") {
								echo "selected";
							} ?>><?php _e('No', 'easy-paypal-donation'); ?>
                            </option>
                            <option value="2" <?php if ($disable_stripe == "2") {
								echo "selected";
							} ?>><?php _e('Yes', 'easy-paypal-donation'); ?>
                            </option>
                        </select>
                    </td>
                    <td> <?php _e('Optional - Will override settings page value.', 'easy-paypal-donation'); ?></td>
                </tr>
                <tr class="wpedon-product-connection-row">
                    <td><?php _e('Stripe Account:', 'easy-paypal-donation'); ?></td>
                    <td id="stripe-connection-status-html">
						<?php
						$stripe = new \WPEasyDonation\Base\Stripe();
						echo $stripe->connection_status_html($post_id);
						?></td>
                    <td><?php _e('Optional - Will override settings page value.', 'easy-paypal-donation'); ?></td>
                </tr>
                <tr class="wpedon-product-connection-row">
                    <td>
                        <?php _e('Stripe button width:', 'easy-paypal-donation'); ?>
                    </td>
                    <td>
                        <input type="number" name="wpedon_button_stripe_width"
                               value="<?php echo get_post_meta($post_id, 'wpedon_button_stripe_width', true); ?>"/>
                        <br/>
                        <?php _e('Max buttons width in pixels', 'easy-paypal-donation'); ?>
                        &nbsp;
                        &nbsp;
                    </td>
                    <td> <?php _e('Optional - Will override settings page value.', 'easy-paypal-donation'); ?></td>
                </tr>
                <tr class="wpedon-product-connection-row" data-id="<?php echo $post_id; ?>">
                    <td><?php _e('Stripe Sandbox Mode:', 'easy-paypal-donation'); ?></td>
					<?php $stripe_mode = get_post_meta($post_id, '_wpedon_stripe_mode', true); ?>
                    <td>
                        <select name="mode_stripe" class="wpedon-button-settings-select">
                            <option value="" <?php echo !in_array($stripe_mode, ['1', '2']) ? 'selected' : ''; ?>>
                                <?php _e('Default Value', 'easy-paypal-donation'); ?>
                            </option>
                            <option value="1" <?php echo $stripe_mode == '1' ? 'selected' : ''; ?>><?php _e('On (Sandbox mode)', 'easy-paypal-donation'); ?>
                            </option>
                            <option value="2" <?php echo $stripe_mode == '2' ? 'selected' : ''; ?>><?php _e('Off (Live mode)', 'easy-paypal-donation'); ?>
                            </option>
                        </select>
                    </td>
                    <td> <?php _e('Optional - Will override settings page value.', 'easy-paypal-donation'); ?></td>
                </tr>
				<tr>
					<td><b><?php _e('Other', 'easy-paypal-donation'); ?></b></td>
					<td></td>
					<td></td>
				</tr>
                <tr>
                    <td><?php _e('Return URL:', 'easy-paypal-donation'); ?></td>
                    <td>
                        <input type="text" name="wpedon_button_return"
                               value="<?php echo esc_attr(get_post_meta($post_id, 'wpedon_button_return', true)); ?>">
                    </td>
                    <td><?php _e('Optional - Will override settings page value. ', 'easy-paypal-donation'); ?><br/>
<?php _e('Example: ', 'easy-paypal-donation'); ?><?php echo $siteurl; ?>/<?php _e('thankyou', 'easy-paypal-donation'); ?></td>
                </tr>
                <tr>
                    <td><?php _e('Show Purpose / Name:', 'easy-paypal-donation'); ?></td>
                    <td>
                        <input type="checkbox" name="wpedon_button_enable_name"
                               value="1" <?php if (get_post_meta($post_id, 'wpedon_button_enable_name', true) == "1") {
							echo "CHECKED";
						} ?>>
                    </td>
                    <td><?php _e('Optional - Show the purpose / name above the button.', 'easy-paypal-donation'); ?></td>
                </tr>
                <tr>
                    <td><?php _e('Show Donation Amount:', 'easy-paypal-donation'); ?></td>
                    <td>
                        <input type="checkbox" name="wpedon_button_enable_price"
                               value="1" <?php if (get_post_meta($post_id, 'wpedon_button_enable_price', true) == "1") {
							echo "CHECKED";
						} ?>>
                    </td>
                    <td><?php _e('Optional - Show the donation amount above the button.', 'easy-paypal-donation'); ?></td>
                </tr>
                <tr>
                    <td><?php _e('Show Currency:', 'easy-paypal-donation'); ?></td>
                    <td>
                        <input type="checkbox" name="wpedon_button_enable_currency"
                               value="1" <?php if (get_post_meta($post_id, 'wpedon_button_enable_currency', true) == "1") {
							echo "CHECKED";
						} ?>>
                    </td>
                    <td><?php _e('Optional - Show the currency (example: USD) after the amount.', 'easy-paypal-donation'); ?></td>
                </tr>
				
		        <tr>
                    <td><?php _e('Donation Amount Text:', 'easy-paypal-donation'); ?></td>
                    <td>
                        <input type="text" name="wpedon_button_donation_text"
                               value="<?php echo esc_attr(get_post_meta($post_id, 'wpedon_button_donation_text', true)); ?>">
                    </td>
                    <td><?php _e('Optional - Text for manual donation amounts. Default: Donation Amount', 'easy-paypal-donation'); ?></td>
                </tr>		

                <tr>
                    <td></td>
                    <td><br/></td>
                    <td></td>
                </tr>
				<?php if (get_post_meta($post_id, 'wpedon_button_account', true)): ?>
                    <tr>
                        <td colspan="3">
                            <b><?php _e('PayPal Standard', 'easy-paypal-donation'); ?> (<?php _e('is now deprecated', 'easy-paypal-donation'); ?>)</b>
                        </td>
                    </tr>
                    <tr>
                        <td><?php _e('PayPal Standard:', 'easy-paypal-donation'); ?></td>
                        <td>
                            <input readonly type="text" name="wpedon_button_account"
                                   value="<?php echo esc_attr(get_post_meta($post_id, 'wpedon_button_account', true)); ?>">
                        </td>
                        <td><?php _e('PayPal Standard is now deprecated. You cannot modify your Standard settings. We highly recommend using PayPal Commerce.', 'easy-paypal-donation'); ?></td>
                    </tr>
                    <tr>
                        <td><?php _e('PayPal Button Size:', 'easy-paypal-donation'); ?></td>
                        <td>
                            <select name="wpedon_button_buttonsize" style="width:190px;">
								<?php $wpedon_button_buttonsize = get_post_meta($post_id, 'wpedon_button_buttonsize', true); ?>
                                <option value="0" <?php if ($wpedon_button_buttonsize == "0") {
									echo "SELECTED";
								} ?>><?php _e('Default Button', 'easy-paypal-donation'); ?>
                                </option>
                                <option value="1" <?php if ($wpedon_button_buttonsize == "1") {
									echo "SELECTED";
								} ?>><?php _e('Small', 'easy-paypal-donation'); ?>
                                </option>
                                <option value="2" <?php if ($wpedon_button_buttonsize == "2") {
									echo "SELECTED";
								} ?>><?php _e('Big', 'easy-paypal-donation'); ?>
                                </option>
                                <option value="3" <?php if ($wpedon_button_buttonsize == "3") {
									echo "SELECTED";
								} ?>><?php _e('Big with Credit Cards', 'easy-paypal-donation'); ?>
                                </option>
                                <option value="4" <?php if ($wpedon_button_buttonsize == "4") {
									echo "SELECTED";
								} ?>><?php _e('Small 2 (English only)', 'easy-paypal-donation'); ?>
                                </option>
                                <option value="5" <?php if ($wpedon_button_buttonsize == "5") {
									echo "SELECTED";
								} ?>><?php _e('Big 2 (English only)', 'easy-paypal-donation'); ?>
                                </option>
                                <option value="6" <?php if ($wpedon_button_buttonsize == "6") {
									echo "SELECTED";
								} ?>><?php _e('Big 2 with Credit Cards (English only)', 'easy-paypal-donation'); ?>
                                </option>
                                <option value="7" <?php if ($wpedon_button_buttonsize == "7") {
									echo "SELECTED";
								} ?>><?php _e('Big 3 with logo (English only)', 'easy-paypal-donation'); ?>
                                </option>
                                <option value="8" <?php if ($wpedon_button_buttonsize == "8") {
									echo "SELECTED";
								} ?>><?php _e('Custom', 'easy-paypal-donation'); ?>
                                </option>
                            </select>
                        </td>
                        <td> <?php _e('Optional - Will override settings page value.', 'easy-paypal-donation'); ?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><br/></td>
                        <td></td>
                    </tr>
				<?php endif; ?>
                <tr>
                    <td><b><?php _e('Dropdown Menu', 'easy-paypal-donation'); ?> <br/><br/></b></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td><?php _e('Amount Dropdown Menu:', 'easy-paypal-donation'); ?></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td colspan="3">
                        <table>
                            <tr>
                                <td>
                                    <?php _e('Amount Menu Name:', 'easy-paypal-donation'); ?> &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;
                                </td>
                                <td>
                                    <input type="text" name="wpedon_button_scpriceprice" id="wpedon_button_scpriceprice"
                                           value="<?php echo esc_attr(get_post_meta($post_id, 'wpedon_button_scpriceprice', true)); ?>">
                                </td>
                                <td><?php _e('Optional, but required to show menu - show an amount dropdown menu.', 'easy-paypal-donation'); ?></td>
                            </tr>
                            <tr>
                                <td><?php _e('Option / Amount 1:', 'easy-paypal-donation'); ?></td>
                                <td>
                                    <input type="text" name="wpedon_button_scpriceaname" id="wpedon_button_scpriceaname"
                                           value="<?php echo esc_attr(get_post_meta($post_id, 'wpedon_button_scpriceaname', true)); ?>"
                                           style="width:94px;">
                                    <input style="width:93px;" type="text" name="wpedon_button_scpricea"
                                           id="wpedon_button_scpricea"
                                           value="<?php echo esc_attr(get_post_meta($post_id, 'wpedon_button_scpricea', true)); ?>">
                                </td>
                                <td><?php _e('Optional - Example Option: Size Medium Example Amount: 5.00', 'easy-paypal-donation'); ?></td>
                            </tr>
                            <tr>
                                <td><?php _e('Option / Amount 2:', 'easy-paypal-donation'); ?></td>
                                <td>
                                    <input type="text" name="wpedon_button_scpricebname" id="wpedon_button_scpricebname"
                                           value="<?php echo esc_attr(get_post_meta($post_id, 'wpedon_button_scpricebname', true)); ?>"
                                           style="width:94px;">
                                    <input style="width:93px;" type="text" name="wpedon_button_scpriceb"
                                           id="wpedon_button_scpriceb"
                                           value="<?php echo esc_attr(get_post_meta($post_id, 'wpedon_button_scpriceb', true)); ?>">
                                </td>
                                <td><?php _e('Optional', 'easy-paypal-donation'); ?></td>
                            </tr>
                            <tr>
                                <td><?php _e('Option / Amount 3:', 'easy-paypal-donation'); ?></td>
                                <td>
                                    <input type="text" name="wpedon_button_scpricecname" id="wpedon_button_scpricecname"
                                           value="<?php echo esc_attr(get_post_meta($post_id, 'wpedon_button_scpricecname', true)); ?>"
                                           style="width:94px;">
                                    <input style="width:93px;" type="text" name="wpedon_button_scpricec"
                                           id="wpedon_button_scpricec"
                                           value="<?php echo esc_attr(get_post_meta($post_id, 'wpedon_button_scpricec', true)); ?>">
                                </td>
                                <td><?php _e('Optional', 'easy-paypal-donation'); ?></td>
                            </tr>
                            <tr>
                                <td><?php _e('Option / Amount 4:', 'easy-paypal-donation'); ?></td>
                                <td>
                                    <input type="text" name="wpedon_button_scpricedname" id="wpedon_button_scpricedname"
                                           value="<?php echo esc_attr(get_post_meta($post_id, 'wpedon_button_scpricedname', true)); ?>"
                                           style="width:94px;">
                                    <input style="width:93px;" type="text" name="wpedon_button_scpriced"
                                           id="wpedon_button_scpriced"
                                           value="<?php echo esc_attr(get_post_meta($post_id, 'wpedon_button_scpriced', true)); ?>">
                                </td>
                                <td><?php _e('Optional', 'easy-paypal-donation'); ?></td>
                            </tr>
                            <tr>
                                <td><?php _e('Option / Amount 5:', 'easy-paypal-donation'); ?></td>
                                <td>
                                    <input type="text" name="wpedon_button_scpriceename" id="wpedon_button_scpriceename"
                                           value="<?php echo esc_attr(get_post_meta($post_id, 'wpedon_button_scpriceename', true)); ?>"
                                           style="width:94px;">
                                    <input style="width:93px;" type="text" name="wpedon_button_scpricee"
                                           id="wpedon_button_scpricee"
                                           value="<?php echo esc_attr(get_post_meta($post_id, 'wpedon_button_scpricee', true)); ?>">
                                </td>
                                <td><?php _e('Optional', 'easy-paypal-donation'); ?></td>
                            </tr>
                            <tr>
                                <td><?php _e('Option / Amount 6:', 'easy-paypal-donation'); ?></td>
                                <td>
                                    <input type="text" name="wpedon_button_scpricefname" id="wpedon_button_scpricefname"
                                           value="<?php echo esc_attr(get_post_meta($post_id, 'wpedon_button_scpricefname', true)); ?>"
                                           style="width:94px;">
                                    <input style="width:93px;" type="text" name="wpedon_button_scpricef"
                                           id="wpedon_button_scpricef"
                                           value="<?php echo esc_attr(get_post_meta($post_id, 'wpedon_button_scpricef', true)); ?>">
                                </td>
                                <td><?php _e('Optional', 'easy-paypal-donation'); ?></td>
                            </tr>
                            <tr>
                                <td><?php _e('Option / Amount 7:', 'easy-paypal-donation'); ?></td>
                                <td>
                                    <input type="text" name="wpedon_button_scpricegname" id="wpedon_button_scpricegname"
                                           value="<?php echo esc_attr(get_post_meta($post_id, 'wpedon_button_scpricegname', true)); ?>"
                                           style="width:94px;">
                                    <input style="width:93px;" type="text" name="wpedon_button_scpriceg"
                                           id="wpedon_button_scpriceg"
                                           value="<?php echo esc_attr(get_post_meta($post_id, 'wpedon_button_scpriceg', true)); ?>">
                                </td>
                                <td><?php _e('Optional', 'easy-paypal-donation'); ?></td>
                            </tr>
                            <tr>
                                <td><?php _e('Option / Amount 8:', 'easy-paypal-donation'); ?></td>
                                <td>
                                    <input type="text" name="wpedon_button_scpricehname" id="wpedon_button_scpricehname"
                                           value="<?php echo esc_attr(get_post_meta($post_id, 'wpedon_button_scpricehname', true)); ?>"
                                           style="width:94px;">
                                    <input style="width:93px;" type="text" name="wpedon_button_scpriceh"
                                           id="wpedon_button_scpriceh"
                                           value="<?php echo esc_attr(get_post_meta($post_id, 'wpedon_button_scpriceh', true)); ?>">
                                </td>
                                <td><?php _e('Optional', 'easy-paypal-donation'); ?></td>
                            </tr>
                            <tr>
                                <td><?php _e('Option / Amount 9:', 'easy-paypal-donation'); ?></td>
                                <td>
                                    <input type="text" name="wpedon_button_scpriceiname" id="wpedon_button_scpriceiname"
                                           value="<?php echo esc_attr(get_post_meta($post_id, 'wpedon_button_scpriceiname', true)); ?>"
                                           style="width:94px;">
                                    <input style="width:93px;" type="text" name="wpedon_button_scpricei"
                                           id="wpedon_button_scpricei"
                                           value="<?php echo esc_attr(get_post_meta($post_id, 'wpedon_button_scpricei', true)); ?>">
                                </td>
                                <td> <?php _e('Optional', 'easy-paypal-donation'); ?></td>
                            </tr>
                            <tr>
                                <td><?php _e('Option / Amount 10:', 'easy-paypal-donation'); ?></td>
                                <td>
                                    <input type="text" name="wpedon_button_scpricejname" id="wpedon_button_scpricejname"
                                           value="<?php echo esc_attr(get_post_meta($post_id, 'wpedon_button_scpricejname', true)); ?>"
                                           style="width:94px;">
                                    <input style="width:93px;" type="text" name="wpedon_button_scpricej"
                                           id="wpedon_button_scpricej"
                                           value="<?php echo esc_attr(get_post_meta($post_id, 'wpedon_button_scpricej', true)); ?>">
                                </td>
                                <td> <?php _e('Optional', 'easy-paypal-donation'); ?></td>
                            </tr>
                        </table>
						<?php wp_nonce_field('edit_' . $post_id); ?>
                        <input type="hidden" name="update">
                    </td>
                </tr>
            </table>
        </div>
    </form>
</div>