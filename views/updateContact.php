<?php
session_start();
?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<html>

<head>
    <title>Update Contact</title>
</head>
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
   
<body>
    <?php
$id = test_input($_POST['id']);
$name =test_input($_POST['name']);
$address = test_input($_POST['address']);
$phone = test_input($_POST['phone']);
$mobile = test_input($_POST['mobile']);
$email = test_input($_POST['email']);
if (($name == null) or ($name ==' '))   die('You must enter a name!');
if (($id ==null) or ($id == ' ')) die('You must have a valid id from the Contacts');
if (($email == null) or ($name ==' ') or (filter_var($email, FILTER_VALIDATE_EMAIL))) {  



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
  
  if ($stmt = mysqli_prepare($con,"UPDATE Contacts SET Name=?,Address=?,Phone=?,Mobile=?,Email=? WHERE ContactId=?" ))
  {
   mysqli_stmt_bind_param($stmt,'sssssi',$name,$address,$phone,$mobile,$email,$id);
    if(mysqli_stmt_execute($stmt)) { 
    echo "<b style='color:green'> <p>The contact has been updated</p> <br>";
    }  //if will be true if execution of sql is finish successfully
    $stmt->close();
     
  }
      
  
   
        else
        {
            echo "<b style='color:red'> Error ".mysqli_error($con). " The contact could not be updated</b>";
            
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

        <br> <a href='../index.php'>Display Contacts</a> </body>

</html>
