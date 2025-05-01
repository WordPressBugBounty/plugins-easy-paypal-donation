<?php

namespace WPEasyDonation\Table;

use WP_List_Table;
use WPEasyDonation\API\Order;

class OrderTable extends WP_List_Table
{
	/**
	 * construct
	 */
	function __construct()
	{
		global $status, $page;

		parent::__construct(array(
			'singular' => 'order',
			'plural' => 'orders',
			'ajax' => false
		));
	}

	/**
	 * Get payment status views
	 * @return array
	 */
	function get_views() {
		$views = array();
		$current = isset($_GET['payment_status']) ? sanitize_text_field($_GET['payment_status']) : 'all';

		// Get all payment statuses
		$statuses = array(
			'all' => __('All', 'easy-paypal-donation'),
			'completed' => __('Completed', 'easy-paypal-donation'),
			'pending' => __('Pending', 'easy-paypal-donation'),
			'refunded' => __('Refunded', 'easy-paypal-donation'),
			'failed' => __('Failed', 'easy-paypal-donation')
		);

		// Get count for each status
		$counts = array();
		$all_posts = get_posts(array(
			'post_type' => 'wpplugin_don_order',
			'posts_per_page' => -1
		));

		foreach ($all_posts as $post) {
			$order_meta = Order::getOrderMeta($post->ID);
			$status = isset($order_meta['wpedon_button_payment_status']) ? $order_meta['wpedon_button_payment_status'] : '';
			if (!isset($counts[$status])) {
				$counts[$status] = 0;
			}
			$counts[$status]++;
		}

		// Create view links
		foreach ($statuses as $status => $label) {
			$count = ($status === 'all') ? count($all_posts) : ($counts[$status] ?? 0);
			$class = ($current === $status) ? ' class="current"' : '';
			$url = add_query_arg('payment_status', $status);
			$views[$status] = sprintf(
				'<a href="%s"%s>%s <span class="count">(%d)</span></a>',
				esc_url($url),
				$class,
				$label,
				$count
			);
		}

		return $views;
	}

	/**
	 * get data
	 * @return array
	 */
	function get_data()
	{
		global $wp_query;

		$args = array(
			'post_type' => 'wpplugin_don_order',
			'posts_per_page' => -1,
			'order' => 'DESC',
			'orderby' => 'ID'
		);

		// Add payment status filter if set
		$payment_status = isset($_GET['payment_status']) ? sanitize_text_field($_GET['payment_status']) : '';
		if ($payment_status && $payment_status !== 'all') {
			$args['meta_query'] = array(
				array(
					'key' => 'wpedon_button_payment_status',
					'value' => $payment_status,
					'compare' => '='
				)
			);
		}

		$posts = get_posts($args);

		$count = "0";
		foreach ($posts as $post) {
			$id = esc_attr($posts[$count]->ID);
			$post_title = esc_attr($posts[$count]->post_title);
			$post_date = !empty($order_meta['payment_date']) ? esc_attr( $order_meta['payment_date'] ) : esc_attr($posts[$count]->post_date);
			$order_meta = Order::getOrderMeta($id);
			$item_number = isset( $order_meta['wpedon_button_item_number'] ) ? esc_attr( $order_meta['wpedon_button_item_number'] ) : '';
			$payment_status = isset( $order_meta['wpedon_button_payment_status'] ) ? esc_attr( $order_meta['wpedon_button_payment_status'] ) : '';
			$payment_amount = isset( $order_meta['wpedon_button_payment_amount'] ) ? esc_attr( $order_meta['wpedon_button_payment_amount'] ) : '';
			$payer_email = isset( $order_meta['wpedon_button_payer_email'] ) ? esc_attr( $order_meta['wpedon_button_payer_email'] ) : '';

			$order = $id;
			$item = $post_title . "<br />" . $item_number;

			$status = $payment_status . "<br />" . $payer_email;
			$post_date = wp_date(get_option('date_format') . ' ' . get_option('time_format'), strtotime($post_date));

			$data[] = array(
				'ID' => $id,
				'order' => $order,
				'item' => $item,
				'amount' => number_format((float)$payment_amount, 2),
				'status' => $status,
				'date' => $post_date
			);

			$count++;
		}

		if (empty($data)) {
			$data = array();
		}

		return $data;
	}

