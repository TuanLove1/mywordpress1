<?php
ViewWpf::display('woofiltersEditTabCommonTitle');

$skins = array(
	'default' => 'default',
	'flat' => 'Flat skin' . $labelPro,
	'big' => 'Big skin' . $labelPro,
	'modern' => 'Modern skin' . $labelPro,
	'sharp' => 'Sharp skin' . $labelPro,
	'round' => 'Round skin' . $labelPro,
	'square' => 'Square skin' . $labelPro,
	'compact' => 'Compact skin' . $labelPro,
	'circle' => 'Circle skin' . $labelPro,
	'rail' => 'Rail skin' . $labelPro,
	'trolley' => 'Trolley skin' . $labelPro,
);
?>
<div class="row-settings-block">
	<div class="settings-block-label settings-w100 col-xs-4 col-sm-3">
		<?php esc_html_e('Filter skin', 'woo-product-filter'); ?>
		<i class="fa fa-question woobewoo-tooltip no-tooltip" title="
		<?php 
		echo esc_attr(__('Select the price filter skin. ', 'woo-product-filter') . ' <a href="https://woobewoo.com/documentation/price-product-filter/" target="_blank">' . __('Learn More', 'woo-product-filter') . '</a>.')
		; 
		?>
		"></i>
	</div>
	<div class="settings-block-values settings-w100 col-xs-8 col-sm-9">
		<div class="settings-value settings-w100">
			<?php 
				HtmlWpf::selectbox('f_skin_type', array(
					'options' => $skins,
					'attrs' => 'class="woobewoo-flat-input' . ( $isPro ? '' : ' wpfWithProAd' ) . '"'
				));
				?>
		</div>
	</div>
</div>
<?php 
if ($isPro) {
	DispatcherWpf::doAction('addEditTabFilters', 'partEditTabFiltersPriceSkin');
} else {
	foreach ($skins as $key => $value) {
		if (strpos($value, $labelPro)) {
			?>
			<div class="row-settings-block col-md-12 wpfPriceSkinPro wpfHidden" data-type="<?php echo esc_attr($key); ?>">
				<a href="https://woobewoo.com/plugins/woocommerce-filter/" target="_blank">
					<img class="wpfProAd" src="<?php echo esc_url($adPath . 'price_skin_' . $key . '.png'); ?>">
				</a>
			</div>
			<?php 
		} 
		if ('square' == $key) {
			break;
		}
	}
}
?>

<div class="row-settings-block">
	<div class="settings-block-label col-xs-4 col-sm-3">
		<?php esc_html_e('Show price input fields', 'woo-product-filter'); ?>
	</div>
	<div class="settings-block-values col-xs-8 col-sm-9">
		<div class="settings-value settings-w100">
			<?php HtmlWpf::checkboxToggle('f_show_inputs', array('checked' => 1)); ?>
		</div>
	</div>
</div>
<div class="row-settings-block f_show_inputs_enabled_currency">
	<div class="settings-block-label settings-w100 col-xs-4 col-sm-3">
		<?php esc_html_e('Symbol position', 'woo-product-filter'); ?>
	</div>
	<div class="settings-block-values settings-w100 col-xs-8 col-sm-9">
		<div class="settings-value settings-w100">
			<?php 
				HtmlWpf::selectbox('f_currency_position', array(
					'options' => array('before' => 'Before', 'after' => 'After'),
					'attrs' => 'class="woobewoo-flat-input"'
				));
				?>
		</div>
	</div>
</div>
<div class="row-settings-block f_show_inputs_enabled_currency">
	<div class="settings-block-label settings-w100 col-xs-4 col-sm-3">
		<?php esc_html_e('Show currency as', 'woo-product-filter'); ?>
	</div>
	<div class="settings-block-values settings-w100 col-xs-8 col-sm-9">
		<div class="settings-value settings-w100">
			<?php 
				HtmlWpf::selectbox('f_currency_show_as', array(
					'options' => array('symbol' => 'Symbol', 'code' => 'Code'),
					'attrs' => 'class="woobewoo-flat-input"'
				));
				?>
		</div>
	</div>
</div>
<div class="row-settings-block f_show_inputs_enabled_tooltip">
	<div class="settings-block-label col-xs-4 col-sm-3">
		<?php esc_html_e('Use text tooltip instead of input fields', 'woo-product-filter'); ?>
	</div>
	<div class="settings-block-values settings-w100 col-xs-8 col-sm-9">
		<div class="settings-value settings-w100">
			<?php HtmlWpf::checkboxToggle('f_price_tooltip_show_as', array('checked' => 1)); ?>
		</div>
	</div>
</div>
<?php
if ($isPro) {
	DispatcherWpf::doAction('addEditTabFilters', 'partEditTabFiltersPriceOptions');
}
?>
