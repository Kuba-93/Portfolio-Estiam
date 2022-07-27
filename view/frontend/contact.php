<?php

$title = 'Contact';

ob_start();
?>

<div class="formstyle">
    <div class="row">
        <div class="center">
            <h1 class="my-3"><?= nl2br(htmlspecialchars($title)) ?></h1>

<!-- Formulaire de contact -->

            <form id = 'form_ins' method = "post" action = "contacter">
                <div class="form-group">
                    <div class="user-box">
                      <input type="text"  name="lastname" required/>
                      <label>Nom</label>
                    </div>
                    <div class="user-box">
                      <input type="text"  name="firstname" required/>
                      <label>Prénom</label>
                    </div>
                    <div class="user-box">
                      <input type="email"  name="email" required/>
                      <label>Email</label>
                    </div>
                    <div class="user-box">
                      <input type="text"  name="message" id="message" required/>
                      <label>Laissez votre message</label>
                    </div>
                    <div class="g-recaptcha" data-sitekey="6LeF904UAAAAABO6m7Sl-pxLDJMS-2E6v1qzSdUP"></div>
                    <br />
                    <button type="submit" class="btn btn-primary">Envoyer</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php 
$content = ob_get_clean();
include __DIR__ . "/../template.php";
?>