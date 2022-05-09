<?php 
require"db.php";

session_start();

$query = "SELECT * FROM admin";
$result = $db->query($query);
$row = $result->fetch_assoc();
$usr = $row['username'];
if ($_SESSION['username'] == $usr){;?>



<!doctype html>
<html lang="en">
  <head>
   
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Testpush</title>
  </head>
  <body>



<div class="container"> 
<a href="post.php">Push</a> <i class="fa fa-angle-double-right" aria-hidden="true"></i>
<span class="text-secondary">Settings</span>




<div class="container">
	
<div style="width:60%;  margin:0 auto;"> 

<div style="margin-top:10%;">
	


    <form action="" method="POST"> 
  
      <div class="modal-body">
  
<div class="form-group">  
<label for="image" class="text-secondary">Onesignal APP ID</label> 
<br><input type="text" name="app" value="<?php 
$query = "SELECT * FROM config";
$result = $db->query($query);
$row = $result->fetch_assoc();
echo $row['ID']; ?>" style="width:100%;"> </div>
       
<div class="form-group"> 
    <label for="web" class="text-secondary">Onesignal KEY</label>
    <br> <input type="password" name="key" value="<?php 
$query = "SELECT * FROM config";
$result = $db->query($query);
$row = $result->fetch_assoc();
echo $row['KEY']; ?>" style="width:100%;">  </div>	
        
        
      </div>
      <div class="modal-footer">
        <button type="submit" name="core" class="btn btn-primary">update</button>
      </div>
    </div>
  </div>
</div>

</div>
 </form>
    
<?php if(isset($_POST['core'])){
	$id = $_POST['app'];
	$key = $_POST['key'];
	
	$sqls = "UPDATE `config` SET `ID` = '$id', `KEY`= '$key'";
     $db->query($sqls);
    $message="<div class='bg alert-danger p-2'>Güncelleme başarılı</div>"; 
	
	};?>    
    
    
    
    	<?php echo $message;?>
    
    
   
    
    </div>
  </div>	  
</div>



	
<?php } else {
	echo "Erişim YOK <a href='login.php'>admin</a>";};?>

