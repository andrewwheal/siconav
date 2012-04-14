<?php

namespace SicoNav;

trait Multiton {

	protected static $_instances = array();

	public static function instance($instance = 'default') {
		if (!array_key_exists($instance, static::$_instances)) {
			return null;
		}

		return static::$_instances[$instance];
	}

	public static function forge($name = 'default', array $config = array()) {
		if ($exists = static::instance($name)) {
			\Error::notice(get_called_class() . ' with this name exists already, cannot be overwritten.');
			return $exists;
		}

		static::$_instances[$name] = new static($config);

		return static::$_instances[$name];
	}

	protected function __construct(array $config = array()) {}

}
