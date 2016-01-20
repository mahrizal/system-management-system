<?php

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Date;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\TextArea;
use Phalcon\Forms\Element\Select;
use Phalcon\Forms\Element\Hidden;

use Phalcon\Validation\Validator\PresenceOf;

class BugsForm extends Form
{
	
	function initialize($entity = null, $options = null)
	{
		$date = new Text('date_found');
		$date->setLabel('Input Date');
		$date->setFilters(array('striptags', 'string'));
		$date->addValidators(array(
			new PresenceOf(array(
			 'message' => 'Date Found is required'
			 ))
		)); 
		$this->add($date);
		
		
		$number = new Text('number');
		$number->setLabel('Input Number');
		$number->setFilters(array('striptags', 'string'));
		$number->addValidators(array(
			new PresenceOf(array(
			 'message' => 'Number is required'
			 ))
		)); 
		$this->add($number);
		
				$number = new Text('number');
		$number->setLabel('Input Number');
		$number->setFilters(array('striptags', 'string'));
		$number->addValidators(array(
			new PresenceOf(array(
			 'message' => 'Number is required'
			 ))
		)); 
		$this->add($number);
		
		
		
		
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
