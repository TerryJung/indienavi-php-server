<?php
include './dbinit.php';
mysql_query("set names utf8", $connect);
$date = $_GET['date'];
// SELECT * FROM concert_artist ca INNER JOIN concert co ON ca.artist_id = co._id WHERE co._id = 1
$query = "SELECT concert_name, place, concert_date, concert_time, link, concert_img_url  FROM concert WHERE concert_date = '$date'";
//// 만드는중
$return_array = array();
$result = mysql_query($query, $connect);

while ($row = mysql_fetch_array($result, MYSQL_ASSOC))
{
  $row_array['concert_name'] = $row['concert_name'];
  $row_array['place'] = $row['place'];
  $row_array['concert_date'] = $row['concert_date'];
  $row_array['link'] = $row['link'];
  $row_array['concert_img_url'] = $row['concert_img_url'];
  $row_array['concert_time'] = $row['concert_time'];
  array_push($return_array, $row_array);
}
$json = json_encode($return_array);
$res = '{"feed": {"concert": '.$json.'}}';
echo $res;



mysql_close($connect);
?>