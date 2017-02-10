<?php
session_start();
?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<html>

<head>
    <title>deleteContact</title>
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
$id = test_input($_GET['id']);
if (($id ==null) or ($id == ' ')) die('You must have a valid id from the Contacts');


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
  
  if ($stmt = mysqli_prepare($con,"Delete from Contacts WHERE ContactId=?" ))
  {
   mysqli_stmt_bind_param($stmt,'i',$id);
    if(mysqli_stmt_execute($stmt)) { 
    echo "<b style='color:green'> <p>The contact has been deleted</p> <br>";
    }  //if will be true if execution of sql is finish successfully
    $stmt->close();
     
  }
      
  
   
        else
        {
            echo "<b style='color:red'> Error ".mysqli_error($con). " The contact could not be deleted</b>";
            
        }
}
mysqli_close($con);


function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>
  <br> <a href='../index.php' class='btn-sm btn-primary'>Display Contacts</a></div><!-- end container>
   </body>

</html>
