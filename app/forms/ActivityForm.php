<?php

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Date;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\TextArea;
use Phalcon\Forms\Element\Select;
use Phalcon\Forms\Element\Hidden;

use Phalcon\Validation\Validator\PresenceOf;

class ActivityForm extends Form
{
	
	function initialize($entity = null, $options = null)
	{
		$date = new Date('date');
		$date->setLabel('Input Date');
		$date->setFilters(array('striptags', 'string'));
		$date->setDefault(date('Y-m-d'));
		$date->addValidators(array(
			new PresenceOf(array(
			 'message' => 'Date is required'
			 ))
		)); 
		$this->add($date);
		
		$start_time = new Text('start_hour');
		$start_time->setLabel('Input Start Hour');
		$start_time->setFilters(array('striptags', 'string'));
		$start_time->addValidators(array(
			new PresenceOf(array(
			 'message' => 'Start Time is required'
			 ))
		)); 
		$this->add($start_time);
		
		$finish_time = new Text('finish_hour');
		$finish_time->setLabel('Input Finish Hour');
		$finish_time->setFilters(array('striptags', 'string'));
		$finish_time->addValidators(array(
			new PresenceOf(array(
			 'message' => 'Finish Time is required'
			 ))
		)); 
		$this->add($finish_time);
		
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
