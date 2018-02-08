<?php
require_once ('model/model.php');
require_once 'controllers/controllers.php';

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if ('/flatPHP/index.php' === $uri)
{
    list_action();
}elseif ('/flatPHP/index.php/add' === $uri) {
    addPostForm();
}elseif ('/flatPHP/index.php/edit' === $uri) {
    update();
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