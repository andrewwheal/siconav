<?php

namespace SicoNav;

class Breadcrumbs {
	use Multiton;

	protected $_breadcrumbs = array();

	public function add($title, $link) {
		$this->_breadcrumbs[$title] = $link;
	}

	public function output() {
		return \View::forge('siconav/breadcrumbs/breadcrumbs', array('breadcrumbs' => $this->_breadcrumbs));
	}

}
