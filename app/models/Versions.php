<?php 

use \Phalcon\Mvc\Model;

class Versions extends Model
{
	
	public $id;
	
	public $date;
	
	public $system_id;
	
	public $version;
	
	public $created_at;
	
	public $created_by;
	

	function initialize()
	{
		$this->belongsTo('system_id', 'Systems', 'id', array(
			'reusable' => true
		));
	
	}
	
	public static function last_version_date()
	{
		
		
		$query = Versions::find(
			array(
				'order' => 'date DESC',
				'limit' => 1
			)
		);
		
		$result = $query->getFirst();
		$date = $result->date;
		
		return $date; 
		
	}
	
	public static function last_version()
	{
		$query = Versions::find(
			array(
				'order' => 'date DESC',
				'limit' => 1
			)
		);
		
		$result = $query->getFirst();
		$version = $result->version;
		
		$array = explode('.', $version);
		
	
		$key_terakhir		  = count($array);
		
		$key_terakhir         =	$key_terakhir -1 ;
		
		
		 $array[$key_terakhir] = $array[$key_terakhir] + 1 ; 
	
		$version_now		  = implode('.', $array);
		
		
		return $version_now;
		
	}
	
	
	

}