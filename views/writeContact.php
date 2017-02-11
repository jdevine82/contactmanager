<!DOCTYPE html>

<?php
session_start();
?>
  <head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">


    <title>Add Contacts</title>
  </head>

  <body>

  <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          
          <a class="navbar-brand" href="#">Contact Manager</a>
        </div>
       <p class='navbar-text pull-right nav'>Hey, <?php echo $_SESSION['user_name']; ?>. You are logged in.</p>
        <ul class="nav pull-right">
            
            <li class=' btn-xs navbar-btn btn-warning'><a href="../index.php?logout">Logout</a></li>
          </ul>
         
      </div>
    </nav>
 
 <div class='container' style='padding-top:100px;'>
   

   
    <?php
$name =test_input($_POST['name']);
$address = test_input($_POST['address']);
$phone = test_input($_POST['phone']);
$mobile = test_input($_POST['mobile']);
$email = test_input($_POST['email']);
if (($name == null) or ($name ==' '))   die('You must enter a name!');
if (($email == null) or ($name ==' ') or (filter_var($email, FILTER_VALIDATE_EMAIL))) {  

$Owner_UserId=$_SESSION['user_id'];

echo '<br>';
//connect to db
$server= "localhost";
$username = "jasond";
$password = "password";
$database = "ContactManager";
    $con = mysqli_connect($server, $username, $password, $database);
if(!$con)
{
    die('Could not connnect to db'.mysqli_error($con));
    
}
else
{
  
  if ($stmt = $con->prepare("INSERT INTO Contacts (Name,Address,Phone,Mobile,Email,Owner_UserId) VALUES (?,?,?,?,?,?)"))
  {
   $stmt->bind_param('ssssss',$name,$address,$phone,$mobile,$email,$Owner_UserId) ;
    if( $stmt->execute()) { echo "<b style='color:green'> The contact has been added</b> <br>";};  //if will be true if execution of sql is finish successfully
    $stmt->close();
     
  }
      
  
   
        else
        {
            echo "<b style='color:red'> Error ".mysqli_error($con). " The contact could not be added</b>";
            
        }
}
mysqli_close($con);
} //end email validation if
else
{die('Please enter a valid email'); }
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>
      <br> <a href='../index.php' class='btn-sm btn-primary'>Display Contacts</a> 
   </div>
   </body>
    
  
  
  </html>