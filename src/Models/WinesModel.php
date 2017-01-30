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

    /**
     * Vérifie les données d'un vin.
     * @param string $name Le nom du vin.
     * @param int $year L'année du vin.
     * @param string $grapes La grape du vin.
     * @param string $country Le pays du vin.
     * @param string $region La region du vin.
     * @param string $description La description du vin.
     * @param string $picture L'image associée au vin.
     * @return boolean True si les données sont valide sinon false.
     */
    public function dataVerify($name, $year, $grapes, $country, $region, $description, $picture) {
        if (!is_string($name)) {
            return false;
        }
        
        if (!is_int($year)) {
            return false;
        }
        
        if (!is_string($grapes)) {
            return false;
        }
        
        if (!is_string($country)) {
            return false;
        }
        
        if (!is_string($region)) {
            return false;
        }
        
        if (!is_string($description)) {
            return false;
        }
        
        if (!is_string($picture)) {
            return false;
        }
        
        return true;
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
    
    /**
     * Ajoute un vin
     * @param string $name Le nom du vin.
     * @param int $year L'année du vin.
     * @param string $grapes La grape du vin.
     * @param string $country Le pays du vin.
     * @param string $region La region du vin.
     * @param string $description La description du vin.
     * @param string $picture L'image associée au vin.
     * @return boolean True si le vin a bien été ajouté sinon false.
     */
    public function add_wines($name, $year, $grapes, $country, $region, $description, $picture) {
        
        if(!$this->dataVerify($name, $year, $grapes, $country, $region, $description, $picture)) {
            return false;
        }
        
        $query = $this->container->pdo->prepare("INSERT INTO wine(name, year, grapes, country, region, description, picture) VALUES(?,?,?,?,?,?,?)");
        
        $result = $query->execute([$name, $year, $grapes, $country, $region, $description, $picture]);
        
        return $result;
    }
    
    /**
     * Modifie les informations sur un vin
     * @param int $id L'id du vin.
     * @param string $name Le nom du vin.
     * @param int $year L'année du vin.
     * @param string $grapes La grape du vin.
     * @param string $country Le pays du vin.
     * @param string $region La region du vin.
     * @param string $description La description du vin.
     * @param string $picture L'image associée au vin.
     * @return boolean True si le vin a bien été modifié sinon false.
     */
    public function update_wine($id, $name, $year, $grapes, $country, $region, $description, $picture) {
        if(!is_int($id)) {
            return false;
        }
        
        if(!$this->dataVerify($name, $year, $grapes, $country, $region, $description, $picture)) {
            return false;
        }
        
        $query = $this->container->pdo->prepare("UPDATE wine SET name=?, year=?, grapes=?, country=?, region=?, description=?, picture=? WHERE id=?");
        
        $result = $query->execute([$name, $year, $grapes, $country, $region, $description, $picture, $id]);
        
        return $result;
    }

}
