<?php 
session_start();
include_once('connexionbdd.php');
$id = $_POST['id'];

echo $id;