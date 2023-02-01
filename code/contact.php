<?php
session_start();
include '../db/config.php';



use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
// $emp_id,$email,$sender,$message,$date
function sendMail($Id,$email,$name,$message,$date){
 
   require 'PHPMailer/Exception.php';
   require 'PHPMailer/SMTP.php';
   require 'PHPMailer/PHPMailer.php';

   $mail = new PHPMailer(true);

   try {
       //Server settings
       $mail->isSMTP();                                            //Send using SMTP
       $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
       $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
       $mail->Username   = 'crsogigov@gmail.com';                     //SMTP username
       $mail->Password   = 'aktuepmzvxspssnm';                               //SMTP password
       $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
       $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
   
       //Recipients
       $mail->setFrom('crsogigov@gmail.com', 'Garun ');
       $mail->addAddress($email);  
          //Add a recipient
   
   
       //Content
       $mail->isHTML(true);                                  //Set email format to HTML
       $mail->Subject = 'Contact Details';
        $mail->Body    = '
        <div style="margin:0px;padding:0px;font-family:Arial,sans-serif,Gotham,Helvetica Neue,Helvetica;font-size:100%">
        <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" style="max-width:600px;border:1px solid #dddada">
          <tbody>
            <tr>
              <td align="left" valign="top"><h1 style="margin: 20px; text-align: center; background-color: #050a2e; padding: 20px; color: white;"><img src="https://i.ibb.co/fqzygzj/logod2.png" alt="" style="height: 40px;"></h1></td>
            </tr>
            <tr>
              <td align="left" valign="top" style="padding:20px 0 0 0"><table width="90%" border="0" cellspacing="0" cellpadding="0" align="center" style="max-width:570px">
                  <tbody>
                    <tr>
                      <td align="left" style="font-family:Arial,sans-serif,Gotham,Helvetica Neue,Helvetica;font-size:14px;color:#000000;margin:0px;padding:0px 0 20px 0;line-height:22px;font-weight:bold">Hi '.$name.'</td>
                    </tr>
                    <tr>
                        <td align="left" valign="top" style="font-family:Arial,sans-serif,Gotham,Helvetica Neue,Helvetica;font-size:13px;color:#000000;margin:0px;padding:0px 0 20px 0;line-height:22px">
                          Thank You 😊 For  Contact With <strong>Garun</strong><br>
                          Your Details You Are Submitted
                    </tr>
                      <tr>
                      <td align="left" valign="top" style="font-family:Arial,sans-serif,Gotham,Helvetica Neue,Helvetica;font-size:13px;color:#000000;margin:0px;padding:0px 0 20px 0;line-height:22px">
                          <table cellpadding="0" cellspacing="1" border="0" width="100%" style="background:#c7c7c7">
                          <tbody>
                            <tr>
                                <td align="left" valign="top" style="padding:10px;width:200px;background:#fff">Contact Id:</td>
                                <td align="left" valign="top" style="padding:10px;background:#fff">
                                '.$Id.'</td>
                                </tr>
                              <tr>
                              <td align="left" valign="top" style="padding:10px;width:200px;background:#fff">Name:</td>
                              <td align="left" valign="top" style="padding:10px;background:#fff">
                              '.$name.'</td>
                              </tr>
                              <tr>
                              <td align="left" valign="top" style="padding:10px;width:200px;background:#fff">Email:  </td>
                              <td align="left" valign="top" style="padding:10px;background:#fff">
                              '.$email.'</td>
                              </tr>
                              <tr>
                              <td align="left" valign="top" style="padding:10px;width:200px;background:#fff">Message: </td>
                              <td align="left" valign="top" style="padding:10px;background:#fff">
                              '.$message.'
                              </td>
                              </tr>
                              <tr>
                              <td align="left" valign="top" style="padding:10px;width:200px;background:#fff">Date:  </td>
                              <td align="left" valign="top" style="padding:10px;background:#fff">'.$date.'</td>
                              </tr>
                              </tbody>
                          </table>
                          </td>
                    </tr>
                    
                     <tr>
                      
                    </tr>
                      
                      <tr>
                          <td align="left" valign="top" style="font-family:Arial,sans-serif,Gotham,Helvetica Neue,Helvetica;font-size:13px;color:#000000;margin:0px;padding:20px 0 0px 0;line-height:22px">Thank you for your patience and cooperation.</td>
                    </tr>
                       
                      
                   <tr>
                      <td align="left" valign="top" style="font-family:Arial,sans-serif,Gotham,Helvetica Neue,Helvetica;font-size:13px;color:#000000;margin:0px;padding:10px 0 20px 0;line-height:22px;font-weight:bold">Regards,<br>Team Garun <img src="https://ratmgang.netlify.app/fav.png" alt="" style="width:20px"> </td>
                    </tr>
                      <tr>
             
            </tr>
              
            <tr>
              
            </tr>
                  </tbody>
                </table></td>
            </tr>
            <tr>
              <td height="22"></td>
            </tr>
            
          </tbody>
        </table>
        </div>
                ';
   
       $mail->send();
       return true;
           } catch (Exception $e) {
               // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
               return false;
           }

}




if(isset($_POST['contact_btn']))
{
    if($_POST['sender']==''||$_POST['email']==''||$_POST['message']==''||$_POST['captcha']=='')
    {
        $_SESSION['contact']="All Feilds Are Manadary";
        header('location:../contact');
    }
    else{
    $sender=trim(mysqli_real_escape_string($conn,$_POST['sender']));
    $email=trim(mysqli_real_escape_string($conn,$_POST['email']));
    $message=trim(mysqli_real_escape_string($conn,$_POST['message']));
    $captcha=trim(mysqli_real_escape_string($conn,$_POST['captcha']));
    // $_SESSION['contact']="ok";
    // header('location:../contact');
    if($captcha==$_SESSION['contact_captcha'])
    {
                date_default_timezone_set('Asia/Kolkata');
                $date=date("d-m-Y");
                $emp_id="GARCON".rand(0000,9999)."H";
            $query="insert into contact(name,email,message,emp_id,date) values('$sender','$email','$message','$emp_id','$date')";
            $contact_query=mysqli_query($conn,$query);
            
         if($contact_query && sendMail($emp_id,$email,$sender,$message,$date))
         {
            $_SESSION['contact']="<small>Details Has Been Submit plese wait we will contact shortly 😊 </small>";
    header('location: ../contact');
         }
         else
         {
            $_SESSION['contact']="Technical Issue";
            header('location: ../contact');
         }

    }
    else{
        $_SESSION['contact']="<p style='color:red;'>Enter valid Captcha</p>";
        header('location:../contact');
    }
}
}



?>

