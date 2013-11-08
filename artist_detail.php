<?php
include './dbinit.php';
mysql_query("set names utf8", $connect);
$artist = $_GET['artist'];

$query = "SELECT _id, artist_name, label, artist_text,  like_count, artist_img_url FROM artist WHERE artist_name='$artist'";

$return_array = array();
$result = mysql_query($query, $connect);

$row = mysql_fetch_assoc($result);
$row_array['_id'] = $row['_id'];
$row_array['artist_name'] = $row['artist_name'];
$row_array['label'] = $row['label'];
$row_array['artist_text'] = $row['artist_text'];
$row_array['like_count'] = $row['like_count'];
$row_array['artist_img_url'] = $row['artist_img_url'];
array_push($return_array, $row_array);

$json = json_encode($return_array);
$res = $json;
echo $res;

//echo $json;
//echo json_encode($return_array);

mysql_free_result($result);

mysql_close($connect);
?>