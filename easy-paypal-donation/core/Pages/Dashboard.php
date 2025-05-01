<?php

namespace WPEasyDonation\Pages;

class Dashboard
{
	/**
	 * init services
	 */
	public function register()
	{
		add_action("admin_menu", array($this, 'menu'));
	}

	/**
	 * admin menu
	 */
	function menu() {
		add_menu_page(__("Easy Donations", 'easy-paypal-donation'), __("Donations with PayPal & Stripe", 'easy-paypal-donation'), "manage_options", "wpedon_menu", array(new OrderPage(), 'render'),'dashicons-cart','28.5');

		add_submenu_page("wpedon_menu", __("Donations", 'easy-paypal-donation'), __("Donations", 'easy-paypal-donation'), "manage_options", "wpedon_menu", array(new OrderPage(), 'render'));

		add_submenu_page("wpedon_menu", __("Buttons", 'easy-paypal-donation'), __("Buttons", 'easy-paypal-donation'), "manage_options", "wpedon_buttons", [new ButtonPage(), 'render']);

		add_submenu_page("wpedon_menu", __("Settings", 'easy-paypal-donation'), __("Settings", 'easy-paypal-donation'), "manage_options", "wpedon_settings", array(new SettingPage(), 'render'));
	}
}