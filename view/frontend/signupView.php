<?php

$title = 'Inscription';
$description = 'Page d\'inscription';

ob_start();
?>

<div class="formstyle">
    <div class="row">
        <div class="center">
            <h1 class="my-3"><?= nl2br(htmlspecialchars($title)) ?></h1>

<!-- Formulaire d'inscription -->

            <form id = 'form_ins' method = "post" action = "s-inscrire">
                <div class="form-group">
                     <div class="user-box">
                      <input type=""  name="email" required/>
                      <label>Email</label>
                     </div>
                     <div class="user-box">
                      <input type="text" name="username" required/>
                      <label>Pseudo</label>
                     </div>
                     <div class="user-box">
                      <input type="text" name="lastname" required/>
                      <label>Nom</label>
                     </div>
                     <div class="user-box">
                      <input type="text" name="firstname" required/>
                      <label>Prénom</label>
                     </div>
                     <div class="user-box">
                      <input type="password" name="password" required/>
                      <label>Mot de passe</label>
                     </div>
                     <div class="user-box">
                      <input type="password" name="passwordbis" required/>
                      <label>Confirmer mot de passe</label>
                     </div>
                     <div class="g-recaptcha" data-sitekey="6LeF904UAAAAABO6m7Sl-pxLDJMS-2E6v1qzSdUP"></div>
                     <br />
                     <button type="submit" class="btn btn-primary">S'inscrire</button>
                </div>
            </form>
        </div>
    </div>
</div>


<?php
$content = ob_get_clean();
include __DIR__ . "/../template.php";
?>
