<?php

    session_start();
    if(isset($_POST['logoutBtn']))
   {
    $name="krisjna";
     setcookie('aesafdv',$name,time()+86400);
       session_destroy();
       session_unset();
       header('location:../login');
    // echo "success";
//     echo '<script>
//     alert("yes");
// </script>';
}

?>
