<?php

use \Phalcon\Mvc\Model;
 
class Activities extends Model
{

	public $id;
	
	public $system_id;
	
	public $modules_id;

	public $date;
	
	public $description;
	
	public $start_hour;
	
	public $finish_hour;
	
	function initialize()
	{
		$this->belongsTo('system_id', 'Systems', 'id', array(
			'reusable' => true
		));
		
		$this->belongsTo('modules_id', 'Modules', 'id', array(
			'reusable' => true
		));
	}
	
	
	
}