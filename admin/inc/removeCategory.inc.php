<?php 
include_once '../../classes/Category.php';

$category = new Category();

$idToDelete = $_POST['id'];

$category->deleteCategoryById($idToDelete);
