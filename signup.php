<?php 
include './dbinit.php';
// mysql_query("set names utf8", $connect);
$name = $_POST["name"];
$pwd = $_POST["password"];
$email = $_POST["email"];
if($name == "" || $pwd == "" || $email == "") {
	echo error ;
} else {
	
	$result = mysql_query("SELECT * From member where name='$name' OR email='$email';", $connect) or die(mysql_error());
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
?>