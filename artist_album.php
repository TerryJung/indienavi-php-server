<?php 
include './dbinit.php';
mysql_query("set names utf8", $connect); 

$name = $_GET['name'];

$return_array = array();
$name_id_result = mysql_query("SELECT _id FROM artist WHERE artist_name='$name'");
$name_id_fetch = mysql_fetch_assoc($name_id_result);
$name_id = $name_id_fetch['_id'];
mysql_free_result($name_id_result);

$result = mysql_query("SELECT * FROM album al INNER JOIN artist ar ON al.artist_id = ar._id WHERE ar._id = $name_id");

while($fetch=@mysql_fetch_array($result))
{
	// $row_array['artist_name'] = $fetch['artist_name'];
	$row_array['album_title'] = $fetch['album_title'];
	$row_array['title_song'] = $fetch['title_song'];
	$row_array['year'] = $fetch['year'];
	$row_array['album_cover_url'] = $fetch['album_cover_url'];
	array_push($return_array, $row_array);
}
$json = json_encode($return_array);
$res = '{"feed": {"artist_album": '.$json.'}}';
echo $res;
?>