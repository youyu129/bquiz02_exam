<?php
include_once "db.php";

$chk=$User->count($_POST);
if($chk){
    echo 1;
    $_SESSION['login']=$_POST['acc'];
} else {
    echo 0;
}