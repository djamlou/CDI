<?php
require_once ('model/model.php');
if(!is_numeric($_GET['id']))

{
    header('Location: HTTP/1.1 404 not found');
    //echo '<h2 style="color:red">Cet article n\'existe pas</h2>';
    die();

}
if(isset($_GET['id'])) {
$row = getPost();
    if(!$row){
        header('Location: HTTP/1.1 404 not found');
        die();
    }

}else{
    header('Location: HTTP/1.1 404 not found');
}

require 'templates/show.php';
?>
