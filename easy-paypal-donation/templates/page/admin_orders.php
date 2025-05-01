<style>
    .check-column {
        width: 2% !important;
    }
    .column-order {
        width: 10%;
    }
    .column-item {
        width: 10%;
    }
    .column-amount {
        width: 10%;
    }
    .column-status {
        width: 12%;
    }
</style>

<div style="width:98%">

	<table width="100%">
		<tr>
			<td>
				<br />
				<span style="font-size:20pt;"><?php _e('Donations', 'easy-paypal-donation'); ?></span>
            </td>
			<td valign="bottom">
			</td>
		</tr>
	</table>

	<?php
	if (isset($_GET['message'])):
		switch ($_GET['message']) {
			case 'deleted':
				echo "<div class='error'><p>" . __('Donation entry(s) deleted.', 'easy-paypal-donation') . "</p></div>";
				break;
            case 'not_found':
				echo "<div class='error'><p>" . __('Donation not found', 'easy-paypal-donation') . "</p></div>";
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
	endif; ?>

	<form id="products-filter" method="get">
		<input type="hidden" name="page" value="<?php echo esc_attr($_REQUEST['page']); ?>" />
		<?php 
		// Display the views (filters)
		$args['table']->views();
		// Display the table
		$args['table']->display();
		?>
	</form>
</div>