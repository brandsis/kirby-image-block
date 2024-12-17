<?php

Kirby::plugin('brandsistency/image-block', [
	'blueprints' => [
		'blocks/image' => __DIR__ . '/blueprints/blocks/image.yml'
	],
	'snippets' => [
		'blocks/image' => __DIR__ . '/snippets/blocks/image.php'
	]
]);