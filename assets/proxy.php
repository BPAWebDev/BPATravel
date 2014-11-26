<?php
    // PHP Proxy
    // Loads a XML from any location. Used with Flash/Flex apps to bypass security restrictions
    // usage: proxy.php?url=http://mysite.com/myxml.xml

	$url = ($_GET['url']);
	if(strpos($url,"wxdata.weather.com") !== FALSE){	
	$location = strtoupper(substr($url,strpos($url,"where=")+6));
	$url = substr($url,0,strpos($url,"where=")+6);
	
    $session = curl_init($url.urlencode($location)); 	// Open the Curl session
	}else{
	$session = curl_init($url);
	}
    curl_setopt($session, CURLOPT_HEADER, false);          // Don't return HTTP headers
    curl_setopt($session, CURLOPT_RETURNTRANSFER, true);   // Do return the contents of the call
	curl_setopt($session, CURLOPT_FRESH_CONNECT, true);
	curl_setopt($session, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0)");
    $xml = curl_exec($session);                            // Make the call
    header("Content-Type: application/xml","Cache-Control: no-cache");                  // Set the content type appropriately
	
    print $xml;        // Spit out the xml
    curl_close($session); // And close the session
	
?>