<?php
session_start();
if(!$_SESSION['admin_user'])
{
    // $_SESSION['login_msg']="pls login";
    header('location:login');
}


?>