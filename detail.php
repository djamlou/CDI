<?php
$link = new PDO
(
    "mysql:host=localhost;dbname=blog;charset=utf8"
    ,
    'blog'
    ,
    'tactac'
);


?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>
        detail of Post
    </title>
</head>
<body>
<h1>
    detail of Post
</h1>
<?php  $query = 'SELECT title, contenu, date FROM post WHERE  id=:id';
$statement = $link->prepare($query);
$statement->bindValue(':id', $_GET['id'], PDO::PARAM_INT);
$statement->execute();

$row = $statement->fetch(PDO::FETCH_ASSOC);
?>
<h2><?=$row['title']; ?>  <?=$row['date']?></h2><br>

<?=$row['contenu']?><br>


<a href="index.php">Retour</a>
</body>
</html>
