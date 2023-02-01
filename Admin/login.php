<?php
session_start();

    include 'include/header.php';
    include '../db/config.php';
    ?>
<?php

if(isset($_POST['loginBtn']))
{
    if($_POST['email']!='' || $_POST['password']){
        
        $email=trim(mysqli_real_escape_string($conn,$_POST['email']));
    $password=trim(mysqli_real_escape_string($conn,$_POST['password']));
    $query="select * from admin_user where email='$email'";
    $run_query=mysqli_query($conn,$query);
    if(mysqli_num_rows($run_query)==1)
    {
              $data=mysqli_fetch_assoc($run_query);
            //   print_r($data);
            $db_pass=$data['password'];
            if(password_verify($password,$db_pass))
            {
                  
                    $_SESSION['admin_user']=$email;
                    header('location:index');
                
            }
            else{
        $_SESSION['login_msg']="Invalid Credental";
            }
    }
    else{
        // echo "not present";
        $_SESSION['login_msg']="You not ragistered";

    }

    }
    else{

    }
}

?>

<style>
    .img-bg {
        background-image: url('https://images.unsplash.com/photo-1557401622-cfc0aa5d146c?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1171&q=80');
        background-size: cover;
        filter: hue-rotate(1)
    }
</style>

<body class="bg-gradient-primary my-5" style="background: #0c0849;">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block img-bg"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Admin</h1>
                                    </div>
                                    <div class="mb-1" style="height:50px;">
                                    <?php
                                    if(isset($_SESSION['login_msg']) && $_SESSION['login_msg']!='' )
                                    {
                                        ?>
                                        <div class="alert alert-primary" role="alert">
  <?= $_SESSION['login_msg'] ?>
</div>
                                        <?php
                                        unset($_SESSION['login_msg']);
                                    }

                                    ?>

                                    </div>
                                    <form method="post" class="user">
                                        <div class="form-group">
                                 <input type="email" name="email" 
                               
                                 class="form-control"
                                                placeholder="Enter Email Address...">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control " 
                                           

                                            name="password" placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                           
                                        </div>
                                        <button  name="loginBtn" class="btn btn-primary  btn-block">Login</button>
                                       
                                       
                                        <a href="/" class="btn btn-danger  btn-block">&#8592; Home</a>

                                    </form>
                                    <hr>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>