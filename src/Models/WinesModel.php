<?php

namespace Src\Models;

/**
 * Description of WinesModel
 *
 * @author admin
 */
class WinesModel {

    private $container;

    public function __construct($container) {
        $this->container = $container;
    }

    public function get_all() {
        $result = $this->container->pdo->query("SELECT * FROM wine");

        if ($result != false) {
            $res = $result->fetchAll(\PDO::FETCH_ASSOC);
            return $res;
        }

        return false;
    }

    /**
     * Cherche un vin en particulier si le nom est défini sinon tous les vins
     * @param string $name Le nom du vin
     * @return mixed false si pas de résultat sinon un tableau de résultat
     */
    public function search($name = null) {

        //Recherche de tout les vins
        if ($name == null) {

            $result = $this->container->pdo->query("SELECT * FROM wine");

            if ($result != false) {
                $res = $result->fetchAll(\PDO::FETCH_ASSOC);
                return $res;
            }

            return false;
        }

        //Recherche d'un vin en particulier
        $name = $this->container->pdo->quote($name);
        $result = $this->container->pdo->query("SELECT * FROM wine WHERE name=" . $name);
        if ($result != false) {
            $res = $result->fetchAll(\PDO::FETCH_ASSOC);
            return $res[0];
        }
        return false;
    }

    /**
     * Recherche un vin grâce à son id
     * @param type $id L'id du vin
     * @return mixed False si pas de résultat sinon un tableau de résultat
     */
    public function search_by_id($id) {
        $id = $this->container->pdo->quote($id);
        $result = $this->container->pdo->query("SELECT * FROM wine WHERE id=" . $id);
        if ($result != false) {
            $res = $result->fetchAll(\PDO::FETCH_ASSOC);
            return $res[0];
        }
        return false;
    }

}
