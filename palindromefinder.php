<?php 

function checkForPalindromes($str){
	//echo "Checking " . $str . " for palindromes.\n";
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
	//checkForPalindromes($line);

	$line_array = preg_split('/\s+/', $line);
	for ($i = 0; $i < sizeof($line_array); $i++) {
		for ($j = $i+1; $j < sizeof($line_array); $j++) {
			$temp = array_slice($line_array, $i, $j-$i);
			$temp = implode(" ", $temp);
			if (strlen($temp) >= 3) {
				checkForPalindromes($temp);
			}
		}
	}
}

fclose($file);
