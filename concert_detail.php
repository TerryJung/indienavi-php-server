<?php
include './dbinit.php';
mysql_query("set names utf8", $connect);
$concert = $_GET['concert'];

$query = "SELECT concert_name, place, concert_date, concert_text, link, concert_img_url FROM concert WHERE concert_name='$concert'";

$return_array = array();
$result = mysql_query($query, $connect);

$row = mysql_fetch_assoc($result);

$row_array['concert_name'] = $row['concert_name'];
$row_array['concert_text'] = $row['concert_text'];
$row_array['place'] = $row['place'];
$row_array['concert_date'] = $row['concert_date'];
$row_array['link'] = $row['link'];
$row_array['concert_img_url'] = $row['concert_img_url'];
array_push($return_array, $row_array);

$json = json_encode($return_array);
$res = $json;
echo $res;

//echo $json;
//echo json_encode($return_array);

mysql_free_result($result);

mysql_close($connect);
?>