<?php 
$qry = $_GET['qry'];
$return_array = array();
$url = "http://gdata.youtube.com/feeds/api/videos?q=".$qry."&v=2&alt=json&max-results=10";
$contents = file_get_contents($url);

$result = json_decode($contents, true);
$cnt = count($result['feed']['entry']);
//var_dump($result);
for ($i=0; $i <$cnt ; $i++) { 
	# code...
	$row_array['thumbnail'] = $result['feed']['entry'][$i]['media$group']['media$thumbnail'][0]['url'];
	$row_array['title'] = $result['feed']['entry'][$i]['title']['$t'];
	$row_array['videoid'] = $result['feed']['entry'][$i]['media$group']['yt$videoid']['$t'];
	
	array_push($return_array, $row_array);
}

$json = json_encode($return_array);

$res = '{"data": '.$json.'}';
echo $res;

//echo $result;
?>