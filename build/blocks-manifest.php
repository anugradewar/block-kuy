<?php
// This file is generated. Do not modify it manually.
return array(
	'block-kuy' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'create-block/block-kuy',
		'version' => '0.1.0',
		'title' => 'Block Kuy',
		'category' => 'widgets',
		'icon' => 'smiley',
		'description' => 'Example block scaffolded with Create Block tool.',
		'example' => array(
			
		),
		'supports' => array(
			'html' => false
		),
		'textdomain' => 'block-kuy',
		'editorScript' => 'file:./index.js',
		'editorStyle' => 'file:./index.css',
		'style' => 'file:./style-index.css',
		'viewScript' => 'file:./view.js'
	),
	'display-custom-field-values' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'create-block/display-custom-field-values',
		'version' => '0.1.0',
		'title' => 'Display Custom Field Values',
		'category' => 'block-kuy',
		'icon' => 'text',
		'description' => 'Display list of custom fields created',
		'example' => array(
			
		),
		'supports' => array(
			'__experimentalBorder' => array(
				'color' => true,
				'radius' => true,
				'width' => true,
				'style' => true
			),
			'color' => array(
				'background' => true,
				'text' => true
			),
			'html' => false,
			'spacing' => array(
				'margin' => true,
				'padding' => true
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true
			)
		),
		'attributes' => array(
			'postType' => array(
				'type' => 'string',
				'default' => ''
			),
			'customField' => array(
				'type' => 'string',
				'default' => ''
			),
			'itemPosition' => array(
				'type' => 'boolean',
				'default' => false
			),
			'itemBackgroundColor' => array(
				'type' => 'string'
			),
			'itemPaddingBlock' => array(
				'type' => 'string',
				'default' => '8px'
			),
			'itemPaddingInline' => array(
				'type' => 'string',
				'default' => '8px'
			),
			'itemSpacing' => array(
				'type' => 'string',
				'default' => '8px'
			),
			'itemBorderRadius' => array(
				'type' => 'string',
				'default' => '8px'
			)
		),
		'textdomain' => 'display-custom-field-values',
		'editorScript' => 'file:./index.js',
		'editorStyle' => 'file:./index.css',
		'style' => 'file:./style-index.css',
		'render' => 'file:./render.php',
		'viewScript' => 'file:./view.js'
	)
);
