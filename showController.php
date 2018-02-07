<?php
require_once ('model/model.php');
if(!is_numeric($_GET['id']))

{
    header('Location: HTTP/1.1 404 not found');

    die();

}
if(isset($_GET['id'])) {
$row = getPost();
    if(!$row){
        echo '<h2 class="error">Cet article n\'existe pas</h2>';
        die();
    }

}else{
    header('Location: HTTP/1.1 404 not found');
}

require 'templates/view/show.php';
?>
