<?php 

use Phalcon\Mvc\Controller;

class SystemController extends Controller
{
	function initialize()
	{
		
		$this->tag->setTitle('System Management System');
	}
	function IndexAction()
	{
		$this->assets
		->addCss('public/vendor/twbs/bootstrap/dist/css/bootstrap.min.css')
		->addCss('public/vendor/twbs/bootstrap/dist/css/bootstrap-theme.min.css')
		->addCss('public/vendor/twbs/bootstrap/docs/assets/css/ie10-viewport-bug-workaround.css');
		
		$this->assets
		->addJs('public/vendor/twbs/bootstrap/dist/js/bootstrap.min.js')
		->addJs('public/vendor/twbs/bootstrap/docs/assets/js/vendor/jquery.min.js')
		->addJs('public/vendor/twbs/bootstrap/docs/assets/css/ie10-viewport-bug-workaround.js');
		
		$this->view->systems = Systems::find();
		
		parse_url 
		
	}
}