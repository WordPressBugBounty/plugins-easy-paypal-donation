=== Accept Donations with PayPal & Stripe ===
Contributors: scottpaterson,wp-plugin
Donate link: https://wpplugin.org/donate/
Tags: donation, donate, charity, paypal, ecommerce
Author URI: https://wpplugin.org
Requires at least: 3.0
Tested up to: 6.7
Requires PHP: 5.4
Stable tag: 1.4.5
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Add a PayPal or Stripe Donation Button to your website and start collecting donations today. No Coding Required. Official PayPal & Stripe Partner.

== Description ==

###  This plugin allows you to collect PayPal and Stripe donations on your website

Do you want to easily collect donations on your site? This is the plugin just for that. Setup is easy to connect to PayPal and Stripe. We're also an official PayPal & Stripe Partner.

### Have a question or problem?
If you have any problems, questions, or issues please create a [support request](https://wordpress.org/support/plugin/easy-paypal-donation/) and we will get back to you quickly!


###  Watch this 1 minute video of how the plugin works:

[youtube https://www.youtube.com/watch?v=YYUsrfnjNN0]

You can place a PayPal or Stripe Donation button anywhere on your site where you want to collect money. Your customers can use their PayPal account or Credit Card (via Stripe) to donate money to you.

>**[Learn more about our Pro version](https://wpplugin.org/downloads/paypal-donation-pro/)**

What makes this donation plugin powerful is its simplicity. Just install the plugin and in just a few minutes customers from around the world can start donating to you.

On the settings page of the plugin you will find clear instructions on how to sign up for a PayPal or Stripe account if you don't have one already. The plugin also provides instructions for how to setup a PayPal / Stripe Sandbox account - which will allow you to setup a fake PayPal buyer and seller account (with fake money) so you can test everything before you start selling to the public.

If you have any problems, questions, or issues about this PayPal plugin then please create a support request and we will get back to you quickly.

This plugin works with any WordPress theme.

###   PayPal & Stripe Donation Features

*	View donations made in your WordPress admin
*	Button Manager
*   Page / Post Button shortcode Inserter
*	Donation Widget
*   Built in support for 18 languages (PayPal currently supports 18 languages)
*   Built in support 25 currencies (PayPal currently supports 25 currencies)
*	Each button can have its own language and currency
*	Each button can have its own button image
*	Each button can have itw own PayPal account
*	PayPal testing with Sandbox mode
*	Customer can choose to make a recurring monthly PayPal donation
*	Choose  from 7 different PayPal donation buttons
*	Upload and use your own donation button
*	Choose how the PayPal window opens
*	Setup a dropdown menu to force certain amounts

###  Accept Donations with PayPal & Stripe Pro
> We offer a Pro version of this PayPal plugin for business owners who need more features.
>
> * Offer recurring donations.
> * Recurring donations can be set up per day, week, month and year.
> * Setup donations that recur forever.
> * Recurring donations dropdown menu.
> * Offer up to 20 amount dropdown menu options instead of 10.
>
>
> [You can learn more about Accept Donations with PayPal Pro here](https://wpplugin.org/downloads/paypal-donation-pro/)

###  About Us
WPPlugin LLC is an offical PayPal & Stripe Partner based in Boulder, Colorado. You can visit WP Plugins website at [wpplugin.org](https://wpplugin.org). Various trademarks held by their respective owners.

== Installation ==

= Automatic Installation =
> 1. Sign in to your WordPress site as an administrator.
> 2. In the main menu go to Plugins -> Add New.
> 3. Search for PayPal Donation Button and click install.
> 4. Configure values on the settings page.
> 5. Make a donation button on the button page. Place the shortcode it creates anywhere on your site to show the button.
> 6. You are now ready to start collecting donations via PayPal on your site.
== Frequently Asked Questions ==

= How do I use this PayPal plugin =
Configure values on the settings page. Make a donation button on the button page. Place the shortcode it creates anywhere on your site to show the button.

= Can I put more then one shortcode on the same post / page? =
Yes, there is no limit to the amount of PayPal donations buttons that you can put on one post / page, or your entire site.

== Screenshots ==
1. Donation Button
2. Settings Page
3. buttons Page
4. Orders Page
5. Widget Page
6. Button Inserter

== Changelog ==

= 1.4.5 =
* 2/18/25
* Fix - Fixed small security issue.

= 1.4.4 =
* 10/28/24
* Fix - PHP warning could show if language was set to default.

= 1.4.3 =
* 10/25/24
* New - Added feature for changing the "Donation Amount" text. This is a per button setting when using manual donation amounts.
* New - The Donation title label now has the CSS ID "wpedon-1-name-label" Replace 1 with whatever the button id is. The button id can be found on the Donation "Buttons" page.
* New - The Donation amount label now has the CSS ID "wpedon-1-amount-label" Replace 1 with whatever the button id is. The button id can be found on the Donation "Buttons" page.
* Fix - The "Show Currency" toggle now works for manual donation amounts.
* Change - Default manual donation amount text has been changed from "Donation amount" to "Donation Amount".
* Change - The Purpose / Name field is now required. It's best price to pass a value since PayPal and Stripe require a value to be set. Passing "No Item Name" isn't ideal.

= 1.4.2 =
* 5/20/24
* Added feature for setting the image attribute via the shortcode tag.

= 1.4.1 =
* 5/7/24
* Fix - Fixed bug related to casting an amount as a float that resulted in a PHP error.

= 1.4 =
* 4/29/24
* Major New Release
* The plugin now includes PayPal Commerce & Stripe

= 1.3.4 =
* 12/9/21
* Fix - Added nonce security check on admin orders page.

= 1.3.3 =
* 12/3/21
* Fix - Security fix

= 1.3.2 =
* 10/14/21
* Fix - Security Issues

= 1.3.1 =
* 10/1/21
* Fix - Security Issues

= 1.3 =
* 11/9/20
* Fix - Changed the variables for logging and deubgging to use WordPress globals. The plugin now uses: WP_DEBUG and WP_DEBUG_LOG
* Updated - Pro version feature list.

= 1.2.9 =
* 6/12/18
* Fix - Cannot modify header PHP warning in Divi page builder.
* Fix - CSS drodown menu height and background color attributes removed.

= 1.2.8 =
* 5/16/18
* Fix - Removed button title !important attribute

= 1.2.7 =
* 5/16/18
* Fix - Spelling mistake
* Fix - Link was not working

= 1.2.6 =
* 3/9/18
* Fix - Error message was being thrown in relation to widget function.

= 1.2.5 =
* 1/31/18
* New - Ability to pass name as shortcode attribute.

= 1.2.4 =
* 1/24/18
* Fix - PHP Error message caused by widget class name

= 1.2.3 =
* 6/15/17
* Updated - Tested plugin up to WordPress version 4.8
* Fix - Fixed code formatting issue

= 1.2.2 =
* 8/26/16
* Updated - Updated the settings page right sidebar to offer information about the pro version.

= 1.2.1 =
* 8/20/16
* Updated - Changed plugin name, dropped the word easy at the beginning.
* Updated - Updated WordPress version tested up to tag.

= 1.2 =
* 2/8/15
* Bug fix - Dropdown menu option 8 was not saving
* Updated - Updated WordPress version tested up to tag

= 1.1 =
* 12/20/15
* Bug fixes

= 1.0 =
* 12/11/15
* Initial release

== Upgrade Notice ==

= 1.2.2 =
* 8/26/16
* Updated - Updated the settings page right sidebar to offer information about the pro version.

= 1.2.1 =
* 8/20/16
* Updated - Changed plugin name, dropped the word easy at the beginning.
* Updated - Updated WordPress version tested up to tag.

= 1.2 =
* 2/8/15
* Bug fix - Dropdown menu option 8 was not saving
* Updated - Updated WordPress version tested up to tag

= 1.1 =
* 12/20/15
* Bug fixes

= 1.0 =
* 12/11/15
Initial release