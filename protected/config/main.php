<?php

return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Authentification sample',
	'preload'=>array('log'),
	'import'=>array(
		'application.models.*',
		'application.components.*',
	),

	'modules'=>array(
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'1234',
			'ipFilters' => array('127.0.0.1', '::1')
		),
	),

	'components'=>array(

                'authManager' => array(
                    'class' => 'PhpAuthManager',
                    'defaultRoles' => array('guest')
                ),
            
		'user'=>array(
			'allowAutoLogin'=>true,
                        'class' => 'WebUser'
		),
            
                'JWT' => array(
                    'class' => 'ext.jwt.JWT',
                    'key' => 'randomStringisYourRSAKey'
                ),

		// uncomment the following to enable URLs in path-format
		
		'urlManager'=>array(
			'urlFormat'=>'path',
                        'showScriptName' => false,
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),

		// database settings are configured in database.php
		'db'=>require(dirname(__FILE__).'/database.php'),

		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>YII_DEBUG ? null : 'site/error',
		),

		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
			),
		),

	),
	'params'=>array(
		'adminEmail'=>'webmaster@example.com',
	),
);
