<?php

Kirby::plugin('brandsistency/custom-image-block', [
	'blueprints' => [
		'blocks/customimage' => __DIR__ . '/blueprints/blocks/customimage.yml'
	],
	'snippets' => [
		'blocks/customimage' => __DIR__ . '/snippets/blocks/customimage.php'
	]
]);