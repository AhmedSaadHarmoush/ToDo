
<table class="table table-striped srch">
       <thead>
            <tr>
                <th>Title</th>
                <th>Snippet</th>
                <th>Start from</th>
                <th>Duration</th>
                <th>Progress</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

<?php 
function expire($value){
    return '<font color="red">'.$value.'</font>';
}
function day_remaining($end, $start,$title) {
    if ($end > $start) {
        $hours = $end - $start;
        $hours = $hours / 3600;
        $time_remained = $hours / 24;
        if ($time_remained < 1) {
           $time_remained = "Less than one day Remain!";
        } elseif ($time_remained < 2) {
             $time_remained = "Less than two days Remain!";
        }
     else {
        $time_remained = round($time_remained)." ". $title;
    }
}else{
$time_remained=expire($title);    
}

    return $time_remained;
}
    
function container($list){?>
 
      
        
            <?php
            if ($list !== 0) {
                //`id`, `username`, `title`, `desc`, `start_date`, `end_date`, `createddate`, `status`, `progress`
                
                for ($i = 0; $i < count($list); $i++) {
                    $id=$list[$i]['id'];
                    echo "<div id='del' user='".$id."' style='display:none;'>".$id."</div>";
                    
                    $today = strtotime("now");
    /*$start = strtotime( $todo['start_date']);
    $end = strtotime( $todo['end_date']);

    $hours = $end - $start;
    $hours = $hours / 3600;
     $time_remained = $hours / 24;*/
                    $start =  strtotime( $list[$i]['start_date']);
                    $end =  strtotime( $list[$i]['end_date']);
                    if ($end > $start) 
                        {
                        $desc_valid=$list[$i]['desc'];
                        $hours = $end - $start;
                        $hours = $hours / 3600;
                        $time_remained = $hours / 24;
                        if ($time_remained < 1) {
                            $time_remained = "Less than one day ";
                        } elseif ($time_remained<2){
                            $time_remained="Less than two days";
                            
                        }else{
                             $time_remained=  round( $time_remained);
                        }
                    }
                    else{
                        $time_remained=expire("Expired");
                        $desc_valid="<del>".$list[$i]['desc']."</del>";
                    }
                   if($start>$today){
                        $remain=day_remaining($start, $today,"days remain");
                   }else{
                        $remain=day_remaining($start, $today,"Already started");
                   }
                   
                    ?>
                    <tr>
                       <?php echo "
                        <td user='". $list[$i]['title']."' > ". $list[$i]['title']." </td>
                        <td user='". $list[$i]['desc']."'>". $desc_valid ."</td>
                        <td user='". $list[$i]['start_date']."'> ".$remain." </td>
                        <td user='$time_remained'>" . $time_remained." </td>
                        <td><div class=progress progress-striped'>
                        <div user='". $list[$i]['progress']."' class='progress-bar progress-bar-success' role='progressbar' style='width:".$list[$i]['progress']."'%>
                            "; ?>       
                          </div>
                            </div>
                        </td>
                        <td><a class="delete" href="?page=action&action=delete&id=<?php echo $id?>" > <img src="./img/delete.png"></a>|
                            <a href="?page=action&action=edit&id=<?php echo $id?>"><img src="./img/update.png"/> </a></td>
                    </tr>
    <?php
    }
} else {
    echo"<tr> <td colspan=5 align='center'>Join us now and schedule Your time table</td> </tr>";
}
?>
        
    
<?php } ?>



<?php

 @$user= $_SESSION["todo_username"];
if(isset($_GET["status"]) OR isset($_POST["search"])){
     $search = $_POST["search"];
    if(isset($_POST["search"])){
        date_default_timezone_set("Africa/Cairo"); 
include_once '../model/manage_todo.php';        
    }else
include_once './model/manage_todo.php';
$init = new manage_todo();
    $status=$_GET["status"];
   $list = $init->listed_todo($user,$status,$search);
}else{
    include_once './model/manage_todo.php';  
    $init = new manage_todo();
$list = $init->listed_todo($user);
}
echo container($list);?>
                    </tbody>
</table>

