<?php
require_once ('model/model.php');
require_once 'controllers/controllers.php';
require 'vendor/autoload.php';
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if ('/flatPHP/index.php' === $uri)
{
    list_action();
}elseif ('/flatPHP/index.php/add' === $uri ) {
    //est ce qu'il y'a des parametre post ?
    if(isset($_POST['title']) && isset($_POST['content'])) {
        //si oui on est dans le cas d'une soumission de form on tente l'ajout
        add_action($_POST['title'], $_POST['content']);
    }else {
        //si pas de paramètre alors on affiche le formulaire.
        printform_action();
    }
}elseif ('/flatPHP/index.php/edit' === $uri) {

    if (isset($_POST['title']) && isset($_POST['content'])) {

        //Premier cas on demande le formulaire de modification
            //appeler le controller qui affiche le formulaire pour l'entité id
        //Deuxième cas: on est en train de faire une soumission (vérifier si variable post sont set)
            //on traite le formulaire et on renvoi message ok ou pas ok
        update_action($_POST['id'], $_POST['title'], $_POST['content']);

    }else {
        editForm($_GET['id']);
    }
}
elseif ('/flatPHP/index.php/delete' === $uri && isset($_GET['id'])) {
    delete($_GET['id']);
}
elseif ('/flatPHP/index.php/show' === $uri && isset($_GET['id']))
{
    show_action($_GET['id']);
}
else
{
    header('HTTP/1.1 404 Not Found');

}