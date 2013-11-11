<?php
//recieve the work for search
$wordSend  = $_REQUEST['wordSend'];
//replaces the spaces and add the code "% 20" for the good read Wikipedia's API
$word =  str_replace(" ", "%20", $wordSend); 

function consulta($fword)
    {
		//start the cURL (you need to install the PHP 4.0.2 to have this library)
		$ch = curl_init();
		//start the consult in the URL OF WIKI API with trated word.
		//for more examples and tests of querys, follow this link: http://en.wikipedia.org/wiki/Special:ApiSandbox
		curl_setopt($ch, CURLOPT_URL, "http://pt.wikipedia.org/w/api.php?action=query&prop=extracts&format=xml&exlimit=1&exintro=&titles=".$fword);
		//configs of cURL
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		//result of query
		$result = curl_exec($ch);
		//close the cURL
		curl_close($ch);
		//show results to XML for the javascrip read
		echo $result;
    }
	
//start the funcion with the treated word
consulta($word);
?>