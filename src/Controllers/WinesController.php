<?php

namespace Src\Controllers;

use \Psr\Http\Message\RequestInterface;
use \Psr\Http\Message\ResponseInterface;

/**
 * Description of WinesController
 *
 * @author admin
 */
class WinesController extends Controller {

    public function index(RequestInterface $request, ResponseInterface $response, $args) {

        if (empty($args)) {
            $model = $this->loadModel('winesModel');
            $result = $model->search();
            $result = nl2br(json_encode($result, JSON_PRETTY_PRINT));
            //$this->render($response, 'wines/index.html.twig', ['wineData' => $result]);
            $response->getBody()->write($result);
        } else {
            $this->render($response, 'wines/search_id.html.twig');
        }
    }

    public function home(RequestInterface $request, ResponseInterface $response) {
        $this->render($response, 'wines/home.html.twig');
    }

    /**
     * Recherche un vin en particulier
     * @param RequestInterface $request
     * @param ResponseInterface $response
     * @param type $args
     */
    public function search(RequestInterface $request, ResponseInterface $response, $args) {
        $model = $this->loadModel('winesModel');
        $result = $model->search($args['name']);
        $result = json_encode($result, JSON_PRETTY_PRINT);
        $this->render($response, 'wines/search.html.twig', ['wineData' => $result]);
    }

    public function add(RequestInterface $request, ResponseInterface $response) {
        true;
    }

}
