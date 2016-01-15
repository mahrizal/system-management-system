<?php 

use Phalcon\Mvc\Controller;

class IndexController extends Controller
{
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
	}
}