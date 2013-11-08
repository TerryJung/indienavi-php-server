<?php 
include './dbinit.php';
mysql_query("set names utf8", $connect); 
$concert = $_GET['concert'];

$return_array = array();
$concert_id_result = mysql_query("SELECT _id FROM concert WHERE concert_name='$concert'");
$concert_id_fetch = mysql_fetch_assoc($concert_id_result);
$concert_id = $concert_id_fetch['_id'];
mysql_free_result($concert_id_result);

$result = mysql_query("SELECT * FROM concert_replized cr INNER JOIN member m ON cr.member_id = m._id WHERE concert_id = $concert_id ORDER BY date_time ASC ");

while($fetch=@mysql_fetch_array($result))
{
	// $row_array['artist_name'] = $fetch['artist_name'];
	$row_array['name'] = $fetch['name'];
	$row_array['reply'] = $fetch['reply'];
	$row_array['date'] = $fetch['date'];
	$row_array['date_time'] = $fetch['date_time'];
	array_push($return_array, $row_array);
}
$json = json_encode($return_array);
$res = '{"feed": {"concert_reply": '.$json.'}}';
echo $res;


/* SELECT * FROM concert_replized cr 
INNER JOIN concert co ON cr.concert_id = cr._id 
INNER JOIN member m ON m._id = member_id WHERE co._id = 2
*/
?>

