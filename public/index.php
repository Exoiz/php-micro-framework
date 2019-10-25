<?php
$doc_root = dirname($_SERVER['DOCUMENT_ROOT']);

require_once($doc_root.'/app/core/common.php');

if (isset($app->uri[2])){
    echo $app->load($app->uri[2]);
}else{
	echo $app->load();
}
