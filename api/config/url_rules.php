<?php 
return  [
		    [
		        'class'      => 'yii\rest\UrlRule',
		        'pluralize'  => false,
		        'controller' => 'v1/hello',
		        'extraPatterns' => [
		            'GET'    => 'index', 
		        ],
		    ],
		    [
		        'class'      => 'yii\rest\UrlRule',
		        'pluralize'  => false,
		        'controller' => 'v1/user',
		        'extraPatterns' => [
		            'GET'    => 'index', 
		        ],
		    ],
		    [
		        'class'      => 'yii\rest\UrlRule',
		        'pluralize'  => false,
		        'controller' => 'v1/article',
		        
		    ],
		    
	    ];

?>