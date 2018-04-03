<?php 

function checkForPalindromes($str, $writefile){
	//echo "Checking " . $str . " for palindromes.\n";
	$original_string = $str;
	$str = strtolower($str);
	$str = preg_replace('/[^a-z0-9]+/i', '', $str);
	//echo $str . "\n";
    $reverse_str = strrev($str);
    if ($str == $reverse_str){
    	//echo "\"" . $original_string . "\" is a palindrome.\n";
		//fwrite($writefile, "\"" . $original_string . "\" is a palindrome.\n");
		return $original_string;
    }
    else {
    	return false;
    }
}

$readfilename="input.txt";
$writefile = fopen("output.txt", "w");
$lines = file($readfilename);

$palindromes_array = [];

for($lineindex = 0; $lineindex < sizeof($lines); $lineindex++) {

	$containspalindrome = false;

	$line = $lines[$lineindex];
	$line_array = preg_split('/\s+/', $line);

	for ($i = 0; $i < sizeof($line_array); $i++) {
		for ($j = $i+1; $j < sizeof($line_array); $j++) {
			$temp = array_slice($line_array, $i, $j-$i);
			$temp = implode(" ", $temp);
			if (strlen($temp) >= 2) {
				$response = checkForPalindromes($temp, $writefile);
				if ($response) {
					$containspalindrome = true;
					array_push($palindromes_array, $response);
				}
			}
		}
	}
	if (!$containspalindrome){
		fwrite($writefile, "Line " . ($lineindex+1) . " does not contain a palindrome.\n");
	}
	else {
		fwrite($writefile, "Line " . ($lineindex+1) . " contains a palindrome.\n");
	}

}

foreach ($palindromes_array as $val){
	fwrite($writefile, "\"" . $val . "\" is a palindrome.\n");
}

fclose($writefile);
