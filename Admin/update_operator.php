<?php
ob_start();
session_start();
include 'include/header.php';
include 'include/sidebar.php';
include 'include/Navbar.php';
include '../db/config.php';

?>
<?php

    if(isset($_REQUEST['id']))
    {
            $id=$_REQUEST['id'];
            $query="select * from operator_user where id='$id'";
            $result=mysqli_query($conn,$query);
            if(mysqli_num_rows($result)==1)
            {
                $data=mysqli_fetch_assoc($result);
            }
            else{

                header('location:Operator_view');
            }
    }
    else{
        header('location:Operator_view');
    }



?>

<?php
    if(isset($_POST['updateBtn']))
    {
        if($_POST['name']=='' || $_POST['email']=='' || $_POST['password']=='' || $_POST['cpassword']=='')
    {
        $_SESSION['u_msg']="Fill All Details";
    }
    else{
        $name=trim(mysqli_real_escape_string($conn,$_POST['name']));
        $email=trim(mysqli_real_escape_string($conn,$_POST['email']));
        $password=trim(mysqli_real_escape_string($conn,$_POST['password']));
        $cpassword=trim(mysqli_real_escape_string($conn,$_POST['cpassword']));
        $id=trim(mysqli_real_escape_string($conn,$data['id']));
        
       if($password == $cpassword)
       {
            $pass_hash=password_hash($password,PASSWORD_BCRYPT);
            $query="update operator_user set email='$email',name='$name',password='$pass_hash' where id='$id'  ";
            $run_query=mysqli_query($conn,$query);
            if($run_query)
            {
        $_SESSION['_msg']="Update SuccessFull";
                header('location:Operator_view');

            }
            else{
                $_SESSION['_msg']="Technical issue";
                header('location:Operator_view');

            }
       }
       else{
        $_SESSION['u_msg']="Password and confirm password are not match";
       }
    }
    }

?>


<h1 class="text-center">Update Operator</h1>

<div class="container d-flex justify-content-center">
    <div class="col-lg-8">
    
    <div style="height:50px;">
<?php
        if(isset($_SESSION['u_msg']) && $_SESSION['u_msg']!='')
        {
            ?>
            <div class="alert alert-primary" role="alert">
                <?= $_SESSION['u_msg'] ?>
        </div>
            <?php
            unset($_SESSION['u_msg']);
        }

?>
</div>

    
        <form action="" method="post">
        <div class="form-floating mb-3">
                <label>Operator Id</label>
                <input type="text" class="form-control" value="<?php
                if(isset($data['emp_id']))
                {
                    echo $data['emp_id'];
                }
                
                ?>" disabled id="">
            </div>
            <div class="form-floating mb-3">
                <label>Name</label>
                <input type="text" class="form-control" value="<?php
                if(isset($data['name']))
                {
                    echo $data['name'];
                }
                
                ?>"  name="name" id="">
            </div>
            <div class="form-floating mb-3">
                <label>Email</label>
                <input type="email" class="form-control" value="<?php
                if(isset($data['email']))
                {
                    echo $data['email'];
                }
                
                ?>" name="email" id="">
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
               <button class="btn btn-block btn-primary" name="updateBtn">Update</button>
            </div>
        </form>
    </div>
</div>



<?php

include 'include/Footer.php';

?>