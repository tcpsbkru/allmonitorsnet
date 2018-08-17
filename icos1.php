<?php
set_time_limit(0);

//$files = glob ( "www.allhyipmonitors.com/details/*.*" );
//$out = fopen ( "newfile.txt", "w" );
//
//foreach ( $files as $file ) {
//	$in = fopen ( $file, "r" );
//	while ( $line = fread ( $in, filesize ( $file ) ) ) {
//		fwrite ( $out, $line );
//	}
//	fclose ( $in );
//}
//function allmonitorsnet() {
//	$file = fopen ( "newfile.txt", "r" );
//	$a = fread ( $file, filesize ( "newfile.txt" ) );
//	fclose ( $file );
//	$aa = explode ( "mtd", $a );
//
//	foreach ( $aa as &$value ) {
//		if (found ( $value, "mbutton" )) { // look for: style="" border=0
//			$ax [] = between ( "addtofavorites/monitor/", "\"", $value );
//		}
//	}
//
//	$ax = array_unique ( $ax );
//	$ax = array_values ( $ax );
//	return $ax;
//}

//$allmonitorsnet = allmonitorsnet ();
//function monitorsbz()
//{
//$da[] = null;
//$file1 = file_get_contents('https://www.alexa.com/siteinfo/xe.com#trafficstats');
//$da[] = between("<!-- Alexa web traffic metrics are available via our API at http://aws.amazon.com/awis -->",
//    "align-vmiddle", $file1);
//sleep(60);
//$file = file_get_contents('https://www.alexa.com/siteinfo/serpify.me#trafficstats');
//$da[] = between("<!-- Alexa web traffic metrics are available via our API at http://aws.amazon.com/awis -->",
//    "align-vmiddle change-wrapper change-down color-gen2 change-r2", $file);
//echo "<br/>";
//
//print_r($da);


//$raw_array = explode("anchor\" title", $file);
//    print_r(explode ( "anchor\" title", $file ));


//    foreach ($raw_array as &$value) {
//        $value = between("</a><a href=\"", "\" class=\"js", $value);
//        if (strlen($value) > 0) {
//            $filtered [] = $value;
//        }
//    }

//    $filtered = array_values($filtered);
//    printa($filtered);

//var_dump($filtered1);
//	$filtered = array_filter ( $filtered );
//	return $filtered;
//}

//$sites = monitorsbz();
//printa($sites);

//$cars = array("icobench.com", "listico.io");
//$monitorsbz = monitorsbz ();

//$sites = array_merge ( $allmonitorsnet, $monitorsbz );
//$sites = array_unique ( $sites );
//// printa($sites);
//
//$a = "120profit.com
//24x7hyip.com
//activehyips.com
//allhyip.net
//allhyipmonitors.com
//allhyips.biz
//all-hyips.info
//allhyipslist.com
//allmon.biz
//allworldhyip.com
//amerextrade.com";
//$ax = explode("\r\n", $a);
//
//foreach ( $cars as &$value ) {
//	$xml = simplexml_load_file ( 'http://data.alexa.com/data?cli=10&dat=snbamz&url=' . $value );
//
//	$rank = isset ( $xml->SD [1]->POPULARITY ) ? $xml->SD [1]->POPULARITY->attributes ()->TEXT : 0;
//	$web = ( string ) $xml->SD [0]->attributes ()->HOST;
//	$country = isset ( $xml->SD [1]->COUNTRY  ) ? $xml->SD [1]->COUNTRY ->attributes ()->NAME : 0;
//	$country_rank = isset ( $xml->SD [1]->COUNTRY  ) ? $xml->SD [1]->COUNTRY ->attributes ()->RANK : 0;
//// 	$country = ( string ) $xml->SD [1]->attributes ()->NAME;
//// 	$country_rank = ( string ) $xml->SD [1]->attributes ()->RANK;
//	// echo $i ++ . "\t" . $web . "\t" . $rank . "<br/>";
//	//echo $web . "\t" . $rank . "\t" . $country . "\t" . $country_rank . "<br/>";
//	echo $web . "," . $rank . "," . $country . "," . $country_rank . "<br/>";
//
//}

// string manipulation functions
function after($thiss, $inthat)
{
    if (!is_bool(strpos($inthat, $thiss))) {
        return substr($inthat, strpos($inthat, $thiss) + strlen($thiss));
    }
}

function between($thiss, $that, $inthat)
{
    return before($that, after($thiss, $inthat));
}

function before($thiss, $inthat)
{
    return substr($inthat, 0, strpos($inthat, $thiss));
}

function found($haystack, $needle)
{
    return (strpos($haystack, $needle) !== false);
}

function cutString($str, $amount = 1, $dir = "right")
{
    if (($n = strlen($str)) > 0) {
        if ($dir == "right") {
            $start = 0;
            $end = $n - $amount;
        } else if ($dir == "left") {
            $start = $amount;
            $end = $n;
        }

        return substr($str, $start, $end);
    } else {
        return false;
    }
}

// print array
function printa($sweet)
{
    foreach ($sweet as $key => $value) {
        echo $key . "\t" . $value . "<br>";
    }
}

