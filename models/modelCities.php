<?php
class cities
{
    public $id = 0;
    public $name = '';
    public $postalCode = '';
    
    public function __construct(){
        try {
            $this->db = new PDO('mysql:host=localhost;dbname=meetInShape;charset=utf8', 'root', 'vfjhvbhjv');
        } catch (Exception $error) {
            die($error->getMessage());
        }
    }
    
    public function getCitiesList(){
        //Requête selectionne l'ID en utilsant la methode COUNT permettant de compter les éléments d'un tableau ou objet, ici les patient existant.
        $getCitiesList = $this->db->query(
            'SELECT `name`
            FROM `3xf90_cities`
            ORDER BY `name` ASC
            LIMIT 20'
        );
        return $getCitiesList->fetchAll(PDO::FETCH_OBJ);
    }
}
