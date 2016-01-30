<?php
use Phalcon\Mvc\Controller;



class BugsController extends BaseController
{
	function initialize($d='')
	{
		parent ::initialize();
		
		$this->view->setTemplateAfter('main');
		

		$this->view->page	= 'Bugs';
	
	}
	
	function indexAction()
	{
		
	}
	
	function systemAction($id)
	{
		
		$system = Systems::findFirstById($id);
		
		$this->view->system = $system;
	
	}
	
		
	function addnewAction($system_id)
	{
		$system = Systems::findFirstById($system_id);
		$form = new BugsForm;
		
		
		
		$this->view->system = $system;
		$this->view->max_number = $this->new_number($system_id);
		
		$this->view->form 	= $form;
		
	}
	
	function new_number($system_id)
	{
		$max_number = Bugs::maximum(
			array(
				'column' => 'number',
				'conditions' => 'system_id = '.$system_id
			)
		);
		
		return $max_number + 1;
		
	}
	
	function addsubmitAction()
	{
		if($this->request->isPost() !== false)
		{
			$bugs 	  			     = new Bugs;
			$system_id 			     = $this->request->getPost('system_id');
			
			$bugs->date_found 		 = $this->request->getPost('date_found');
			$bugs->system_id		 = $system_id;
			$bugs->modules_id	 	 = $this->request->getPost('modules_id');
			$bugs->number 			 = $this->request->getPost('number');
			$bugs->description		 = $this->request->getPost('description');
			$bugs->is_solved 		 = $this->request->getPost('is_solved');
			$bugs->created_at 		 = date('Y-m-d H:i:s');
			$bugs->created_by 		 = 105;
			
			if($bugs->save() == false)
			{
				foreach ($bugs->getMessages() as $message) {
                    $this->flash->error((string) $message);
                }
				
			}else{
				
				$this->flash->success('Add New Bug Success');
				
				$this->response->redirect('bugs/system/'.$system_id);
			}
	
		}
		
	}
	
	function deleteAction($activity_id, $system_id)
	{
		$bugs = Bugs::findFirstById($activity_id);
		if ($bugs != false) {
			if ($bugs->delete() == false) {
				echo "Sorry, we can't delete the Bugs right now: \n";

				foreach ($activity->getMessages() as $message) {
					echo $message, "\n";
				}
			} else {
				$this->flash->success('Delete bugs Success');
				
				$this->response->redirect('bugs/system/'.$system_id);
			}
		}
	}
	
	function editAction($bugs_id, $system_id)
	{
		
		$bugs   = Bugs::findFirstById($bugs_id);
		$system = Systems::findFirstById($system_id);
		
	
		$form = new BugsForm($bugs);

		$this->view->bugs = $bugs;
		$this->view->system   = $system;
		$this->view->page     = 'Bugs';
		$this->view->form     = $form;
		$this->view->max_number = $this->new_number($system_id);
		
		if($this->request->isPost())
		{
			$bugs 			 = new Bugs;
			
			$bugs_id			 = $this->request->getPost('id');
			
			$bugs = Bugs::find($activity_id);

	
			if($bugs->update($this->request->getPost()) == false)
			{
				foreach ($bugs_id->getMessages() as $message) {
                    $this->flash->error((string) $message);
                }
		
			}else{
				
				$this->flash->success('Edit Activity Success');
				
				$this->response->redirect('bugs/system/'.$system_id);
			}
			
			
		}
	
	}
	
}