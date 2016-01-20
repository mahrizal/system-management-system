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
	
	function index()
	{
		
	}
	
	function systemAction($id)
	{
		$system = Systems::findFirstById($id);
		
		$this->view->system = $system;
	
	}
	
		
	function addnewAction($id)
	{
		$system = Systems::findFirstById($id);
		
		$form = new BugsForm;
		
		$this->view->system = $system;
		
		$this->view->form 	= $form;
		
	}
	
	function addsubmitAction()
	{
		if($this->request->isPost() !== false)
		{
			$activities = new Activities;
			$system_id  = $this->request->getPost('system_id');
			$activities->start_hour  = $this->request->getPost('start_hour');
			$activities->finish_hour = $this->request->getPost('finish_hour');
			$activities->description = $this->request->getPost('description');
			$activities->date 		 = $this->request->getPost('date');
			$activities->system_id	 = $system_id;
			$activities->modules_id	 = $this->request->getPost('modules_id');
		
		#	print_r($this->request->getPost());
		#	exit();
			if($activities->save() == false)
			{
				foreach ($activities->getMessages() as $message) {
                    $this->flash->error((string) $message);
                }
			}else{
				
				$this->flash->success('Add New Activity Success');
				
				$this->response->redirect('activity/system/'.$system_id);
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
			
			#print_r($this->request->getPost());exit();
	
			if($activities->update($this->request->getPost()) == false)
			{
				foreach ($activities->getMessages() as $message) {
                    $this->flash->error((string) $message);
                }
				
			}else{
				
				$this->flash->success('Edit Activity Success');
				
				$this->response->redirect('activity/system/'.$system_id);
			}
			
			
		}
		
		
	}
	
}