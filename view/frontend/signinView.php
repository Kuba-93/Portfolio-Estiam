<?php

$title = 'Connexion';
$description = 'Page de connexion';

ob_start();
?>

<div class="formstyle">
    <div class="row">
        <div class="center">
            <h1 class="my-3"><?= nl2br(htmlspecialchars($title)) ?></h1><br />

<!-- Formulaire de connexion -->

            <form id = 'form_ins' method = "post" action = "connecter">
                <div class="form-group">
                  <div class="user-box">
                      <input type="email"  name="email" required/>
                      <label>Email</label>
                  </div>
                  <div class="user-box">
                      <input type="password"  name="password" required/>
                      <label>Mot de passe</label>
                  </div>
                  <p> <a href='mot-de-passe-oublie'>Mot de passe oublié</a> </p>
                    <!--
                    <label for="remeber_me">Connexion automatique</label>
                    <input type="checkbox" id="remember_me" name="connexion_auto" value="souvenir">
                    -->
                  <div class="g-recaptcha" data-sitekey="6LeF904UAAAAABO6m7Sl-pxLDJMS-2E6v1qzSdUP"></div><br />
                  <button type="submit" class="btn btn-primary">Connexion</button>
                  <br />
                  <br />
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
