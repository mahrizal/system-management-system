<?php 

use Phalcon\Mvc\Controller;

class BaseController extends Controller
{
	protected function initialize()
	{
		$this->assets
		->addCss('public/vendor/twbs/bootstrap/dist/css/bootstrap.min.css')
		->addCss('public/vendor/twbs/bootstrap/dist/css/bootstrap-theme.min.css')
		->addCss('public/vendor/twbs/bootstrap/docs/assets/css/ie10-viewport-bug-workaround.css');
		
		$this->assets
		->addJs('public/vendor/twbs/bootstrap/dist/js/bootstrap.min.js')
		->addJs('public/vendor/twbs/bootstrap/docs/assets/js/vendor/jquery.min.js')
		->addJs('public/vendor/twbs/bootstrap/docs/assets/css/ie10-viewport-bug-workaround.js')
		->addJs('public/js/utils.js');
		
		$this->tag->setTitle('System Management System');
	}
	
	 protected function forward($uri)
    {
        $uriParts = explode('/', $uri);
        $params = array_slice($uriParts, 2);
    	return $this->dispatcher->forward(
    		array(
    			'controller' => $uriParts[0],
    			'action' => $uriParts[1],
                'params' => $params
    		)
    	);
    }
}