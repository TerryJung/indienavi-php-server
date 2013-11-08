<?php 
include './dbinit.php';
// mysql_query("set names utf8", $connect);
$name = $_POST['name'];
$pwd = $_POST['password'];

if($name == "" || $pwd == "") {
	echo error ;
} else {
		
	$result = mysql_query("select * From member where name='$name' and password='$pwd';", $connect) or die(mysql_error());
	$rows = mysql_num_rows($result);
	if($rows == 0) { 
 		echo "No Such User Found"; 
 	}
 	else  {
    	echo "OK"; 
	}

//	if (!$result) {
//    	echo "0";
//	}
// 결과 사용하기
// $result를 출력하려고 하면, resource 내부 정보에 접근할 수 없습니다.
// mysql 결과 함수 중 하나를 사용해야 합니다.
// mysql_result(), mysql_fetch_array(), mysql_fetch_row() 등을 참고하십시오.
//	while ($row = mysql_fetch_assoc($result)) {
//   	echo $row['cnt'];
//    }
// 결과셋으로 할당된 리소스를 해제합니다
// 스크립트 종료 시에 자동으로 이루어집니다
	mysql_free_result($result);
}
mysql_close($connect);
//session_destroy();
?>