<?php 
include './dbinit.php';
mysql_query("set names utf8", $connect); 
$name = $_GET['name'];

$return_array = array();
$name_id_result = mysql_query("SELECT _id FROM artist WHERE artist_name='$name'");
$name_id_fetch = mysql_fetch_assoc($name_id_result);
$name_id = $name_id_fetch['_id'];
mysql_free_result($name_id_result);

$result = mysql_query("SELECT * FROM concert_artist ca INNER JOIN concert co ON ca.artist_id WHERE ca._id =$name_id");
while($fetch=@mysql_fetch_array($result))
{
	$row_array['concert_name'] = $fetch['concert_name'];
	$row_array['place'] = $fetch['place'];
	$row_array['concert_date'] = $fetch['concert_date'];
	$row_array['concert_img_url'] = $fetch['concert_img_url'];
	array_push($return_array, $row_array);
}
$json = json_encode($return_array);
$res = '{"feed": {"artist_concert": '.$json.'}}';
echo $res;
?>