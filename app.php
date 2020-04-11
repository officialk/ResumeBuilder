<?php
    if(isset($_POST['login'])){
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        if($user=="officialk" && $pass=="officialk"){
            session_start();
            $_SESSION['user']=$user;
            header("Location: admin/?user=$user");
        }
        else{
            header("Location: index.html");
        }
    }
    elseif(isset($_REQUEST['update'])){
        echo $_REQUEST['data'];
    }
?>
