<?php 
include_once 'model/manage_todo.php';

$action = new manage_todo();

if (isset($_POST['add_category'])) {

    include_once './model/db_connect.php';
//$connect = new db_connect();
//$con = $connect->connect();
// $title= strip_tags($_POST['title']);
// $title=mysqli_real_escape_string($con,$_POST['title']);
//$desc=strip_tags($_POST['desc']);
//$desc= mysqli_real_escape_string($con,$_POST['desc']);

    
    /* `id`, `username`, `title`, `desc`, `start_date`, `end_date`, `createddate`, `status`, `progress`
      ) */
    $todo['name'] = htmlentities($_POST['name']);
    $todo['username'] = "amr";
    print_r($todo);
    die();
    if (empty($todo['name']) ) {
        $error = "All fields required";
    }

    echo"<br>";

     $data = $action->create_todo("category", $todo);
     if($data>0){
         echo("<script>location.href = '".$_SERVER["PHP_SELF"]."';</script>");
     }
}else{
    include_once './view/add_new_category.php';
}
?>