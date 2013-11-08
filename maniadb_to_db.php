<?php
include './dbinit.php';
mysql_query("set names utf-8", $connect);

$artist_name = $_GET[''];
$genre = $_GET[''];
$label; = $_GET[''];
$artist_text = $_GET[''];
$debut_year = $_GET[''];
$artist_img_url = $_GET[''];

mysql_query("insert into artist (artist_name, genre, label, artist_text, debut_year, aritst_img_url) values ($artist_name, $genre, $label, $artist_text, $debut_year, $aritst_img_url);");


mysql_close($connect);

?>