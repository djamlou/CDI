<?php
$link = new PDO
    (
        "mysql:host=localhost;dbname=blog"
        ,
        'blog'
        ,
        'tactac'
    );
$result = $link->query('SELECT id, title FROM post');
$posts = array();
while ($row = $result->fetch(PDO::FETCH_ASSOC)){
    $posts[] = $row;
}
$link = null;
require ('templates/list.php');
?>
