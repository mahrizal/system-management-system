<?php 
use Phalcon\Mvc\Controller;

class VersionsController extends BaseController
{
	function initialize()
	{
		parent ::initialize();
		
		$this->view->setTemplateAfter('main');
		
		$this->view->page = 'Versions';
	}
	
	function systemAction($system_id)
	{
		$system = Systems::findFirstById($system_id);
		
		
		$versions = Versions::find(
			array(
				'order' => 'id DESC'
			)
		);
		
		
		
		$this->view->system = $system;
		$this->view->versions = $versions;

	}
	
	function addnewAction($system_id)
	{
		
		$system = Systems::findFirstById($system_id);
		
		$last_version_date    = Versions::last_version_date();
		$last_version  = Versions::last_version();
		
		$activities = Activities::find(
			array(
				"date > '{$last_version_date}' ",
				
			)
		);
		
		$form = new VersionsForm;
		
		$this->view->system = $system;
		$this->view->last_version_date = $last_version_date;
		$this->view->last_version = $last_version;
		$this->view->activities = $activities;
		
		
		$this->view->form = $form;
	
		
	}
	
	function addsubmitAction()
	{
		if($this->request->isPost())
		{
			$date		  =  $this->request->getPost('date');
			$system_id    =  $this->request->getPost('system_id');
			$version    =  $this->request->getPost('version');
			
		#	print_r($this->request->getPost());exit();
			$versions	  = new Versions;
			
			$versions->date 	= $date;
			$versions->version = $version;
			$versions->system_id = $system_id;
			$versions->created_by = 105;
			$versions->created_at = date('Y-m-d');

			
			if($versions->save() == false)
			{
				 foreach ($versions->getMessages() as $message) {
                    $this->flash->error((string) $message);
                }
			}else{
				
				$this->flash->success('Create version success');
				
				$this->response->redirect('versions/system/'.$system_id);
			}
		}
	}
	
	function deleteAction($version_id, $system_id)
	{
		$versions = Versions::findFirstById($version_id);
		if ($versions != false) {
			if ($versions->delete() == false) {
				echo "Sorry, we can't delete the version right now: \n";

				foreach ($versions->getMessages() as $message) {
					echo $message, "\n";
				}
			} else {
				$this->flash->success('Delete version Success');
				
				$this->response->redirect('versions/system/'.$system_id);
			}
		}
	}
}