<?php

Kirby::plugin('brandsistency/image-block', [
	'blueprints' => [
		'blocks/myimage' => __DIR__ . '/blueprints/blocks/myimage.yml'
	],
	'snippets' => [
		'blocks/myimage' => __DIR__ . '/snippets/blocks/myimage.php'
	]
]);