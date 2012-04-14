<?php

namespace SicoNav;

trait DriverTrait {

	public static function forge($name = 'default', $driver = 'driver', array $config = array()) {
		return new $driver();
	}

}
