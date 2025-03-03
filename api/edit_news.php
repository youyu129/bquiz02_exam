<?php
include_once "db.php";
dd($_POST['ids']);
if(isset($_POST['ids'])){
    foreach($_POST['ids'] as $id){
        if(isset($_POST['dels']) && in_array($id,$_POST['dels'])){
            $News->del($id);
        }else{
            $row=$News->find($id);
            $row['sh']=(isset($_POST['sh']) && in_array($id,$_POST['sh']))?1:0;
            $News->save($row);
        }
    }
}