<?php 
include_once '../../classes/Article.php';

$article = new Article();

$idToDelete = $_POST['id'];

$article -> deleteArticleById($idToDelete);
