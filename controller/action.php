<?php

if (!empty($error)) {
    echo' <div class="alert alert-warning">' . $error . 'register  </div> ';
}
if (!empty($success)) {
    echo '<div class="alert alert-success">' . $success . '</div>';
}
?>
<?php

include_once 'model/manage_todo.php';

$action = new manage_todo();
//`id`, `username`, `title`, `desc`, `duration`, `created_date`, `status`

if (isset($_POST['add'])) {

    include_once './model/db_connect.php';
//$connect = new db_connect();
//$con = $connect->connect();
// $title= strip_tags($_POST['title']);
// $title=mysqli_real_escape_string($con,$_POST['title']);
//$desc=strip_tags($_POST['desc']);
//$desc= mysqli_real_escape_string($con,$_POST['desc']);

    
    /* `id`, `username`, `title`, `desc`, `start_date`, `end_date`, `createddate`, `status`, `progress`
      ) */

    $todo['username'] = strip_tags($_SESSION['todo_username']);
    $todo['title'] = strip_tags($_POST['title']);
    $todo['desc'] = strip_tags( addslashes(str_replace("\n","<br>",$_POST['desc'])));
    $todo['start_date'] = strip_tags($_POST['start_date']);
    $todo['end_date'] = strip_tags($_POST['end_date']);
    $todo['createddate'] = date('Y-m-d');
    $todo['status'] = strip_tags($_POST["status"]);
    $today = strtotime("now");
    $start = strtotime( $todo['start_date']);
    $end = strtotime( $todo['end_date']);

    $hours = $end - $start;
    $hours = $hours / 3600;
     $time_remained = $hours / 24;
   $todo['progress'] = (int)round($time_remained);
    

    if (empty($todo['title']) || empty($todo['desc']) || empty($todo['start_date'])) {
        $error = "All fields required";
    }

    echo"<br>";

     $data = $action->create_todo("manage", $todo);
     if($data>0){
         echo("<script>location.href = '".$_SERVER["PHP_SELF"]."';</script>");
     }
}
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
    $todo['name'] = strip_tags($_POST['name']);
    $todo['username'] = "amr";
    if (empty($todo['name']) ) {
        $error = "All fields required";
    }

    echo"<br>";

     $data = $action->create_todo("category", $todo);
     if($data>0){
         echo("<script>location.href = '".$_SERVER["PHP_SELF"]."';</script>");
     }
}

elseif (isset($_GET["page"]) && $_GET["action"] == "delete") {
    $id = $_GET["id"];
    $delete = $action->delete_todo($id);
    if ($delete > 0) {
        $success = "the todo has been successfully deleted";
        echo("<script>location.href = '".$_SERVER["PHP_SELF"]."';</script>");
    }
} elseif (isset($_GET["page"]) && $_GET["action"] == "edit") {
    include_once './view/edit.php';
} elseif (isset($_POST["update"])) {
    $id = $_POST['id'];
    $todo['title'] = strip_tags($_POST['title']);
    $todo['desc'] = strip_tags($_POST['desc']);
    $todo['start_date'] = strip_tags($_POST['start_date']);
    $todo['end_date'] = strip_tags($_POST['end_date']);
    $todo['createddate'] = date('Y-m-d');
    $todo['status'] = strip_tags($_POST["status"]);
    $edit = $action->edit_todo($todo, $id);
    echo $edit;
} else {
    include_once './view/add_new.php';
}
?>
