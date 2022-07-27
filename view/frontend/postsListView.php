<?php

$title = 'Les derniers projets :';
$description = 'Liste des derniers projets publiés :';

ob_start();

?>
<h1 class="hr">Les derniers projets</h1><br />
<?php
foreach ($posts as $onePost) {
    if (strlen($onePost->content()) <= 300) {
        $content = $onePost->content();
    } else {
        $start = substr($onePost->content(), 0, 300);
        $start = substr($start, 0, strrpos($start, ' ')) . '...';

        $content = $start;
    }
    ?>



<div class="container93">
  <div class="card93">
    <div class="card-header93">
    <img class="img-fluid rounded mb-3 mb-md-0 img-vignette" src="public/upload/<?=nl2br(htmlspecialchars($onePost->image()))?>" alt="Image illustrant le projet">
    </div>
    <div class="card-body93">
      <span class="tag93 tag-teal93">Technology</span><br>
      <h3> <?=nl2br(htmlspecialchars($onePost->title()))?> </h3>
        <p> <i> <?=nl2br(htmlspecialchars($onePost->chapo()))?> </i> </p>
        <p class="post-content"> <?=$content?> </p>
      <div class="user93">
        <img src="https://yt3.ggpht.com/a/AGF-l7-0J1G0Ue0mcZMw-99kMeVuBmRxiPjyvIYONg=s900-c-k-c0xffffffff-no-rj-mo" alt="user93" />
        <div class="user-info93">
        
        <span class="username"><?=nl2br(htmlspecialchars($onePost->username()))?></span><br>

        <a class="btn btn-primary" href='article-<?=nl2br(htmlspecialchars($onePost->idPost()))?>'>Voir</a>
        </div>
      </div>
    </div>
  </div>


  


<style>

@import url("https://fonts.googleapis.com/css2?family=Roboto&display=swap");
* {
  box-sizing: border-box;
}

.container93 {
  list-style: none;
  padding: 0;
  margin: 0;
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(30ch, 1fr));
  grid-gap: 1.5rem;
  max-width: 100vw;
  width: 120ch;
  padding-left: 1rem;
  padding-right: 1rem;
}
.card93 {
  position: relative;
  display: block;
  margin: 1px;
  background-color: #fff;
  border-radius: 10px;
  box-shadow: 0 2px 20px rgba(0, 0, 0, 0.2);
  overflow: hidden;
  width: 350px;
}
.card-header93 img {
  width: 100%;
  height: 200px;
  object-fit: cover;
}
.card-body93 {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: flex-start;
  padding: 20px;
  min-height: 250px;
}

.tag93 {
  background: #cccccc;
  border-radius: 50px;
  font-size: 12px;
  margin: 0;
  color: #fff;
  padding: 2px 10px;
  text-transform: uppercase;
  cursor: pointer;
}
.tag-teal93 {
  background-color: #47bcd4;
}
.tag-purple {
  background-color: #5e76bf;
}
.tag-pink {
  background-color: #cd5b9f;
}

.card-body93 p {
  font-size: 13px;
  margin: 0 0 40px;
}
.user93 {
  display: flex;
  margin-top: auto;
}

.user93 img {
  border-radius: 50%;
  width: 40px;
  height: 40px;
  margin-right: 10px;
}
.user-info93 h5 {
  margin: 0;
}
.user-info93 small {
  color: #545d7a;
}

</style>

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
}

$content = ob_get_clean();

include __DIR__ . "/../template.php";
?>