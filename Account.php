<?php
include 'inc/header.php';
include 'inc/nav.php';
?>
<link rel="stylesheet" href="css/NavBar2.css">
<div class="dropdown d-flex justify-content-end  ">
  <button class="dropbtn"> <i class="fa fa-key"></i> <b>Login</b> </button>
  <div class="dropdown-content">
    <a href="#">Operator Login </a>
    <a href="Admin/login">Admin Login</a>
    <a href="#">Link 3</a>
  </div>
</div>

<div class="container p-5">
<form action="function/authcode" method="post" class="form-signin col-md-4 mx-auto bg-white shadow p-5">
<div class="alert alert-info" role="alert">
  A simple secondary alert—check it out!
</div>
      <!-- <h1 class="h3 mb-3 font-weight-normal text-center">Enter Correct Details</h1> -->
      <?php
                    if(isset($_SESSION['msg']) && $_SESSION['msg']!=' ')
                    {
                        echo '<div class="alert alert-warning text-dark" role="alert">'.$_SESSION['msg'].'</div>';
                        unset($_SESSION['msg']);
                    }
                    ?>
      <div class="form-group mb-3">
      <label for="inputEmail" class="" contenteditable="false">Email address</label>
      <input type="email" id="inputEmail" autocomplete="off" class="form-control" name="username" placeholder="Email address" required="" autofocus="">
      </div>
      <div class="form-group mb-3">
      <label for="inputEmail" class="">Password</label>
      <input type="password" id="inputEmail" autocomplete="off" class="form-control" name="password" placeholder="Password" required="" autofocus="">
      </div>
      <div class="form-group mb-3 ">
          <div class="col-md-12 ml-5">
          <div class="input-group">
        <img src="img/captcha_r" alt="" class=" mb-3 w-50" id="refresh"> 

       
              <div class="input-group-append">
                <button  id="btn" class="btn"> <i class="fa fa-refresh"></i></button>
              </div>
                </div>
          <!-- <img src="img/captcha_r" alt="" class=" mb-3 w-50" id="refresh"> 
          <button id="btn" class="btn btn-outline-dark" style="margin-top:-15px;"><i class="fa fa-refresh " aria-hidden="true"></i></button> -->
        </div>
        <input type="text" class="form-control" autocomplete="off"  placeholder="captcha" name="captcha">
      </div>
      
      
      <button name="login_btn" class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      <a href="forget_password" class="float-right text-decoration-none text-primary">Forget Password ?</a>
    </form>
</div>


    <?php
include 'inc/footer.php';
?>
 <script>
          $(document).ready(function(){
            $('#btn').click(function(e){
              e.preventDefault();
              $('#refresh').attr("src","img/captcha_r");
            })
          })
        
        </script>