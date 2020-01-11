 <?php if(!empty($error)){
        echo' <div class="alert alert-warning">'.$error.' </div> ';
        }
        if(!empty($success)){
            echo '<div class="alert alert-success">'.$success.'</div>';
        }
        
?>
<form class="form login" method="POST" action="?page=login">
    <h3>Login</h3>
  <div class="form-group">
    <label for="exampleInputEmail1">User name</label>
    <input type="text" name="login_user" class="form-control" id="login_user-login" placeholder="Enter username">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="login_pass"class="form-control" id="login_pass" placeholder="Password">
  </div>
 
  <div class="checkbox">
      <label for="remember">
      <input type="checkbox" id="remember" name="remember" value="re"> Remember Me!
    </label>
  </div>
    
  <button type="submit" name="login" class="btn btn-default">Sign In</button>
   <button type="submit" class="btn btn-defaul right" id="Register">Register for free!</button>
</form>
    

<form class="form register" name="register" enctype="multipart/form-data" id="register" method="post" action="./controller/login.php">    
    <h3>Register</h3>
  <div class="form-group">
    <label for="exampleInputEmail1">User Name</label>
    <input type="text" class="form-control" name="reg_user"id="reg_user" placeholder="Enter email">
  </div>
    <div class="form-group">
        <label for="reg_email">Email <div id="email_check"></div> </label>
    <input type="text" class="form-control" name="reg_email" id="reg_email" placeholder="Password">
  </div>
  <div class="form-group">
    <label >Password</label>
    <input type="password" class="form-control" name="reg_pass" id="reg_pass" placeholder="Password">
  </div>
   <div class="form-group">
    <label >Password</label>
    <input type="password" class="form-control" name="repass"id="repass" placeholder="Password">
  </div>
    <div class="form-group">
    <label >Upload your smiley face ;)</label>
    <input type="file" class="form-control" name="photo" id="photo" >
  </div>
   
    
   <input type="submit" id="signup" name="signup"  value="Sign up" class="btn btn-default" onclick="return false;">
   <button type="submit" class="btn btn-defaul right" id="login">Already User</button>
</form>

