<?php
$access_token = '8lqeJ0Y8ueX9E8IyvAfiRmS7ivqa2sanRuAlakOMG1jXNQVJ6Zem9RsOPe04FoK+T3D45lIAH9v9tJ1fpXh6BqNQL0KLfqJzdASLjDteryhnRhccMGSbOqMIEPaBdAND53w3CfjVr2DLRF9k1sqdDQdB04t89/1O/w1cDnyilFU=';

//Get data from Arduino 
// echo "Access OK";
// echo "<br>"; //newline

// if (isset($_GET['data'])){
// 	$data = $_GET['data'];
// 	echo $data;
// }
// else{
// 	echo "Data not received";
// }
$data = "29.5,2,on";
$data_get = explode(",", $data);
$data_temp = $data_get[0];
$data_level = $data_get[1];
$data_power = $data_get[2];
$replyToken;
$temp_set;
$level_set;
echo "check 1";
// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
//data_check();
echo "check 2";
//function data_check(){
// Validate parsed JSON data
if (!is_null($events['events'])) {
	// Loop through each event
	foreach ($events['events'] as $event) {
		// Reply only when message sent is in 'text' format
		if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
			// Get text sent
			$text = $event['message']['text'];
			// Get replyToken
			$replyToken = $event['replyToken'];
			$text_get = explode(",", $text);
			$temp_set = $text_get[0];
			$level_set = $text_get[1];
			echo $temp_set;
			echo $level_set;
		}
	}
}
			//// check temperature ////
			if($data_temp <= $temp_set){
				echo "check 3";
				$text = "Water temperature is too low";
				// Build message to reply back
				$messages = [
					'type' => 'text',
					'text' => $text
				];

				// Make a POST Request to Messaging API to reply to sender
				$url = 'https://api.line.me/v2/bot/message/reply';
				$data = [
					'replyToken' => $replyToken,
					'messages' => [$messages],
				];
				$post = json_encode($data);
				$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);

				$ch = curl_init($url);
				curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
				curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
				curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
				$result = curl_exec($ch);
				curl_close($ch);

				echo $result . "\r\n";
			}
			//// check water level ////
			else if($data_level > $level_set){
				echo "check 4";
				$text = "Water level is too low";
				// Build message to reply back
				$messages = [
					'type' => 'text',
					'text' => $text
				];

				// Make a POST Request to Messaging API to reply to sender
				$url = 'https://api.line.me/v2/bot/message/reply';
				$data = [
					'replyToken' => $replyToken,
					'messages' => [$messages],
				];
				$post = json_encode($data);
				$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);

				$ch = curl_init($url);
				curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
				curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
				curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
				$result = curl_exec($ch);
				curl_close($ch);

				echo $result . "\r\n";
			}
			//// check power ////
			else if($data_power == "off"){
				echo $data_power;
				$text = "Power OFF!";
				// Build message to reply back
				$messages = [
					'type' => 'text',
					'text' => $text
				];

				// Make a POST Request to Messaging API to reply to sender
				$url = 'https://api.line.me/v2/bot/message/reply';
				$data = [
					'replyToken' => $replyToken,
					'messages' => [$messages],
				];
				$post = json_encode($data);
				$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);

				$ch = curl_init($url);
				curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
				curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
				curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
				$result = curl_exec($ch);
				curl_close($ch);

				echo $result . "\r\n";
			}


// // 			// Build message to reply back
// // 			$messages = [
// // 				'type' => 'text',
// // 				'text' => $text
// // 			];

// // 			// Make a POST Request to Messaging API to reply to sender
// // 			$url = 'https://api.line.me/v2/bot/message/reply';
// // 			$data = [
// // 				'replyToken' => $replyToken,
// // 				'messages' => [$messages],
// // 			];
// // 			$post = json_encode($data);
// // 			$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);

// // 			$ch = curl_init($url);
// // 			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
// // 			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// // 			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
// // 			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
// // 			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
// // 			$result = curl_exec($ch);
// // 			curl_close($ch);

// // 			echo $result . "\r\n";
 // 		}
 // 	}
 // }
echo "OK";

?>