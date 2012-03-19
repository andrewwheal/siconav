<?php

namespace SicoNav;

class Nav {
	use Multiton;

	protected $_nav = array();

	protected function __construct(array $config = array()) {
		$this->_nav = $config;
	}

	public function output() {
		return $this->_nav;
	}

}
