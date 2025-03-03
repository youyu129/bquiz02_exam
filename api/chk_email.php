<?php
include_once "db.php";
$email=$_GET['email'];
$chk=$User->count(['email'=>$email]);
$user=$User->find(['email'=>$email]);
if($chk>0){
    echo "您的密碼為".$user['pw'];
} else {
    echo "查無此資料";
}