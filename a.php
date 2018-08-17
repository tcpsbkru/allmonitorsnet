<?php

// include 'dbc.php';
/*
 * $servername = "db4free.net";
 * $username = "userkuku";
 * $password = "Zaichik1";
 * $dbname = "dada";
 *
 * $servername = "mysql9.000webhost.com";
 * $username = "a5840693_user";
 * $password = "Zaichik1";
 * $dbname = "a5840693_da";
 *
 * $servername = "mysql.hostinger.co.uk";
 * $username = "u709885921_user";
 * $password = "Zaichik1";
 * $dbname = "u709885921_da";
 */
//$servername = "localhost";
//$username = "root";
//$password = "";
//$dbname = "alexa";
//
//$conn = new mysqli($servername, $username, $password, $dbname);
//if ($conn->connect_error) {
//    die("Connection failed: " . $conn->connect_error);
//}

echo $a = "120profit.com
24x7hyip.com
activehyips.com
allhyip.net
allhyipmonitors.com";

// create table
//$tableName = "monitors13";
$ax = explode("\r\n", $a);
print_r($ax);
//for ($i = 0; $i <= count($ax)-1; $i ++) {
//    $ax1 [] = preg_replace("/[^a-zA-Z0-9]+/", "", $ax [$i]);
//}
//
//$ax2 = implode(' INT(11) NOT NULL,', $ax1);
//$sql = "CREATE TABLE " . $tableName . " ( date date NOT NULL," . $ax2 . " INT(11) NOT NULL, av INT(11) NOT NULL)";
//
//if ($conn->query($sql) === TRUE) {
//    echo "Table " . $tableName . " created successfully <br>";
//} else {
//    echo "Error creating table: " . $conn->error;
//}
//    echo "<br><br>";
//
//// create table headers
//$ax3 = implode(",", $ax1);
//$tableHeaders = "date," . $ax3 . ",av";

function da()
{
    $a = "120profit.com
24x7hyip.com
activehyips.com
allhyip.net
allhyipmonitors.com";

// create table
//$tableName = "monitors13";
    $ax = explode("\r\n", $a);
// create table row input
    foreach ($ax as &$value) {
        $xml = simplexml_load_file('http://data.alexa.com/data?cli=10&dat=snbamz&url=' . $value);
        $rank = isset($xml->SD [1]->POPULARITY) ? $xml->SD [1]->POPULARITY->attributes()->TEXT : 0;
        $web = ( string )$xml->SD [0]->attributes()->HOST;
        $arr_rank [] = $rank;
        echo $web . "\t" . $rank . "<br/>";
    }
}
da();
//$imp_rank = implode(',', $arr_rank);
//$ex_rank = explode(",", $imp_rank);
//$av = round(array_sum($ex_rank) / count($ex_rank));
//$tableRow = "now()," . $imp_rank . "," . $av;
//
//$sql = "INSERT INTO " . $tableName . " ($tableHeaders)
//  VALUES ($tableRow)";
//
//    echo "<br>";
//
//if ($conn->query($sql) === TRUE) {
//    echo "New record created successfully";
//} else {
//    echo "no record : " . $conn->error;
//}
//
//$conn->close();
