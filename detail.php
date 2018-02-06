<?php
$link = new PDO
(
    "mysql:host=localhost;dbname=blog;charset=utf8"
    ,
    'blog'
    ,
    'tactac'
);
if(!is_numeric($_GET['id']))

{

    echo '<h2 style="color:red">Cet article n\'existe pas</h2>';
    die();


}
  $query = 'SELECT title, contenu, date FROM post WHERE  id=:id';
$statement = $link->prepare($query);
$statement->bindValue(':id', $_GET['id'], PDO::PARAM_INT);
$statement->execute();

$row = $statement->fetch(PDO::FETCH_ASSOC);

require 'templates/show.php';
?>
