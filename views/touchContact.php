<!DOCTYPE html>
  <?php
session_start();
?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<head>
  <meta charset="utf-8" />
  <title>Edit contact</title>
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
    $id =test_input($_GET['id']);
  if (($id == null) or ($id ==' '))   die('error no id');  
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
    
  
  $query="SELECT * FROM Contacts WHERE ContactId=?";
  

if( $stmt = mysqli_prepare($con,$query)){
    mysqli_stmt_bind_param($stmt,'i',$id);
    mysqli_stmt_execute($stmt);
      mysqli_stmt_bind_result($stmt,$id,$name,$address,$phone,$mobile,$email,$Owner_UserId);
     
    mysqli_stmt_fetch($stmt);
      
     mysqli_stmt_close($stmt);
   } //end table generator 
?>

        <form name="edit contact" method="post" action="updateContact.php">
     <div class='jumbotron'>
    <h3>Edit Contact</h1>
    <div class='table-responsive  table-striped'>
     <table class='table'>
            <tr> <td> <label for="id">Id</label></td><td><input id="id" type="number" name="id" value="<?php echo $id ?>" readonly/></td></tr>
            <tr>
                <td>
                    <label for="name">Name</label>
                </td>
                <td>
                    <input id="name" type="text" name="name" size="30" maxlength="50" tabindex="1" value="<?php echo $name?>" /> </td>
            </tr>
            <tr>
                <td>
                    <label for="address">Address</label>
                </td>
                <td>
                    <textarea id="address" name="address" cols="45" rows="5" tabindex="2"><?php echo $address?></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="phone">Phone</label>
                </td>
                <td>
                    <input id="phone" type="text" name="phone" size="20" maxlength="20" tabindex="3" value="<?php echo $phone?>" /> </td>
            </tr>
            <tr>
                <td>
                    <label for="mobile">Mobile</label>
                </td>
                <td>
                    <input id="mobile" type="text" name="mobile" size="20" maxlength="20" tabindex="4" value="<?php echo $mobile?>"> </td>
            </tr>
            <tr>
                <td>
                    <label for="email">Email</label>
                </td>
                <td>
                    <input id="email" type="email" name="email" size="50" maxlenght="50" tabindex="5" value="<?php echo $email?>"> </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" name="submit" value="submit" tabindex="6" class="btn btn-primary"> </td>
            </tr>
        </table>
    </form>
</body>

</html>
<?php
    mysqli_close($con); 
}
    
    function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
    
    ?>
