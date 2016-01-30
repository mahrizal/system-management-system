<?php 

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Date;
use Phalcon\Validation\Validator\PresenceOf;

class VersionsForm extends Form
{
	function initialize($entity= null, $options=null)
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
		
		$version = new Text('version');
		$version->setLabel('Create Version');
		$version->setFilters(array('striptags', 'string'));
		$version->addValidators(array(
			new PresenceOf(array(
			 'message' => 'Name is required'
			 ))
		)); 
		$this->add($version);
		
		

	}
}