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

function add_action($title, $content) {
    //appeler le model en lui passant title et content pour une insertion en base
    //deux cas :
        // cas 1.: ça c'est bien passé j'appel une vue message ok
        // cas 2 : ça c'est mal passé j'appel une vue error.
        // (update todo: je reaffiche e formulaire avec les erreurs)

    if ($_POST['title'] == '' || $_POST['content'] == '') {
        require 'templates/view/addForm.php';
    }else {
        $ajout = addPost($title, $content);
        echo 'ajouté';
        require 'templates/view/addForm.php';
    }
}

function printform_action(){
    //pas besoin du model
    //envoyer vers une vue qui dessine le formulaire
    require 'templates/view/addForm.php';

}

function editForm($id){
    //demander au modele de nous preparer les données dont on va avoir besoin
    // à savoir le post qui a l'id $id.
    $post = getPost($id);

    require 'templates/view/editForm.php';
}

function update_action($id, $title, $content){

        $modif = updatePost($id, $title, $content);
        $url = "/flatPHP/index.php/show?id=".$id;
        header("Location: ".$url);
}

function delete($id){

        $delete = deletePost($id);

}