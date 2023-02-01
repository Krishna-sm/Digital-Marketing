<?php
ob_start();
session_start();
include 'include/header.php';
include 'include/sidebar.php';
include 'include/Navbar.php';
include '../db/config.php';

?>

<?php

if(isset($_POST['ragisterBtn']))
{
    if($_POST['name']=='' || $_POST['email']=='' || $_POST['password']=='' || $_POST['cpassword']=='')
    {
        $_SESSION['msg']="Fill All Details";
    }
    else{
        
    $name=trim(mysqli_real_escape_string($conn,$_POST['name']));
    $email=trim(mysqli_real_escape_string($conn,$_POST['email']));
    $password=trim(mysqli_real_escape_string($conn,$_POST['password']));
    $cpassword=trim(mysqli_real_escape_string($conn,$_POST['cpassword']));
    if($password==$cpassword)
    {
            $query="select * from admin_user where email='$email'";
            $run_query=mysqli_query($conn,$query);
            if(mysqli_num_rows($run_query)>0)
            {
                $_SESSION['msg']="Already Ragistered";
            }
            else{
               $pass_hash=password_hash($password,PASSWORD_BCRYPT);
               $query="insert into admin_user(name,email,password) values('$name','$email','$pass_hash') ";
               $query_run=mysqli_query($conn,$query);
               if($query_run)
               {
            $_SESSION['msg']="Admin Ragistered Successfully";
               }
               else{
            $_SESSION['msg']="Server issue";
               }

            }

    }
    else{
            $_SESSION['msg']="Password and Confirm password can not match";
    }
    }
    
}

?>

<h1 class="text-center">Add Admin</h1>

<div class="container d-flex justify-content-center">
    <div class="col-lg-8">
    
    <div style="height:50px;">
<?php
        if(isset($_SESSION['msg']) && $_SESSION['msg']!='')
        {
            ?>
            <div class="alert alert-primary" role="alert">
                <?= $_SESSION['msg'] ?>
        </div>
            <?php
            unset($_SESSION['msg']);
        }

?>
</div>

    
        <form action="" method="post">
            <div class="form-floating mb-3">
                <label>Name</label>
                <input type="text" class="form-control" name="name" id="">
            </div>
            <div class="form-floating mb-3">
                <label>Email</label>
                <input type="email" class="form-control" name="email" id="">
            </div>
            <div class="form-floating mb-3">
                <label>Password</label>
                <input type="password" class="form-control" name="password" id="">
            </div>
            <div class="form-floating mb-3">
                <label>Confirm Password</label>
                <input type="password" class="form-control" name="cpassword" id="">
            </div>
            <div class="mb-3 m-auto">
               <button class="btn btn-block btn-secondary" name="ragisterBtn">Ragister</button>
            </div>
        </form>
    </div>
</div>



<?php

include 'include/Footer.php';

?>