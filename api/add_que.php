<?php
include_once "db.php";

$Que->save(['text'=>$_POST['subject'],'main_id'=>0,'vote'=>0]);
$subject=$Que->find(['text'=>$_POST['subject']]);


foreach($_POST['option'] as $option){
    $Que->save(['text'=>$option,'main_id'=>$subject['id'],'vote'=>0]);
}

to("../admin.php?do=que");