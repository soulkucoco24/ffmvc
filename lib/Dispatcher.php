<?php
class Dispatcher{
    protected static $front;
    const URI_REGEXP = '/^\/([^\d\?\/\\][^\/]*?)?(?:\/([^\d\?\/\\][^\/]*?))?(?:\/([^\?]+?))?(?:\/\?.*)?$/s';

    /**
     * getInstance
     *
     * @return Dispatcher
     */
    public static function getInstance()
    {
        if (!isset(self::$front)) {
            self::$front = new self();
            return self::$front;
        }
    }

    /**
     * dispatch
     *
     * @return bool
     */
    public static function dispatch()
    {
        if (!preg_match(self::URI_REGEXP, URI, $urlArray)) {
            return BaseController::page404();
        }
        $class = isset($urlArray[1]) && !empty($urlArray[1]) ? $urlArray[1] : 'index';
        $action = isset($urlArray[2]) && !empty($urlArray[2]) ? $urlArray[2] : 'default';
        if (isset($urlArray[3])) {
            $arr = explode('/', $urlArray[3]);
            foreach ($arr as $k => $v) {
                $arr[$k] = trim(urldecode($v));
            }
            $args = $arr;
        } else {
            $args = array();
        }
        $method = ucwords($action);
        if (strcasecmp($_SERVER['REQUEST_METHOD'], 'POST') === 0) {
            $method = 'actPost'.$action;
        } else {
            $method = 'act'.$action;
        }
        $controller = ucwords($class).'Controller';
        $model = ucwords($class).'Model';
        $view = $class;
        $controllerObj = new $controller($model, $view, $action);
        if ((int)method_exists($controller, $method)) {
            call_user_func_array(array($controllerObj, $method), $args);
            $controllerObj->renderTemlate();
        } else {
            return BaseController::page404();
        }
    }
}