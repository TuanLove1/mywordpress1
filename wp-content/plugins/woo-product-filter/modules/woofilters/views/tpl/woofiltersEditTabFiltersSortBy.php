<?php
	ViewWpf::display('woofiltersEditTabCommonTitle');
?>
<div class="row-settings-block">
	<div class="settings-block-label settings-w100 col-xs-4 col-sm-3">
		<?php esc_html_e('Show on frontend as', 'woo-product-filter'); ?>
		<i class="fa fa-question woobewoo-tooltip no-tooltip" title="<?php echo esc_attr(__('You can choose to display the sorting by dropdown or radio buttons', 'woo-product-filter')); ?>"></i>
	</div>
	<div class="settings-block-values settings-w100 col-xs-8 col-sm-9">
		<div class="settings-value settings-w100">
			<?php
				HtmlWpf::selectbox('f_frontend_type', array(
					'options' => array(
						'dropdown' => 'Dropdown (single select)',
						'mul_dropdown' => 'Stylized Dropdown' . $labelPro,
						'radio' => 'Radiobuttons list (single select)',
					),
					'attrs' => 'class="woobewoo-flat-input"'
				));
				?>
		</div>
	</div>
</div>
<div class="row-settings-block">
	<div class="settings-block-label settings-w100 col-xs-4 col-sm-3">
		<?php esc_html_e('Sort options', 'woo-product-filter'); ?>
		<i class="fa fa-question woobewoo-tooltip no-tooltip" title="<?php echo esc_attr(__('Select the sorting options available for site users (min two options). ', 'woo-product-filter') . ' <a href="https://woobewoo.com/documentation/sort-by/" target="_blank">' . __('Learn More', 'woo-product-filter') . '</a>.'); ?>"></i>
	</div>
	<div class="sub-block-values settings-w100 col-xs-8 col-sm-9">
		<div class="settings-value settings-value-elementor-row-revert">
			<?php
			$options = array();
			foreach ($this->getModel('woofilters')->getFilterLabels('SortBy') as $key => $value) {
				$options[] = array(
					'id' => 'f_sortby_' . $key,
					'value' => $key, 
					'checked' => 1, 
					'text' => '<div><input type="text" class="woobewoo-flat-input" name="f_option_labels[' . $key . ']" placeholder="' . esc_attr($value) . '"/></div>'
					);
			}
			HtmlWpf::checkboxlist('f_options', array('options' => $options), '</div><div class="settings-value settings-value-elementor-row-revert">');
			?>
		</div>
	</div>
</div>
