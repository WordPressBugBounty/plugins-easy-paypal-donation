/**
 * Frontend button handler
 *
 * Converted from jQuery to vanilla JS so the file does not depend on
 * jQuery
 *
 */
(function () {
    'use strict';

    function init() {
        // Delegated click handler, equivalent to:
        //   jQuery(document).on('click', '.wpedon-stripe-button', ...)
        document.addEventListener('click', function (e) {
            var button = e.target.closest ? e.target.closest('.wpedon-stripe-button') : null;
            if (!button) return;

            // Equivalent of jQuery handler returning false:
            // prevent default action and stop propagation.
            e.preventDefault();
            e.stopPropagation();

            var form = button.closest('form');
            var message = form ? form.querySelector('.wpedon-stripe-message') : null;

            if (button.classList.contains('processing')) return false;
            button.classList.add('processing');

            if (message) message.innerHTML = '';

            function setMessage(html) {
                if (message) message.innerHTML = html;
            }

            function failHandler() {
                setMessage('<span class="stripe-error">An unexpected error occurred. Please try again.</span>');
                button.classList.remove('processing');
            }

            // Mirror $form.serialize(): URL-encoded form payload of successful controls.
            var formSerialized = form
                ? new URLSearchParams(new FormData(form)).toString()
                : '';

            // Mirror $.post payload: application/x-www-form-urlencoded body.
            var body = new URLSearchParams({
                action: 'wpedon_stripe_checkout_session',
                nonce: wpedon.nonce,
                data: formSerialized,
                location: window.location.href
            });

            fetch(wpedon.ajaxUrl, {
                method: 'POST',
                credentials: 'same-origin',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8',
                    'Accept': 'application/json, text/javascript, */*; q=0.01',
                    'X-Requested-With': 'XMLHttpRequest'
                },
                body: body.toString()
            }).then(function (resp) {
                // jQuery's .fail() fires on non-2xx, so emulate that here.
                if (!resp.ok) {
                    throw new Error('HTTP ' + resp.status);
                }
                return resp.json();
            }).then(function (response) {
                if (response.success) {
                    if (wpedon.opens == '1') {
                        try {
                            var stripe = Stripe(response.data.stripeKey, {
                                stripeAccount: response.data.accountId
                            });
                            stripe.redirectToCheckout({
                                sessionId: response.data.sessionId
                            });
                        } catch (error) {
                            setMessage('<span class="stripe-error">' + error + '</span>');
                            button.classList.remove('processing');
                        }
                    } else {
                        button.classList.remove('processing');

                        var siteUrl = location.protocol + '//' + location.host + location.pathname;

                        var params = new URLSearchParams(location.search);
                        params.delete('wpedon_stripe_success');
                        params = params.toString();

                        var url = siteUrl + '?' + new URLSearchParams({
                            'wpedon-stripe-checkout-redirect': 1,
                            'sk': response.data.stripeKey,
                            'ai': response.data.accountId,
                            'si': response.data.sessionId,
                            'rf': siteUrl + (params.length ? '?' + params : '')
                        });
                        window.open(url, '_blank').focus();
                    }
                } else {
                    setMessage('<span class="stripe-error">' + response.data.message + '</span>');
                    button.classList.remove('processing');
                }
            }).catch(failHandler);

            return false;
        });
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }
})();
