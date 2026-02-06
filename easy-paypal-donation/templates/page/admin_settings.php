<div class="wrap">
    <form method='post' action='<?php echo esc_url($_SERVER["REQUEST_URI"]); ?>'>
        <?php wp_nonce_field('wpedon_settings_save', 'wpedon_nonce'); ?>
        <!--    tabs menu    -->
        <table width='100%'>
            <tr>
                <td>
                    <br/>
                    <span style="font-size:20pt;"><?php _e('PayPal & Stripe Settings', 'easy-paypal-donation'); ?></span>
                </td>
                <td valign="bottom">
                    <input type="submit" name='btn2' class='button-primary'
                           style='font-size: 14px;height: 30px;float: right;' value="<?php _e('Save Settings', 'easy-paypal-donation'); ?>">
                </td>
            </tr>
        </table>

		<?php if (!empty($_GET['saved'])): ?>
            <div class='updated'><p><?php _e('Settings Updated.', 'easy-paypal-donation'); ?></p></div>
		<?php endif; ?>

        <table width="100%">
            <tr>
                <td valign="top">
                    <script type="text/javascript">
                        function activateTab(e) {
                            e.preventDefault()

                            const id = e.target.id.replace('id', '')

                            for (let i = 1; i <= 5; i++) {
                                document.getElementById(i).style.display = 'none'
                                document.getElementById('id' + i).classList.remove('nav-tab-active')
                            }

                            e.target.classList.add('nav-tab-active')
                            document.getElementById(id).style.display = 'block'
                            document.getElementById('active-tab').value = id

                            return false
                        }
                    </script>

                    <h2 class="nav-tab-wrapper">
                        <a onclick='activateTab(event);' href="#" id="id1"
                           class="nav-tab <?php echo $args['active_tab'] === 1 ? 'nav-tab-active' : ''; ?>"><?php _e('Getting Started', 'easy-paypal-donation'); ?></a>
                        <a onclick='activateTab(event);' href="#" id="id2"
                           class="nav-tab <?php echo $args['active_tab'] === 2 ? 'nav-tab-active' : ''; ?>"><?php _e('Language & Currency', 'easy-paypal-donation'); ?></a>
                        <a onclick='activateTab(event);' href="#" id="id3"
                           class="nav-tab <?php echo $args['active_tab'] === 3 ? 'nav-tab-active' : ''; ?>"><?php _e('PayPal', 'easy-paypal-donation'); ?></a>
                        <a onclick='activateTab(event);' href="#" id="id4"
                           class="nav-tab <?php echo $args['active_tab'] === 4 ? 'nav-tab-active' : ''; ?>"><?php _e('Stripe', 'easy-paypal-donation'); ?></a>
                        <a onclick='activateTab(event);' href="#" id="id5"
                           class="nav-tab <?php echo $args['active_tab'] === 5 ? 'nav-tab-active' : ''; ?>"><?php _e('Actions', 'easy-paypal-donation'); ?></a>
                    </h2>

                    <br/>

                    <div id="1"
                         style="display:none;border: 1px solid #CCCCCC;<?php echo $args['active_tab'] == '1' ? 'display:block;' : ''; ?>">
                        <div style="background-color:#2271b1;padding:8px;font-size:15px;color:#fff;font-weight: 700;border-bottom: 1px solid #CCCCCC;">
                            <?php _e('Getting Started', 'easy-paypal-donation'); ?>
                        </div>
                        <div style="background-color:#fff;border: 1px solid #E5E5E5;padding:5px;"><br>
                            <b><?php _e('1. Connect Payment Accounts', 'easy-paypal-donation'); ?></b><br>
                            <?php _e('Connect your PayPal and Stripe accounts.', 'easy-paypal-donation'); ?><br><br>

                            <b><?php _e('2. Make a button', 'easy-paypal-donation'); ?></b><br>
                            <?php _e('On the', 'easy-paypal-donation'); ?> <a href="<?= get_admin_url(null, 'admin.php?page=wpedon_buttons'); ?>"
                                      target="_blank"><?php _e('buttons page', 'easy-paypal-donation'); ?></a>, <?php _e('make a new button.', 'easy-paypal-donation'); ?><br><br>

                            <b><?php _e('3. Place button on page', 'easy-paypal-donation'); ?></b><br>
                            <?php _e('You can place the button on your site in 3 ways. In you Page / Post editor you can use thebutton titled "PayPal Donation Button". You can use the "PayPal Donation Button" Widget. Or you can manually place the shortcode on a Page / Post.', 'easy-paypal-donation'); ?><br><br>

                            <b><?php _e('4. View donations', 'easy-paypal-donation'); ?></b><br>
                            <?php _e('On the', 'easy-paypal-donation'); ?> <a href="<?= get_admin_url(null, 'admin.php?page=wpedon_menu'); ?>" target="_blank"><?php _e('donations
                                page', 'easy-paypal-donation'); ?></a> <?php _e('you can view the donations that have been made on your site.', 'easy-paypal-donation'); ?><br><br>
                        </div>
                    </div>

                    <div id="2"
                         style="display:none;border: 1px solid #CCCCCC;<?php echo $args['active_tab'] == '2' ? 'display:block;' : ''; ?>">
                        <div style="background-color:#2271b1;padding:8px;font-size:15px;color:#fff;font-weight: 700;border-bottom: 1px solid #CCCCCC;">
                            <?php _e('Language & Currency Settings', 'easy-paypal-donation'); ?>
                        </div>
                        <div style="background-color:#fff;padding:8px;">
                            <table>
                                <tr>
                                    <td colspan="2">
                                        <h3><?php _e('Language Settings', 'easy-paypal-donation'); ?></h3>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="wpedon-cell-left">
                                        <b><?php _e('Language:', 'easy-paypal-donation'); ?></b>
                                    </td>
                                    <td>
                                        <select name="language" style="width: 280px">
                                            <option <?php if ($args['options']['language'] == "default") {
												echo "selected";
											} ?> value="default"><?php _e('Default', 'easy-paypal-donation'); ?></option>
                                            <option <?php if ($args['options']['language'] == "1") {
												echo "selected";
											} ?> value="1"><?php _e('Danish', 'easy-paypal-donation'); ?></option>
                                            <option <?php if ($args['options']['language'] == "2") {
												echo "selected";
											} ?> value="2"><?php _e('Dutch', 'easy-paypal-donation'); ?></option>
                                            <option <?php if ($args['options']['language'] == "3") {
												echo "selected";
											} ?> value="3"><?php _e('English', 'easy-paypal-donation'); ?></option>
                                            <option <?php if ($args['options']['language'] == "20") {
												echo "selected";
											} ?> value="20"><?php _e('English - UK', 'easy-paypal-donation'); ?></option>
                                            <option <?php if ($args['options']['language'] == "4") {
												echo "selected";
											} ?> value="4"><?php _e('French', 'easy-paypal-donation'); ?></option>
                                            <option <?php if ($args['options']['language'] == "5") {
												echo "selected";
											} ?> value="5"><?php _e('German', 'easy-paypal-donation'); ?></option>
                                            <option <?php if ($args['options']['language'] == "6") {
												echo "selected";
											} ?> value="6"><?php _e('Hebrew', 'easy-paypal-donation'); ?></option>
                                            <option <?php if ($args['options']['language'] == "7") {
												echo "selected";
											} ?> value="7"><?php _e('Italian', 'easy-paypal-donation'); ?></option>
                                            <option <?php if ($args['options']['language'] == "8") {
												echo "selected";
											} ?> value="8"><?php _e('Japanese', 'easy-paypal-donation'); ?></option>
                                            <option <?php if ($args['options']['language'] == "9") {
												echo "selected";
											} ?> value="9"><?php _e('Norwegian', 'easy-paypal-donation'); ?></option>
                                            <option <?php if ($args['options']['language'] == "10") {
												echo "selected";
											} ?> value="10"><?php _e('Polish', 'easy-paypal-donation'); ?></option>
                                            <option <?php if ($args['options']['language'] == "11") {
												echo "selected";
											} ?> value="11"><?php _e('Portuguese', 'easy-paypal-donation'); ?></option>
                                            <option <?php if ($args['options']['language'] == "12") {
												echo "selected";
											} ?> value="12"><?php _e('Russian', 'easy-paypal-donation'); ?></option>
                                            <option <?php if ($args['options']['language'] == "13") {
												echo "selected";
											} ?> value="13"><?php _e('Spanish', 'easy-paypal-donation'); ?></option>
                                            <option <?php if ($args['options']['language'] == "14") {
												echo "selected";
											} ?> value="14"><?php _e('Swedish', 'easy-paypal-donation'); ?></option>
                                            <option <?php if ($args['options']['language'] == "15") {
												echo "selected";
											} ?> value="15"><?php _e('Simplified Chinese -China only', 'easy-paypal-donation'); ?></option>
                                            <option <?php if ($args['options']['language'] == "16") {
												echo "selected";
											} ?> value="16"><?php _e('Traditional Chinese - Hong Kong only', 'easy-paypal-donation'); ?></option>
                                            <option <?php if ($args['options']['language'] == "17") {
												echo "selected";
											} ?> value="17"><?php _e('Traditional Chinese - Taiwan only', 'easy-paypal-donation'); ?></option>
                                            <option <?php if ($args['options']['language'] == "18") {
												echo "selected";
											} ?> value="18"><?php _e('Turkish', 'easy-paypal-donation'); ?></option>
                                            <option <?php if ($args['options']['language'] == "19") {
												echo "selected";
											} ?> value="19"><?php _e('Thai', 'easy-paypal-donation'); ?></option>
                                        </select>
                                    </td>
                                    <td>
                                        <?php _e('PayPal currently supports 18 languages.', 'easy-paypal-donation'); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <br/>
                                        <h3><?php _e('Currency Settings', 'easy-paypal-donation'); ?></h3>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="wpedon-cell-left">
                                        <b><?php _e('Currency:', 'easy-paypal-donation'); ?></b>
                                    </td>
                                    <td>
                                        <select name="currency" style="width: 280px">
                                            <option <?php if ($args['options']['currency'] == "1") {
												echo "selected";
											} ?> value="1"><?php _e('Australian Dollar - AUD', 'easy-paypal-donation'); ?></option>
                                            <option <?php if ($args['options']['currency'] == "2") {
												echo "selected";
											} ?> value="2"><?php _e('Brazilian Real - BRL', 'easy-paypal-donation'); ?></option>
                                            <option <?php if ($args['options']['currency'] == "3") {
												echo "selected";
											} ?> value="3"><?php _e('Canadian Dollar - CAD', 'easy-paypal-donation'); ?></option>
                                            <option <?php if ($args['options']['currency'] == "4") {
												echo "selected";
											} ?> value="4"><?php _e('Czech Koruna - CZK', 'easy-paypal-donation'); ?></option>
                                            <option <?php if ($args['options']['currency'] == "5") {
												echo "selected";
											} ?> value="5"><?php _e('Danish Krone - DKK', 'easy-paypal-donation'); ?></option>
                                            <option <?php if ($args['options']['currency'] == "6") {
												echo "selected";
											} ?> value="6"><?php _e('Euro - EUR', 'easy-paypal-donation'); ?></option>
                                            <option <?php if ($args['options']['currency'] == "7") {
												echo "selected";
											} ?> value="7"><?php _e('Hong Kong Dollar - HKD', 'easy-paypal-donation'); ?></option>
                                            <option <?php if ($args['options']['currency'] == "8") {
												echo "selected";
											} ?> value="8"><?php _e('Hungarian Forint - HUF', 'easy-paypal-donation'); ?></option>
                                            <option <?php if ($args['options']['currency'] == "9") {
												echo "selected";
											} ?> value="9"><?php _e('Israeli New Sheqel - ILS', 'easy-paypal-donation'); ?></option>
                                            <option <?php if ($args['options']['currency'] == "10") {
												echo "selected";
											} ?> value="10"><?php _e('Japanese Yen - JPY', 'easy-paypal-donation'); ?></option>
                                            <option <?php if ($args['options']['currency'] == "11") {
												echo "selected";
											} ?> value="11"><?php _e('Malaysian Ringgit - MYR', 'easy-paypal-donation'); ?></option>
                                            <option <?php if ($args['options']['currency'] == "12") {
												echo "selected";
											} ?> value="12"><?php _e('Mexican Peso - MXN', 'easy-paypal-donation'); ?></option>
                                            <option <?php if ($args['options']['currency'] == "13") {
												echo "selected";
											} ?> value="13"><?php _e('Norwegian Krone - NOK', 'easy-paypal-donation'); ?></option>
                                            <option <?php if ($args['options']['currency'] == "14") {
												echo "selected";
											} ?> value="14"><?php _e('New Zealand Dollar - NZD', 'easy-paypal-donation'); ?></option>
                                            <option <?php if ($args['options']['currency'] == "15") {
												echo "selected";
											} ?> value="15"><?php _e('Philippine Peso - PHP', 'easy-paypal-donation'); ?></option>
                                            <option <?php if ($args['options']['currency'] == "16") {
												echo "selected";
											} ?> value="16"><?php _e('Polish Zloty - PLN', 'easy-paypal-donation'); ?></option>
                                            <option <?php if ($args['options']['currency'] == "17") {
												echo "selected";
											} ?> value="17"><?php _e('Pound Sterling - GBP', 'easy-paypal-donation'); ?></option>
                                            <option <?php if ($args['options']['currency'] == "18") {
												echo "selected";
											} ?> value="18"><?php _e('Russian Ruble - RUB', 'easy-paypal-donation'); ?></option>
                                            <option <?php if ($args['options']['currency'] == "19") {
												echo "selected";
											} ?> value="19"><?php _e('Singapore Dollar - SGD', 'easy-paypal-donation'); ?></option>
                                            <option <?php if ($args['options']['currency'] == "20") {
												echo "selected";
											} ?> value="20"><?php _e('Swedish Krona - SEK', 'easy-paypal-donation'); ?></option>
                                            <option <?php if ($args['options']['currency'] == "21") {
												echo "selected";
											} ?> value="21"><?php _e('Swiss Franc - CHF', 'easy-paypal-donation'); ?></option>
                                            <option <?php if ($args['options']['currency'] == "22") {
												echo "selected";
											} ?> value="22"><?php _e('Taiwan New Dollar - TWD', 'easy-paypal-donation'); ?></option>
                                            <option <?php if ($args['options']['currency'] == "23") {
												echo "selected";
											} ?> value="23"><?php _e('Thai Baht - THB', 'easy-paypal-donation'); ?></option>
                                            <option <?php if ($args['options']['currency'] == "24") {
												echo "selected";
											} ?> value="24"><?php _e('Turkish Lira - TRY', 'easy-paypal-donation'); ?></option>
                                            <option <?php if ($args['options']['currency'] == "25") {
												echo "selected";
											} ?> value="25"><?php _e('U.S. Dollar - USD', 'easy-paypal-donation'); ?></option>
                                        </select>
                                    </td>
                                    <td>
                                        <?php _e('PayPal currently supports 25 currencies.', 'easy-paypal-donation'); ?>
                                    </td>
                                </tr>
                            </table>
                            <br/>
                            <br/>
                        </div>
                    </div>

                    <div id="3"
                         style="display:none;border: 1px solid #CCCCCC;<?php echo $args['active_tab'] == '3' ? 'display:block;' : ''; ?>">
                        <div style="background-color:#2271b1;padding:8px;font-size:15px;color:#fff;font-weight: 700;border-bottom: 1px solid #CCCCCC;">
                            <?php _e('PayPal Settings', 'easy-paypal-donation'); ?>
                        </div>
                        <div style="background-color:#fff;padding:8px;">
                            <table>
                                <tr>
                                    <td colspan="2">
                                        <h3><?php _e('PayPal Account', 'easy-paypal-donation'); ?></h3>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <br/>
                                    </td>
                                </tr>
                            </table>
							<?= $args['ppcp_markup']; ?>
                            <table>
                                <tr>
                                    <td colspan="2">
                                        <h3><?php _e('PayPal Options', 'easy-paypal-donation'); ?></h3>
                                    </td>
                                </tr>

                                <tr class="wpedon-paypal-mode">
                                    <td class="wpedon-cell-left">
                                        <b><?php _e('Sandbox Mode:', 'easy-paypal-donation'); ?></b>
                                    </td>
                                    <td>
                                        <label>
                                            <input <?php if ($args['options']['mode'] == "1") {
												echo "checked='checked'";
											} ?> type='radio' name='mode' value='1'>
                                            <?php _e('On (Sandbox mode)', 'easy-paypal-donation'); ?>
                                        </label>
                                        &nbsp;
                                        &nbsp;
                                        <label>
                                            <input <?php if ($args['options']['mode'] == "2") {
												echo "checked='checked'";
											} ?> type='radio' name='mode' value='2'>
                                            <?php _e('Off (Live mode)', 'easy-paypal-donation'); ?>
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="wpedon-cell-left">
                                        <b><?php _e('Disable PayPal:', 'easy-paypal-donation'); ?></b>
                                    </td>
                                    <td>
                                        <label>
                                            <input <?php if ($args['options']['disable_paypal'] == "1") {
												echo "checked='checked'";
											} ?> type='radio' name='disable_paypal' value='1'>
                                            <?php _e('No', 'easy-paypal-donation'); ?>
                                        </label>
                                        &nbsp;
                                        &nbsp;
                                        <label>
                                            <input <?php if ($args['options']['disable_paypal'] == "2") {
												echo "checked='checked'";
											} ?> type='radio' name='disable_paypal' value='2'>
                                            <?php _e('Yes', 'easy-paypal-donation'); ?>
                                        </label>
                                    </td>
                                </tr>
                            </table>
							<?php if (!empty($args['options']['liveaccount']) || !empty($args['options']['sandboxaccount'])): ?>
                                <table>
                                    <tr>
                                        <td colspan='2'>
                                            <h3><?php _e('PayPal Standard', 'easy-paypal-donation'); ?></h3>
                                        </td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td class="wpedon-cell-left">
                                            <b><?php _e('Default Button Style:', 'easy-paypal-donation'); ?></b>
                                        </td>
                                        <td class="wpedon-cell-flex" colspan='2'>
                                            <label>
                                                <input <?php if ($args['options']['size'] == "1") {
													echo "checked='checked'";
												} ?> type='radio' name='size' value='1'/>
                                                <?php _e('Small', 'easy-paypal-donation'); ?><br/>
                                                <img src='https://www.paypal.com/en_US/i/btn/btn_donate_SM.gif'>
                                            </label>
                                            <label>
                                                <input <?php if ($args['options']['size'] == "2") {
													echo "checked='checked'";
												} ?> type='radio' name='size' value='2'>
                                                <?php _e('Big', 'easy-paypal-donation'); ?><br/>
                                                <img src='https://www.paypal.com/en_US/i/btn/btn_donate_LG.gif'>
                                            </label>
                                            <label>
                                                <input <?php if ($args['options']['size'] == "3") {
													echo "checked='checked'";
												} ?> type='radio' name='size' value='3'>
                                                <?php _e('Big with Credit Cards', 'easy-paypal-donation'); ?><br/>
                                                <img src='https://www.paypal.com/en_US/i/btn/btn_donateCC_LG.gif'>
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="wpedon-cell-left">
                                            <b></b>
                                        </td>
                                        <td class="wpedon-cell-flex" colspan='2'>
                                            <label>
                                                <input <?php if ($args['options']['size'] == "4") {
													echo "checked='checked'";
												} ?> type='radio' name='size' value='4'/>
                                                <?php _e('Small 2 (English only)', 'easy-paypal-donation'); ?><br/>
                                                <img src='https://www.paypalobjects.com/webstatic/en_US/btn/btn_donate_74x21.png'>
                                            </label>
                                            <label>
                                                <input <?php if ($args['options']['size'] == "5") {
													echo "checked='checked'";
												} ?> type='radio' name='size' value='5'>
                                                <?php _e('Big 2 (English only)', 'easy-paypal-donation'); ?><br/>
                                                <img src='https://www.paypalobjects.com/webstatic/en_US/btn/btn_donate_92x26.png'>
                                            </label>
                                            <label>
                                                <input <?php if ($args['options']['size'] == "6") {
													echo "checked='checked'";
												} ?> type='radio' name='size' value='6'>
                                                <?php _e('Big 2 with Credit Cards (English only)', 'easy-paypal-donation'); ?><br/>
                                                <img src='https://www.paypalobjects.com/webstatic/en_US/btn/btn_donate_cc_147x47.png'>
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="wpedon-cell-left">
                                            <b></b>
                                        </td>
                                        <td class="wpedon-cell-flex" colspan='2'>
                                            <label>
                                                <input <?php if ($args['options']['size'] == "7") {
													echo "checked='checked'";
												} ?> type='radio' name='size' value='7'/>
                                                <?php _e('Big 3 with logo (English only)', 'easy-paypal-donation'); ?><br/>
                                                <img src='https://www.paypalobjects.com/webstatic/en_US/btn/btn_donate_pp_142x27.png'>
                                            </label>
                                            <label>
                                                <input <?php if ($args['options']['size'] == "8") {
													echo "checked='checked'";
												} ?> type='radio' name='size' value='8'/>
                                                <input type='text' id='image_1' name='image_1' size='15'
                                                       value='<?php echo isset($args['options']["image_1"]) ? esc_attr($args['options']["image_1"]) : ''; ?>'>
                                                <input id='_btn' class='upload_image_button' type='button'
                                                       value='<?php _e('Select Image', 'easy-paypal-donation'); ?>'>
                                                <?php _e('Custom Use your own image', 'easy-paypal-donation'); ?><br/>
                                            </label>
                                        </td>
                                    </tr>
									<?php if (!empty($args['options']['liveaccount'])): ?>
                                        <tr>
                                            <td>
                                                <b><?php _e('Live Account:', 'easy-paypal-donation'); ?></b>
                                            </td>
                                            <td>
                                                <input type='text' name='liveaccount'
                                                       value='<?php echo esc_attr($args['options']['liveaccount']); ?>'/>
                                            </td>
                                        </tr>
									<?php endif; ?>

									<?php if (!empty($args['options']['sandboxaccount'])): ?>
                                        <tr>
                                            <td>
                                                <b><?php _e('Sandbox Account:', 'easy-paypal-donation'); ?></b>
                                            </td>
                                            <td>
                                                <input type='text' name='sandboxaccount'
                                                       value='<?php echo esc_attr($args['options']['sandboxaccount']); ?>'/>
                                            </td>
                                        </tr>
									<?php endif; ?>

									<?php if (!empty($args['options']['liveaccount']) || !empty($args['options']['sandboxaccount'])): ?>
                                        <tr>
                                            <td></td>
                                            <td><?php _e('PayPal Standard is now deprecated. You cannot modify your Standard settings. We highly recommend using PayPal Commerce.', 'easy-paypal-donation'); ?></td>
                                        </tr>
									<?php endif; ?>
                                </table>
							<?php endif; ?>
                            <br/>
                            <br/>
                        </div>
                    </div>

                    <div id="4"
                         style="display:none;border: 1px solid #CCCCCC;<?php echo $args['active_tab'] == '4' ? 'display:block;' : ''; ?>">
                        <div style="background-color:#2271b1;padding:8px;font-size:15px;color:#fff;font-weight: 700;border-bottom: 1px solid #CCCCCC;">
                            <?php _e('Stripe Settings', 'easy-paypal-donation'); ?>
                        </div>
                        <div style="background-color:#fff;padding:8px;">
                            <table id="wpedon-stripe-connect-table">
                                <tr>
                                    <td colspan="2">
                                        <h3><?php _e('Stripe Account', 'easy-paypal-donation'); ?></h3>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan='2'>
                                        <br/>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="wpedon-cell-left">
                                        <b><?php _e('Connection status:', 'easy-paypal-donation'); ?></b>
                                    </td>
                                    <td id="stripe-connection-status-html">
										<?= $args['stripe_status_html']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <br/>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="wpedon-cell-left">
                                        <b><?php _e('Width:', 'easy-paypal-donation'); ?></b>
                                    </td>
                                    <td>
                                        <input type="number" name="stripe_width"
                                               value="<?php echo $args['options']['stripe_width']; ?>"/>
                                        <br/>
                                        <?php _e('Max button width in pixels', 'easy-paypal-donation'); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan='2'>
                                        <br/>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="wpedon-cell-left">
                                        <b><?php _e('Sandbox Mode:', 'easy-paypal-donation'); ?></b>
                                    </td>
                                    <td>
                                        <label>
                                            <input type='radio' name='mode_stripe'
                                                   value='1' <?php echo ($args['options']['mode_stripe'] != '2') ? 'checked' : ''; ?> />
                                            <?php _e('On (Sandbox mode)', 'easy-paypal-donation'); ?>
                                        </label>
                                        &nbsp; &nbsp;
                                        <label>
                                            <input type='radio' name='mode_stripe'
                                                   value='2' <?php echo ($args['options']['mode_stripe'] == '2') ? 'checked' : ''; ?> />
                                            <?php _e('Off (Live mode)', 'easy-paypal-donation'); ?>
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="wpedon-cell-left">
                                        <b><?php _e('Disable Stripe:', 'easy-paypal-donation'); ?></b>
                                    </td>
                                    <td>
                                        <label>
                                            <input <?php if ($args['options']['disable_stripe'] == "1") {
												echo "checked='checked'";
											} ?> type='radio' name='disable_stripe' value='1'>
                                            <?php _e('No', 'easy-paypal-donation'); ?>
                                        </label>
                                        &nbsp; &nbsp;
                                        <label>
                                            <input <?php if ($args['options']['disable_stripe'] == "2") {
												echo "checked='checked'";
											} ?> type='radio' name='disable_stripe' value='2'>
                                            <?php _e('Yes', 'easy-paypal-donation'); ?>
                                        </label>
                                    </td>
                                </tr>
                            </table>
                            <br/>
                        </div>
                    </div>

                    <div id="5"
                         style="display:none;border: 1px solid #CCCCCC;<?php echo $args['active_tab'] == '5' ? 'display:block;' : ''; ?>">
                        <div style="background-color:#2271b1;padding:8px;font-size:15px;color:#fff;font-weight: 700;border-bottom: 1px solid #CCCCCC;">
                            <?php _e('Action Settings', 'easy-paypal-donation'); ?>
                        </div>
                        <div style="background-color:#fff;padding:8px;">
                            <table>
                                <tr>
                                    <td colspan="2">
                                        <h3><?php _e('Action Settings', 'easy-paypal-donation'); ?></h3>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="wpedon-cell-left">
                                        <b><?php _e('Button opens in:', 'easy-paypal-donation'); ?></b>
                                    </td>
                                    <td>
                                        <label>
                                            <input <?php if ($args['options']['opens'] == "1") {
												echo "checked='checked'";
											} ?> type='radio' name='opens' value='1'>
                                            <?php _e('Same window', 'easy-paypal-donation'); ?>
                                        </label>
                                        &nbsp; &nbsp;
                                        <label>
                                            <input <?php if ($args['options']['opens'] == "2") {
												echo "checked='checked'";
											} ?> type='radio' name='opens' value='2'>
                                            <?php _e('New window', 'easy-paypal-donation'); ?>
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="wpedon-cell-left"></td>
                                    <td>
                                        <?php _e('Note: PayPal can only open in a popup window.', 'easy-paypal-donation'); ?><br/>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="wpedon-cell-left">
                                        <b><?php _e('Prompt buyers for a shipping address:', 'easy-paypal-donation'); ?></b>
                                    </td>
                                    <td>
                                        <label>
                                            <input <?php if ($args['options']['no_shipping'] == "0") {
												echo "checked='checked'";
											} ?> type='radio' name='no_shipping' value='0'>
                                            <?php _e('Yes', 'easy-paypal-donation'); ?>
                                        </label>
                                        &nbsp; &nbsp;
                                        <label>
                                            <input <?php if ($args['options']['no_shipping'] == "1") {
												echo "checked='checked'";
											} ?> type='radio' name='no_shipping' value='1'>
                                            <?php _e('No', 'easy-paypal-donation'); ?>
                                        </label>
                                        &nbsp; &nbsp;
                                        <label>
                                            <input <?php if ($args['options']['no_shipping'] == "2") {
												echo "checked='checked'";
											} ?> type='radio' name='no_shipping' value='2'>
                                            <?php _e('Yes, and require', 'easy-paypal-donation'); ?>
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="wpedon-cell-left">
                                        <b><?php _e('Prompt buyers to include a note with their payments:', 'easy-paypal-donation'); ?></b>
                                    </td>
                                    <td>
                                        <label>
                                            <input <?php if ($args['options']['no_note'] == "0") {
												echo "checked='checked'";
											} ?> type='radio' name='no_note' value='0'>
                                            <?php _e('Yes', 'easy-paypal-donation'); ?>
                                        </label>
                                        &nbsp; &nbsp;
                                        <label>
                                            <input <?php if ($args['options']['no_note'] == "1") {
												echo "checked='checked'";
											} ?> type='radio' name='no_note' value='1'>
                                            <?php _e('No', 'easy-paypal-donation'); ?>
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <br/>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="wpedon-cell-left">
                                        <b><?php _e('Default Cancel URL:', 'easy-paypal-donation'); ?></b>
                                    </td>
                                    <td>
                                        <input type='text' name='cancel'
                                               value='<?php echo esc_attr($args['options']['cancel']); ?>'> <?php _e('Optional', 'easy-paypal-donation'); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="wpedon-cell-left"></td>
                                    <td>
                                        <?php _e('If the customer goes to PayPal and clicks the cancel button, where do they go. Example:', 'easy-paypal-donation'); ?> <?php echo get_site_url(); ?>/<?php _e('cancel', 'easy-paypal-donation'); ?>. <?php _e('Max length: 1,024.', 'easy-paypal-donation'); ?><br/><br/>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="wpedon-cell-left">
                                        <b><?php _e('Default Return URL:', 'easy-paypal-donation'); ?></b>
                                    </td>
                                    <td>
                                        <input type='text' name='return'
                                               value='<?php echo esc_attr($args['options']['return']); ?>'> <?php _e('Optional', 'easy-paypal-donation'); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="wpedon-cell-left"></td>
                                    <td>
                                        <?php _e('If the customer goes to PayPal and successfully pays, where are they redirected to after. Example:', 'easy-paypal-donation'); ?> <?php echo get_site_url(); ?>/<?php _e('thankyou', 'easy-paypal-donation'); ?>. <?php _e('Max length: 1,024.', 'easy-paypal-donation'); ?>
                                    </td>
                                </tr>
                            </table>
                            <br/>
                        </div>
                    </div>
                </td>
                <td width="3%"></td>
                <td valign="top" width="30%" style="padding-top: 64px;">
                    <!-- Review Box -->
                    <div style="border: 2px solid #0073aa; border-radius: 4px; margin-bottom: 15px;">
                        <div style="background-color:#0073aa;padding:10px;color:#fff;font-size:15px;font-weight: 700;">
                            &nbsp; ⭐ <?php _e('Love this plugin?', 'easy-paypal-donation'); ?>
                        </div>
                        <div style="background-color:#fff;padding:12px;text-align:center;">
                            <p style="margin-top:0;"><?php _e('A lot of work went into building this plugin. A quick review helps us keep it free and growing!', 'easy-paypal-donation'); ?></p>
                            <a target="_blank" href="https://wordpress.org/support/plugin/easy-paypal-donation/reviews/?filter=5#new-post" class="button-primary" style="font-size: 14px;"><?php _e('Leave a Review', 'easy-paypal-donation'); ?></a>
                        </div>
                    </div>

                    <div style="border: 2px solid #2271b1; border-radius: 4px;">
                        <div style="background-color:#2271b1;padding:10px;color:#fff;font-size:15px;font-weight:bold;">
                            &nbsp; ⬇️ <?php _e('Get the Pro Version', 'easy-paypal-donation'); ?>
                        </div>
                        <div style="background-color:#fff;padding:8px;">
                        <center><label style="font-size:14pt;font-weight:bold;"> <?php _e('With the Pro version you can:', 'easy-paypal-donation'); ?> </label>
                        </center>
                        <br/>
                        <div class="dashicons dashicons-yes" style="margin-bottom: 6px;"></div>
                        <?php _e('Offer recurring donations', 'easy-paypal-donation'); ?><br/>
                        <div class="dashicons dashicons-yes" style="margin-bottom: 6px;"></div>
                        <?php _e('Offer daily, weekly, monthly, and yearly billing', 'easy-paypal-donation'); ?><br/>
                        <div class="dashicons dashicons-yes" style="margin-bottom: 6px;"></div>
                        <?php _e('Set how long should billing should continue', 'easy-paypal-donation'); ?><br/>
                        <div class="dashicons dashicons-yes" style="margin-bottom: 6px;"></div>
                        <?php _e('Recurring donations dropdown menu', 'easy-paypal-donation'); ?><br/>
                        <div class="dashicons dashicons-yes" style="margin-bottom: 6px;"></div>
                        <?php _e('Offer up to 20 amount dropdown menu options', 'easy-paypal-donation'); ?><br/>
						<div class="dashicons dashicons-yes" style="margin-bottom: 6px;"></div>
                        <?php _e('No 1% Donation Fee', 'easy-paypal-donation'); ?><br/>
						<div class="dashicons dashicons-yes" style="margin-bottom: 6px;"></div> <?php _e('No risk, 30 day return policy', 'easy-paypal-donation'); ?> <br />
						<div class="dashicons dashicons-yes" style="margin-bottom: 6px;"></div> <?php _e('Many more features!', 'easy-paypal-donation'); ?> <br />
						<br />
						<div class="dashicons dashicons-yes" style="margin-bottom: 6px;"></div> <?php _e('US based support', 'easy-paypal-donation'); ?><br />
						<div class="dashicons dashicons-yes" style="margin-bottom: 6px;"></div> <?php _e('Built in Boulder, Colorado, USA', 'easy-paypal-donation'); ?> <br />
                        <br/>
                        <center><a target='_blank' href="https://wpplugin.org/downloads/paypal-donation-pro/"
                                   class='button-primary' style='font-size: 17px;line-height: 28px;height: 32px;'><?php _e('Upgrade Now', 'easy-paypal-donation'); ?></a></center>
                        <br/>
                        </div>
                    </div>
                </td>
            </tr>
        </table>

        <input type='hidden' name='update' value='1'>
        <input type='hidden' name='tab' id="active-tab" value="<?php echo $args['active_tab']; ?>">
    </form>
</div>
<script>
    jQuery(document).ready(function () {
        var formfield;
        jQuery('.upload_image_button').click(function () {
            jQuery('html').addClass('Image');
            formfield = jQuery(this).prev().attr('name');
            tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
            return false;
        });
        window.original_send_to_editor = window.send_to_editor;
        window.send_to_editor = function (html) {
            if (formfield) {
                fileurl = jQuery('img', html).attr('src');
                jQuery('#' + formfield).val(fileurl);
                tb_remove();
                jQuery('html').removeClass('Image');
            } else {
                window.original_send_to_editor(html);
            }
        };
    });
</script>