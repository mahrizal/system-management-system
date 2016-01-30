<?php 

use \Phalcon\Mvc\Model;

class Systems extends Model
{
	
	public $id;
	
	public $name;
	
	public $description;
	
	public $launching_date;
	
	public $created_at;
	

	function initialize()
	{
		 $this->hasMany('id', 'Modules', 'system_id', array(
        	'foreignKey' => array(
        		'message' => 'System cannot be deleted because it\'s used in Modules'
        	)
        ));
		
		 $this->hasMany('id', 'Activities', 'system_id', array(
        	'foreignKey' => array(
        		'message' => 'System cannot be deleted because it\'s used in Activities'
        	)
        ));
		
		$this->hasMany('id', 'Bugs', 'system_id', array(
        	'foreignKey' => array(
        		'message' => 'System cannot be deleted because it\'s used in Bugs'
        	)
        ));
		
		$this->hasMany('id', 'Versions', 'system_id', array(
        	'foreignKey' => array(
        		'message' => 'System cannot be deleted because it\'s used in Versions'
        	)
        ));
	}

}