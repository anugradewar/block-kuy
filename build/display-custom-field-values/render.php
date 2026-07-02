<?php
/**
 * PHP file to use when rendering the block type on the server to show on the front end.
 *
 * The following variables are exposed to the file:
 *     $attributes (array): The block attributes.
 *     $content (string): The block default content.
 *     $block (WP_Block): The block instance.
 *
 * @see https://github.com/WordPress/gutenberg/blob/trunk/docs/reference-guides/block-api/block-metadata.md#render
 */
$border_radius         = $attributes['itemBorderRadius'];
$custom_field          = $attributes['customField'];
$item_background_color = $attributes['itemBackgroundColor'];
$item_padding_block    = $attributes['itemPaddingBlock'];
$item_padding_inline   = $attributes['itemPaddingInline'];
$item_spacing          = $attributes['itemSpacing'];
$item_position         = $attributes['itemPosition'];
$flex_direction        = 'row';

if ( ! $custom_field ) {
	return;
}
$values = get_post_meta( get_the_ID(), $custom_field, false );

if ( ! empty( $item_position ) ) {
	$flex_direction = 'column';
}

$block_props = get_block_wrapper_attributes(
	array(
		'class' => 'fun-blocks__display-custom-field__container',
		'style' =>
			'flex-direction:' . esc_attr( $flex_direction ) .
			';gap:' . esc_attr( $item_spacing ) . ';',
	)
);

ob_start();
?>

<div <?php echo wp_kses_data( $block_props ); ?>>

<?php
foreach ( $values as $value ) {
?>
	<p class="fun-blocks__display-custom-field__item"
		style="
		background-color: <?php echo esc_attr( $item_background_color ); ?>;
		border-radius: <?php echo esc_attr( $border_radius ); ?>;
		padding-block: <?php echo esc_attr( $item_padding_block ); ?>;
		padding-inline: <?php echo esc_attr( $item_padding_inline ); ?>;
	">
		<? echo esc_html($value); ?>
	</p><?
}
echo '</div>';
$render = ob_get_clean();

echo $render;