<?php

// Handle No Product Image
if ( ! $images ) {
	echo '<div id="message" class="error"><p>Your store has no images.</p></div>';
	return;
}

?>

<div style="margin: 20px;">

	<p><?php echo $paginate_links; ?></p>

	<table style="width: 100%;">
		<tbody>

			<?php
			// Loop Product Images
			foreach( $images as $i => $imagedata ) {
				extract( $imagedata );
				$uniqid = uniqid();
			?>

			<tr>
				<td width="20%">
					<img id="<?php echo $uniqid; ?>" src="<?php echo $path; ?>" style="width: 100px;" />
				</td>
				<td width="60%"><?php echo $name; ?></td>
				<td width="20%">
					<input type="button" class="button-secondary"
						onclick="Bigcommerce_send_to_editor( '<?php echo $uniqid; ?>' );"
						value="<?php _e( 'Insert into Post', 'wpinterspire' ); ?>" />
				</td>
			</tr>

			<?php } ?>

		</tbody>
	</table>
</div>

<script type="text/javascript">
function Bigcommerce_send_to_editor( uniqid ) {
	var html = '<img src="' + jQuery( '#' + uniqid ).attr( 'src' ) + '" />';
	var win = window.dialogArguments || opener || parent || top;
	win.send_to_editor( html );
}
</script>