<?php 
include_once '../../classes/Slider.php';

$slider = new Slider();

$idToDelete = $_POST['id'];

$slider -> deleteSliderById($idToDelete);
