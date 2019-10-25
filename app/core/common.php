<?php
include($doc_root.'/app/helper/common.php');
include($doc_root.'/app/config/autoload.php');

class app {

	public $uri;

	function __construct(){
		$this->uri = explode('/', rtrim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH),'/'));
	}

	public function uri($s=''){
		if ($s==''){
			return $this->uri;
		}else{
			return $this->uri[$s];
		}
	}

	function load($page='home', $type='controller', $data=array()){

		$doc_root = dirname($_SERVER['DOCUMENT_ROOT']);

		$app = new app();
		
		if (file_exists($doc_root.'/app/'.$type.'/'.$page.'.php')){
			require_once($doc_root.'/app/'.$type.'/'.$page.'.php');
		}else{
			require_once($doc_root.'/app/view/404.php');
		}
	}

}

$app = new app();
