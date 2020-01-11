<?php date_default_timezone_set("Africa/Cairo"); 
session_start();?>
<head>
    <?php  echo '<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />';?>
    <script type="text/javascript" src="js/jquery-1.11.0.js"></script>
    <script type="text/javascript" src="js/jquery-ui-1.10.4.custom.js"></script>
    
    <script>
  $(function() {
    $( "#duration" ).datepicker({dateFormat:'yy-mm-dd'});
  });
   $(function() {
    $( "#durations" ).datepicker({dateFormat:'yy-mm-dd'});
  });
  </script>
    <script type="text/javascript" src="js/main.js"></script>
    <link href="css/bootstrap.css" type="text/css" rel="stylesheet">
    <link href="css/style.css" type="text/css"rel="stylesheet">
    <link href="css/jquery-ui-1.10.4.custom.css" type="text/css"rel="stylesheet">
    <script type="text/javascript" src="js/signup.js"></script>
</head>
<div class="main-wrapper">
<?php ob_start(); include_once 'view/header.php'; ?>  
<?php include_once 'view/side.php';?>   
    <?php
    
     if (isset($_GET['page']))
    {
        $url="controller/".$_GET['page'].".php";
        if (is_file($url))
        { 
            if($url=="controller/list.php"){
                echo '<div class="main-body">';
        include_once 'view/main_body.php';
        echo '</div> '; 
            }else{
            include   $url;
            }
        }
        else{
            echo "<h3>Requested file not found</h3>";
        }
    }else{
        echo '<div class="main-body">';
        include_once 'view/main_body.php';
        echo '</div> ';
    }
    if(!empty($success)){
            echo '<div class="alert alert-success">'.$success.'</div>';
        }
       ob_end_flush();; ?>

</div><!-- End main wrapper -->  
   

