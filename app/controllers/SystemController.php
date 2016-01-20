<?php 

use Phalcon\Mvc\Controller;

class SystemController extends BaseController
{
	function initialize()
	{
		parent ::initialize();
		
	}
	function IndexAction()
	{
		$this->assets
		->addCss('public/vendor/twbs/bootstrap/dist/css/bootstrap.min.css')
		->addCss('public/vendor/twbs/bootstrap/dist/css/bootstrap-theme.min.css')
		->addCss('public/vendor/twbs/bootstrap/docs/assets/css/ie10-viewport-bug-workaround.css');
		
		$this->assets
		->addJs('public/vendor/twbs/bootstrap/dist/js/bootstrap.min.js')
		->addJs('public/vendor/twbs/bootstrap/docs/assets/js/vendor/jquery.min.js')
		->addJs('public/vendor/twbs/bootstrap/docs/assets/css/ie10-viewport-bug-workaround.js');
		
		$this->view->systems = Systems::find();
		
	
	}
	
	function addnewAction()
	{
		
	}
	
	function submitAction()
	{
		if($this->request->isPost())
		{
			$name 			 = $this->request->getPost('name', array('string', 'striptags'));
			$description 	 = $this->request->getPost('description');
			$date 	 		 = $this->request->getPost('launching_date');
			
			$system = new Systems;
			
			$system->name    		= $name;
			$system->description    = $description;
			$system->launching_date  = $date;
			
			if($system->save() == false)
			{
				 foreach ($system->getMessages() as $message) {
                    $this->flash->error((string) $message);
                }
			}else{
			
				$this->flash->success('Add System Success');
			
				#return $this->forward('system/index');
				
				// Make a full HTTP redirection
				return $this->response->redirect("system/index");
			}
		}
	}
	
	function detailAction($id)
	{
		
		$detail = Systems::findFirstById($id, array(
				"cache" => array(
				"key" => "my-cache"
				)
		));
		
	
		
		$this->view->system 	= $detail;
		$this->view->page	 	= 'About';
		
		$this->view->setTemplateAfter('main');
	}
	
	function deleteAction($id)
	{
		$system = Systems::findFirstById($id);
		$system->delete();
		$this->flash->success("System Was deleted");
		
		return $this->response->redirect("system/index");
		
	}
	
	
}