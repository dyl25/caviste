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
            $result = json_encode($result);
            //$this->render($response, 'wines/index.html.twig', ['wineData' => $result]);
            $response->getBody()->write($result);
        } else {
            $model = $this->loadModel('winesModel');
            $result = $model->search_by_id($args['id']);
            $result = json_encode($result);
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

    /**
     * Réception de donnée au format json vie $_POST, les récupérée et insérer 
     * dans la DB et echo un boolean pour dire si l'insertion s'est bien passée
     * @param RequestInterface $request
     * @param ResponseInterface $response
     */
    public function add(RequestInterface $request, ResponseInterface $response) {

        if(isset($_POST('save'))) {
            //décodage de la chaine json
            
            //envoi vers le modele
            $model = $this->loadModel('winesModel');
            return $model->add_wines($name, $year, $grapes, $country, $region, $description, $picture);
        }
    }
    
    /**
     * Modifie les information d'un vin.
     * @param int $id L'id du vin à modifier.
     */
    public function put($id) {
        true;
    }
    
    /**
     * Supprime un vin.
     * @param int $id L'id du vin à supprimer.
     */
    public function delete($id) {
        true;
    }

    /**
     * test de methode
     */
    public function test() {
        $model = $this->loadModel('winesModel');
        
        var_dump($model->add_wines(60, 2010, 'grapeTest', 'countryTest', 'regionTest', 'descriptionTest', 'urlPicture'));
    }
}
