<?php
include_once "db.php";

$_POST['likes']=0;
$_POST['sh']=1;
$News->save($_POST);
to("../admin.php?do=add_news");