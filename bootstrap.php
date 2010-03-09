#!/usr/bin/php
<?php

define('APP_DIR', dirname(dirname(__FILE__)));
define('LIBS_DIR', realpath(APP_DIR.'/../libs'));

require_once LIBS_DIR .'/Nette/loader.php';

$robot = new RobotLoader();
$robot->addDirectory(APP_DIR);
$robot->addDirectory(LIBS_DIR);
$robot->autoRebuild = true;
$robot->register();

Debug::enable();

Environment::loadConfig();

require_once LIBS_DIR . '/dibi/dibi.php';
dibi::connect(Environment::getConfig('database'));

$application = Environment::getApplication();
$application->allowedMethods = NULL;
$application->router[] = new PerfORMCliRouter(array(
	'module' => 'Console',
	'presenter' => 'Default',
	'action' => 'default'
	));

$application->run();
