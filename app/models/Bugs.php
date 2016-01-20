<?php 

use \Phalcon\Mvc\Model;

class Bugs extends Model
{
	
	public $id;
	
	public $date_found;
	
	public $system_id;
	
	public $modules_id;
	
	public $description;
	
	public $created_at;
	
	public $created_by;
	

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