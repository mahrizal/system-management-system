<?php

use \Phalcon\Mvc\Model;
 
class Modules extends Model
{

	public $id;
	
	public $system_id;
	
	public $name;
	
	public $description;
	
	function initialize()
	{
		$this->belongsTo('system_id', 'Systems', 'id', array(
			'reusable' => true
		));
		
		$this->hasMany('id', 'Activities', 'modules_id', array(
        	'foreignKey' => array(
        		'message' => 'Product Type cannot be deleted because it\'s used in Products'
				)
        	));
	}
}