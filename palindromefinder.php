<?php 

function checkForPalindromes($str){
	$original_string = $str;
	$str = strtolower($str);
	$str = preg_replace('/[^a-z0-9]+/i', '', $str);
	//echo $str . "\n";
    $reverse_str = strrev($str);
    if ($str == $reverse_str){
    	echo "\"" . $original_string . "\" is a palindrome!\n";
    }
}

$filename="input.txt";
$file = fopen($filename, "r");
//$readfile = fread($file, filesize($filename));

//echo $readfile;
//echo "\n";

while(! feof($file)) {
	//echo fgets($file) . "\n";
	$line = fgets($file);
	$response = checkForPalindromes($line);
}

fclose($file);
