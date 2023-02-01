<?php
session_start();
    include 'inc/header.php';
    include 'inc/nav.php';
?>
<?php
include 'config/dbcon.php';
if(isset($_GET['email'])&& isset($_GET['reset_token']))
{
                    $email=$_GET['email'];
                    
                    $reset_token=$_GET['reset_token'];
                    date_default_timezone_set('Asia/kolkata');
                    $date=date("Y-m-d");
                    
                    $forget_reset_query="SELECT * FROM users where email='$email' AND resettoeken='$reset_token' AND resettokenexpire='$date'";
                    $forget_reset_query_run=mysqli_query($conn,$forget_reset_query);
                    if($forget_reset_query_run)
                    {
                        if(mysqli_num_rows($forget_reset_query_run)==1)
                        {
                            $_SESSION['mail_to']=$email;
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
    .hide
    {
        display:none;
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
<form action="" id="passwordUpdateForm" method="post" class="form-signin col-md-4 mx-auto bg-white shadow p-5">
            
      <h2 class="k4 text-center bg-5 text-white" >TakesMoney</h2>
      <!-- <h1 class="h3 mb-3 font-weight-normal text-center">Enter Correct Details</h1> -->
      <div class="updatePas"></div>
      <div class="form-group mb-3">
      <label for="inputEmail" class="" contenteditable="false">New Password</label>
      <input type="text" id="password" autocomplete="off" class="form-control" name="password"  required="" autofocus="">
      <!-- <input type="hidden" id=" " autocomplete="off" class="form-control" name="email" value="<?=$email?>"  required="" autofocus=""> -->
      </div>
      <div class="form-group mb-3">
      <label for="inputEmail" class="">Re Enter Password</label>
      <input type="text" id="cpassword" autocomplete="off" class="form-control" name="cpassword" required="" autofocus="">
      
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
      
      
      <button name="password_update_btn" id="updatePassbtn" class="btn btn-lg btn-primary btn-block" type="submit">
      <!-- <span class="spinner-grow spinner-grow-sm mb-1" ></span>   -->
      Update</button>
      </form>
</div>
<!-- <hr class="text-center w-75 bg-white m-auto"> -->
<?php
    include 'inc/footer.php';
?>

<script>
  $(document).ready(function(){
    jQuery('#passwordUpdateForm').on('submit',function(e){
        let x='<span class="spinner-grow spinner-grow-sm mb-1" ></span> Loading... ';
        jQuery("#updatePassbtn").html(x);
        jQuery("#updatePassbtn").attr('disabled',true);
        jQuery('.granted').removeClass("hide");
            jQuery.ajax({
                    url:'function/passwordUpdateForm',
                    type:'post',
                    'data':jQuery('#passwordUpdateForm').serialize(),
                    success:function(result){
                        $(".updatePas").html(result);
                        jQuery("#updatePassbtn").html('Update');
        jQuery("#updatePassbtn").attr('disabled',false);
        jQuery('#passwordUpdateForm')[0].reset();
                    }
            });
e.preventDefault();
})
});
</script>

<?php
                        }
                        else
                        {
                            $_SESSION['msg']="Link is expire";
                            echo '<script>
        window.location.href="account";</script>';
                        }
                       
                    }
                    else
                    {
                        // $_SESSION['msg']="Link is expire";
                        echo '<script>
    window.location.href="index";</script>';
                    }
                   
                    
}

else
{
    
    echo '<script>
    window.location.href="index";</script>';
}

?>
