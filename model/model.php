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

function addPost(){

    $link = BDDConnect();

    $query = 'INSERT INTO post(title, contenu, date)VALUES ("salut", "comment ça va ?","2018-02-07")';
    $statement = $link->prepare($query);
    $statement->execute();

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

function getPost($id){
    $link = BDDConnect();


        $query = 'SELECT * FROM post WHERE  id=:id';
        $statement = $link->prepare($query);
        $statement->bindValue(':id', $id, PDO::PARAM_INT);
        $statement->execute();

        $row = $statement->fetch(PDO::FETCH_ASSOC);
        return $row;

}

function deletePost($id){
    $link = BDDConnect();

    $query = 'DELETE FROM post WHERE id =:id';
    $statement = $link->prepare($query);
    $statement->bindValue(':id', $id, PDO::PARAM_INT);
    $statement->execute();
}
