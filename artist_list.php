<?php
include './dbinit.php';
mysql_query("set names utf8", $connect);
$start = $_GET['start'];
$alt = $_GET['alt'];

$query = "SELECT _id, artist_name, genre, label, artist_text, debut_year, like_count, artist_img_url FROM artist  ORDER BY like_count DESC LIMIT $start, $alt";
$return_array = array();
$result = mysql_query($query, $connect);

while ($row = mysql_fetch_array($result, MYSQL_ASSOC))
{
  $row_array['_id'] = $row['_id'];
  $row_array['artist_name'] = $row['artist_name'];
  $row_array['genre'] = $row['genre'];
  $row_array['label'] = $row['label'];
  $row_array['artist_text'] = $row['artist_text'];
  $row_array['debut_year'] = $row['debut_year'];
  $row_array['like_count'] = $row['like_count'];
  $row_array['artist_img_url'] = $row['artist_img_url'];
  array_push($return_array, $row_array);
}
$json = json_encode($return_array);
$res = '{"feed": {"artist": '.$json.'}}';
echo $res;

//echo $json;
//echo json_encode($return_array);

mysql_free_result($result);

mysql_close($connect);
?>