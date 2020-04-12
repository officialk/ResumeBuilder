<?php
    if(isset($_POST['login'])){
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        /*
            CHANGE THESES BEFORE UPLOADING TO YOUR SERVER
        */
        if($user=="officialk" && $pass=="officialk"){
            session_start();
            $_SESSION['user']=$user;
            header("Location: admin/?user=$user");
        }
        else{
            $_SESSION['user']="";
            header("Location:./");
        }
    }
    elseif(isset($_REQUEST['update'])){
        $myfile = fopen("data.json", "w") or die("Unable to open file!");
        fwrite($myfile,str_replace(array(">>","<<"),array("&","?"),$_REQUEST["data"]));
        fclose($myfile);
        echo "done";
    }
    else{
        header("Location:./");
    }
?>
