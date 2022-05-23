<?PHP
$playerID = '809a2c41-5f00-4289-b30f-24e7cded9ad7';
$fields = array(
    'app_id' => 'd2761e00-615b-4300-897f-7a068bd7821b',
    'tags' => array('OneSignal_Example_Tag' => 'YES')
);
$fields = json_encode($fields);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://onesignal.com/api/v1/players/'.$playerID);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$response = curl_exec($ch);
curl_close($ch);

$resultData = json_decode($response, true);
echo $resultData;
?>