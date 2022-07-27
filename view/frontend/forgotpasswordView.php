<?php

$title = 'Mot de passe oublié';

ob_start();
?>

<div class="formstyle">
    <div class="row">
        <div class="center">
            <h1 class="my-3"><?= $title ?></h1><br />

<!-- Formulaire de reinitialisation du mot de passe -->

            <form id = 'form_reset' method = "post" action = "redefinir-mot-de-passe">
                <div class="form-group">
                    <div class="user-box">
                      <input type="email"  name="email" required/>
                      <label>Email</label>
                    </div>
                    <div class="g-recaptcha" data-sitekey="6LeF904UAAAAABO6m7Sl-pxLDJMS-2E6v1qzSdUP"></div>
                    <br />
                    <button type="submit" class="btn btn-primary">Valider</button>
                    <br />
                    <br/>
                    <p><a class="btn btn-primary" href='inscription'>S'inscrire</a></p>
                </div>
            </form>
        </div>
    </div>
</div>

<?php 
$content = ob_get_clean();
include __DIR__ . "/../template.php";
?>
