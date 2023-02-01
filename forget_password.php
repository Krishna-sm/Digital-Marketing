<?php
session_start();
    include 'inc/header.php';
    include 'inc/nav.php';
?>

<style>
     body
    {
        /* background-color:#153959;
        background-color:#e6e8eb; */
        background-color:#3aafa9;
        /* background-color:#1e5c8b; */
        /* background-color:#1e3161; */
        /* background-color:#1b3c8f; */

       
    }
     .bg-5
    {
        background-image:url(img/bg-5.png);
        background-repeat: no-repeat;
    background-position: center;
    /* font-family: 'DynaPuff', cursive; */
    }
</style>
<div class="container p-5">
    <!-- <h1 class="h3 mb-3 font-weight-normal text-center">Enter Correct Details</h1> -->
<form action="function/ForgetPassword" class="form-signin col-md-4 mx-auto bg-white shadow p-5" id='forget' method="post">
<div class="alert alert-secondary" role="alert">
  A simple secondary alert—check it out!
</div>

<?php
                if(isset($_SESSION['for_msg']) && $_SESSION['for_msg']!=' ')
                {
                   echo  '<div class="alert alert-primary" role="alert">
                   '.$_SESSION['for_msg'].'
                 </div>';
                    // echo '<div class="alert alert-secondary" role="alert">'.$_SESSION['for_msg'].'</div>';
                    unset($_SESSION['for_msg']);
                }
                ?>
                <!-- <a href="https://crsorgi-gov.tech/web/index.php/auth/updatePass.php?email='.$email.'&reset_token='.$reset_token.'">Click here  </a> to Change your password. -->
      <div class="form-group mb-3">
      <label for="inputEmail" class="">Email address</label>
      <input type="email" id="inputEmail" name="username" class="form-control" placeholder="Email address" required="" autofocus="">
      </div>
      <div class="form-group mb-3 ">
          <div class="col-md-12 ml-5">
          
          <div class="input-group">
        <img src="img/captcha_r" alt="" class=" mb-3 w-50" id="refresh"> 

              <div class="input-group-append">
                <button  id="btn" class="btn"> <i class="fa fa-refresh"></i></button>
              </div>
</div>
        </div>
        <input type="text" class="form-control" name="captcha"  placeholder="captcha">
      </div>
      
      
      <button name="forget_btn" class="btn btn-lg btn-primary btn-block" type="submit">Forget</button>
      <a href="account" class="float-right text-decoration-none text-primary">Know Password ?</a>
    </form>
    <!-- form end -->
</div>
<?php
    include 'inc/footer.php';
?>
<script>
   $(document).ready(function () {
    $('#btn').on('click',function(e){
        $("#refresh").attr("src","img/captcha_r");
        e.preventDefault();
    })
   });
</script>
