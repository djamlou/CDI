<?php
$title = 'Modification d\'un article'
?>
<?php ob_start() ?>
<h1>
    Modification d'un post
</h1>
<form action="/flatPHP/index.php/edit" method="post">
    <input type="text" name="title" placeholder="Entrez un titre" value="<?=$post['title']?>" /><br>
    <textarea type="text" name="content" placeholder="Contenu"><?=$post['contenu']?></textarea><br>
    <input type="hidden" name="id" value="<?=$post['id']?>"/>
    <input type="submit" value="Modifier"/>
</form>
<a href="/flatPHP/index.php">Retour</a>
<?php $content = ob_get_clean() ?>
<?php include 'templates/view/layout.php' ?>

