<!DOCTYPE html>
<html>
  <?php
session_start();
?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<head>
  <meta charset="utf-8" />
  <title>Add contact</title>
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
  <form name="Add contact" method="post" action="writeContact.php">
  <div class='jumbotron'>
    <h3>Add Contact</h1>
    <div class='table-responsive  table-striped'>
     <table class='table'>
      <tr>
        <td>
          <label for="name">Name</label>
        </td>
        <td>
          <input id="name" type="text" name="name" size="30" maxlength="50" tabindex="1" /> </td>
      </tr>
      <tr>
        <td>
          <label for="address">Address</label>
        </td>
        <td>
          <textarea id="address" name="address" cols="45" rows="5" tabindex="2"></textarea>
        </td>
      </tr>
      <tr>
        <td>
          <label for="phone">Phone</label>
        </td>
        <td>
          <input id="phone" type="text" name="phone" size="20" maxlength="20" tabindex="3" /> </td>
      </tr>
      <tr>
        <td>
          <label for="mobile">Mobile</label>
        </td>
        <td>
          <input id="mobile" type="text" name="mobile" size="20" maxlength="20" tabindex="4"> </td>
      </tr>
      <tr>
        <td>
          <label for="email">Email</label>
        </td>
        <td>
          <input id="email" type="email" name="email" size="50" maxlenght="50" tabindex="5"> </td>
      </tr>
      <tr>
        <td colspan="2">
          <input type="submit" name="submit" value="submit" tabindex="6" class="btn btn-info" role="button"> </td>
      </tr>
    </table>
  </form>
</body>

</html>