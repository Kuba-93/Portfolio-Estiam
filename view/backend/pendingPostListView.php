<?php 

$title = 'Gestion des projets :';
$description = 'La liste des projets :';
ob_start();
?>

<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Nom</th>
                <th scope="col">Prénom</th>
                <th scope="col">Titre</th>
                <th scope="col">Description</th>
                <th scope="col">Date de création</th>
                <th scope="col">Mise à jour</th>
            </tr>
        </thead>
<tbody>

<?php
foreach ($post as $onePost) {
    ?>
    <tr>
    <th scope="row"><?=nl2br(htmlspecialchars($onePost->username()))?></th>
                <td><?=nl2br(htmlspecialchars($onePost->chapo()))?></td>
                <td><?=nl2br(htmlspecialchars($onePost->creationDate()))?></td>
            </tr>

            <?php
        }
        ?>

        </tbody>

    </table>
</div>
<?php

$content = ob_get_clean();

include __DIR__ . "/../template.php";

?>
}
?>