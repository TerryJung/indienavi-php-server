<?php 
/* favorite artist delete */
include './dbinit.php';
mysql_query("set names utf8", $connect);
$name = $_POST['name'];
$artist_id = $_POST['artist_id'];


if ($name =="" || $artist_id == "") {
	echo error ;
} else {

	$name_id_result = mysql_query("SELECT _id FROM member WHERE name='$name'");
	$name_id_fetch = mysql_fetch_assoc($name_id_result);
	$name_id = $name_id_fetch['_id'];
	mysql_free_result($name_id_result);

	if($name_id == "" || $artist_id == ""){
		echo error;
	} else {
		$cnt = mysql_query("SELECT count(*) AS cnt FROM member_favorite WHERE artist_id='$artist_id' AND member_id='$name_id';");

		$row = mysql_fetch_assoc($cnt);

		if($row['cnt'] == 1){

			mysql_query("UPDATE  `chilx2`.`artist` SET  `like_count` = like_count-1 WHERE  `artist`.`_id` =$artist_id LIMIT 1 ;");
			mysql_query("DELETE FROM member_favorite WHERE artist_id = '$artist_id' and member_id ='$name_id';");
			echo "OK";
		} else {
			echo "Fail";
	}
		//$cnt = $row['cnt']
	}
	
}





?>