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
            header("Location: index.html");
        }
    }
    elseif(isset($_REQUEST['update'])){
        $myfile = fopen("data.json", "w") or die("Unable to open file!");
        fwrite($myfile,$_REQUEST["data"]);
        fclose($myfile);
        echo "done";
    }
?>
