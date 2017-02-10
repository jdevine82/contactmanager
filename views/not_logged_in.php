<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

  <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          
          <a class="navbar-brand" href="#">Contact Manager</a>
        </div>
       <p class='navbar-text pull-right nav'>You are not logged in.</p>
        <ul class="nav pull-right">
            
            
          </ul>
         
      </div>
    </nav>
 
 <div class='container' style='padding-top:100px;'>
   


<?php
// show potential errors / feedback (from login object)
if (isset($login)) {
    if ($login->errors) {
        foreach ($login->errors as $error) {
            echo $error;
        }
    }
    if ($login->messages) {
        foreach ($login->messages as $message) {
            echo "<p style='color:orange'>".$message."</p> <br>";
        }
    }
}
?>

  <!-- login form box -->
  <form method="post" action="index.php" name="loginform" class="form-inline">
<div class="form-group">
    <label for="login_input_username">Username</label>
    <input id="login_input_username" class="login_input" type="text" name="user_name" required />
    </div>
    <div class="form-group">
    <label for="login_input_password">Password</label>
    <input id="login_input_password" class="login_input" type="password" name="user_password" autocomplete="off" required />
    </div>
    <div class="form-group">
    <input type="submit" name="login" value="Log in" class="btn btn-info" role="button" />
    </div>
  </form>

  <a href="/views/register.php">Register new account</a>