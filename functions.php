<?php
function logged_in(){
    if(isset($_SESSION["todo_username"])){
        return TRUE;
    }
    else{
        return FALSE;
    }
}
?>
