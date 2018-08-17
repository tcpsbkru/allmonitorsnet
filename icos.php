<?php
set_time_limit(0);

function monitorsbz()
{
    $file = file_get_contents('https://hackernoon.com/top-100-ico-listing-sites-9dfd98672930');
    $raw_array = explode("anchor\" title", $file);
    $ch = curl_init();
    foreach ($raw_array as &$value) {
        $value = between("</a><a href=\"", "\" class=\"js", $value);
        $value = after("//", $value);
        if (found($value, "www.")) {
            $value = after("www.", $value);
        }
        if (found($value, "/")) {
            $value = before("/", $value);
        }
        $val[] = $value;
    }

    foreach ($val as &$value1) {
        if (strlen($value1) > 0) {
            curl_setopt($ch, CURLOPT_URL, "https://api.webfinery.com/ranks?domain=" . $value1 . "&key=49fb142ae95b403eb9688392f4a5e5bb");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $output[] = curl_exec($ch);

        }
    }

    foreach ($output as &$value2) {
        $va[] = after("domain\":\"", $value2);
        //$va[] = $value;
    }

    $va = str_replace("\",\"rank\":", " ", $va);
    $va = str_replace("}", "", $va);

    return $va;
}

printa(monitorsbz());

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