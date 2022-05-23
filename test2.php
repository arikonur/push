<?PHP
$appID = 'd2761e00-615b-4300-897f-7a068bd7821b';
$KEY = 'N2I4YWIxZmYtNDVmMy00MzE3LTk5ZTItNDg2N2Q3MjFkZTFl';
$limit=50;
$offset=0;
$fields = array(
    'app_id' => 'd2761e00-615b-4300-897f-7a068bd7821b',
    'tags' => array('OneSignal_Example_Tag' => 'YES')
);
$fields = json_encode($fields);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://onesignal.com/api/v1/players?app_id='.$appID.'&limit='.$limit.'&offset='.$offset);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json; charset=utf-8',
    'Authorization: Basic '.$KEY
));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$response = curl_exec($ch);
curl_close($ch);

$resultData = json_decode($response, true);
echo "<pre>";
print_r ($resultData);
echo "<pre>";
$playersID=$resultData['players'][0]['external_user_id'];
foreach($resultData as $userID){
    $i=0;
    $playersID=$resultData['players'][$i]['external_user_id'];
    echo ("user id :".$playersID);

    $i++;
}

?>