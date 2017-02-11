<!DOCTYPE html>


<head>
    <meta charset="utf-8"/>
    <title>Contacts Home</title>
  <!-- This page is displayed once the user has logged it. It acts as the homepage-->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

</head>

<body>
 
    
 
  <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          
          <a class="navbar-brand" href="#">Contact Manager</a>
        </div>
       <p class='navbar-text pull-right nav'>Hey, <?php echo $_SESSION['user_name']; ?> You are logged in.</p>
        <ul class="nav pull-right">
            
            <li class=' btn-xs navbar-btn btn-warning'><a href="../index.php?logout">Logout</a></li>
          </ul>
         
      </div>
    </nav>
 
 <div class='container' style='padding-top:100px;'>
   

   
   
  <?php

//connect to db
//connect to db
$server= "localhost";
$username = "jasond";
$password = "password";
$database = "ContactManager";
$databaseuser = "login";
    $con = mysqli_connect($server, $username, $password, $database);
    $con2 = mysqli_connect($server, $username, $password, $databaseuser);
if(!$con)
{
    die('Could not connnect to db'.mysqli_error($con));
    
}
else
{
    
    /* Prepared statement, stage1, prepare statement */
   $query="SELECT * FROM Contacts";
  
    if (!($stmt = $con->prepare($query))) {
      echo "Prepare failed: (" . $con->errno . ") " . $con->error;
    }

/*setup database query for user name from login database*/
   if(!$con2)
    {
    die('Could not connnect to db'.mysqli_error($con2));
    
    }
else
  
{
 
 
/* Prepared statement, stage 3: execute and obtain results  */
if(mysqli_stmt_execute($stmt) ){
    
      mysqli_stmt_bind_result($stmt,$id,$name,$address,$phone,$mobile,$email,$Owner_UserID);
  echo "<div class='jumbotron'>
    <h3>Contact List</h3>
    <div class='table-responsive  table-striped'>" ; //setup table sytle
      echo "<table class='table'>
    <tr style='font-weight:bold;'>
        <th>id</th>
        <th>Name</th>
        <th>Address</th>
        <th>Phone</th>
        <th>Mobile</th>
        <th>Email</th>
        <th>Owner</th>
        <th>click to update</th>
    </tr>";
       while (mysqli_stmt_fetch($stmt)) {  //insert table data
           echo " <tr>
        <td>".$id."</td>
        <td>".$name."</td>
        <td>".$address."</td>
        <td>".$phone."</td>
        <td>".$mobile."</td>
        <td>".$email."</td>";
       
       
  
  $query2="SELECT user_name FROM users WHERE user_id=?"; 
    if( $stmt2 = mysqli_prepare($con2,$query2)){
    mysqli_stmt_bind_param($stmt2,'i',$Owner_UserID);
    mysqli_stmt_execute($stmt2);
      mysqli_stmt_bind_result($stmt2,$Owner_name);
     
    mysqli_stmt_fetch($stmt2);
      echo "<td>".$Owner_name."</td>"; 
     mysqli_stmt_close($stmt2);
   } //end table generator 

  echo "<td>";
         if ($Owner_UserID == $_SESSION['user_id']) echo "<button onclick=\"editFunction('".$id."')\" class='btn-sm btn-primary'>edit </button>    <button onclick=\"myFunction('".$id."')\" class='btn-sm btn-danger'>Delete</button></td>";
         echo "</tr>";
       } //end while row 
       echo "</table> </div></div> "; // end table and div>
     mysqli_stmt_close($stmt);
   } //end table generator 

 mysqli_close($con);
  mysqli_close($con2);
}}
 ?>
    <br> 
   <a href='views/addContact.php' class="btn btn-info" role="button">Add a new Contact</a>   <!--add a button commit changes -->
    <script>
        
function myFunction(x) {
    if (confirm("Are you sure you want to delete this Contact?") == true) {
       location.href="views/deleteContact.php?id="+x;
    } else {
       
    }
  
}
        
function editFunction(x){
    location.href="views/touchContact.php?id="+x;
}
</script>

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<!-- because people were asking: "index.php?logout" is just my simplified form of "index.php?logout=true" -->

  </div>  <!--end container div-->

</body>
</html>

