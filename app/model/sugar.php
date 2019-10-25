<?php
class sugarapi {
    function __construct($login_username,$login_password,$base_url) {
        $this->login_username = $login_username;
        $this->login_password = $login_password;
        $this->base_url = $base_url;
        $this->OAUTH_Token = $this->login();
    }
    public function curl_post($url,$post_data){
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_HTTPHEADER => array('Content-Type: application/json'),
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $url,
            CURLOPT_POST => 1,
            CURLOPT_POSTFIELDS => json_encode($post_data)
        ));
        $resp = curl_exec($curl);
        curl_close($curl);
        return json_decode($resp, TRUE);
    }
    public function curl_get($url){
        $curl = curl_init();
        $headers = [
            "OAUTH-Token: ".$this->OAUTH_Token
        ];
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $url,
            CURLOPT_HTTPHEADER => $headers
        ));
        $resp = curl_exec($curl);
        curl_close($curl);
        return json_decode($resp, TRUE);
    }
    public function login(){
        $url_suffix = 'rest/v10/oauth2/token?platform=custom';
        $params = array(
            "client_id" => "sugar",
            "client_secret" => "",
            "current_langauge" => "en_us",
            "grant_type" => "password",
            "password" => $this->login_password,
            "platform" => "custom",
            "username" => $this->login_username
        );
        $resp_array = $this->curl_post($this->base_url.$url_suffix,$params);
        return $resp_array['access_token'];
    }
    public function leads($id=''){
		if ($id!=''){
			$url_suffix = "rest/v10/Leads?filter[0][id]=$id";
		}else{
        	$url_suffix = 'rest/v10/Leads';
		}
		return $this->curl_get($this->base_url.$url_suffix);
    }
}
