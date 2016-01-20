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
		
		$max_number = Bugs::maximum(
			array(
				'column' => 'number',
				'conditions' => 'system_id = '.$system_id
			)
		);
		
		
		
		$this->view->system = $system;
		$this->view->max_number = $max_number + 1;
		
		$this->view->form 	= $form;
		
	}
	
	function max_number()
	{
		
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
		$activity = Activities::findFirstById($activity_id);
		if ($activity != false) {
			if ($activity->delete() == false) {
				echo "Sorry, we can't delete the module right now: \n";

				foreach ($activity->getMessages() as $message) {
					echo $message, "\n";
				}
			} else {
				$this->flash->success('Delete Activity Success');
				
				$this->response->redirect('activity/system/'.$system_id);
			}
		}
	}
	
	function editAction($activity_id, $system_id)
	{
		
		$activity = Activities::findFirstById($activity_id);
		$system = 	Systems::findFirstById($system_id);
		
	
		$form = new ActivityForm($activity);

		$this->view->activity = $activity;
		$this->view->system   = $system;
		$this->view->page     = 'Modules';
		$this->view->form     = $form;
		
		if($this->request->isPost())
		{
			$activities 			 = new Activities;
			
			$activity_id			 = $this->request->getPost('id');
			
			$activities = Activities::find($activity_id);

	
			if($activities->update($this->request->getPost()) == false)
			{
				foreach ($activities->getMessages() as $message) {
                    $this->flash->error((string) $message);
                }
		
			}else{
				
				$this->flash->success('Edit Activity Success');
				
				$this->response->redirect('bugs/system/'.$system_id);
			}
			
			
		}
	
	}
	
}