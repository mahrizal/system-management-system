<?php
use Phalcon\Mvc\Controller;
use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Select;


class ActivityController extends BaseController
{
	function initialize($d='')
	{
		parent ::initialize();
		
		$this->view->setTemplateAfter('main');
		

		$this->view->page	= 'Activities';
	
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
		
		$form = new ActivityForm;
		
		
		$bugs_id = new Select('bugs_id', Bugs::find(), 
			array(
				'useEmpty' => true
			)
		);
		$bugs_id->setLabel('Select Bugs');

	
	/* 	if($entity)
		{
			$bugs_id->setDefault(
				array($entity->bugs_id)
			);
		} */
		
		$array = [];
		foreach(Bugs::find(array('system_id = '.$id)) as $bug): 
			if($bug->modules_id)
			{
				$modules_name = '['.$bug->modules->name .'] - ' ;
			}else{
				$modules_name = '';
			}
				$array[$bug->id] = $modules_name .' '.$bug->description;
		endforeach;
		
		$bugs_id->setOptions($array);
	
		$form->add($bugs_id);
		
		
		/*=======  Modules  =======*/
		
		$modulesId = new Select('modules_id', Modules::find(array('system_id = '.$id)), 
			array(
			
				'using' => array(
							'id',
							'name'
						),
				'useEmpty' => true
			)
		);
		
		$modulesId->setLabel('Select Modules');
		
		/* if($entity)
		{
			$modulesId->setDefault(
				array($entity->modules_id)
			);
		} */
		
		
		$form->add($modulesId);
		
	
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
			$activities->bugs_id	 = $this->request->getPost('bugs_id');
			$activities->employees_id = 105;
		
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
		
		
		$bugs_id = new Select('bugs_id', Bugs::find(), 
			array(
				'useEmpty' => true
			)
		);
		$bugs_id->setLabel('Select Bugs');
		$bugs_id->setDefault(
				array($activity->bugs_id)
			);
		
		
		$array = [];
		foreach(Bugs::find(array('system_id = '.$system_id)) as $bug): 
			if($bug->modules_id)
			{
				$modules_name = '['.$bug->modules->name .'] - ' ;
			}else{
				$modules_name = '';
			}
				$array[$bug->id] = $modules_name .' '.$bug->description;
		endforeach;
		
		$bugs_id->setOptions($array);
	
		$form->add($bugs_id);
		
		
		/*=======  Modules  =======*/
		
		$modulesId = new Select('modules_id', Modules::find(array('system_id = '.$system_id)), 
			array(
			
				'using' => array(
							'id',
							'name'
						),
				'useEmpty' => true
			)
		);
		
		$modulesId->setLabel('Select Modules');
		
		$modulesId->setDefault(
				array($activity->modules_id)
			);
		
		
		
		$form->add($modulesId);

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
				
				$this->response->redirect('activity/system/'.$system_id);
			}
			
			
		}
		
		
	}
	
}