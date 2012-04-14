<?php

namespace SicoNav;

class Nav_Driver_Config extends Nav_Driver_Base {

	public static function _init() {
		foreach (\Config::get('siconav.nav.instances', array()) as $name => $items) {
			\SicoNav\Nav::forge($name, $items, '\SicoNav\Nav_Driver_Config');
		}
	}

}
