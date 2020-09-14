<?php
//On inclut le fichier qui contient les regex avec un require car on en a besoin pour faire les vérification
require_once 'regex.php';

$cities=new cities();
$citiesList = $cities->getCitiesList();

//On initialise un tableau d'erreurs vide
$formErrors = array();
/*
 * On vérifie si le tableau $_POST est vide
 * S'il est vide => le formulaire n'a pas été envoyé
 * S'il a au moins une ligne => le formulaire a été envoyé, on peut commencer les vérifications
 */
if (count($_POST) > 0) {
  /*
   * On vérifie que $_POST['lastName'] n'est pas vide
   * S'il est vide => on stocke l'erreur dans le tableau $formErrors
   * S'il n'est pas vide => on vérifie si la saisie utilisateur correspond à la regex
   */
  if (!empty($_POST['lastName'])) {
    /*
     * On vérifie si la saisie utilisateur correspond à la regex
     * Si tout va bien => on stocke dans la variable qui nous servira à afficher
     * Sinon => on stocke l'erreur dans le tableau $formErrors
     */
    if (preg_match($regexName, $_POST['lastName'])) {
      //On utilise la fonction strip_tags pour supprimer les éventuelles balises html => on a aucun intérêt à garder une balise html dans ce champs
      $lastName = strip_tags($_POST['lastName']);
    } else {
      $formErrors['lastName'] = 'Merci de renseigner un nom de famille valide';
    }
  } else {
    $formErrors['lastName'] = 'Merci de renseigner votre nom de famille';
  }

  if (!empty($_POST['firstName'])) {
    if (preg_match($regexName, $_POST['firstName'])) {
      $firstName = strip_tags($_POST['firstName']);
    } else {
      $formErrors['firstName'] = 'Merci de renseigner un prénom valide';
    }
  } else {
    $formErrors['firstName'] = 'Merci de renseigner votre prénom';
  }

  if (!empty($_POST['birthDate'])) {
    if (preg_match($regexBirthDate, $_POST['birthDate'])) {
      $birthDate = strip_tags($_POST['birthDate']);
    } else {
      $formErrors['birthDate'] = 'Merci de renseigner une date de naissance valide';
    }
  } else {
    $formErrors['birthDate'] = 'Merci de renseigner votre date de naissance';
  }

  if (!empty($_POST['password'])) {
    if (preg_match($regexCountryAndNationnality, $_POST['password'])) {
      $password = strip_tags($_POST['password']);
    } else {
      $formErrors['password'] = 'Merci de renseigner un mot de passe valide';
    }
  } else {
    $formErrors['password'] = 'Merci de renseigner un mot de passe';
  }

  if (!empty($_POST['passwordConfirmation'])) {
    if (preg_match($regexCountryAndNationnality, $_POST['passwordConfirmation'])) {
      $passwordConfirmation = strip_tags($_POST['passwordConfirmation']);
    } else {
      $formErrors['passwordConfirmation'] = 'Le mot de passe ne correspond pas';
    }
  } else {
    $formErrors['passwordConfirmation'] = 'Confirmation du mot de passe';
  }

  if (!empty($_POST['address'])) {
    if (preg_match($regexAddress, $_POST['address'])) {
      $address = strip_tags($_POST['address']);
    } else {
      $formErrors['address'] = 'Merci de renseigner une adresse valide';
    }
  } else {
    $formErrors['address'] = 'Merci de renseigner votre adresse';
  }

  if (!empty($_POST['mail'])) {
    if (preg_match($regexMail, $_POST['mail'])) {
      $mail = strip_tags($_POST['mail']);
    } else {
      $formErrors['mail'] = 'Merci de renseigner une nationalité valide';
    }
  } else {
    $formErrors['mail'] = 'Merci de renseigner votre nationalité';
  }

  if (!empty($_POST['phoneNumber'])) {
    if (preg_match($regexPhoneNumber, $_POST['phoneNumber'])) {
      $phoneNumber = strip_tags($_POST['phoneNumber']);
    } else {
      $formErrors['phoneNumber'] = 'Merci de renseigner un numéro de téléphone valide';
    }
  } else {
    $formErrors['phoneNumber'] = 'Merci de renseigner votre numéro de téléphone';
  }
  if (!empty($_POST['levelSport'])) {
    if ($_POST['levelSport'] === 'oui' || $_POST['levelSport'] === 'non') {
      $levelSport = $_POST['levelSport'];
    } else {
      $formErrors['levelSport'] = 'Merci de sélectionner une réponse';
    }
  } else {
    $formErrors['levelSport'] = 'Merci de répondre à cette question';
  }
  if (!empty($_POST['gender'])) {
    if ($_POST['gender'] === 'oui' || $_POST['gender'] === 'non') {
      $gender = $_POST['gender'];
    } else {
      $formErrors['gender'] = 'Merci de sélectionner une réponse';
    }
  } else {
    $formErrors['gender'] = 'Merci de répondre à cette question';
  }
}
