<?php
function list_action()
{
    $posts = getPosts();
    require 'templates/view/list.php';
}
function show_action()
{

    if(!is_numeric($_GET['id']))

    {
        header('Location: HTTP/1.1 404 not found');

        die();

    }
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $row = getPost($id);

        if(!$row){

            echo '<h2 style="color:red">Cet article n\'existe pas</h2>';
            die();
        }
        require 'templates/view/show.php';
    }else{
        header('Location: HTTP/1.1 404 not found');
    }
}

function addPostForm(){
    $ajout = addPost();
    require 'templates/view/addForm.php';
}

function delete($id){

        $delete = deletePost($id);
        echo 'L\'article a bien été supprimé';

}