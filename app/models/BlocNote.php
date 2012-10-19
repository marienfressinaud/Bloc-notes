<?php

class BlocNote extends Model {
	private $content;
	private $lastChange;
	
	public function content () {
		return $this->content;
	}
	public function lastChange () {
		return $this->lastChange;
	}
	
	public function _content ($value) {
		$this->content = $value;
	}
	public function _lastChange ($value) {
		$this->lastChange = $value;
	}
}

class BlocNoteDAO extends Model_array {
	public function __construct () {
		parent::__construct (PUBLIC_PATH . '/data/notes');
	}
	
	public function save ($values) {
		$this->array[0] = array ();
	
		foreach ($values as $key => $value) {
			$this->array[0][$key] = $value;
		}
	
		$this->writeFile($this->array);
	}
	public function get () {
		$list = HelperBlocNote::daoToBlocNote ($this->array);
		
		if (isset ($list[0])) {
			return $list[0];
		} else {
			return new BlocNote ();
		}
	}
}

class HelperBlocNote {
	public static function daoToBlocNote ($listDAO) {
		$list = array ();

		if (!is_array ($listDAO)) {
			$listDAO = array ($listDAO);
		}

		foreach ($listDAO as $key => $dao) {
			$list[$key] = new BlocNote ();
			$list[$key]->_content ($dao['content']);
			$list[$key]->_lastChange ($dao['lastChange']);
		}

		return $list;
	}
}
