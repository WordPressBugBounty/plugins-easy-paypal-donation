<script type="text/javascript">
  function wpedon_button_InsertShortcode () {
    const id = document.getElementById('wpedon_button_id').value;
    const wpedon_alignmentc = document.getElementById('wpedon_align');
    const wpedon_alignmentb = wpedon_alignmentc.options[wpedon_alignmentc.selectedIndex].value;

    if (id === 'No buttons found.') {
      alert('Error: Please select an existing button from the dropdown or make a new one.');
      return false;
    }
    if (id === '') {
      alert('<?php echo esc_js(__('Error: Please select an existing button from the dropdown or make a new one.', 'easy-paypal-donation')); ?>');
      return false;
    }
    const wpedon_alignment = wpedon_alignmentb === 'none' ? '' : ' align="' + wpedon_alignmentb + '"';
    window.send_to_editor('[wpedon id="' + id + '"' + wpedon_alignment + ']');
    document.getElementById('wpedon_button_id').value = '';
    wpedon_alignmentc.selectedIndex = null;
  }
</script>

<div id="wpedon_popup_container" style="display:none;">
    <h2><?php esc_html_e('PayPal & Stripe Donation Button', 'easy-paypal-donation'); ?></h2>
    <table>
        <tr>
            <td>
                <?php esc_html_e('Choose an existing button:', 'easy-paypal-donation'); ?>
            </td>
        </tr>
        <tr>
            <td>
                <select id="wpedon_button_id" name="wpedon_button_id">
                    <?php
                    $args = array('post_type' => 'wpplugin_don_button', 'posts_per_page' => -1);
                    $posts = get_posts($args);
                    $count = 0;

                    if (isset($posts)) {
                        foreach ($posts as $post) {
                            $id = $posts[$count]->ID;
                            $post_title = $posts[$count]->post_title;
                            $price = get_post_meta($id, 'wpedon_button_price', true);
                            $sku = get_post_meta($id, 'wpedon_button_id', true);

                            printf(
                                '<option value="%d">%s: %s - %s: %s - %s: %s</option>',
                                $id,
                                esc_html__('Name', 'easy-paypal-donation'),
                                esc_html($post_title),
                                esc_html__('Amount', 'easy-paypal-donation'),
                                esc_html($price),
                                esc_html__('ID', 'easy-paypal-donation'),
                                esc_html($sku)
                            );
                            $count++;
                        }
                    } else {
                        esc_html_e('No buttons found.', 'easy-paypal-donation');
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>
                <?php esc_html_e('Make a new button:', 'easy-paypal-donation'); ?> <a target="_blank" href="<?php echo esc_url(get_admin_url(null, 'admin.php?page=wpedon_buttons&action=new')); ?>"><?php esc_html_e('here', 'easy-paypal-donation'); ?></a><br/>
                <?php esc_html_e('Manage existing buttons:', 'easy-paypal-donation'); ?> <a target="_blank" href="<?php echo esc_url(get_admin_url(null, 'admin.php?page=wpedon_buttons')); ?>"><?php esc_html_e('here', 'easy-paypal-donation'); ?></a>
            </td>
        </tr>
        <tr>
            <td>
                <br/>
            </td>
        </tr>
        <tr>
            <td>
                <?php esc_html_e('Alignment:', 'easy-paypal-donation'); ?>
            </td>
        </tr>
        <tr>
            <td>
                <select id="wpedon_align" name="wpedon_align" style="width:100%;max-width:190px;">
                    <option value="none"></option>
                    <option value="left"><?php esc_html_e('Left', 'easy-paypal-donation'); ?></option>
                    <option value="center"><?php esc_html_e('Center', 'easy-paypal-donation'); ?></option>
                    <option value="right"><?php esc_html_e('Right', 'easy-paypal-donation'); ?></option>
                </select>
            </td>
        </tr>
        <tr>
            <td><?php esc_html_e('Optional', 'easy-paypal-donation'); ?></td>
        </tr>
        <tr>
            <td>
                <br/>
            </td>
        </tr>
        <tr>
            <td>
                <input type="button" id="wpedon-paypal-insert" class="button-primary"
                       onclick="wpedon_button_InsertShortcode();" value="<?php esc_attr_e('Insert Button', 'easy-paypal-donation'); ?>">
            </td>
        </tr>
    </table>
</div>