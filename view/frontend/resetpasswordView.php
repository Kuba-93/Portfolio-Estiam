<?php

$title = 'Réinitialiser votre mot de passe';

ob_start();
?>

<div class="formstyle">
    <div class="row">
        <div class="center">
            <h1 class="my-3"> <?= $title ?> </h1>

<!-- Formulaire de redefinition du mot de passe -->

            <form id = 'form_pass-change' method = "post" action = "valider-mot-de-passe">
                <div class="form-group">
                    <div class="user-box">
                      <input type="password"  name="password" required/>
                      <label>Nouveau mot de passe</label>
                    </div>
                    <div class="user-box">
                      <input type="password"  name="passwordbis" required/>
                      <label>Comfirmez nouveau mot de passe</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Valider</button>
                </div>
                <input type="hidden" id="email" name="email" value="<?php echo nl2br(htmlspecialchars($_GET['email']))?>" />
            </form>
        </div>
    </div>
</div>


<?php
$content = ob_get_clean();
include __DIR__ . "/../template.php";
?>
