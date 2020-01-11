<?php

ob_start();

if (isset($_POST["check_email"])) {
    include_once '../model/manage_user.php';
     $email = $_POST["email"];
     $email = strip_tags($email);
    $init = new manage_user();
    $email_check = $init->check_field("email", $email);
     $email_check;
    if ($email_check > 0) {
        return '<font color="red">Already exist</div>';
    } else {
        return '<font color="green">Valid email</div>';
    }
    exit();
}
if (isset($_POST["login"])) {
    date_default_timezone_set("Africa/Cairo");
    include './model/manage_user.php';
    $manage = new manage_user();
    $user = $_POST["login_user"];
    $pass = md5($_POST["login_pass"]);
    if (empty($user) || empty($user)) {
        $error = "All Fields are required";
    }

    $login = $manage->login($user, $pass);
    if ($login > 0) {

        if (isset($_POST["remember"]) && $_POST["remember"] == "re") {
            $_SESSION["todo_username"] = $user;
            
            setcookie("todo_username", $user, time() + 720000);
           echo("<script>location.href = '".$_SERVER["PHP_SELF"]."';</script>");
        } else {
            $_SESSION["user"] = $user_info["username"];
        }
    } else {
        echo $login;
        $error = "The user name or passowrd is incorrect";
    }
}


if (isset($_FILES["photo"])) {
    include '../model/manage_user.php';
    $manage = new manage_user();
    $reg["username"] = $_POST["reg_user"];
    $reg["password"] = md5($_POST["reg_pass"]);
    $repass = md5($_POST["repass"]);
    $reg["email"] = $_POST["reg_email"];
    $reg["time"] = date("H:i:s");
    $reg["date"] = date("Y-m-d");
    $reg["ip"] = $_SERVER["REMOTE_ADDR"];
    if (empty($reg["username"]) || empty($reg["password"]) || empty($repass) || empty($reg["email"])) {

        $error = "All fields required";
    } elseif (($reg["password"]) != $repass) {
        $error = "The password doesn't match";
    } elseif (!(filter_var($reg["email"], FILTER_VALIDATE_EMAIL))) {
        $error = "Please write valid email";
    } else {
        $check = $manage->user_check($reg["username"]);
        if ($check == 0) {
            $register = $manage->register($reg);
            if ($register == 1) {
                $success = "You are successfully registred " . $reg["username"];
                $_SESSION["todo_username"] = $reg["username"];
                setcookie("todo_username", $reg["username"], time() + 720000);
                 header("location:".$_SERVER["PHP_SELF"]);
            }
        } else {
            $error = "The username already exist";
        }
    }
}
else {
    include './view/login.php';
    ob_end_flush();
}
?>