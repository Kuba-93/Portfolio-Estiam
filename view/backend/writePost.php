<?php

$title = 'Publier votre projet';
$description = 'Presenter son projet';

ob_start();

?>
<div class="formstyle">
    <div class="row">
        <div class="center">
            <h1 class="hr">Publié votre projet</h1>

<!-- Formulaire de publication de projet -->

            <form action="ecrire-article" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <br />
                    <br />
                    <div class="user-box">
                      <input type="text"  name="title" required/>
                      <label>Titre</label>
                    </div>
                    <div class="user-box">
                      <input type="text"  name="chapo" required/>
                      <label>Description</label>
                     </div>
                    <labelfor="my_file">Image : Fichier (format jpeg | max. 1 Mo)</labelfor>
                    <input type="file" name="my_file" id="my_file"/><br />




                    <br />
                    <div class="user-box">
                      <input type="text"  name="categorie" required/>
                      <label>Catégorie</label>
                    </div>
                    <br />
                    <br />

                    <div class="user-box">
                      <input type="text"  name="team" required/>
                      <label>Membres du groupe</label>
                    </div>
                    
                    <div class="user-box">
                      <input type="text"  name="niveau" required/>
                      <label>Niveau requis</label>
                    </div>
                    <div class="user-box">
                      <input type="text"  name="public" required/>
                      <label>Public concerné</label>
                    </div>
                    <div class="user-box">
                      <input type="text"  name="tags" required/>
                      <label>Tags</label>
                    </div>
                    <label><h5>Projet</h5></label>
                    <textarea type="text" class="form-control" name="content" placeholder="Entrez le contenu" rows="5" cols="30" required></textarea>
                    <br />
                    
                    <button type="submit" class="btn btn-primary" name="addPost" id="i_submit">Valider</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script type="text/javascript" script src="public/vendor/jquery/jquery.min.js"></script>
<script type="text/javascript">

$('#my_file').change( function() {


    //check whether browser fully supports all File API
    if (window.File && window.FileReader && window.FileList && window.Blob) {

        var fileExtension = ['jpeg', 'jpg'];

        //get the file size and file type from file input field
        var fsize = $('#my_file')[0].files[0].size;


        if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {

            alert("Mauvais format ! Seul le JPEG est accepté !");
            $("#i_submit").attr('disabled','disabled');
        }


        if(fsize>1048576) {

            alert(fsize +" octets\nFichier trop volumineux !");
            $("#i_submit").attr('disabled','disabled');
        }

        if($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) > -1  && fsize<1048576 ) {

            $("#i_submit").removeAttr('disabled');
        }
    }
});

</script>



<style>
    .hr {
    /* centre verticalement les enfants entre eux */
    align-items: center;

    /* active flexbox */
    display: flex;

    /* garde le texte centré s’il passe sur plusieurs lignes ou si flexbox n’est pas supporté */
    text-align: center;
}

.hr::before,
.hr::after {
    /* remplir le fond du trait permet également d’utiliser des images ou dégradés ! */
    background: currentColor;

    /* nécessaire pour afficher les pseudo-éléments */
    content: "";

    /* partage le reste de la largeur disponible */
    flex: 1;

    /* l’unité « em » garantit un ratio constant avec la taille du texte */
    height: .025em;

    /* espace les traits du texte */
    margin: 0 .5em;
}
</style>



<?php 
$content = ob_get_clean();
include __DIR__ . "/../template.php";
?>
