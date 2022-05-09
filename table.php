<?php 
session_start();
include"db.php";
$query = "SELECT * FROM admin";
$result = $db->query($query);
$row = $result->fetch_assoc();
$usr = $row['username'];

if ($_SESSION['username'] == $usr){;?>


<?PHP
date_default_timezone_set('Europe/Istanbul');

include"db.php";
$query = "SELECT * FROM config";
$result = $db->query($query);

while($row = $result->fetch_assoc()) {
	$ID = $row['ID'];
	$KEY = $row['KEY'];

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://onesignal.com/api/v1/notifications?app_id=$ID&limit=50&offset=0",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "authorization: Basic $KEY",
  ),
));

}
$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);


$arr = json_decode($response, true);

/*
foreach($arr['notifications'] as $row){
	
echo '<b>Notification:</b> ' .$row['id'] .'<br>';
echo '<b>APP ID:</b> ' .$row['app_id'] . '<br>';
echo '<b>Time:</b> ' .$row['delivery_time_of_day'] . '<br>';
echo '<b>MESSAGE:</b> <br>' .$row['contents']['en'] . '<br><br>';

} */



/*
echo '<pre>';
echo print_r($arr); 
 echo '</pre>'; 
 */
?>



<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="datatable/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="datatable/datatables.css"/>
<script type="text/javascript" src="datatable/jquery-3.5.1.js"></script>
<script type="text/javascript" src="datatable/jquery.dataTables.min.js"></script>




<div class="container"> 
<span class="text-secondary">Tablo</span> <i class="fa fa-angle-double-right" aria-hidden="true"></i> 
<a href="post.php">Push</a> <i class="fa fa-angle-double-right" aria-hidden="true"></i>
<div class="float-right"><span class="text-secondary"><a href="logout.php"> <span class="text-secondary">(LogOut) </span></a></div>



</div>
<hr>


<div class="container">
<table id="example" class="table table-striped table-bordered" style="width:100%; text-align:center;">
        <thead>
            <tr>
                <th width='5%;'>id.</th>
                <th width='10%;'>tarih</th>
                <th width='40%;'>mesaj</th>
              
            </tr>
        </thead>
        <tbody>
			
	
<?php
$i='1';
foreach($arr['notifications'] as $row){
echo '<tr>';	
echo '<td>' .$i++ .'</td>';
echo '<td>' .$row['delivery_time_of_day'] . '</td>';
echo '<td>' .$row['contents']['en'] . '</td>';
	
echo'</tr>';
} ;?>		

  
</tbody>
        
    </table>
    
</div>



<script> $(document).ready(function() {
    $('#example').DataTable();
} );</script>


<?php } else {
	echo "Erişim yok <a href='login.php'>admin</a>";};?>
