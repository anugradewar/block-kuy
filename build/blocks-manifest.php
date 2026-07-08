<?php
// This file is generated. Do not modify it manually.
return array(
	'display-custom-field-values' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'create-block/display-custom-field-values-old',
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
	),
	'number-counter' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'create-block/number-counter',
		'version' => '0.1.0',
		'title' => 'Number Counter',
		'category' => 'block-kuy',
		'icon' => 'sort',
		'description' => 'A block to count up or down the number displayed',
		'example' => array(
			
		),
		'supports' => array(
			'__experimentalBorder' => array(
				'color' => true,
				'radius' => true,
				'width' => true,
				'style' => true
			),
			'html' => false,
			'color' => array(
				'background' => true,
				'gradients' => true,
				'text' => false
			),
			'spacing' => array(
				'margin' => true,
				'padding' => true,
				'blockGap' => false
			)
		),
		'attributes' => array(
			'alignment' => array(
				'type' => 'string',
				'default' => 'center'
			),
			'prefix' => array(
				'type' => 'string'
			),
			'endNumber' => array(
				'type' => 'number',
				'default' => 100
			),
			'suffix' => array(
				'type' => 'string',
				'default' => '+'
			),
			'duration' => array(
				'type' => 'number',
				'default' => 1500
			),
			'numberSize' => array(
				'type' => 'string',
				'default' => '40px'
			),
			'numberColor' => array(
				'type' => 'string'
			),
			'text' => array(
				'type' => 'string',
				'default' => 'Your Text'
			),
			'textSize' => array(
				'type' => 'string',
				'default' => '1rem'
			),
			'textColor' => array(
				'type' => 'string'
			),
			'textGap' => array(
				'type' => 'string',
				'default' => '0px'
			)
		),
		'textdomain' => 'number-counter',
		'editorScript' => 'file:./index.js',
		'editorStyle' => 'file:./index.css',
		'style' => 'file:./style-index.css',
		'viewScript' => 'file:./view.js'
	),
	'running-images' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'create-block/running-images',
		'version' => '0.1.0',
		'title' => 'Running Images',
		'category' => 'block-kuy',
		'icon' => 'images-alt2',
		'description' => 'A block where you can add images and they will move infinitely.',
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
				'gradients' => true,
				'text' => false
			),
			'html' => false,
			'spacing' => array(
				'margin' => true,
				'padding' => true,
				'blockGap' => false
			)
		),
		'attributes' => array(
			'imageAspectRatio' => array(
				'type' => 'string',
				'default' => '4/3'
			),
			'imageObjectFit' => array(
				'type' => 'boolean',
				'default' => false
			),
			'imageMaxHeight' => array(
				'type' => 'string',
				'default' => '200px'
			),
			'imageBorderWidth' => array(
				'type' => 'string',
				'default' => '0px'
			),
			'imageBorderColor' => array(
				'type' => 'string'
			),
			'imageBorderRadius' => array(
				'type' => 'string',
				'default' => '0px'
			),
			'imagePaddingBlock' => array(
				'type' => 'string',
				'default' => '0px'
			),
			'imagePaddingInline' => array(
				'type' => 'string',
				'default' => '0px'
			),
			'columnGap' => array(
				'type' => 'string',
				'default' => '0px'
			),
			'images' => array(
				'type' => 'array',
				'default' => array(
					
				)
			),
			'animationDuration' => array(
				'type' => 'string',
				'default' => '6000ms'
			)
		),
		'textdomain' => 'running-images',
		'editorScript' => 'file:./index.js',
		'editorStyle' => 'file:./index.css',
		'style' => 'file:./style-index.css',
		'viewScript' => 'file:./view.js'
	),
	'twinkling-text' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'create-block/twinkling-text',
		'version' => '0.1.0',
		'title' => 'Twinkling Text',
		'category' => 'block-kuy',
		'icon' => 'marker',
		'description' => 'Create a twinkling point beside the text.',
		'example' => array(
			
		),
		'supports' => array(
			'__experimentalBorder' => array(
				'color' => true,
				'radius' => true,
				'width' => true,
				'style' => true
			),
			'html' => false,
			'color' => array(
				'background' => true,
				'gradients' => true,
				'text' => true
			),
			'spacing' => array(
				'margin' => true,
				'padding' => true,
				'blockGap' => false
			),
			'typography' => array(
				'fontSize' => true
			)
		),
		'attributes' => array(
			'alignment' => array(
				'type' => 'string',
				'default' => 'left'
			),
			'columnGap' => array(
				'type' => 'string',
				'default' => '8px'
			),
			'dotColor' => array(
				'type' => 'string',
				'default' => '#000'
			),
			'dotSize' => array(
				'type' => 'string',
				'default' => '8px'
			),
			'justifyContent' => array(
				'type' => 'string',
				'default' => 'left-aligned'
			),
			'text' => array(
				'type' => 'string',
				'default' => 'Your Text'
			)
		),
		'textdomain' => 'twinkling-text',
		'editorScript' => 'file:./index.js',
		'editorStyle' => 'file:./index.css',
		'style' => 'file:./style-index.css',
		'viewScript' => 'file:./view.js'
	)
);
