<?php
include 'header.php';
//On inclut le fichier qui contient les regex avec un require car on en a besoin pour faire les vérification
require_once 'regex.php';
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
      $formErrors['password'] = 'Merci de renseigner un mot de passe';
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
?>
    <div class="container mt-5 mb-5">
      <?php if (count($_POST) == 0 || count($formErrors) > 0) { ?>
        <form action="index.php" method="POST">
            <h1>Création de compte</h1>
            <hr />
            <div class="form-group row">
              <div class="col-lg-6 col-md-6 col-12">
                <label for="lastName">Nom de famille</label>
                <?php
                /*
                 * On garde dans la value, $_POST['lastName'] qui est la saisie de l'utilisateur
                 * Permet d'éviter à l'utilisateur de resaisir ses informations
                 * 
                 * On ajoute la classe is-invalid si $formErrors['lastName'] existe car cette variable n'existe qu'en cas d'erreur
                 * On ajoute la classe is-valid si $lastName existe car cette variable n'existe qu'en cas de saisie valide
                 * 
                 * En cas d'erreur on crée une div invalid-feedback pour afficher le texte de l'erreur
                 */
                ?>
                <input type="text" required name="lastName" value="<?= isset($_POST['lastName']) ? $_POST['lastName'] : '' ?>" class="form-control <?= isset($formErrors['lastName']) ? 'is-invalid' : (isset($lastName) ? 'is-valid' : '') ?>" id="lastName" placeholder="Dupont" />
                <?php if (isset($formErrors['lastName'])) { ?>
                  <div class="invalid-feedback"><?= $formErrors['lastName'] ?></div>
                <?php } ?>
              </div>
              <div class="col-lg-6 col-md-6 col-12">
                <label for="firstName">Prénom</label>
                <input type="text" required name="firstName" value="<?= isset($_POST['firstName']) ? $_POST['firstName'] : '' ?>"  class="form-control <?= isset($formErrors['firstName']) ? 'is-invalid' : (isset($firstName) ? 'is-valid' : '') ?>" id="firstName" placeholder="Jean" />
                <?php if (isset($formErrors['firstName'])) { ?>
                  <div class="invalid-feedback"><?= $formErrors['firstName'] ?></div>
                <?php } ?>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-lg-6 col-md-6 col-12">
                <label for="userName">Nom d'utilisateur</label>
                <input type="text" required name="userName"  value="<?= isset($_POST['userName']) ? $_POST['userName'] : '' ?>"class="form-control <?= isset($formErrors['userName']) ? 'is-invalid' : (isset($passwordConfirmation) ? 'is-valid' : '') ?>" id="userName" placeholder="Pseudo" />
                <?php if (isset($formErrors['userName'])) { ?>
                  <div class="invalid-feedback"><?= $formErrors['userName'] ?></div>
                <?php } ?>
              </div>
              <div class="col-lg-6 col-md-6 col-12">
                <label for="mail">Adresse mail</label>
                <input type="email" required name="mail" value="<?= isset($_POST['mail']) ? $_POST['mail'] : '' ?>" class="form-control <?= isset($formErrors['mail']) ? 'is-invalid' : (isset($mail) ? 'is-valid' : '') ?>" id="mail" placeholder="adresse@mail.com" />
                <?php if (isset($formErrors['mail'])) { ?>
                  <div class="invalid-feedback"><?= $formErrors['mail'] ?></div>
                <?php } ?>
              </div>
            </div>
            <div class="form-group row"> 
              <div class="col-lg-6 col-md-6 col-12">        
                <label for="phoneNumber">Numéro de téléphone</label>
                <input type="text" required name="phoneNumber" value="<?= isset($_POST['phoneNumber']) ? $_POST['phoneNumber'] : '' ?>" class="form-control <?= isset($formErrors['phoneNumber']) ? 'is-invalid' : (isset($phoneNumber) ? 'is-valid' : '') ?>" id="phoneNumber" placeholder="01 02 03 04 05" />
                <?php if (isset($formErrors['phoneNumber'])) { ?>
                  <div class="invalid-feedback"><?= $formErrors['phoneNumber'] ?></div>
                <?php } ?>
              </div>
              <div class="col-lg-6 col-md-6 col-12">
                <label for="password">Mot de Passe</label>
                <input type="text" required name="password"  value="<?= isset($_POST['password']) ? $_POST['password'] : '' ?>"class="form-control <?= isset($formErrors['password']) ? 'is-invalid' : (isset($password) ? 'is-valid' : '') ?>" id="password" placeholder="*********" />
                <?php if (isset($formErrors['password'])) { ?>
                  <div class="invalid-feedback"><?= $formErrors['password'] ?></div>
                <?php } ?>
              </div> 
            </div> 
              <div class="col-md-6 offset-md-6">
                <label for="passwordConfirmation">Confirmation du mot de passe</label>
                <input type="text" required name="passwordConfirmation"  value="<?= isset($_POST['passwordConfirmation']) ? $_POST['passwordConfirmation'] : '' ?>"class="form-control <?= isset($formErrors['passwordConfirmation']) ? 'is-invalid' : (isset($passwordConfirmation) ? 'is-valid' : '') ?>" id="passwordConfirmation" placeholder="**********" />
                <?php if (isset($formErrors['passwordConfirmation'])) { ?>
                  <div class="invalid-feedback"><?= $formErrors['passwordConfirmation'] ?></div>
                <?php } ?>
              </div>            
        <div class="container mt-5 mb-5">  
          <fieldset>
            <legend>Informations supplémentaires</legend>
            <hr />
                <?php
                /*
                 * Pour afficher ce qu'a saisi l'utilisateur, on le place entre les balises ouvrantes et fermantes du textarea
                 * Le textarea n'a pas d'attribut value
                 */
                ?>            
            <div class="form-group row">       
              <div class="col-lg-6 col-md-6 col-12">
                  <label for="birthDate">Date de naissance</label>
                  <input type="date" required name="birthDate" value="<?= isset($_POST['birthDate']) ? $_POST['birthDate'] : '' ?>" class="form-control <?= isset($formErrors['birthDate']) ? 'is-invalid' : (isset($birthDate) ? 'is-valid' : '') ?>" id="birthDate" />
                  <?php if (isset($formErrors['birthDate'])) { ?>
                    <div class="invalid-feedback"><?= $formErrors['birthDate'] ?></div>
                  <?php } ?>
              </div>
                <div class="col-lg-6 col-md-6 col-12">
                  <label for="password">Ville</label>
                  <input type="text" required name="password"  value="<?= isset($_POST['password']) ? $_POST['password'] : '' ?>"class="form-control <?= isset($formErrors['password']) ? 'is-invalid' : (isset($password) ? 'is-valid' : '') ?>" id="password" placeholder="Reims" />
                  <?php if (isset($formErrors['password'])) { ?>
                    <div class="invalid-feedback"><?= $formErrors['password'] ?></div>
                  <?php } ?>
                </div>
            </div>
            <div class="form-group row">
              <div class="col-lg-6 col-md-6 col-12">
                <label for="sport">Choisir un sport</label>
                  <select name="sports" id="sport-select">
                    <option value="">Choisi un sport</option>
                    <option value="Course à pied">Course à pied</option>
                    <option value="Yoga">Yoga</option>
                    <option value="Judo">Judo</option>
                    <option value="Danse">Danse</option>
                    <option value="Musculation">Musculation</option>
                    <option value="Natation">Natation</option>
                  </select> 
                <!--JE laisse ou pas ?-->
                <?php if (isset($formErrors['sport'])) { ?>
                  <div class="invalid-feedback"><?= $formErrors['sport'] ?></div>
                <?php } ?>
              </div>
            </div>
          </fieldset>
              <?php
              /*
               * Pour garder la saisie utilisateur, on ajoute l'attribut checked s'il a coché l'input
               */
              ?>
            <div class="form-group row">
              <div class="col-lg-6 col-md-6 col-12">
                  <p>Genre</p>
                <div class="custom-control custom-radio">
                  <input type="radio" id="genreMan" name="gender" value="genreMan" <?= isset($_POST['gender']) && $_POST['gender'] == 'oui' ? 'checked' : '' ?> class="custom-control-input <?= isset($formErrors['gender']) ? 'is-invalid' : (isset($gender) ? 'is-valid' : '') ?>">
                  <label class="custom-control-label" for="genreMan">Homme</label>
                </div>
                <div class="custom-control custom-radio">
                  <input type="radio" id="genreWoman" name="gender" value="genreWoman" <?= isset($_POST['gender']) && $_POST['gender'] == 'non' ? 'checked' : '' ?> class="custom-control-input <?= isset($formErrors['gender']) ? 'is-invalid' : (isset($gender) ? 'is-valid' : '') ?>">
                  <label class="custom-control-label" for="genreWoman">Femme</label>
                </div>
                <?php if (isset($formErrors['gender'])) { ?>
                  <div class="invalid-feedback d-block"><?= $formErrors['gender'] ?></div>
                <?php } ?>
              </div>                  
              <div class="col-lg-6 col-md-6 col-12">          
                  <p>Niveau du sport pratiqué</p> 
                <div class="custom-control custom-radio">
                  <input type="radio" id="levelSport" name="levelSport" value="1" <?= isset($_POST['levelSport']) && $_POST['levelSport'] == 'oui' ? 'checked' : '' ?> class="custom-control-input <?= isset($formErrors['levelSport']) ? 'is-invalid' : (isset($levelSport) ? 'is-valid' : '') ?>">
                  <label class="custom-control-label" for="levelBeginner">Débutant</label>
                </div>
                <div class="custom-control custom-radio">
                  <input type="radio" id="levelSport" name="levelSport" value="2" <?= isset($_POST['levelSport']) && $_POST['levelSport'] == 'non' ? 'checked' : '' ?> class="custom-control-input <?= isset($formErrors['levelSport']) ? 'is-invalid' : (isset($levelSport) ? 'is-valid' : '') ?>">
                  <label class="custom-control-label" for="levelIntermediate">Intermédiaire</label>
                </div>
                <div class="custom-control custom-radio">
                  <input type="radio" id="levelSport" name="levelSport" value="3" <?= isset($_POST['levelSport']) && $_POST['levelSport'] == 'oui' ? 'checked' : '' ?> class="custom-control-input <?= isset($formErrors['levelSport']) ? 'is-invalid' : (isset($levelSport) ? 'is-valid' : '') ?>">
                  <label class="custom-control-label" for="levelAvanced">Avancé</label>
                </div>
                <div class="custom-control custom-radio">
                  <input type="radio" id="levelSport" name="levelSport" value="4" <?= isset($_POST['levelSport']) && $_POST['levelSport'] == 'non' ? 'checked' : '' ?> class="custom-control-input <?= isset($formErrors['levelSport']) ? 'is-invalid' : (isset($levelSport) ? 'is-valid' : '') ?>">
                  <label class="custom-control-label" for="levelExcellent">Excellent</label>
                </div>
                <?php if (isset($formErrors['levelSport'])) { ?>
                <div class="invalid-feedback d-block"><?= $formErrors['levelSport'] ?></div>
                <?php } ?>
            </div>
            <div>       
              <input type="submit" class="btn btn-success" value="S'inscrire" />
            </div>
        </form>
    </div>      
      <?php } else { ?>
        <div class="card border-secondary mb-3">
          <div class="card-header"><?= strtoupper($lastName) . ' ' . $firstName ?></div>
          <div class="card-body">
            <p class="card-text"><p>           
              <span class="font-weight-bold">Date de naissance :</span></span> <?= $birthDate ?><br />
              <span class="font-weight-bold">Ville :</span> <?= $password ?><br />
              <span class="font-weight-bold">Mot de passe :</span> <?= $password ?><br />
              <span class="font-weight-bold">Adresse :</span> <?= $address ?><br />
              <span class="font-weight-bold">Email :</span> <?= $mail ?><br />
              <span class="font-weight-bold">Numéro de téléphone :</span> <?= $phoneNumber ?><br />
            </p> 
          </div>
        </div>
      </div>
      <?php } ?>
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="assets/lib/jquery.mask.js"></script>
    <script src="assets/js/script.js"></script>
  </body>
</html>
