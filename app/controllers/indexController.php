<?php
  
class indexController extends ActionController {
	public function indexAction () {
		$noteDAO = new BlocNoteDAO ();

		$this->view->blocNote = $noteDAO->get ();
	}
	
	public function saveAction () {
		$content = Request::param ('note_content');
		
		if (Request::isPost () && $content !== false) {
			$noteDAO = new BlocNoteDAO ();
			
			$values = array (
				'content' => $content,
				'lastChange' => time ()
			);
			
			$noteDAO->save ($values);
		}
		
		Request::forward (array (), true);
	}
}
