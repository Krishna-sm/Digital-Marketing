<?php
session_start();
include '../../db/config.php';

if(isset($_POST['dltBtn']))
{
        $id=trim(mysqli_real_escape_string($conn,$_POST['dlt']));
        $query="delete from operator_user where id='$id'";
        if(mysqli_query($conn,$query))
        {
            $_SESSION['_msg']="Admin Deleted";
            header('location:../Operator_view');
        }
        else{

            $_SESSION['_msg']="Technical Issue";
            header('location:../Operator_view');
        }
}
else{
    header('location:index');
}



?>