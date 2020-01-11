<?php
include_once './functions.php';
?>

<ul class="nav nav-tabs">
  <li class="active"><a href="<?php echo $_SERVER["PHP_SELF"]?>">Home</a></li>
  <?php if(logged_in()==TRUE){?>
  <li><a href="?page=profile">Profile</a></li>
  <li><a href="?page=logout">Log out</a></li>
  <li><input type="text" name="" id="search" ></li>
  <li class="right"><a href="?page=action">+ Add new <?php echo $_SESSION["todo_username"];?></a></li>
  <?php }else { ?>
  <li class="right"><a href="?page=categ">+ Add new </a></li>    
  <li><a href="?page=login">Join Us!</a></li>
  
  <li><a href="?page=login">Enter Your todo profile</a></li>
 <?php } ?>  
</ul>
      