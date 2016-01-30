<?php

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Date;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\TextArea;
use Phalcon\Forms\Element\Select;
use Phalcon\Forms\Element\Hidden;
use Phalcon\Forms\Element\Radio;
use Phalcon\Mvc\Model;
use Phalcon\Mvc\Model\Query;

use Phalcon\Validation\Validator\PresenceOf;

class BugsForm extends Form
{
	
	function initialize($entity = null, $options = null)
	{
		$date = new Date('date_found');
		$date->setLabel('Input Date Found');
		$date->setFilters(array('striptags', 'string'));
		$this->add($date);
		
		/*====================== Number =====================*/
		

		

		
		$number = new Text('number');
		$number->setLabel('Input Number');
		$number->setFilters(array('striptags', 'string'));
		$number->addValidators(array(
			new PresenceOf(array(
			 'message' => 'Number is required'
			 ))
		)); 
		$this->add($number);
	
		
		
		
		

		/*====================== Solved =====================*/		
		$isSolved = new Radio('is_solved', array('name' => 'is_solved', 'value' => '1'));
		$isSolved->setLabel('Is Solved');
		$isSolved->addValidators(array(
			new PresenceOf(array(
			 'message' => 'Is solved is required'
			 ))
		)); 
	
		$this->add($isSolved);
		
		$isSolved2 = new Radio('is_solved2', array('name' => 'is_solved', 'value' => '0', 'checked' => TRUE));
		$isSolved2->setLabel('Is Solved2');
		$isSolved2->addValidators(array(
			new PresenceOf(array(
			 'message' => 'Is solved is required'
			 ))
		)); 
	
		$this->add($isSolved2);
		
		$systemId = new Select('system_id', Systems::find(), 
			array(
				'using' => array(
								'id',
								'name'
							),
				'useEmpty' => true
			)
		);
		$systemId->setLabel('Select System');
		$systemId->addValidators(array(
			new PresenceOf(array(
			 'message' => 'System is required'
			 ))
		)); 
		
		if($entity)
		{
			$systemId->setDefault(
				array($entity->system_id)
			);
		}
		
		$this->add($systemId);
		
		
		
		$modulesId = new Select('modules_id', Modules::find(), 
			array(
			
				'using' => array(
							'id',
							'name'
						),
				'useEmpty' => true
			)
		);
		$modulesId->setLabel('Select Modules');
		$modulesId->addValidators(array(
			new PresenceOf(array(
			 'message' => 'Modules is required'
			 ))
		)); 
		
		if($entity)
		{
			$modulesId->setDefault(
				array($entity->modules_id)
			);
		}
		$this->add($modulesId);
		
		
		/*===== Bug =============*/
				
		$systemId = new Select('system_id', Systems::find(), 
			array(
				'using' => array(
								'id',
								'name'
							),
				'useEmpty' => true
			)
		);
		$systemId->setLabel('Select System');
		$systemId->addValidators(array(
			new PresenceOf(array(
			 'message' => 'System is required'
			 ))
		)); 
		
		if($entity)
		{
			$systemId->setDefault(
				array($entity->system_id)
			);
		}
		
		$this->add($systemId);
		
		
		
		$description = new TextArea('description');
		$description->setLabel('Input Description');
		$description->addValidators(array(
			new PresenceOf(array(
			 'message' => 'Description is required'
			 ))
		));
		
		$this->add($description);
		
		$hidden = new Hidden('id');
		if($entity)
		{
			$hidden->setDefault(
				array($entity->id)
			);
		}
		$this->add($hidden);
		

		
	}
	
	
	
}
