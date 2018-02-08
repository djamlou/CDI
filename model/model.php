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

function addPost($title, $content, $date){

    $link = BDDConnect();

        $date = date('Y-m-d H:i:s');
        $query = 'INSERT INTO post(title, contenu, date)VALUES (":title", ":content", ":date" )';
        $statement = $link->prepare($query);
        $statement->bindParam(':title', $title, PDO::PARAM_STR);
        $statement->bindParam(':content', $content, PDO::PARAM_STR);
        $statement->bindParam(':date', $date);

        $statement->execute();

    closeConnexion($link);
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
        closeConnexion($link);
        return $row;

}

function updatePost($id, $title, $content){
    $link = BDDConnect();

        $query = 'UPDATE post SET (title =":title ", contenu =":content") WHERE  id=:id';
        $statement = $link->prepare($query);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->bindParam(':title', $title, PDO::PARAM_STR);
        $statement->bindParam(':content', $content, PDO::PARAM_STR);
        $statement->execute();

    closeConnexion($link);
}

function deletePost($id){
    $link = BDDConnect();

    $query = 'DELETE FROM post WHERE id =:id';
    $statement = $link->prepare($query);
    $statement->bindValue(':id', $id, PDO::PARAM_INT);
    $statement->execute();

    closeConnexion($link);
}
