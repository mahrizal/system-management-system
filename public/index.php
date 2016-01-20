<?php

use Phalcon\Loader;
use Phalcon\Tag;
use Phalcon\Mvc\Url;
use Phalcon\Mvc\View;
use Phalcon\Mvc\Application;
use Phalcon\DI\FactoryDefault;
use Phalcon\Db\Adapter\Pdo\Mysql as DbAdapter;
use Phalcon\Mvc\View\Engine\Volt as VoltEngine;
use Phalcon\Mvc\Model\Metadata\Memory as MetaData;
use Phalcon\Session\Adapter\Files as SessionAdapter;
use Phalcon\Flash\Session as FlashSession;

try {

    // Register an autoloader
    $loader = new Loader();
    $loader->registerDirs(
        array(
            '../app/controllers/',
            '../app/models/',
            '../app/forms/'
        )
    )->register();

    // Create a DI
    $di = new FactoryDefault();

    // Set the database service
    $di['db'] = function() {
        return new DbAdapter(array(
            "host"     => "localhost",
            "username" => "root",
            "password" => "root",
            "dbname"   => "net_management_system"
        ));
    };

    // Setting up the view component
    $di['view'] = function() {
        $view = new View();
        $view->setViewsDir('../app/views/');
		$view->registerEngines(
			array(
				".volt" => "volt"
				
				/*  ".volt" => function($view, $di) {
						   $volt = new \Phalcon\Mvc\View\Engine\Volt($view, $di);
						   $volt->setOptions(array(
								"compiledPath" => "../cache/volt/"
						   ));
						   return $volt;
					} */
			)
		);
		
        return $view;
    };

    // Setup a base URI so that all generated URIs include the "tutorial" folder
        $url = new Url();
		$di['url'] = function() {
			   $url = new Url();
        $url->setBaseUri('/test/sms-phalcon/');
        return $url;
    };
	
	/**
 * Setting up volt
 */
$di->set('volt', function ($view, $di) {

	$volt = new VoltEngine($view, $di);

	$volt->setOptions(array(
		"compiledPath" => '../cache/volt/'
	));

	$compiler = $volt->getCompiler();
	$compiler->addFunction('is_a', 'is_a');

	return $volt;
}, true);



	
	/**
 * If the configuration specify the use of metadata adapter use it or use memory otherwise
 */
$di->set('modelsMetadata', function () {
	return new MetaData();
});


/**
 * Start the session the first time some component request the session service
 */
$di->set('session', function () {
	$session = new SessionAdapter();
	$session->start();
	return $session;
});

/**
 * Register the flash service with custom CSS classes
 */
$di->set('flash', function () {
	return new FlashSession(array(
		'error'   => 'alert alert-danger',
		'success' => 'alert alert-success',
		'notice'  => 'alert alert-info',
		'warning' => 'alert alert-warning'
	));
});


    // Setup the tag helpers
    $di['tag'] = function() {
        return new Tag();
    };
	
	
	

    // Handle the request
    $application = new Application($di);

    echo $application->handle()->getContent();

} catch (Exception $e) {
     echo "Exception: ", $e->getMessage();
}
