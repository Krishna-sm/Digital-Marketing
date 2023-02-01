<?php
ob_start();
session_start();
include 'include/header.php';
include 'include/sidebar.php';
include 'include/Navbar.php';
include '../db/config.php';

?>

<?php

if(isset($_POST['ragisterOpBtn']))
{
    if($_POST['name']=='' || $_POST['email']=='' || $_POST['password']=='' || $_POST['cpassword']=='')
    {
        $_SESSION['o_msg']="All feild are Manadary";
    }
    else{
    $name=trim(mysqli_real_escape_string($conn,$_POST['name']));
    $email=trim(mysqli_real_escape_string($conn,$_POST['email']));
    $password=trim(mysqli_real_escape_string($conn,$_POST['password']));
    $cpassword=trim(mysqli_real_escape_string($conn,$_POST['cpassword']));

    $query="select * from operator_user where email='$email'";
    $chk_query=mysqli_query($conn,$query);
    if(mysqli_num_rows($chk_query)>0)
    {
        $_SESSION['o_msg']="Already registered";
    }
    else{
       if($password == $cpassword)
       {
            $pass_hash=password_hash($password,PASSWORD_BCRYPT);
            $query="insert into operator_user(name,email,password) values('$name','$email','$pass_hash') ";
            if(mysqli_query($conn,$query))
            {
                $ld=mysqli_insert_id($conn);
                $emp_id="GARUD".rand(0000,9999)."".$ld;
                $query="update operator_user set emp_id='$emp_id' where id='$ld'";
                $res=mysqli_query($conn,$query);
                if($res)
                {
        $_SESSION['o_msg']="Ragistration SuccessFUll";
                }
                else{
        $_SESSION['o_msg']="Technical Issue";
                }


            }
            else{
        $_SESSION['o_msg']="ragistered Successfully";
            }
       }
       else{
        $_SESSION['o_msg']="Password and confirm password are not match";
       }

    }
    }
}

// if(isset($_POST['ragisterBtn']))
// {
//     if($_POST['name']=='' || $_POST['email']=='' || $_POST['password']=='' || $_POST['cpassword']=='')
//     {
//         $_SESSION['msg']="Fill All Details";
//     }
//     else{
        
//     $name=trim(mysqli_real_escape_string($conn,$_POST['name']));
//     $email=trim(mysqli_real_escape_string($conn,$_POST['email']));
//     $password=trim(mysqli_real_escape_string($conn,$_POST['password']));
//     $cpassword=trim(mysqli_real_escape_string($conn,$_POST['cpassword']));
//     if($password==$cpassword)
//     {
//             $query="select * from admin_user where email='$email'";
//             $run_query=mysqli_query($conn,$query);
//             if(mysqli_num_rows($run_query)>0)
//             {
//                 $_SESSION['msg']="Already Ragistered";
//             }
//             else{
//                $pass_hash=password_hash($password,PASSWORD_BCRYPT);
//                $query="insert into admin_user(name,email,password) values('$name','$email','$pass_hash') ";
//                $query_run=mysqli_query($conn,$query);
//                if($query_run)
//                {
//             $_SESSION['msg']="Admin Ragistered Successfully";
//                }
//                else{
//             $_SESSION['msg']="Server issue";
//                }

//             }

//     }
//     else{
//             $_SESSION['msg']="Password and Confirm password can not match";
//     }
//     }
    
// }

?>

<h1 class="text-center">Add Operator</h1>

<div class="container d-flex justify-content-center">
    <div class="col-lg-8">
    
    <div style="height:50px;">
<?php
        if(isset($_SESSION['o_msg']) && $_SESSION['o_msg']!='')
        {
            ?>
            <div class="alert alert-primary" role="alert">
                <?= $_SESSION['o_msg'] ?>
        </div>
            <?php
            unset($_SESSION['o_msg']);
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
               <button class="btn btn-block btn-secondary" name="ragisterOpBtn">Ragister</button>
            </div>
        </form>
    </div>
</div>



<?php

include 'include/Footer.php';

?>