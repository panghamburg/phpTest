<?php
//curl
$ch = curl_init();
$url = '';
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HEADER, 1);
$output = curl_exec($ch);
$info = curl_getinfo($ch);
curl_close($ch);
//