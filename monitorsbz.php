<?php
set_time_limit ( 0 );

function monitorsbz() {
	$file = file_get_contents ( 'http://monitors.bz/monitor_details.php' );
	$raw_array = explode ( "_k", $file );

	foreach ( $raw_array as &$value ) {
		$value = between ( "ey=", "\">", $value );
		$filtered [] = $value;
	}

	$filtered = array_filter ( $filtered );
	return $filtered;
}

$monitorsbz = monitorsbz ();

foreach ( $monitorsbz as &$value ) {
	$xml = simplexml_load_file ( 'http://data.alexa.com/data?cli=10&dat=snbamz&url=' . $value );
	$rank = isset ( $xml->SD [1]->POPULARITY ) ? $xml->SD [1]->POPULARITY->attributes ()->TEXT : 0;
	$web = ( string ) $xml->SD [0]->attributes ()->HOST;
	// echo $i ++ . "\t" . $web . "\t" . $rank . "<br/>";
	echo $web . "\t" . $rank . "<br/>";
}

// string manipulation functions
function after($thiss, $inthat) {
	if (! is_bool ( strpos ( $inthat, $thiss ) )) {
		return substr ( $inthat, strpos ( $inthat, $thiss ) + strlen ( $thiss ) );
	}
}
function between($thiss, $that, $inthat) {
	return before ( $that, after ( $thiss, $inthat ) );
}
function before($thiss, $inthat) {
	return substr ( $inthat, 0, strpos ( $inthat, $thiss ) );
}
function found($haystack, $needle) {
	return (strpos ( $haystack, $needle ) !== false);
}
function cutString($str, $amount = 1, $dir = "right") {
	if (($n = strlen ( $str )) > 0) {
		if ($dir == "right") {
			$start = 0;
			$end = $n - $amount;
		} else if ($dir == "left") {
			$start = $amount;
			$end = $n;
		}
		
		return substr ( $str, $start, $end );
	} else {
		return false;
	}
}

?>