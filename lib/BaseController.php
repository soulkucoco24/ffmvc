<?php
class BaseController{
    protected $_model;
    protected $_action;
    protected $_view;

    public static function page404()
    {
        echo '404 NOT FOUND!';
        return false;
    }

    public function __construct($model, $view, $action)
    {
        $this->_action = $action;
        $this->_model = $model;
        $this->_view = new View($view, $action);
    }

    public function set($name, $value)
    {
        $this->_view->set($name, $value);
    }

    public function renderTemplate()
    {
        $this->_view->render();
    }
}