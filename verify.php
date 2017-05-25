<?php
$access_token = '8lqeJ0Y8ueX9E8IyvAfiRmS7ivqa2sanRuAlakOMG1jXNQVJ6Zem9RsOPe04FoK+T3D45lIAH9v9tJ1fpXh6BqNQL0KLfqJzdASLjDteryhnRhccMGSbOqMIEPaBdAND53w3CfjVr2DLRF9k1sqdDQdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;