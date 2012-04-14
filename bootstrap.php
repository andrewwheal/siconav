<?php

Autoloader::add_classes(array(
	'SicoNav\Multiton' => __DIR__ . '/classes/multiton.php',

	'SicoNav\Nav' => __DIR__ . '/classes/nav/nav.php',
	'SicoNav\Nav_Driver_Base' => __DIR__ . '/classes/nav/driver/base.php',
	'SicoNav\Nav_Driver_Config' => __DIR__ . '/classes/nav/driver/config.php',

	'SicoNav\Breadcrumbs' => __DIR__ . '/classes/breadcrumbs/breadcrumbs.php',
));
