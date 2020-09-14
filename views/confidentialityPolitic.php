<?php
    include 'header.php';
?>
<div class="container mt-5 mb-5">
    <?php if (count($_POST) == 0 || count($formErrors) > 0) { ?>
      <form action="index.php" method="POST">
        <h1>Politique de confidentialité</h1>
          <hr />
            <div class="form-group row">
                <div class="col-lg-6 col-md-6 col-12 offset-3 py-4">
                    <input class="form-check-input" type="radio" name="levelRadios" id="levelRadios1" value="option1" checked>
                        <label class="form-check-label" for="levelRadios1">Politique de protection des données personnelles</label>
                        <p>MeetInShape recueille, utilise, protège et partage les données personnelles de ses utilisateurs.</p>
                    <?php } ?>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-lg-6 col-md-6 offset-3 py-4">
                    <input class="form-check-input" type="radio" name="levelRadios" id="levelRadios2" value="option2">
                        <label class="form-check-label" for="levelRadios2">Publicités personnalisées</label>
                        <p>Vous continuerez à reçevoir des publicitées basées sur votre activité sur MeetInShape.
                        <br>Lorsque ce paramètre est activé, MeetSport peut personnaliser les publicités diffusées sur l’application</p>
                </div>
            </div>
            <div class="form-group row offset-8">
                <a href="NextButton">Suivant</a>
            </div>
      </form>
</div>