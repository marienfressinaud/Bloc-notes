<?php
  
class apiController extends ActionController {
	public function addAction () {
		$this->view->_useLayout (false);
		
		$content = json_decode (Request::param ('content'), true);
		
		$noteDAO = new BlocNoteDAO ();
		$blocNote = $noteDAO->get ();
		$blocNote->_content ($blocNote->content () . "\n\n" . $content);
		
		Request::_param ('note_content', $blocNote->content ());
		
		Request::forward (array ('c' => 'index', 'a' => 'save'));
	}
}
