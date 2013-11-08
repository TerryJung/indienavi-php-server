<?php 
include './dbinit.php';
$name = $_REQUEST['name'];
$concert = $_REQUEST['concert'];
$reply = $_REQUEST['reply'];
// name concert reply
if($name == "" || $concert == "" || $reply == "") {
	echo error;
} else {
	// echo "'$name'";
	$name_id_result = mysql_query("SELECT _id FROM member WHERE name='$name'", $connect) or die(mysql_error());
	$name_id_fetch = mysql_fetch_assoc($name_id_result);
	$name_id = $name_id_fetch['_id'];
	mysql_free_result($name_id_result);
	
	$concert_id_result = mysql_query("SELECT _id FROM concert WHERE concert_name='$concert'") or die(mysql_error());
	$concert_id_fetch = mysql_fetch_assoc($concert_id_result);
	$concert_id = $concert_id_fetch['_id'];
	mysql_free_result($concert_id_result);
	
	if($name_id != null || $concert_id != null) {
		mysql_query("INSERT into concert_replized (member_id, concert_id, reply, date, date_time) values ('$name_id', '$concert_id', '$reply', NOW(), NOW());", $connect) or die(mysql_error());
		echo "reply_OK";
		
	} else {
		echo "Fail";

	}	
}	
/* <?php 
include './dbinit.php';

$name = $_POST["name"];
$pwd = $_POST["password"];
$email = $_POST["email"];
if($name == "" || $pwd == "" || $email == "") {
	echo error ;
} else {
	
	$result = mysql_query("select * From member where name='$name';", $connect) or die(mysql_error());
	$rows = mysql_num_rows($result);
	//$cnt = mysql_query("select count(*) as cnt From member where name='$name';");
	if($rows == null) { 
 		mysql_query("insert into member (name, password, email) values ('$name', '$pwd', '$email');", $connect);
 		echo "OK";
 	} else  {
    	echo "Not Sign Up"; 
	}
}

mysql_close($connect);
?>*/
?>
