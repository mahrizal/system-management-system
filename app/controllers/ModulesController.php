<?php
use Phalcon\Mvc\Controller;
use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\TextArea;
use Phalcon\Forms\Element\Hidden;

class ModulesController extends BaseController
{
	function initialize()
	{
		parent ::initialize();
		
		$this->view->setTemplateAfter('main');
		
		
	}
	
	function systemAction($id)
	{
		$system = Systems::findFirstById($id);
		
		$this->view->system = $system;
		
		$this->view->page = 'Modules';
	}
	
	function addnewAction($id)
	{
		$form = new ModulesForm;
		
		
		
		$system = Systems::findFirstById($id);
		
		$this->view->system = $system;
		$this->view->page   = 'Modules';
		$this->view->form   = $form;
	}
	
	function addsubmitAction()
	{
		if($this->request->isPost())
		{
			$name		  =  $this->request->getPost('name');
			$description  =  $this->request->getPost('description');
			$system_id  =  $this->request->getPost('system_id');
			
			$modules = new Modules;
			
			$modules->name = $name;
			$modules->description = $description;
			$modules->system_id = $system_id;
			
			if($modules->save() == false)
			{
				 foreach ($modules->getMessages() as $message) {
                    $this->flash->error((string) $message);
                }
			}else{
				
				$this->flash->success('Add New Modules Success');
				
				$this->response->redirect('modules/system/'.$system_id);
			}
		}
		
	}
	
	function deleteAction($modules_id, $system_id)
	{
		$modules = Modules::findFirstById($modules_id);
		if ($modules != false) {
			if ($modules->delete() == false) {
				echo "Sorry, we can't delete the module right now: \n";

				foreach ($modules->getMessages() as $message) {
					echo $message, "\n";
				}
			} else {
				$this->flash->success('Delete Modules Success');
				
				$this->response->redirect('modules/system/'.$system_id);
			}
		}
	}
	
	function editAction($modules_id, $system_id)
	{
		
		$modules =  Modules::findFirstById($modules_id);
		$system  = 	Systems::findFirstById($system_id);
		
		$form = new Form($modules);

		$form->add(new Text("name"));

		$form->add(new TextArea("description"));
		$form->add(new Hidden("system_id"));
		$form->add(new Hidden("id"));
	
	#	$form = new ModulesForm;
		$this->view->modules = $modules;
		$this->view->system = $system;
		$this->view->page   = 'Modules';
		$this->view->form   = $form;
		
		if($this->request->isPost())
		{
			$name		  =  $this->request->getPost('name');
			$description  =  $this->request->getPost('description');
			$system_id  =  $this->request->getPost('system_id');
			$modules_id  =  $this->request->getPost('id');
	
			$modules = Modules::find($modules_id);
	
			if($modules->update($this->request->getPost()) == false)
			{
				 foreach ($modules->getMessages() as $message) {
                    $this->flash->error((string) $message);
                }
			}else{
				
				$this->flash->success('Edit Modules Success');
				
				$this->response->redirect('modules/system/'.$system_id);
			}
		}
		
		
	}
}