<?php

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\TextArea;

use Phalcon\Validation\Validator\PresenceOf;

class ModulesForm extends Form
{
	
	function initialize($entity = null, $options = null)
	{
		$name = new Text('name');
		$name->setLabel('Input Module');
		$name->setFilters(array('striptags', 'string'));
		$name->addValidators(array(
			new PresenceOf(array(
			 'message' => 'Name is required'
			 ))
		)); 
		$this->add($name);
		  
		$description = new TextArea('description');
		$description->setLabel('Input Description');
		$description->addValidators(array(
			new PresenceOf(array(
			 'message' => 'Description is required'
			 ))
		));
		
		$this->add($description);
		
	}
	
}
