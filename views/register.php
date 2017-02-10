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
// show potential errors / feedback (from registration object)
if (isset($registration)) {
    if ($registration->errors) {
        foreach ($registration->errors as $error) {
            echo "<p style='color:red'>".$error."</p> <br>";
        }
    }
    if ($registration->messages) {
        foreach ($registration->messages as $message) {
            echo "<p style='color:orange'>".$message."</p> <br>";
        }
    }
}
?>

<!-- register form -->
<form method="post" action="../register.php" name="registerform" class="form-horizontal" style="width:50%">
 <div class="form-group">
    <!-- the user name input field uses a HTML5 pattern check -->
    <label class="control-label " for="login_input_username">Username (only letters and numbers, 2 to 64 characters)</label>
    <input id="login_input_username" class="form-control" type="text" pattern="[a-zA-Z0-9]{2,64}" name="user_name" required />
  </div>
  
  <div class="form-group">
    <!-- the email input field uses a HTML5 email type check -->
    <label class="control-label " for="login_input_email">User's email</label>
    <input id="login_input_email" class="form-control" type="email" name="user_email" required />
  </div>
  
  <div class="form-group">
    <label class="control-label" for="login_input_password_new">Password (min. 6 characters)</label>
    <input id="login_input_password_new" class="form-control" type="password" name="user_password_new" pattern=".{6,}" required autocomplete="off" />
  </div>
  
  <div class="form-group">
    <label for="login_input_password_repeat">Repeat password</label>
    <input id="login_input_password_repeat" class="form-control" type="password" name="user_password_repeat" pattern=".{6,}" required autocomplete="off" />
     </div>
    <div class="form-group">
    <input type="submit"  name="register" value="Register" class="btn btn-primary"/>
  </div>
  
</form>

<!-- backlink -->
<a href="../index.php">Back to Login Page</a>
   
   </div>  <!-- end container>