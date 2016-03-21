<?php
class View{
    protected $variables = array();
    protected $_view;
    protected $_action;

    public function __construct($view, $action)
    {
        $this->_view = $view;
        $this->_action = $action;
    }

    public function set($name, $value)
    {
        $this->variables[$name] = $value;
    }

    public function render()
    {
        extract($this->variables);
        if (file_exists(APP_PATH . DS . 'view' . DS .'common' . DS . 'header.php')) {
            include(APP_PATH . DS . 'view' . DS . 'common' . DS . 'header.php');
        }

        if (file_exists(APP_PATH . DS .'view' . DS . $this->_view . DS . $this->_action . '.php')) {
            include(APP_PATH . DS . 'view' . DS . $this->_view . DS . $this->_action . '.php');
        } else {
            BaseController::page404();
        }

        if (file_exists(APP_PATH . DS . 'views' . DS . 'common' . DS .'footer.php')) {
            include(APP_PATH . DS . 'views' . DS . 'common' . DS . 'footer.php');
        }
    }
}