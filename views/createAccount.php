<?php
include 'header.php';
include '../models/modelCities.php';
include '../models/modelUsers.php';
include '../controllers/regex.php';
include '../controllers/createAccountController.php';
?>
  <div class="container mt-5 mb-5">
    <?php if (count($_POST) == 0 || count($formErrors) > 0) { ?>
      <form action="createAccount.php" method="POST">
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
                <label for="cities">Choisir une ville</label>
                <select class="form-control" id="cities" name="cities">
                <option disabled selected>Choisir une ville</option>
                <?php
                  foreach($citiesList as $cities){
                  ?> <option value="<?= $cities->name ?>"><?= $cities->name ?></option><?php
                  }
                  ?>
                </select>
              <?php if (isset($formErrors['city'])) { ?>
                <div class="invalid-feedback"><?= $formErrors['city'] ?></div>
              <?php } ?>
            </div>
          </div>
          <div class="form-group row">       
            <div class="col-lg-6 col-md-6 col-12">
              <label for="exampleFormControlSelect1">Choisi ton sport</label>
                <select class="form-control" id="exampleFormControlSelect1">
                  <option>Judo</option>
                  <option>Natation</option>
                  <option>Karaté</option>
                  <option>Télé</option>
                  <option>Musculation</option>
              </select>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
              <label for="exampleFormControlSelect1">Niveau du sport pratiqué</label>
                <select class="form-control" id="exampleFormControlSelect1">
                  <option>Débutant</option>
                  <option>Intermédiaire</option>
                  <option>Avancé</option>
                  <option>Excellent</option>
                </select>
            </div>
          </div>
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
                <div class="invalid-feedback d-block"><?= $formErrors['gender'] ?>
                </div>
              <?php } ?>
            </div>                               
        </fieldset>
              <div class="col-lg-4 offset-10">       
                <input type="submit" class="btn btn-success" name="submitForm" value="S'inscrire" />
              </div>
          </div>
      </form>
  </div>      
    <?php } else { ?>
      <div class="card border-secondary mb-3">
        <div class="card-header"><?= strtoupper($lastName) . ' ' . $firstName ?></div>
        <div class="card-body">
          <p class="card-text">          
            <span class="font-weight-bold">Date de naissance :</span></span> <?= $birthDate ?><br />
            <span class="font-weight-bold">Ville :</span> <?= $password ?><br />
            <span class="font-weight-bold">Mot de passe :</span> <?= $password ?><br />
            <span class="font-weight-bold">Adresse :</span> <?= $address ?><br />
            <span class="font-weight-bold">Email :</span> <?= $mail ?><br />
            <span class="font-weight-bold">Numéro de téléphone :</span> <?= $phoneNumber ?><br />
          </p> 
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