	/**
	 * column default
	 * @param array|object $item
	 * @param string $column_name
	 * @return bool|mixed|string|void
	 */
	function column_default($item, $column_name)
	{
		switch ($column_name) {
			case 'order':
			case 'amount':
			case 'date':
				return $item[$column_name];
			case 'status':
				return ucfirst( $item[$column_name] );
			default:
				return print_r($item, true);
		}
	}

	/**
	 * column order
	 * @param $item
	 * @return string
	 */
	function column_order($item)
	{
		// view
		$view_bare = '?page=wpedon_menu&action=view&order=' . $item['ID'];
		$view_url = wp_nonce_url($view_bare, 'view_' . $item['ID']);

		// delete
		$delete_bare = '?page=wpedon_menu&action=delete&inline=true&order=' . $item['ID'];
		$delete_url = wp_nonce_url($delete_bare, 'bulk-' . $this->_args['plural']);

		$actions = array(
			'edit' => '<a href="' . esc_url($view_url) . '">' . esc_html__('View', 'easy-paypal-donation') . '</a>',
			'delete' => '<a href="' . esc_url($delete_url) . '">' . esc_html__('Delete', 'easy-paypal-donation') . '</a>'
		);

		return sprintf('%1$s %2$s',
			$item['order'],
			$this->row_actions($actions)
		);
	}

	/**
	 * column cb
	 * @param array|object $item
	 * @return string|void
	 */
	function column_cb($item)
	{
		return sprintf(
			'<input type="checkbox" name="%1$s[]" value="%2$s" />',
			esc_attr($this->_args['singular']),
			esc_attr($item['ID'])
		);
	}

	/**
	 * get columns
	 * @return string[]
	 */
	function get_columns()
	{
		$columns = array(
			'cb' => '<input type="checkbox" />',
			'order' => esc_html__('Donation #', 'easy-paypal-donation'),
			'amount' => esc_html__('Amount', 'easy-paypal-donation'),
			'status' => esc_html__('Status / Email', 'easy-paypal-donation'),
			'date' => esc_html__('Date', 'easy-paypal-donation')
		);
		return $columns;
	}

	/**
	 * get sortable columns
	 * @return array[]
	 */
	function get_sortable_columns()
	{
		return array(
			'id' => array('id', false),
			'order' => array('order', false)
		);
	}

	/**
	 * no items message
	 */
	function no_items()
	{
		esc_html_e('No donations found.', 'easy-paypal-donation');
	}

	/**
	 * get bulk actions
	 * @return string[]
	 */
	function get_bulk_actions()
	{
		$actions = array(
			'delete' => esc_html__('Delete', 'easy-paypal-donation')
		);
		return $actions;
	}

	/**
	 * process bulk action
	 */
	function process_bulk_action()
	{
		if (isset($_GET['_wpnonce']) && !empty($_GET['_wpnonce'])) {
			$nonce = $_GET['_wpnonce'];
			$action = 'bulk-' . $this->_args['plural'];

			if (!wp_verify_nonce($nonce, $action)) {
				wp_die(esc_html__('Security check fail', 'easy-paypal-donation'));
			}
		}
	}

	/**
	 * prepare items
	 */
	function prepare_items()
	{
		global $wpdb;

		$per_page = 50;

		$columns = $this->get_columns();
		$hidden = array();
		$sortable = $this->get_sortable_columns();

		$this->_column_headers = array($columns, $hidden, $sortable);

		$this->process_bulk_action();

		$data = $this->get_data();

		if (isset($_REQUEST['orderby'])) {
			function usort_reorder($a, $b)
			{
				$orderby = (!empty($_REQUEST['orderby'])) ? sanitize_text_field($_REQUEST['orderby']) : 'order';
				$order = (!empty($_REQUEST['order'])) ? sanitize_text_field($_REQUEST['order']) : 'asc';
				$result = strcmp($a[$orderby], $b[$orderby]);
				return ($order === 'asc') ? $result : -$result;
			}

			usort($data, 'usort_reorder');
		}

		$current_page = $this->get_pagenum();


		$total_items = count($data);

		$data = array_slice($data, (($current_page - 1) * $per_page), $per_page);

		$this->items = $data;

		$this->set_pagination_args(array(
			'total_items' => $total_items,
			'per_page' => $per_page,
			'total_pages' => ceil($total_items / $per_page)
		));
	}

	/**
	 * get pagination
	 */
	function get_pagination() {
		ob_start();
		$this->pagination('top');
		$tableHtml = ob_get_clean();
	}
}