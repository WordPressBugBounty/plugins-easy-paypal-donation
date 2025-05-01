<p>
    <label>
        <span><?php _e('Widget Name:', 'easy-paypal-donation'); ?></span>
        <input class="widefat"
               id="<?=esc_attr($args['field_id']);?>"
               name="<?=esc_attr($args['field_name_title']); ?>"
               type="text" value="<?=esc_attr($args['title']);?>"/>
    </label>
</p>

<?php _e('Choose an existing button:', 'easy-paypal-donation'); ?>
<br/>
<select id="wpedon_button_id" name="<?= esc_attr($args['field_name_idvalue']); ?>">
	<?php if (isset($args['posts'])):
		foreach ($args['posts'] as $post):
			$id = $post->ID;
			$post_title = $post->post_title;
			$price = get_post_meta($id, 'wpedon_button_price', true);
			$sku = get_post_meta($id, 'wpedon_button_id', true);
			$selected = $args['idvalue'] == $id ? "SELECTED" : ""; ?>
    <option value="<?=$id;?>" <?=$selected;?>>
      <?= __('Name: ', 'easy-paypal-donation').esc_html($post_title).__(' - Amount: ', 'easy-paypal-donation').esc_html($price).__(' - ID: ', 'easy-paypal-donation').esc_html($sku);?>
    </option>
    <?php
		endforeach;
	else:
		echo "<option>" . __('No buttons found.', 'easy-paypal-donation') . "</option>";
	endif; ?>
</select>
<br/>
<?php _e('Make a new button:', 'easy-paypal-donation'); ?> <a target="_blank" href="<?= get_admin_url(null, 'admin.php?page=wpedon_buttons&action=new'); ?>"><?php _e('here', 'easy-paypal-donation'); ?></a><br/>
<?php _e('Manage existing buttons:', 'easy-paypal-donation'); ?> <a target="_blank" href="<?= get_admin_url(null, 'admin.php?page=wpedon_buttons'); ?>"><?php _e('here', 'easy-paypal-donation'); ?></a>
<br/>
<br/>