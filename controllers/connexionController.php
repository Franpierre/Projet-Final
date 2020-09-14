<?php
require_once 'regex.php';
if (!empty($_POST['mail'])) {
    if (preg_match($regexMail, $_POST['mail'])) {
      $mail = strip_tags($_POST['mail']);
    } else {
      $formErrors['mail'] = 'Merci de renseigner une adresse mail valide';
    }
    if (!empty($_POST['password'])) {
        if (preg_match($regexCountryAndNationnality, $_POST['password'])) {
          $password = strip_tags($_POST['password']);
        } else {
          $formErrors['password'] = 'Merci de renseigner un mot de passe';
        }
    }
}