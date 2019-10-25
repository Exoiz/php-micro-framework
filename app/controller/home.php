<?php
$data = array();

$data['pages'][] = 'home';
$data['pages'][] = 'api';

$app->load('home','view',$data);
