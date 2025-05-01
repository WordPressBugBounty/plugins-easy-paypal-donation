<div id="wpedon-ppcp-setup-account-modal" class="wpedon-ppcp-modal wpedon-ppcp-modal">
    <div class="wpedon-ppcp-setup-account">
        <h3><?php _e('Setup PayPal Account', 'easy-paypal-donation'); ?></h3>

        <div class="wpedon-ppcp-field">
            <label for="wpedon-ppcp-country">
                <?php _e('Select your country', 'easy-paypal-donation'); ?>
            </label>
            <select id="wpedon-ppcp-country">
                <option value="US"><?php _e('United States', 'easy-paypal-donation'); ?></option>
                <option value="AU"><?php _e('Australia', 'easy-paypal-donation'); ?></option>
                <option value="CA"><?php _e('Canada', 'easy-paypal-donation'); ?></option>
                <option value="UK"><?php _e('United Kingdom', 'easy-paypal-donation'); ?></option>
                <option value="DE"><?php _e('Germany', 'easy-paypal-donation'); ?></option>
                <option value="FR"><?php _e('France', 'easy-paypal-donation'); ?></option>
                <option value="IT"><?php _e('Italy', 'easy-paypal-donation'); ?></option>
                <option value="ES"><?php _e('Spain', 'easy-paypal-donation'); ?></option>
                <option value="other"><?php _e('Other', 'easy-paypal-donation'); ?></option>
            </select>
        </div>

        <div class="wpedon-ppcp-field wpedon-ppcp-checkbox-field">
            <label class="wpedon-ppcp-readonly">
                <input type="checkbox" id="wpedon-ppcp-accept-paypal" checked disabled/> <span class="wpedon-ppcp-cb-view"></span>
                <img src="<?php echo $args['url']; ?>assets/images/paypal-logo.png" alt="<?php _e('PayPal logo', 'easy-paypal-donation'); ?>"/>
                <?php _e('Accept PayPal', 'easy-paypal-donation'); ?>
            </label>
        </div>

        <div class="wpedon-ppcp-field wpedon-ppcp-checkbox-field">
            <label data-title="<?php _e('PayPal does not currently support PayPal Advanced Card Payments in your country.', 'easy-paypal-donation'); ?>">
                <input type="checkbox" id="wpedon-ppcp-accept-cards"/> <span class="wpedon-ppcp-cb-view"></span>
                <img src="<?php echo $args['url']; ?>assets/images/paypal-advanced.png" alt="<?php _e('PayPal Advanced', 'easy-paypal-donation'); ?>"/>
                <?php _e('Accept Credit and Debit Card Payments with PayPal', 'easy-paypal-donation'); ?>
            </label>
            <div class="wpedon-ppcp-checkbox-note"><?php _e('* Direct Credit Card option will require a PayPal Business account and additional vetting.', 'easy-paypal-donation'); ?></div>
        </div>

        <div class="wpedon-ppcp-field wpedon-ppcp-checkbox-field">
            <label>
                <input type="checkbox" id="wpedon-ppcp-sandbox"/> <span class="wpedon-ppcp-cb-view"></span> <?php _e('Sandbox', 'easy-paypal-donation'); ?>
            </label>
        </div>

        <div class="wpedon-ppcp-buttons">
            <script>
              (function (d, s, id) {
                var js, ref = d.getElementsByTagName(s)[0]
                if (!d.getElementById(id)) {
                  js = d.createElement(s)
                  js.id = id
                  js.async = true
                  js.src =
                    'https://www.paypal.com/webapps/merchantboarding/js/lib/lightbox/partner.js'
                  ref.parentNode.insertBefore(js, ref)
                }
              }(document, 'script', 'paypal-js'))
            </script>
            <a
                    id="wpedon-ppcp-onboarding-start-btn"
                    class="wpedon-ppcp-button"
                    data-paypal-button="true"
                    href="<?php
                            echo add_query_arg(
                                [
                                    'action' => 'wpedon-ppcp-onboarding-start',
                                    'nonce' => wp_create_nonce('wpedon-ppcp-onboarding-start'),
                                    'country' => 'US',
                                    'button-id' => $args['button_id']
                                ],
                                admin_url('admin-ajax.php')
                            ); ?>"
                    target="PPFrame"><?php _e('Connect', 'easy-paypal-donation'); ?></a>
            <button id="wpedon-ppcp-setup-account-close-btn" class="wpedon-ppcp-button wpedon-ppcp-button-white"><?php _e('Cancel', 'easy-paypal-donation'); ?></button>
        </div>
    </div>
</div>