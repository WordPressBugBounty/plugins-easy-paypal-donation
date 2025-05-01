<style>
    .check-column {
        width: 2% !important;
    }
    .column-product {
        width: 25%;
    }
    .column-shortcode {
        width: 35%;
    }
    .column-price {
        width: 25%;
    }
    .column-sku {
        width: 13%;
    }
</style>

<div style="width:98%">
	<table width="100%">
		<tr>
			<td>
				<br />
				<span style="font-size:20pt;"><?php _e('Easy Donation Buttons', 'easy-paypal-donation'); ?></span>
			</td>
			<td valign="bottom">
				<a href="?page=wpedon_buttons&action=new" name='btn2' class='button-primary' style='font-size: 14px;height: 30px;float: right;'><?php _e('New PayPal Donation Button', 'easy-paypal-donation'); ?></a>
			</td>
		</tr>
	</table>

	<?php
	if (isset($_GET['message'])) {
		switch ($_GET['message']) {
			case 'created':
				echo "<div class='updated'><p>" . __('Button created.', 'easy-paypal-donation') . "</p></div>";
				break;
			case 'deleted':
				echo "<div class='updated'><p>" . __('Button(s) deleted.', 'easy-paypal-donation') . "</p></div>";
				break;
			case 'nothing':
				echo "<div class='error'><p>" . __('No action selected.', 'easy-paypal-donation') . "</p></div>";
				break;
			case 'nothing_deleted':
				echo "<div class='error'><p>" . __('Nothing selected to delete.', 'easy-paypal-donation') . "</p></div>";
				break;
			case 'error':
				echo "<div class='error'><p>" . __('An error occured while processing the query. Please try again.', 'easy-paypal-donation') . "</p></div>";
		}
	} ?>

	<form id="products-filter" method="get">
		<input type="hidden" name="page" value="<?php echo esc_attr($_REQUEST['page']); ?>" />
		<?=$args['table']; ?>
	</form>
</div>