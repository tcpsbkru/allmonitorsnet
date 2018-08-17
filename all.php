<?php
set_time_limit ( 0 );

$files = glob ( "www.allhyipmonitors.com/details/*.*" );
$out = fopen ( "newfile.txt", "w" );

foreach ( $files as $file ) {
	$in = fopen ( $file, "r" );
	while ( $line = fread ( $in, filesize ( $file ) ) ) {
		fwrite ( $out, $line );
	}
	fclose ( $in );
}
function allmonitorsnet() {
	$file = fopen ( "newfile.txt", "r" );
	$a = fread ( $file, filesize ( "newfile.txt" ) );
	fclose ( $file );
	$aa = explode ( "mtd", $a );
	
	foreach ( $aa as &$value ) {
		if (found ( $value, "mbutton" )) { // look for: style="" border=0
			$ax [] = between ( "addtofavorites/monitor/", "\"", $value );
		}
	}
	
	$ax = array_unique ( $ax );
	$ax = array_values ( $ax );
	return $ax;
}

$allmonitorsnet = allmonitorsnet ();

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

$sites = array_merge ( $allmonitorsnet, $monitorsbz );
$sites = array_unique ( $sites );
//printa($sites);

foreach ( $sites as &$value ) {
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

//print array
function printa($sweet) {
	foreach ( $sweet as $key => $value ) {
		echo $key . "\t" . $value . "<br>";
	}
}

?>