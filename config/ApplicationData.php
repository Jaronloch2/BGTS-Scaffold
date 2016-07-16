<?php
/*
* Be sure you have modified your .env first, just for safety.
* Used for the Meta tags and other SEO related stuff.
* public/Modules/ are scanned automatically, REMOVE ALL UNUSED FILES or it will be called in the boilerplate and consume your data.
* Listed dependencies here are always rendered first in the Index boilerplate.
* All included in the dependencies directory are called afterwards
* 
*/
return [ 'APP' => array(
		'Data'	=> array(
				'app_type'			=> 'website',
				'app_title'			=> 'My Awesome Application',
				'app_description'	=> 'Awesome description',
				'app_keywords'		=> 'awesome,application,key,words',
				'app_updated_time'	=> strtotime(date('Y-m-d', strtotime("-30 days"))),
				'app_image'			=> '/Modules/default/images/app_image.png',
				'app_icon'			=> '/Modules/default/images/app_icon.png',
				'app_url'			=>	env('APP_URL') . ':' . env('APP_PORT')
		),
		'Dependencies'	=> array(
			'styles'	=> array('bootstrap.min.css'),
			'js' 		=> array('jquery-2.2.3.min.js','angular.min.js','bootstrap.min.js'),
			'ignore' 	=> array('npm.js','bootstrap.js','bootstrap.css')
		),
		'AllModules'	=> array(
			'styles'	=> array(),
			'js' 		=> array(),
			'ignore' 	=> array()
		),
	),
];