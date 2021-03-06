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
     * sinon si un id est sp�cifi� le vin avec cet id sera renvoy�
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
        $result = json_encode($result);
        $response->getBody()->write($result);
        //$this->render($response, 'wines/search.html.twig', ['wineData' => $result]);
    }
    /**
     * R�ception de donn�e au format json vie $_POST, les r�cup�r�e et ins�rer 
     * dans la DB et echo un boolean pour dire si l'insertion s'est bien pass�e
     * @param RequestInterface $request
     * @param ResponseInterface $response
     */
    public function add(RequestInterface $request, ResponseInterface $response) {
        if (isset($_SERVER['HTTP_REFERER'])) {
            if ($_SERVER['HTTP_REFERER'] == "moncellier.localhost") {
                $name = $_POST['name'];
                $year = $_POST['year'];
                $grapes = $_POST['grapes'];
                $country = $_POST['country'];
                $region = $_POST['region'];
                $description = $_POST['description'];
                $picture = $_POST['picture'];
                //envoi vers le modele
                $model = $this->loadModel('winesModel');
                return $model->add_wines($name, $year, $grapes, $country, $region, $description, $picture);
                //}
            }
        }
    }
    /**
     * Modifie les information d'un vin.
     * @param int $id L'id du vin � modifier.
     * @return boolean True si le vin a bien �t� modifi� sinon false
     */
    public function put($id) {
        if (isset($_SERVER['HTTP_REFERER'])) {
            if ($_SERVER['HTTP_REFERER'] == 'moncellier.localhost') {
                $name = $_POST['name'];
                $year = $_POST['year'];
                $grapes = $_POST['grapes'];
                $country = $_POST['country'];
                $region = $_POST['region'];
                $description = $_POST['description'];
                $picture = $_POST['picture'];
                //
        //envoi vers le modele
                $model = $this->loadModel('winesModel');
                return $model->update_wine($id, $name, $year, $grapes, $country, $region, $description, $picture);
                //}
            }
        }
    }
    /**
     * Supprime un vin.
     * @param int $id L'id du vin � supprimer.
     * @return boolean True si le vin a bien �t� supprim� sinon false
     */
    public function delete($id) {
        if (isset($_SERVER['HTTP_REFERER'])) {
            if ($_SERVER['HTTP_REFERER'] == 'moncellier.localhost') {
                $model = $this->loadModel('winesModel');
                return $model->delete_wine($id);
            }
        }
    }
}