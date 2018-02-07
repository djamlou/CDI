<?php
require_once ('model/model.php');
$posts = getPosts();

require('templates/view/list.php');
?>
