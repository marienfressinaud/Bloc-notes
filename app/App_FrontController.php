<?php
/** 
 * MINZ - Copyright 2011 Marien Fressinaud
 * Sous licence AGPL3 <http://www.gnu.org/licenses/>
*/
require ('FrontController.php');

class App_FrontController extends FrontController {
	public function init () {
		$this->initModels ();
		$this->initView ();
	}
	
	private function initModels () {
		include (APP_PATH . '/models/BlocNote.php');
	}
	
	private function initView () {
		View::appendStyle (Url::display ('/themes/default/base.css'));
	}
}
