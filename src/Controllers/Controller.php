<?php

namespace Src\Controllers;

use \Psr\Http\Message\ResponseInterface;

/**
 * Description of Controller
 *
 */
class Controller {
    
    private $container;
    
    public function __construct($container) {
        $this->container = $container;
    }
    
    public function render(ResponseInterface $response, $file, $args=null) {
        $this->container->view->render($response, $file, $args);
    }
}
