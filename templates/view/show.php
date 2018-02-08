<?php
$title = $row['title']
?>
<?php ob_start() ?>
<h1>
detail of Post
</h1>

    <h2><?=$row['title']; ?> posté le : <?=$row['date']?></h2><br>

<?=$row['contenu']?><br>
    <a href="/flatPHP/index.php/delete?id=<?=$row['id']?>">Supprimer</a>  <a href="/flatPHP/index.php/edit?id=<?=$row['id']?>"> Modifier</a><br>
    <a href="/flatPHP/index.php">Retour</a>

<?php $content = ob_get_clean() ?>


<?php include 'templates/view/layout.php' ?>