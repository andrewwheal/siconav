<?php

namespace SicoNav;

class Nav_Driver_Base {

	/**
	 * Create a new \SicoNav\Nav without using a driver
	 *
	 * @param  array  $nav  Initial array of navigation items
	 */
	public function __construct($nav) {
		$this->_nav = $nav;
	}

	/**
	 * Add a new navigation item or update an existing one, dot notation can be used
	 *
	 * @param  string|array  $name  Either, name of the navigation item to set (dot notation can be used), or array of navigation items to set
	 * @param  string|null   $link  Link to set for the navigation item with the specified name, if the specified name is an array then this value is ignored
	 *
	 * @return  mixed  $this, the instance being modified, for method chaining
	 */
	public function set($name, $link = null) {
		\Arr::set($this->_nav, $name, $link);
		return $this;
	}

	/**
	 * Get the array of navigation items, or if $part is specified then that items link or children
	 *
	 * @param  string|null  $part  Optionally the part of the navigation array to be retrieved (dot notation can be used)
	 *
	 * @return  mixed
	 */
	public function get($part = null) {
		return \Arr::get($this->_nav, $part, null);
	}

	/**
	 * Renders the navigation array if the object is converted to a string
	 *
	 * @uses \SicoNav\Nav::render()
	 */
	public function __toString() {
		$this->render();
	}

	/**
	 * Renders the navigation array as HTML using Views
	 *
	 * @param  null  $part  Optionally, part of the navigation array to render
	 *
	 * @return  string  HTML representation of the navigation array
	 */
	public function render($part = null) {
		$view = \View::forge('siconav/nav/nav');
		$view->nav = static::get($part);

		return $view->render();
	}

}
