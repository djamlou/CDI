<?php
$title = 'List of posts'
?>
<?php ob_start() ?>
<a href="/flatPHP/index.php/add"> Ajouter un post</a>

<h1>
    List of Posts
</h1>
<ul>
        <?php foreach ($posts as $post):?>

        <li>
            <a href="index.php/show?id=<?= $post['id'] ?>">
                <?= $post['title'] ?>
            </a>
        </li>
        <?php endforeach;?>
</ul>
<?php $content = ob_get_clean() ?>
<?php include 'templates/view/layout.php' ?>



