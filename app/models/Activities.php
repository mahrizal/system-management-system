<?php

use \Phalcon\Mvc\Model;
 
class Activities extends Model
{

	public $id;
	
	public $system_id;
	
	public $modules_id;

	public $date;
	
	public $bugs_id;
	
	public $description;
	
	public $start_hour;
	
	public $finish_hour;
	
	public $employees_id;
	
	function initialize()
	{
		$this->belongsTo('system_id', 'Systems', 'id', array(
			'reusable' => true
		));
		
		$this->belongsTo('modules_id', 'Modules', 'id', array(
			'reusable' => true
		));
		
		$this->belongsTo('bugs_id', 'Bugs', 'id', array(
			'reusable' => true
		));
	}
	
	
	
	
	
}