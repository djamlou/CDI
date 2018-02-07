<?php
$title = $row['title']
?>
<?php ob_start() ?>
<h1>
detail of Post
</h1>

    <h2><?=$row['title']; ?> posté le : <?=$row['date']?></h2><br>

<?=$row['contenu']?><br>

<?php $content = ob_get_clean() ?>

<?php include 'layout.php' ?>

<a href="indexController.php">Retour</a>
