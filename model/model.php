<?php
function BDDConnect() {
    $link = new PDO
    (
        "mysql:host=localhost;dbname=blog;charset=utf8"
        ,
        'blog'
        ,
        'tactac'
    );
    return $link;
}

function closeConnexion(&$link){
    $link = null;
}

function getPosts(){
    $link = BDDConnect();
    $result = $link->query('SELECT id, title FROM post');
    $posts = array();
    while ($row = $result->fetch(PDO::FETCH_ASSOC)){
        $posts[] = $row;
    }
    closeConnexion($link);
    return $posts;
}

function getPost(){
    $link = BDDConnect();


        $query = 'SELECT title, contenu, date FROM post WHERE  id=:id';
        $statement = $link->prepare($query);
        $statement->bindValue(':id', $_GET['id'], PDO::PARAM_INT);
        $statement->execute();

        $row = $statement->fetch(PDO::FETCH_ASSOC);
        return $row;

}