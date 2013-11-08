<?php 
include './dbinit.php';
mysql_query("set names utf8", $connect); 

$name = $_GET['name'];

$return_array = array();
$name_id_result = mysql_query("SELECT _id FROM member WHERE name='$name'");
$name_id_fetch = mysql_fetch_assoc($name_id_result);
$name_id = $name_id_fetch['_id'];
mysql_free_result($name_id_result);

$result = mysql_query("SELECT * FROM artist a INNER JOIN member_favorite f ON a._id = f.artist_id WHERE f.member_id =$name_id");

while($fetch=@mysql_fetch_array($result))
{
	$row_array['artist_id'] = $fetch['artist_id'];
	$row_array['artist_name'] = $fetch['artist_name'];
	$row_array['genre'] = $fetch['genre'];
	$row_array['label'] = $fetch['label'];
	$row_array['artist_text'] = $fetch['artist_text'];
	$row_array['debut_year'] = $fetch['debut_year'];
	$row_array['like_count'] = $fetch['like_count'];
	$row_array['artist_img_url'] = $fetch['artist_img_url'];
	array_push($return_array, $row_array);
}
$json = json_encode($return_array);
$res = '{"feed": {"favorite_artist": '.$json.'}}';
print_r($res);
?>