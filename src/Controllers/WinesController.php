<?php

namespace Src\Controllers;

use \Psr\Http\Message\RequestInterface;
use \Psr\Http\Message\ResponseInterface;

/**
 * Description of WinesController
 *
 * @author admin
 */
class WinesController {

    private $container;

    public function __construct($container) {
        $this->container = $container;
    }

    public function index(RequestInterface $request, ResponseInterface $response, $args) {

        if (empty($args)) {
            $this->container->view->render($response, 'wines/index.twig');
        } else {
            $this->container->view->render($response, 'wines/search_id.twig');
        }
    }

    public function search(RequestInterface $request, ResponseInterface $response, $args) {
        $this->container->view->render($response, 'wines/search.twig', ['wineName' => $args['name']]);
    }

    public function add(RequestInterface $request, ResponseInterface $response) {
        true;
    }

}
