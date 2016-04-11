<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'language' => 'es-CO',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'i18n' => [
        	'translations' => [
        		'app*' => [
        			'class' => 'yii\i18n\PhpMessageSource',
        			'basePath' => '@common/message',
        			'sourceLanguage' => 'en-US',
        			'fileMap' => [
        				'app' => 'app.php',
        				'app/error' => 'error.php',
        		   	]

        		]


        	]


        ]

    ],
];
