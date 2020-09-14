<?php
class users
{
    public $id = 0;
    public $lastName = '';
    public $firstName = '';
    public $userName = '';
    public $mail = '';
    public $phone = '';
    public $password = '';
    public $birthdate = '0000.00.00';
    public $description = '';
    public $avatar = '';
    public $id_genders = '';
    public $id_cities = '';
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
