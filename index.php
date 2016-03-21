<?php
// 获取要运行的controller
$c_str = $_GET['c'];
$c_name = $c_str.'Controller';
$c_path = 'controller/'.$c_name.'.php';
// 获取要运行的方法
$method = $_GET['a'];
// 加载
require($c_path);
$controller = new $c_name;
$controller->$method();