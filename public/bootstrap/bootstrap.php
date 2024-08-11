<?php

use app\Classes\Template;
use app\Controllers\Controller;
use app\Controllers\Metodos;

$template = new Template;
$twig = $template->init();
dump($twig);
/**
 * chamando o controller digitado na ulr
 * localhost:8000/controller
 */


/**
 * chamando o controller digitado na url
 */

$callController = new Controller;
$calledController = $callController->controller();
/**
 * Chamando o controller atraves da classe controller e da classe metodo
 */
$controller = new $calledController();
$callMetodo = new Metodos;
$metodo = $callMetodo->metodo($controller);
/**
 * chamando o metodo digitado na url
 */
$controller->$metodo($controller);
