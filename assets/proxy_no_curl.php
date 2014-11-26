<?php
    // PHP Proxy
    // Loads a XML from any location. Used with Flash/Flex apps to bypass security restrictions
    // usage: proxy.php?url=http://mysite.com/myxml.xml

	$url = ($_GET['url']);
	if(strpos($url,"wxdata.weather.com") !== FALSE){	
		$location = strtoupper(substr($url,strpos($url,"where=")+6));
		$url = substr($url,0,strpos($url,"where=")+6);
		if(strpos($url,"http://") === FALSE){
			$url = "http://".$url.urlencode($location);	
		}else{
			$url = $url.urlencode($location);
		}
	}
	
	$handle = file_get_contents($url, FALSE);
	header("Content-Type: application/xml","Cache-Control: no-cache");
	echo $handle;
	
?>