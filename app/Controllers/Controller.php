<?php

namespace app\Controllers;

use app\Classes\Uri;

class Controller
{
    const NAMESPACE_CONTROLLER = "\\app\\Controllers\\";
    const FORDERS_CONTROLLER = ['Site', 'Admin'];
    const ERRO_CONTROLLER = '\\app\\Controllers\\Erro\\ErroController';

    private $controller;
    private $uri;

    public function __construct()
    {
        $this->uri = new Uri;
    }

    private function getController()
    {

        if (!$this->uri->emptyUri()) {

            $explodeUri = array_filter(explode('/', $this->uri->getUri()));
            return ucfirst($explodeUri[1]) . 'Controller';
        }
        return ucfirst(DEFAULT_CONTROLLER) . 'Controller';
    }

    public function controller()
    {
        $controller = $this->getController();
        foreach (self::FORDERS_CONTROLLER as $folderController) {
            if (class_exists(self::NAMESPACE_CONTROLLER . $folderController . '\\' . $controller)) {
                return self::NAMESPACE_CONTROLLER . $folderController . '\\' . $controller;
            }
        }

        return self::ERRO_CONTROLLER;
    }
}