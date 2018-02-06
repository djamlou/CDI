<!DOCTYPE html>
<html>
<head>
    <title>
        MyBlog : List of Posts
    </title>
</head>
<body>
<h1>
    List of Posts
</h1>
<ul>
        <?php foreach ($posts as $post):?>

        <li>
            <a href="detailController.php?id=<?= $post['id'] ?>">
                <?= $post['title'] ?>
            </a>
        </li>
        <?php endforeach;?>
</ul>
</body>
</html>