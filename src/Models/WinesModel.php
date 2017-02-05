<?php

namespace Src\Models;

/**
 * Description of WinesModel
 *
 * @author admin
 */
class WinesModel
{

    private $container;

    public function __construct($container)
    {
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
    public function dataVerify($name, $year, $grapes, $country, $region, $description, $picture)
    {
        if (!is_string($name))
        {
            return false;
        }

        if (!is_int($year))
        {
            return false;
        }

        if (!is_string($grapes))
        {
            return false;
        }

        if (!is_string($country))
        {
            return false;
        }

        if (!is_string($region))
        {
            return false;
        }

        if (!is_string($description))
        {
            return false;
        }

        if (!is_string($picture))
        {
            return false;
        }

        return true;
    }

    public function get_all()
    {
        $res = \R::findAll('wine');
        if ($res)
        {
            return $res;
        }
        return false;
    }

    /**
     * Cherche un vin en particulier si le nom est défini sinon tous les vins
     * @param string $name Le nom du vin
     * @return mixed false si pas de résultat sinon un tableau de résultat
     */
    public function search($name = null)
    {

        //REDBEAN//$books = R::find( 'book', ' title LIKE ? ', [ 'Learn to%' ] );
        //ou
        //findLike
        //Recherche de tout les vins
        if (!$name)
        {
            $res = \R::findAll('wine');
            if ($res)
            {
                return $res;
            }
            return false;
        }

        //Recherche d'un vin en particulier
        $result = \R::findLike('wine', ['name' => [$name]]);
        if ($result)
        {
            return $result;
        }
        return false;
    }

    /**
     * Recherche un vin grâce à son id
     * @param type $id L'id du vin
     * @return mixed False si pas de résultat sinon un tableau de résultat
     */
    public function search_by_id($id = null)
    {
        if ($id > 0)
        {
            $result = \R::findOne('wine', 'id = ' . $id);
            return $result;
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
    public function add_wines($name, $year, $grapes, $country, $region, $description, $picture)
    {
        if (!$this->dataVerify($name, $year, $grapes, $country, $region, $description, $picture))
        {
            return false;
        }

        $wine = \R::dispense('wine');
        $wine->name = $name;
        $wine->year = $year;
        $wine->grapes = $grapes;
        $wine->country = $country;
        $wine->region = $region;
        $wine->description = $description;
        $wine->picture = $picture;

        //si l'opération c'est bien passée Redbean renvoi l'id de l'objet inséré.
        $result = \R::store($wine);

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
    public function update_wine($id, $name, $year, $grapes, $country, $region, $description, $picture)
    {
        if (!is_int($id) || !$this->dataVerify($name, $year, $grapes, $country, $region, $description, $picture))
        {
            return false;
        }

        //chargement du vin à modifier
        $wine = \R::load('wine', $id);
        $wine->name = $name;
        $wine->year = $year;
        $wine->grapes = $grapes;
        $wine->country = $country;
        $wine->region = $region;
        $wine->description = $description;
        $wine->picture = $picture;

        $result = \R::Store($wine);

        return $result;
    }

    /**
     * Supprime les informations sur un vin
     * @param int $id L'id du vin.
     * @return boolean True si le vin a bien été supprimé sinon false.
     */
    public function delete_wine($id)
    {
        if (!is_int($id))
        {
            return false;
        }

        $wine = \R::load('wine', $id);
        $result = \R::trash($wine);

        return $result;
    }

}
