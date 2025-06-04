<div style="width:98%;">
	<form method='post'>
		<table width="100%">
			<tr>
				<td valign="bottom" width="85%">
					<br/>
					<span style="font-size:20pt;"><?php _e('New Donation Button', 'easy-paypal-donation'); ?></span>
				</td>
				<td valign="bottom">
					<input type="submit" class="button-primary" style="font-size: 14px;height: 30px;float: right;"
					       value="<?php _e('Save PayPal & Stripe Donation Button', 'easy-paypal-donation'); ?>">
				</td>
				<td valign="bottom">
					<a href="<?= get_admin_url(null, 'admin.php?page=wpedon_buttons'); ?>" class="button-secondary"
					   style="font-size: 14px;height: 30px;float: right;"><?php _e('Cancel', 'easy-paypal-donation'); ?></a>
				</td>
			</tr>
		</table>
		<!--Errors-->
		<?php if (isset($args['error']) && isset($args['message'])): ?>
			<div class='error'><p><?= $args['message']; ?></p></div>
		<?php endif; ?>
		<br/>
		<div style="background-color:#fff;padding:8px;border: 1px solid #CCCCCC;"><br/>
			<table>
				<tr>
					<td><b><?php _e('Main', 'easy-paypal-donation'); ?></b></td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td>
						<?php _e('Purpose / Name:', 'easy-paypal-donation'); ?>
					</td>
					<td>
						<input type="text" required name="wpedon_button_name" value="<?php if (isset($_POST['wpedon_button_name'])) {echo esc_attr($_POST['wpedon_button_name']);}?>">
					</td>
					<td><?php _e('The purpose of the donation. If blank, customer enters purpose.', 'easy-paypal-donation'); ?></td>
				</tr>
                <tr>
                    <td>
                        <?php _e('Donation Amount Type:', 'easy-paypal-donation'); ?>
                    </td>
                    <td>
                        <label>
                            <input type="radio" name="wpedon_button_price_type" value="fixed" checked /> <?php _e('Fixed value', 'easy-paypal-donation'); ?>
                        </label>

                        <label>
                            <input type="radio" name="wpedon_button_price_type" value="manual" /> <?php _e('Manual entry', 'easy-paypal-donation'); ?>
                        </label>
                    </td>
                    <td></td>
                </tr>
				<tr>
					<td>
						<?php _e('Donation Amount', 'easy-paypal-donation'); ?><span id="wpedon-amount-label" style="display:none;"><?php _e(' (default)', 'easy-paypal-donation'); ?></span>:
					</td>
					<td>
						<input type="number" required name="wpedon_button_price" value="<?php if (isset($_POST['wpedon_button_price'])) {echo esc_attr($_POST['wpedon_button_price']);}?>">
					</td>
					<td>
						<?php _e('Required - Example format: 6.99', 'easy-paypal-donation'); ?> <b><u><?php _e('Minimum amount for PayPal & Stripe is $1.00', 'easy-paypal-donation'); ?></u></b> <?php _e('If using dropdown fields, enter 1.00', 'easy-paypal-donation'); ?> 
					</td>
				</tr>
				<tr>
					<td>
						<?php _e('Donation ID:', 'easy-paypal-donation'); ?>
					</td>
					<td>
						<input type="text" name="wpedon_button_id" value="<?php if (isset($_POST['wpedon_button_id'])) {echo esc_attr($_POST['wpedon_button_id']);} ?>">
					</td>
					<td>
						<?php _e('Optional - Example: S12T-Gec-RS.', 'easy-paypal-donation'); ?>
					</td>
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
					<td>
						<b><?php _e('Language:', 'easy-paypal-donation'); ?></b>
					</td>
					<td>
						<select name="wpedon_button_language" style="width: 190px">
							<?php $wpedon_button_language = isset($_POST['wpedon_button_language']) ? sanitize_text_field($_POST['wpedon_button_language']) : -1; ?>
							<option <?php if ($wpedon_button_language == "0") { echo "SELECTED";} ?> value="0"><?php _e('Default Language', 'easy-paypal-donation'); ?></option>
							<option <?php if ($wpedon_button_language == "1") { echo "SELECTED";} ?> value="1"><?php _e('Danish', 'easy-paypal-donation'); ?></option>
							<option <?php if ($wpedon_button_language == "2") { echo "SELECTED"; } ?> value="2"><?php _e('Dutch', 'easy-paypal-donation'); ?></option>
							<option <?php if ($wpedon_button_language == "3") { echo "SELECTED"; } ?> value="3"><?php _e('English', 'easy-paypal-donation'); ?></option>
							<option <?php if ($wpedon_button_language == "20") { echo "SELECTED"; } ?> value="20"><?php _e('English - UK', 'easy-paypal-donation'); ?></option>
							<option <?php if ($wpedon_button_language == "4") {  echo "SELECTED"; } ?> value="4"><?php _e('French', 'easy-paypal-donation'); ?></option>
							<option <?php if ($wpedon_button_language == "5") { echo "SELECTED"; } ?> value="5"><?php _e('German', 'easy-paypal-donation'); ?></option>
							<option <?php if ($wpedon_button_language == "6") { echo "SELECTED"; } ?> value="6"><?php _e('Hebrew', 'easy-paypal-donation'); ?></option>
							<option <?php if ($wpedon_button_language == "7") { echo "SELECTED"; } ?> value="7"><?php _e('Italian', 'easy-paypal-donation'); ?></option>
							<option <?php if ($wpedon_button_language == "8") { echo "SELECTED"; } ?> value="8"><?php _e('Japanese', 'easy-paypal-donation'); ?></option>
							<option <?php if ($wpedon_button_language == "9") { echo "SELECTED"; } ?> value="9"><?php _e('Norwegian', 'easy-paypal-donation'); ?></option>
							<option <?php if ($wpedon_button_language == "10") { echo "SELECTED"; } ?> value="10"><?php _e('Polish', 'easy-paypal-donation'); ?></option>
							<option <?php if ($wpedon_button_language == "11") { echo "SELECTED";} ?> value="11"><?php _e('Portuguese', 'easy-paypal-donation'); ?></option>
							<option <?php if ($wpedon_button_language == "12") { echo "SELECTED"; } ?> value="12"><?php _e('Russian', 'easy-paypal-donation'); ?></option>
							<option <?php if ($wpedon_button_language == "13") { echo "SELECTED"; } ?> value="13"><?php _e('Spanish', 'easy-paypal-donation'); ?></option>
							<option <?php if ($wpedon_button_language == "14") { echo "SELECTED"; } ?> value="14"><?php _e('Swedish', 'easy-paypal-donation'); ?></option>
							<option <?php if ($wpedon_button_language == "15") { echo "SELECTED"; } ?> value="15"><?php _e('Simplified Chinese -China only', 'easy-paypal-donation'); ?></option>
							<option <?php if ($wpedon_button_language == "16") { echo "SELECTED"; } ?> value="16"><?php _e('Traditional Chinese - Hong Kong only', 'easy-paypal-donation'); ?></option>
							<option <?php if ($wpedon_button_language == "17") { echo "SELECTED"; } ?> value="17"><?php _e('Traditional Chinese - Taiwan only', 'easy-paypal-donation'); ?></option>
							<option <?php if ($wpedon_button_language == "18") { echo "SELECTED"; } ?> value="18"><?php _e('Turkish', 'easy-paypal-donation'); ?></option>
							<option <?php if ($wpedon_button_language == "19") { echo "SELECTED"; } ?> value="19"><?php _e('Thai', 'easy-paypal-donation'); ?></option>
						</select>
					</td>
					<td><?php _e('Optional - Will override settings page value.', 'easy-paypal-donation'); ?></td>
					<td></td>
				</tr>
				<tr>
					<td>
					</td>
					<td><br/></td>
					<td></td>
				</tr>
				<tr>
					<td><b><?php _e('Currency:', 'easy-paypal-donation'); ?></b></td>
					<td>
						<select name="wpedon_button_currency" style="width: 190px">
							<?php $wpedon_button_currency = isset($_POST['wpedon_button_currency']) ? sanitize_text_field($_POST['wpedon_button_currency']) : -1; ?>
							<option <?php if($wpedon_button_currency == "0") { echo "SELECTED"; } ?> value="0"><?php _e('Default Currency', 'easy-paypal-donation'); ?></option>
							<option <?php if($wpedon_button_currency == "1") { echo "SELECTED"; } ?> value="1"><?php _e('Australian Dollar - AUD', 'easy-paypal-donation'); ?></option>
							<option <?php if($wpedon_button_currency == "2") { echo "SELECTED"; } ?> value="2"><?php _e('Brazilian Real - BRL', 'easy-paypal-donation'); ?></option>
							<option <?php if($wpedon_button_currency == "3") { echo "SELECTED"; } ?> value="3"><?php _e('Canadian Dollar - CAD', 'easy-paypal-donation'); ?></option>
							<option <?php if($wpedon_button_currency == "4") { echo "SELECTED"; } ?> value="4"><?php _e('Czech Koruna - CZK', 'easy-paypal-donation'); ?></option>
							<option <?php if($wpedon_button_currency == "5") { echo "SELECTED"; } ?> value="5"><?php _e('Danish Krone - DKK', 'easy-paypal-donation'); ?></option>
							<option <?php if($wpedon_button_currency == "6") { echo "SELECTED"; } ?> value="6"><?php _e('Euro - EUR', 'easy-paypal-donation'); ?></option>
							<option <?php if($wpedon_button_currency == "7") { echo "SELECTED"; } ?> value="7"><?php _e('Hong Kong Dollar - HKD', 'easy-paypal-donation'); ?></option>
							<option <?php if($wpedon_button_currency == "8") { echo "SELECTED"; } ?> value="8"><?php _e('Hungarian Forint - HUF', 'easy-paypal-donation'); ?></option>
							<option <?php if($wpedon_button_currency == "9") { echo "SELECTED"; } ?> value="9"><?php _e('Israeli New Sheqel - ILS', 'easy-paypal-donation'); ?></option>
							<option <?php if($wpedon_button_currency == "10") { echo "SELECTED"; } ?> value="10"><?php _e('Japanese Yen - JPY', 'easy-paypal-donation'); ?></option>
							<option <?php if($wpedon_button_currency == "11") { echo "SELECTED"; } ?> value="11"><?php _e('Malaysian Ringgit - MYR', 'easy-paypal-donation'); ?></option>
							<option <?php if($wpedon_button_currency == "12") { echo "SELECTED"; } ?> value="12"><?php _e('Mexican Peso - MXN', 'easy-paypal-donation'); ?></option>
							<option <?php if($wpedon_button_currency == "13") { echo "SELECTED"; } ?> value="13"><?php _e('Norwegian Krone - NOK', 'easy-paypal-donation'); ?></option>
							<option <?php if($wpedon_button_currency == "14") { echo "SELECTED"; } ?> value="14"><?php _e('New Zealand Dollar - NZD', 'easy-paypal-donation'); ?></option>
							<option <?php if($wpedon_button_currency == "15") { echo "SELECTED"; } ?> value="15"><?php _e('Philippine Peso - PHP', 'easy-paypal-donation'); ?></option>
							<option <?php if($wpedon_button_currency == "16") { echo "SELECTED"; } ?> value="16"><?php _e('Polish Zloty - PLN', 'easy-paypal-donation'); ?></option>
							<option <?php if($wpedon_button_currency == "17") { echo "SELECTED"; } ?> value="17"><?php _e('Pound Sterling - GBP', 'easy-paypal-donation'); ?></option>
							<option <?php if($wpedon_button_currency == "18") { echo "SELECTED"; } ?> value="18"><?php _e('Russian Ruble - RUB', 'easy-paypal-donation'); ?></option>
							<option <?php if($wpedon_button_currency == "19") { echo "SELECTED"; } ?> value="19"><?php _e('Singapore Dollar - SGD', 'easy-paypal-donation'); ?></option>
							<option <?php if($wpedon_button_currency == "20") { echo "SELECTED"; } ?> value="20"><?php _e('Swedish Krona - SEK', 'easy-paypal-donation'); ?></option>
							<option <?php if($wpedon_button_currency == "21") { echo "SELECTED"; } ?> value="21"><?php _e('Swiss Franc - CHF', 'easy-paypal-donation'); ?></option>
							<option <?php if($wpedon_button_currency == "22") { echo "SELECTED"; } ?> value="22"><?php _e('Taiwan New Dollar - TWD', 'easy-paypal-donation'); ?></option>
							<option <?php if($wpedon_button_currency == "23") { echo "SELECTED"; } ?> value="23"><?php _e('Thai Baht - THB', 'easy-paypal-donation'); ?></option>
							<option <?php if($wpedon_button_currency == "24") { echo "SELECTED"; } ?> value="24"><?php _e('Turkish Lira - TRY', 'easy-paypal-donation'); ?></option>
							<option <?php if($wpedon_button_currency == "25") { echo "SELECTED"; } ?> value="25"><?php _e('U.S. Dollar - USD', 'easy-paypal-donation'); ?></option>
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
					<td><b><?php _e('Gateways', 'easy-paypal-donation'); ?></b></td>
					<td></td>
					<td></td>
				</tr>
				<tr class="wpedon-product-connection-row">
					<td><?php _e('PayPal Account:', 'easy-paypal-donation'); ?></td>
					<td><?php _e('You will be able to connect your PayPal account after saving this button', 'easy-paypal-donation'); ?></td>
					<td></td>
				</tr>
				<tr class="wpedon-product-connection-row">
					<td><?php _e('Stripe Account:', 'easy-paypal-donation'); ?></td>
					<td><?php _e('You will be able to connect your Stripe account after saving this button', 'easy-paypal-donation'); ?></td>
					<td></td>
				</tr>
				<tr>
					<td><b><?php _e('Other', 'easy-paypal-donation'); ?></b></td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td><?php _e('Return URL:', 'easy-paypal-donation'); ?></td>
					<td>
						<input type="text" name="wpedon_button_return" value="<?php if (isset($_POST['wpedon_button_return'])) { echo esc_attr($_POST['wpedon_button_return']);} ?>">
					</td>
					<td><?php _e('Optional - Will override settings page value.', 'easy-paypal-donation'); ?></td>
				</tr>
				<tr>
					<td>
						<?php _e('Show Purpose / Name:', 'easy-paypal-donation'); ?>
					</td>
					<td><input type="checkbox" name="wpedon_button_enable_name" value="1" <?php if (isset($_POST['wpedon_button_enable_name'])) {echo "CHECKED";} ?>></td>
					<td><?php _e('Optional - Show the purpose / name above the button.', 'easy-paypal-donation'); ?></td>
				</tr>
				<tr>
					<td>
						<?php _e('Show Donation Amount:', 'easy-paypal-donation'); ?>
					</td>
					<td><input type="checkbox" name="wpedon_button_enable_price" value="1" <?php if (isset($_POST['wpedon_button_enable_price'])) { echo "CHECKED"; } ?>></td>
					<td><?php _e('Optional - Show the donation amount above the button.', 'easy-paypal-donation'); ?></td>
				</tr>
				<tr>
					<td><?php _e('Show Currency:', 'easy-paypal-donation'); ?></td>
					<td><input type="checkbox" name="wpedon_button_enable_currency" value="1" <?php if (isset($_POST['wpedon_button_enable_currency'])) { echo "CHECKED"; } ?>></td>
					<td><?php _e('Optional - Show the currency (example: USD) after the amount.', 'easy-paypal-donation'); ?></td>
				</tr>
				<tr>
					<td><?php _e('Alignment:', 'easy-paypal-donation'); ?></td>
					<td>
						<select name="wpedon_button_align" class="wpedon-button-settings-select">
							<option value="" <?php echo !isset($_POST['wpedon_button_align']) || empty($_POST['wpedon_button_align']) ? 'selected' : ''; ?>><?php _e('Default (Left)', 'easy-paypal-donation'); ?></option>
							<option value="left" <?php echo isset($_POST['wpedon_button_align']) && $_POST['wpedon_button_align'] == 'left' ? 'selected' : ''; ?>><?php _e('Left', 'easy-paypal-donation'); ?></option>
							<option value="center" <?php echo isset($_POST['wpedon_button_align']) && $_POST['wpedon_button_align'] == 'center' ? 'selected' : ''; ?>><?php _e('Center', 'easy-paypal-donation'); ?></option>
							<option value="right" <?php echo isset($_POST['wpedon_button_align']) && $_POST['wpedon_button_align'] == 'right' ? 'selected' : ''; ?>><?php _e('Right', 'easy-paypal-donation'); ?></option>
						</select>
					</td>
					<td><?php _e('Optional - Set the button alignment when displayed.', 'easy-paypal-donation'); ?></td>
				</tr>
				
				<tr>
                    <td><?php _e('Donation Amount Text:', 'easy-paypal-donation'); ?></td>
                    <td>
                        <input type="text" name="wpedon_button_donation_text"
                               value="<?php if (isset($_POST['wpedon_button_donation_text'])) { echo esc_attr($_POST['wpedon_button_donation_text']);} ?>">
                    </td>
                    <td> <?php _e('Optional - Text for manual donation amounts. Default: Donation Amount', 'easy-paypal-donation'); ?>
                    </td>
                </tr>
				
				<tr>
					<td></td>
					<td><br/></td>
					<td></td>
				</tr>
				<tr>
					<td><b><?php _e('Dropdown Menus', 'easy-paypal-donation'); ?></b> <br/><br/></td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td>
						<?php _e('Amount Dropdown Menu:', 'easy-paypal-donation'); ?>
					</td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td colspan="3">
						<table>
							<tr>
								<td><?php _e('Amount Menu Name:', 'easy-paypal-donation'); ?> &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</td>
								<td>
									<input type="text" name="wpedon_button_scpriceprice" id="wpedon_button_scpriceprice"
						           value="<?php if (isset($_POST['wpedon_button_scpriceprice'])) { echo esc_attr($_POST['wpedon_button_scpriceprice']); } ?>">
								</td>
								<td><?php _e('Optional, but required to show menu - show an amount dropdown menu.', 'easy-paypal-donation'); ?></td>
							</tr>
							<tr>
								<td><?php _e('Option / Amount 1:', 'easy-paypal-donation'); ?></td>
								<td>
									<input type="text" name="wpedon_button_scpriceaname" id="wpedon_button_scpriceaname"
									       value="<?php if (isset($_POST['wpedon_button_scpriceaname'])) {
										       echo esc_attr($_POST['wpedon_button_scpriceaname']);
									       } ?>"
									       style="width:94px;">
									<input style="width:93px;" type="text"
									       name="wpedon_button_scpricea"
									       id="wpedon_button_scpricea"
									       value="<?php if (isset($_POST['wpedon_button_scpricea'])) {
														echo esc_attr($_POST['wpedon_button_scpricea']);
													} ?>">
								</td>
								<td><?php _e('Optional', 'easy-paypal-donation'); ?></td>
							</tr>
							<tr>
								<td>
									<?php _e('Option / Amount 2:', 'easy-paypal-donation'); ?>
								</td>
								<td>
									<input type="text" name="wpedon_button_scpricebname" id="wpedon_button_scpricebname"
									       value="<?php
									       if (isset($_POST['wpedon_button_scpricebname'])) {
										       echo esc_attr($_POST['wpedon_button_scpricebname']);
									       } ?>" style="width:94px;">
									<input style="width:93px;" type="text"
									       name="wpedon_button_scpriceb"
									       id="wpedon_button_scpriceb" value="<?php
									if (isset($_POST['wpedon_button_scpriceb'])) {
										echo esc_attr($_POST['wpedon_button_scpriceb']);
									} ?>"></td>
								<td> <?php _e('Optional', 'easy-paypal-donation'); ?></td>
							</tr>
							<tr>
								<td>
									<?php _e('Option / Amount 3:', 'easy-paypal-donation'); ?>
								</td>
								<td>
									<input type="text" name="wpedon_button_scpricecname" id="wpedon_button_scpricecname"
									       value="<?php
									       if (isset($_POST['wpedon_button_scpricecname'])) {
										       echo esc_attr($_POST['wpedon_button_scpricecname']);
									       } ?>" style="width:94px;">
									<input style="width:93px;" type="text"
									       name="wpedon_button_scpricec"
									       id="wpedon_button_scpricec" value="<?php
									if (isset($_POST['wpedon_button_scpricec'])) {
										echo esc_attr($_POST['wpedon_button_scpricec']);
									} ?>">
								</td>
								<td><?php _e('Optional', 'easy-paypal-donation'); ?></td>
							</tr>
							<tr>
								<td><?php _e('Option / Amount 4:', 'easy-paypal-donation'); ?></td>
								<td><input type="text" name="wpedon_button_scpricedname" id="wpedon_button_scpricedname"
								           value="<?php
								           if (isset($_POST['wpedon_button_scpricedname'])) {
									           echo esc_attr($_POST['wpedon_button_scpricedname']);
								           } ?>" style="width:94px;">
									<input style="width:93px;" type="text"
									       name="wpedon_button_scpriced"
									       id="wpedon_button_scpriced" value="<?php
									if (isset($_POST['wpedon_button_scpriced'])) {
										echo esc_attr($_POST['wpedon_button_scpriced']);
									} ?>">
								</td>
								<td><?php _e('Optional', 'easy-paypal-donation'); ?></td>
							</tr>
							<tr>
								<td><?php _e('Option / Amount 5:', 'easy-paypal-donation'); ?></td>
								<td><input type="text" name="wpedon_button_scpriceename" id="wpedon_button_scpriceename"
								           value="<?php
								           if (isset($_POST['wpedon_button_scpriceename'])) {
									           echo esc_attr($_POST['wpedon_button_scpriceename']);
								           } ?>" style="width:94px;">
									<input style="width:93px;" type="text"
									       name="wpedon_button_scpricee"
									       id="wpedon_button_scpricee" value="<?php
									if (isset($_POST['wpedon_button_scpricee'])) {
										echo esc_attr($_POST['wpedon_button_scpricee']);
									} ?>"></td>
								<td> <?php _e('Optional', 'easy-paypal-donation'); ?></td>
							</tr>
							<tr>
								<td><?php _e('Option / Amount 6:', 'easy-paypal-donation'); ?></td>
								<td>
									<input type="text" name="wpedon_button_scpricefname" id="wpedon_button_scpricefname"
									       value="<?php
									       if (isset($_POST['wpedon_button_scpricefname'])) {
										       echo esc_attr($_POST['wpedon_button_scpricefname']);
									       } ?>" style="width:94px;">
									<input style="width:93px;" type="text"
									       name="wpedon_button_scpricef"
									       id="wpedon_button_scpricef" value="<?php
									if (isset($_POST['wpedon_button_scpricef'])) {
										echo esc_attr($_POST['wpedon_button_scpricef']);
									} ?>"></td>
								<td><?php _e('Optional', 'easy-paypal-donation'); ?></td>
							</tr>
							<tr>
								<td><?php _e('Option / Amount 7:', 'easy-paypal-donation'); ?></td>
								<td>
									<input type="text" name="wpedon_button_scpricegname" id="wpedon_button_scpricegname"
									       value="<?php
									       if (isset($_POST['wpedon_button_scpricegname'])) {
										       echo esc_attr($_POST['wpedon_button_scpricegname']);
									       } ?>" style="width:94px;">
									<input style="width:93px;" type="text"
									       name="wpedon_button_scpriceg"
									       id="wpedon_button_scpriceg" value="<?php
									if (isset($_POST['wpedon_button_scpriceg'])) {
										echo esc_attr($_POST['wpedon_button_scpriceg']);
									} ?>">
								</td>
								<td><?php _e('Optional', 'easy-paypal-donation'); ?></td>
							</tr>
							<tr>
								<td>
									<?php _e('Option / Amount 8:', 'easy-paypal-donation'); ?>
								</td>
								<td><input type="text" name="wpedon_button_scpricehname" id="wpedon_button_scpricehname"
								           value="<?php
								           if (isset($_POST['wpedon_button_scpricehname'])) {
									           echo esc_attr($_POST['wpedon_button_scpricehname']);
								           } ?>" style="width:94px;">
									<input style="width:93px;" type="text"
									       name="wpedon_button_scpriceh"
									       id="wpedon_button_scpriceh" value="<?php
									if (isset($_POST['wpedon_button_scpriceh'])) {
										echo esc_attr($_POST['wpedon_button_scpriceh']);
									} ?>">
								</td>
								<td> <?php _e('Optional', 'easy-paypal-donation'); ?></td>
							</tr>
							<tr>
								<td><?php _e('Option / Amount 9:', 'easy-paypal-donation'); ?></td>
								<td>
									<input type="text" name="wpedon_button_scpriceiname" id="wpedon_button_scpriceiname"
									       value="<?php
									       if (isset($_POST['wpedon_button_scpriceiname'])) {
										       echo esc_attr($_POST['wpedon_button_scpriceiname']);
									       } ?>" style="width:94px;">
									<input style="width:93px;" type="text"
									       name="wpedon_button_scpricei"
									       id="wpedon_button_scpricei" value="<?php
									if (isset($_POST['wpedon_button_scpricei'])) {
										echo esc_attr($_POST['wpedon_button_scpricei']);
									} ?>">
								</td>
								<td><?php _e('Optional', 'easy-paypal-donation'); ?></td>
							</tr>
							<tr>
								<td><?php _e('Option / Amount 10:', 'easy-paypal-donation'); ?></td>
								<td>
									<input type="text" name="wpedon_button_scpricejname" id="wpedon_button_scpricejname"
									       value="<?php
									       if (isset($_POST['wpedon_button_scpricejname'])) {
										       echo esc_attr($_POST['wpedon_button_scpricejname']);
									       } ?>" style="width:94px;">
									<input style="width:93px;" type="text"
									       name="wpedon_button_scpricej"
									       id="wpedon_button_scpricej" value="<?php
									if (isset($_POST['wpedon_button_scpricej'])) {
										echo esc_attr($_POST['wpedon_button_scpricej']);
									} ?>">
								</td>
								<td><?php _e('Optional', 'easy-paypal-donation'); ?></td>
							</tr>
						</table>
						<?php wp_nonce_field('new_wpedon_button'); ?>
						<input type="hidden" name="update">
					</td>
				</tr>
			</table>
		</div>
	</form>
</div>
