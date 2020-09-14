<?php
include 'header.php';
include '../controllers/regex.php';
include '../controllers/connexionController.php';
?>
<div class="container mt-5 mb-5 ">
    <?php if (count($_POST) == 0 || count($formErrors) > 0) { ?>
        <form action="index.php" method="POST">
            <h1>Se connecter</h1>
            <hr />
            <div class="form-group row">
                <div class="col-md-4 offset-md-4 col-sm-12 justify-content-center">
                    <label for="mail">Adresse mail</label>
                    <input type="email" required name="mail" value="<?= isset($_POST['mail']) ? $_POST['mail'] : '' ?>" class="form-control <?= isset($formErrors['mail']) ? 'is-invalid' : (isset($mail) ? 'is-valid' : '') ?>" id="mail" placeholder="adresse@mail.com" />
                    <?php if (isset($formErrors['mail'])) { ?>
                    <div class="invalid-feedback"><?= $formErrors['mail'] ?>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-4 offset-md-4 col-sm-12 justify-content-center">
                    <label for="password">Mot de Passe</label>
                    <input type="text" required name="password"  value="<?= isset($_POST['password']) ? $_POST['password'] : '' ?>"class="form-control <?= isset($formErrors['password']) ? 'is-invalid' : (isset($password) ? 'is-valid' : '') ?>" id="password" placeholder="*********" />
                    <?php if (isset($formErrors['password'])) { ?>
                        <div class="invalid-feedback"><?= $formErrors['password'] ?></div>
                    <?php } ?>
                </div>
            </div>  
              <div class="col-md-4 offset-md-4 col-sm-12 justify-content-center">       
                <input type="submit" class="btn btn-success" value="Se connecter" />
              </div> 
        </form>
    <?php } ?>    
</div>              
<?php
include 'footer.php';
?>