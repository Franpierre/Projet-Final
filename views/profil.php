<?php
include 'header.php';
include '../controllers/regex.php';
include '../controllers/profilController.php';
?>
<div class="container mt-5 mb-5">  
    <?php if (count($_POST) == 0 || count($formErrors) > 0) { ?>
      <form action="index.php" method="POST">
          <h1>Profil</h1>
          <hr />
          <div class="form-group row">  
            <a href="profilPicture.php">Ajouter une photo de profil</a>
          <div class="form-group row">  
            <a href="descriptionAjout.php">Ajouter une description</a>
          <div class="form-group row">       
            <div class="col-md-4 offset-md-4 col-sm-12 justify-content-center">
                <label for="birthDate">Date de naissance</label>
                <input type="date" required name="birthDate" value="<?= isset($_POST['birthDate']) ? $_POST['birthDate'] : '' ?>" class="form-control <?= isset($formErrors['birthDate']) ? 'is-invalid' : (isset($birthDate) ? 'is-valid' : '') ?>" id="birthDate" />
                <?php if (isset($formErrors['birthDate'])) { ?>
                  <div class="invalid-feedback"><?= $formErrors['birthDate'] ?></div>
                <?php } ?>
            </div>
          <div class="form-group row">  
              <div class="col-md-4 offset-md-4 col-sm-12 justify-content-center">
                <label for="city">Ville</label>
                <input type="text" required name="city"  value="<?= isset($_POST['city']) ? $_POST['city'] : '' ?>"class="form-control <?= isset($formErrors['city']) ? 'is-invalid' : (isset($city) ? 'is-valid' : '') ?>" id="city" placeholder="Reims" />
                <?php if (isset($formErrors['city'])) { ?>
                  <div class="invalid-feedback"><?= $formErrors['city'] ?></div>
                <?php } ?>
              </div>
          </div>
          <div class="form-group row">
            <div class="col-md-4 offset-md-4 col-sm-12 justify-content-center">
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
          <div class="form-group row">
            <div class="col-md-4 offset-md-4 col-sm-12 justify-content-center">          
                <p>Niveau du sport pratiqué</p> 
              <div class="custom-control custom-radio">
                <input type="radio" id="levelBeginner" name="levelSport" value="1" <?= isset($_POST['levelSport']) && $_POST['levelSport'] == 1 ? 'checked' : '' ?> class="custom-control-input <?= isset($formErrors['levelSport']) ? 'is-invalid' : (isset($levelSport) ? 'is-valid' : '') ?>">
                <label class="custom-control-label" for="levelBeginner">Débutant</label>
              </div>
              <div class="custom-control custom-radio">
                <input type="radio" id="levelIntermediate" name="levelSport" value="2" <?= isset($_POST['levelSport']) && $_POST['levelSport'] == 'non' ? 'checked' : '' ?> class="custom-control-input <?= isset($formErrors['levelSport']) ? 'is-invalid' : (isset($levelSport) ? 'is-valid' : '') ?>">
                <label class="custom-control-label" for="levelIntermediate">Intermédiaire</label>
              </div>
              <div class="custom-control custom-radio">
                <input type="radio" id="levelAvanced" name="levelSport" value="3" <?= isset($_POST['levelSport']) && $_POST['levelSport'] == 'oui' ? 'checked' : '' ?> class="custom-control-input <?= isset($formErrors['levelSport']) ? 'is-invalid' : (isset($levelSport) ? 'is-valid' : '') ?>">
                <label class="custom-control-label" for="levelAvanced">Avancé</label>
              </div>
              <div class="custom-control custom-radio">
                <input type="radio" id="levelExcellent" name="levelSport" value="4" <?= isset($_POST['levelSport']) && $_POST['levelSport'] == 'non' ? 'checked' : '' ?> class="custom-control-input <?= isset($formErrors['levelSport']) ? 'is-invalid' : (isset($levelSport) ? 'is-valid' : '') ?>">
                <label class="custom-control-label" for="levelExcellent">Excellent</label>
              </div>
              <?php if (isset($formErrors['levelSport'])) { ?>
              <div class="invalid-feedback d-block"><?= $formErrors['levelSport'] ?></div>
              <?php } ?>
            </div>
            <div class="form-group row">  
            <div class="col-md-4 offset-md-4 col-sm-12 justify-content-center">
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
            <div class="form-group row">                             
            <a>Filtre</a>
            <div class="form-group row">                             
            <a>Supprimer mon compte</a>
      </form>
    <?php } ?>
<?php
include 'footer.php'
?>