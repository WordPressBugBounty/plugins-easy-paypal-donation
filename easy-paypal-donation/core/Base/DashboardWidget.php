<?php

namespace WPEasyDonation\Base;

use WPEasyDonation\API\Order;

class DashboardWidget
{
    /**
     * Initialize the dashboard widget
     */
    public function register()
    {
        add_action('wp_dashboard_setup', array($this, 'add_dashboard_widget'));
    }

    /**
     * Add the dashboard widget
     */
    public function add_dashboard_widget()
    {
        wp_add_dashboard_widget(
            'wpedon_recent_donations',
            __('Accept Donations with PayPal & Stripe - Donations', 'easy-paypal-donation'),
            array($this, 'render_dashboard_widget')
        );
    }

    /**
     * Render the dashboard widget content
     */
    public function render_dashboard_widget()
    {
        $args = array(
            'post_type' => 'wpplugin_don_order',
            'posts_per_page' => 10,
            'orderby' => 'date',
            'order' => 'DESC'
        );

        $donations = get_posts($args);

        if (empty($donations)) {
            echo '<p>' . __('No donations found.', 'easy-paypal-donation') . '</p>';
            return;
        }

        echo '<div class="wpedon-dashboard-widget">';
        echo '<table class="widefat">';
        echo '<thead><tr>';
        echo '<th>' . __('ID', 'easy-paypal-donation') . '</th>';
        echo '<th>' . __('Date', 'easy-paypal-donation') . '</th>';
        echo '<th>' . __('Amount', 'easy-paypal-donation') . '</th>';
        echo '<th>' . __('Status', 'easy-paypal-donation') . '</th>';
        echo '</tr></thead>';
        echo '<tbody>';

        foreach ($donations as $donation) {
            $order_meta = Order::getOrderMeta($donation->ID);
            $amount = isset($order_meta['wpedon_button_payment_amount']) ? number_format((float)$order_meta['wpedon_button_payment_amount'], 2) : '0.00';
            $status = isset($order_meta['wpedon_button_payment_status']) ? $order_meta['wpedon_button_payment_status'] : '';
            $date = wp_date(get_option('date_format') . ' ' . get_option('time_format'), strtotime($donation->post_date));
            
            // Create view URL for the donation
            $view_url = wp_nonce_url(
                admin_url('admin.php?page=wpedon_menu&action=view&order=' . $donation->ID),
                'view_' . $donation->ID
            );
            
            echo '<tr>';
            echo '<td><a href="' . esc_url($view_url) . '">#' . esc_html($donation->ID) . '</a></td>';
            echo '<td>' . esc_html($date) . '</td>';
            echo '<td>' . esc_html($amount) . '</td>';
            echo '<td>' . esc_html(ucfirst($status)) . '</td>';
            echo '</tr>';
        }

        echo '</tbody>';
        echo '</table>';
        
        // Add a link to view all donations
        echo '<p class="textright">';
        echo '<a href="' . esc_url(admin_url('admin.php?page=wpedon_menu')) . '" class="button">';
        echo __('View All Donations', 'easy-paypal-donation');
        echo '</a>';
        echo '</p>';
        
        echo '</div>';
    }
} 