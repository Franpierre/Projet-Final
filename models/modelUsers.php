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
            // j'ai essayé de retourner, mais je n'ai pas mis de valeur qui me permettrait de savoir si il y a une similitude ou non, elle me permettra de la récupérer et de l'utiliser     
        public function addUser(){
            //$db devient une instance de l'objet PDO
            //on fait une requête préparée
        $addUser = $this->db->prepare(
            //Marqueur nominatif
            //bindValue: vérifie le type et que ça ne génère pas de faille de sécurité.
            //$this-> : permet d'acceder aux attributs de l'instance qui est en cours
            'INSERT INTO `3xf90_users` (`lastName`,`firstName`,`userName`,`mail`,`phone`,`password`,`birthdate`,`description`,`avatar`,`id_genders`,`id_cities`)
            VALUES(:lastName, :firstName, :userName, :mail, :phone, :password, :birthdate, :description, :avatar, :id_genders, :id_cities)'
        );
        $addUser->bindvalue(':lastName', $this->lastName, PDO::PARAM_STR);
        $addUser->bindvalue(':firstName', $this->firstName, PDO::PARAM_STR);
        $addUser->bindvalue(':userName', $this->userName, PDO::PARAM_STR);
        $addUser->bindvalue(':mail', $this->mail, PDO::PARAM_STR);
        $addUser->bindvalue(':phone', $this->phone, PDO::PARAM_STR);
        $addUser->bindvalue(':password', $this->password, PDO::PARAM_STR);
        $addUser->bindvalue(':birthdate', $this->birthdate, PDO::PARAM_STR);
        $addUser->bindvalue(':description', $this->description, PDO::PARAM_STR);
        $addUser->bindvalue(':avatar', $this->avatar, PDO::PARAM_STR);
        $addUser->bindvalue(':id_genders', $this->id_genders, PDO::PARAM_INT);
        $addUser->bindvalue(':id_cities', $this->id_cities, PDO::PARAM_INT);
        return $addUser->execute();
        }   
}
