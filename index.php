<?php
// ��ȡҪ���е�controller
$c_str = $_GET['c'];
$c_name = $c_str.'Controller';
$c_path = '/app/controller/'.$c_name.'.php';
// ��ȡҪ���еķ���
$method = $_GET['a'];
// ����
require($c_path);
$controller = new $c_name;
$controller->$method();