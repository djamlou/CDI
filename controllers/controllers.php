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
            header('Location: HTTP/1.1 404 not found');
           // echo '<h2 style="color:red">Cet article n\'existe pas</h2>';
            die();
        }
        require 'templates/view/show.php';
    }else{
        header('Location: HTTP/1.1 404 not found');
    }
}

function addPostForm($title, $content, $date){
    if(empty($_POST)) {
        require 'templates/view/addForm.php';
    }else if ($_POST['title'] == '' || $_POST['content'] == '') {

        require 'templates/view/addForm.php';
    } else {

        $ajout = addPost($title, $content, $date);
        header('Location: /flatPHP/index.php');


    }
}

function update($id, $title, $content){

        $modif = updatePost($id, $title, $content);
        require 'templates/view/editForm.php';

}

function delete($id){

        $delete = deletePost($id);

}