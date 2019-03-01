<?php
    include_once "dbConnect.php";
    $query =" DELETE FROM tbl_student WHERE stu_id=".$_GET['id'];
    $value= mysqli_query($conn, $query);
    if($value){
        header('location: index.php');
    }else{
        echo 'cannot delete';
    }
?>