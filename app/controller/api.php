<?php

function get_api($uri){

	$user = 'admin';
	$pass = 'sugar';
	$url = 'https://sugarcrm.local/';
	$sugar = new sugarapi($user,$pass,$url);

	$data = array();
	if ($uri[3]=='get'){
		if ($uri[4]=='leads'){
			if (!isset($uri[5])){
				return $sugar->leads();
			}else{
				return $sugar->leads($uri[5]);
			}
		}
	}
}

if (!isset($app->uri[3]) || $app->uri[3]=='help'){
	$app->load('api/help','view',$data);
}else{
	header('Content-Type: application/json');
	echo json_encode(get_api($app->uri()), JSON_PRETTY_PRINT);
}
