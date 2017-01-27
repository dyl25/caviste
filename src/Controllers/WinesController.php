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

    /**
     * Affiche au format JSON tous les vins de la DB si il n'y a pas d'argument 
     * sinon si un id est spécifié le vin avec cet id sera renvoyé
     * @param RequestInterface $request
     * @param ResponseInterface $response
     * @param type $args
     */
    public function index(RequestInterface $request, ResponseInterface $response, $args) {

        if (empty($args)) {
            $model = $this->loadModel('winesModel');
            $result = $model->search();
            $result = nl2br(json_encode($result, JSON_PRETTY_PRINT));
            //$this->render($response, 'wines/index.html.twig', ['wineData' => $result]);
            $response->getBody()->write($result);
        } else {
            $model = $this->loadModel('winesModel');
            $result = $model->search_by_id($args['id']);
            $result = nl2br(json_encode($result, JSON_PRETTY_PRINT));
            $response->getBody()->write($result);
        }
    }

    public function home(RequestInterface $request, ResponseInterface $response) {
        $model = $this->loadModel('winesModel');
        $result = $model->get_all();
        /*var_dump($result);
        die();*/
        $this->render($response, 'wines/home.html.twig', ['wines' => $result]);
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
        $response->getBody()->write($result);
        //$this->render($response, 'wines/search.html.twig', ['wineData' => $result]);
    }

    public function add(RequestInterface $request, ResponseInterface $response) {
        true;
    }

}
