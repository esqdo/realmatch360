<?php
if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_products',
		'title' => 'Products',
		'fields' => array (
			array (
				'key' => 'field_53f5d67afd6f5',
				'label' => 'Detailanalysescreenshot',
				'name' => 'detailanalysescreenshot',
				'type' => 'image',
				'save_format' => 'object',
				'preview_size' => 'thumbnail',
				'library' => 'all',
			),
			array (
				'key' => 'field_53f62f1d07274',
				'label' => 'detailanalyse',
				'name' => 'detailanalyse',
				'type' => 'textarea',
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
				'rows' => '',
				'formatting' => 'html',
			),
			array (
				'key' => 'field_53f5d79144da8',
				'label' => 'MS-RegionScreenshot',
				'name' => 'ms-regionscreenshot',
				'type' => 'image',
				'save_format' => 'object',
				'preview_size' => 'thumbnail',
				'library' => 'all',
			),
			array (
				'key' => 'field_53f62f2cd88dc',
				'label' => 'ms-region',
				'name' => 'ms-region',
				'type' => 'textarea',
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
				'rows' => '',
				'formatting' => 'html',
			),
			array (
				'key' => 'field_53f5d7ac44da9',
				'label' => ' Projektcheckscreenshot',
				'name' => '_projektcheckscreenshot',
				'type' => 'image',
				'save_format' => 'object',
				'preview_size' => 'thumbnail',
				'library' => 'all',
			),
			array (
				'key' => 'field_53f62f5544722',
				'label' => 'projektcheck',
				'name' => 'projektcheck',
				'type' => 'textarea',
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
				'rows' => '',
				'formatting' => 'html',
			),
			array (
				'key' => 'field_5647865fda951',
				'label' => 'Pricesetterscreenshot',
				'name' => '_pricesetterscreenshot',
				'type' => 'image',
				'save_format' => 'object',
				'preview_size' => 'thumbnail',
				'library' => 'all',
			),
			array (
				'key' => 'field_5647863cda950',
				'label' => 'pricesetter',
				'name' => 'pricesetter',
				'type' => 'textarea',
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
				'rows' => '',
				'formatting' => 'html',
			),
			array (
				'key' => 'field_53ee09d295c26',
				'label' => 'Preisliste',
				'name' => 'preisliste',
				'type' => 'textarea',
				'default_value' => '<div class="grid_11">
	<h2>Preisliste</h2>
	Der <a href="http://www.realmatch360.com/documents/realmatch360_preisliste.pdf" target="_blank">Preisliste</a> entnehmen Sie die Details der Produkte und die Kostenmodelle.
	</div>',
				'placeholder' => '',
				'maxlength' => '',
				'rows' => '',
				'formatting' => 'html',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'page-realmatch360-funktionen.php',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
			array (
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'page-dienstleistungen.php',
					'order_no' => 0,
					'group_no' => 1,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
}
?>
