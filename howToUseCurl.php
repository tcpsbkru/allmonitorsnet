<?php

// create curl resource
$ch = curl_init();

// set url
curl_setopt($ch, CURLOPT_URL, "https://api.webfinery.com/ranks?domain=acrok.com&key=49fb142ae95b403eb9688392f4a5e5bb");

//return the transfer as a string
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

// $output contains the output string
echo $output = curl_exec($ch);

// close curl resource to free up system resources
curl_close($ch);