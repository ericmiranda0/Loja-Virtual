<?php

namespace app\Controllers;

use app\Classes\Uri;

class Metodos
{
    private $uri;

    public function __construct()
    {
        $this->uri = new Uri;
    }

    public function getMetodo()
    {
        if (!$this->uri->emptyUri()) {
            $explodeUri = array_filter(explode('/', $this->uri->getUri()));
            return (!isset($explodeUri[2])) ?: null;
        }
    }

    public function metodo($object)
    {
        $metodo = $this->getMetodo();

        if ($metodo && method_exists($object, $metodo)) {
            return $metodo;
        }
        return DEFAULT_METHOD;
    }
}
