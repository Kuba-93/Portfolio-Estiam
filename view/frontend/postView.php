<?php

$title = nl2br(htmlspecialchars($post->title()));
$description = 'Voir le projet';

ob_start();
?>

<!-- Visualisation du projet -->


<img class="img-fluid rounded mb-3 mb-md-0" src="public/upload/<?=nl2br(htmlspecialchars($post->image()))?>" alt="">
<br />
<h1 class="my-3"><?= nl2br(htmlspecialchars($title)) ?></h1>
<p> <i> <?=nl2br(htmlspecialchars($post->chapo()))?> </i> </p>
Publié le <span class="date"><?=nl2br(htmlspecialchars($post->creationDate()))?>
<?php
$creationDate = $post->creationDate();
$updateDate = $post->updateDate();

if ($creationDate !== $updateDate) {
    ?>
    </span>• Mise à jour le <span class="date"><?=nl2br(htmlspecialchars($post->updateDate())) ?></span>
    <?php
}
?>
 par <span class="username"> <?=nl2br(htmlspecialchars($post->username()))?></span></br>
<hr>

<!-- 
  
  Radio version of tabs.

  Requirements:
  - not rely on specific IDs for CSS (the CSS shouldn't need to know specific IDs)
  - flexible for any number of unkown tabs [2-6]
  - accessible

  Caveats:
  - since these are checkboxes the tabs not tab-able, need to use arrow keys

  Also worth reading:
  http://simplyaccessible.com/article/danger-aria-tabs/
-->

<div class="tabset">
  <!-- Tab 1 -->
  <input type="radio" name="tabset" id="tab1" aria-controls="Tab1" checked>
  <label for="tab1">Catégorie</label>
  <!-- Tab 2 -->
  <input type="radio" name="tabset" id="tab2" aria-controls="Tab2" checked>
  <label for="tab2">Membres du groupe</label>
  <!-- Tab 3 -->
  <input type="radio" name="tabset" id="tab3" aria-controls="Tab3">
  <label for="tab3">Objectif du projet</label>
  <!-- Tab 4 -->
  <input type="radio" name="tabset" id="tab4" aria-controls="Tab4">
  <label for="tab4">Niveau requis</label>
  <!-- Tab 5 -->
  <input type="radio" name="tabset" id="tab5" aria-controls="Tab5">
  <label for="tab5">Public concerné</label>
  <!-- Tab 6 -->
  <input type="radio" name="tabset" id="tab6" aria-controls="Tab6">
  <label for="tab6">Le projet</label>


  <div class="tab-panels">
    <section id="Tab1" class="tab-panel">
      <h1>Catégorie</h1>
      <p><?=nl2br(htmlspecialchars($post->categorie()))?></p>
  </section>

    <section id="Tab2" class="tab-panel">
      <h2>Membres du groupe</h2>
      <p><?=nl2br(htmlspecialchars($post->team()))?></p>
    </section>

    <section id="Tab3" class="tab-panel">
      <h2>Objectif du projet</h2>
      <p></p>
    </section>

    <section id="Tab4" class="tab-panel">
      <h2>Niveau requis</h2>
      <p><?=nl2br(htmlspecialchars($post->niveau()))?></p>
    </section>

    <section id="Tab5" class="tab-panel">
      <h2>Public concerné</h2>
      <p><?=nl2br(htmlspecialchars($post->public()))?></p>
    </section>

    <section id="Tab6" class="tab-panel">
      <h2>Le projet</h2>
      <p><?=nl2br(htmlspecialchars($post->content()))?></p>
    </section>
  </div>
  
</div>

<p><small>Source: <cite><a href="https://www.bjcp.org/stylecenter.php">BJCP Style Guidelines</a></cite></small></p>
<!-- Les boutons Modifier et Supprimer -->
<?php

if (isset($_SESSION['user'])) {
    if (strpos($_SESSION['user'] -> permAction(), 'editPost') !== false) {
        ?>
        <br />
        <a class="btn btn-primary"
           href='modifier-article-<?=nl2br(htmlspecialchars($post->idPost()))?>'><img src="public/img/edit.png"> Edit</a>

        <a class="btn btn-danger"
            
           href='supprimer-article-<?=nl2br(htmlspecialchars($post->idPost()))?>'
           onclick="return confirm('Etes-vous sûr ?');"><img src="public/img/delete.png"> Delete</a></br>
            
        <?php
    }
}
?>
<br />
<hr>
<br />
<!-- La zone d'ajout de commentaire -->
<?php
if (isset($_SESSION['user'])) {
    if (strpos($_SESSION['user'] -> permAction(), 'addComment') !== false) {
        ?>
        <div class="article">
            <form id = 'form_com' method = "post"
                  action = "ajouter-commentaire-<?=nl2br(htmlspecialchars($post->idPost()))?>">
                <div class="form-group">
                    <input type="text" class="form-control" name="content"
                           placeholder="Add a comment" required /> </td><br />
                    <button type="submit" class="btn btn-primary">Comment</button>
                </div>

            </form>
        </div>

        <?php
    }
}
?>

<h5>Commentaires</h5>

<?php
if (isset($comments)) {
    foreach ($comments as $oneComment) {
        ?>
    <div class="comment">
        <span class="username"> <?=nl2br(htmlspecialchars($oneComment->username()))?></span>
        <span class="date"> <?=nl2br(htmlspecialchars($oneComment->creationDate()))?></span>
        <p> <?=nl2br(htmlspecialchars($oneComment->content()))?> </p>

        <?php
        if (isset($_SESSION['user'])) {
            if (strpos($_SESSION['user'] -> permAction(), 'deleteComment') !== false) {
                ?>

                <p>
                    <a href='supprimer-commentaire-<?=nl2br(htmlspecialchars($oneComment->idComment()))?>'
                   onclick="return confirm('Etes-vous sûr ?');"><img src="public/img/delete2.png"></a>
                </p>

                <?php
            }
        }
        ?>
        </div>
        <?php
    }
}
?>

<center><a href="articles">Retour à la liste des projets</a></center>


<?php
$content = ob_get_clean();
include __DIR__ . "/../template.php";
?>
<link href="public/css/style.css" rel="stylesheet">

