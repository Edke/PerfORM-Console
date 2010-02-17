#!/usr/bin/php
<?php

define('APP_DIR', realpath('../dibiorm-sandbox/app'));
define('LIBS_DIR', realpath('../dibiorm-sandbox/libs'));

require_once LIBS_DIR .'/Nette/loader.php';

$robot = new RobotLoader();
$robot->addDirectory(APP_DIR);
$robot->addDirectory(LIBS_DIR);
$robot->addDirectory(APP_DIR.'/../../dibiorm');

$robot->autoRebuild = true;
$robot->ignoreDirs= '.*, *.old, *.bak, *.tmp, temp, fshl_cache';
$robot->register();

Debug::enable();

Environment::loadConfig();

require_once LIBS_DIR . '/dibi/dibi.php';
dibi::connect(Environment::getConfig('database'));

$application = Environment::getApplication();
$application->allowedMethods = NULL;
$application->router[] = new DibiOrmCliRouter(array(
	'module' => 'Console',
	'presenter' => 'Default',
	'action' => 'default'
	));

$application->run();
