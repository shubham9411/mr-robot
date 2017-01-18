<?php
$id = get_page_by_title('Settings')->ID;
if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_coming-soon',
		'title' => 'Coming Soon!',
		'fields' => array (
			array (
				'key' => 'field_587f3c579b3e9',
				'label' => 'Coming Soon',
				'name' => 'coming_soon',
				'type' => 'relationship',
				'return_format' => 'id',
				'post_type' => array (
					0 => 'post',
				),
				'taxonomy' => array (
					0 => 'all',
				),
				'filters' => array (
					0 => 'search',
				),
				'result_elements' => array (
					0 => 'post_type',
					1 => 'post_title',
				),
				'max' => 2,
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'page',
					'operator' => '==',
					'value' => $id,
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'acf_after_title',
			'layout' => 'default',
			'hide_on_screen' => array (
				0 => 'permalink',
				1 => 'the_content',
				2 => 'excerpt',
				3 => 'custom_fields',
				4 => 'discussion',
				5 => 'comments',
				6 => 'revisions',
				7 => 'slug',
				8 => 'author',
				9 => 'format',
				10 => 'featured_image',
				11 => 'categories',
				12 => 'tags',
				13 => 'send-trackbacks',
			),
		),
		'menu_order' => 0,
	));
}
