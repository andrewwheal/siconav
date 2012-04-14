<?php

namespace SicoNav;

class Nav {

	public static $_instances = array();
	protected $_nav = array();

	/**
	 * Initialise the class, loading config file and setting up default instances
	 *
	 * @static
	 */
	public static function _init() {
		\Config::load('siconav', true);

		if ($driver = \Config::get('siconav.nav.driver')) {
			class_exists(static::driver($driver));
		}
	}

	/**
	 * Forges a new Nav instance, of a particular driver
	 *
	 * @static
	 *
	 * @throws  \Exception
	 *
	 * @param  string  $name  Name of the instance to be created
	 * @param  array   $nav   Initial array of navigation items to populate the instance with
	 * @param  string|null  $driver  Name of the driver to create the instance from, if null is specified then no driver is used (unless a default is specified in the config file) (default: null)
	 *
	 * @return  mixed  the newly created instance, for method chaining
	 */
	public static function forge($name = 'default', array $nav = array(), $driver = null) {
		if (array_key_exists($name, static::$_instances)) {
			\Error::notice('Nav with this name exists already, cannot be overwritten.');
			$instance = static::$_instances[$name];
			$instance->set($nav);
			return $instance;
		}

		$driver = static::driver($driver);

		$instance = new $driver($nav);

		static::$_instances[$name] = $instance;

		return $instance;
	}

	protected static function driver($driver = null) {
		if (is_null($driver)) {
			$driver = \Config::get('siconav.nav.driver', 'driver');
		}

		if ($driver[0] == '\\') {
			$driver_class = $driver;
		} else {
			$driver_class = '\SicoNav\Nav_Driver_'.ucfirst($driver);
		}

		if (!class_exists($driver_class)) {
			throw new \Exception("Invalid Driver '".$driver_class."' supplied for ".__CLASS__);
		}

		return $driver_class;
	}

	/**
	 * Fetches an already forged instance by name
	 *
	 * @static
	 *
	 * @param  string  $name  The name of the instance to retrieve
	 *
	 * @return  mixed  The instance requested, or null of an instance of the specified name has not yet been forged
	 */
	public static function instance($name = 'default') {
		if (!array_key_exists($name, static::$_instances)) {
			\Error::notice("A \\SicoNav\\Nav instance named {$name} has not yet been forged so can not be retrieved");
			return null;
		}

		return static::$_instances[$name];
	}

	public static function set($name = 'default', $item, $link = null) {
		$instance = static::instance($name);

		if (!$instance) {
			$instance = static::forge($name);
		}

		$instance->set($item, $link);

		return $instance;
	}

}
