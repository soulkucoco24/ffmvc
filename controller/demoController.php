<?php
class DemoController{
    public function index()
    {
        $data = array();
        $data['title'] = 'First Title';
        $data['list'] = array('A','B','C','D');
        require('view/index.php');
    }
}