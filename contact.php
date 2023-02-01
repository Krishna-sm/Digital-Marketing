<?php
session_start();
include 'inc/header.php';
include 'inc/nav.php';
include 'db/config.php';
?>
<link rel="stylesheet" href="css/contact.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
<style>
  .gr
  {
    font-family: 'Roboto', sans-serif;
  }
</style>
<section id="contact">
  <div class="contact-box">
    <div class="contact-links">
      <h2 class='display-5 n7 '>Contact Us 😊 </h2>
      <div class="links">
        <div class="link">
          <a><img class="img" src="https://i.postimg.cc/m2mg2Hjm/instagram.png" alt="linkedin"></a>
        </div>
        <div class="link">
          <a><img class="img" src="https://i.postimg.cc/YCV2QBJg/github.png" alt="github"></a>
        </div>
        <!-- <div class="link">
          <a><img class="img" src="https://i.postimg.cc/W4Znvrry/.png" alt="codepen"></a>
        </div> -->
        <div class="link">
          <a><img class="img" src="https://i.postimg.cc/NjLfyjPB/email.png" alt="email"></a>
        </div>
      </div>
    </div>
    <div class="contact-form-wrapper n8">
        <h1 class="text-center display-6"></h1>
        <div class="form-item mb-1" style="height:60px;">
        <?php
          if(isset($_SESSION['contact'] ) && $_SESSION['contact']!='')
          {
            ?>
                <div class="alert alert-info gr" role="alert">
              <?=$_SESSION['contact']?>
            </div>
            <?php
            unset($_SESSION['contact']);
          }
        ?>
        </div>
      <form action="code/contact" method="post">
        <div class="form-item">
          <input type="text" name="sender" required>
          <label>Name:</label>
        </div>
        <div class="form-item">
          <input type="text" name="email" required>
          <label>Email:</label>
        </div>
        <div class="form-item">
          <textarea  name="message" required></textarea>
          <label>Message:</label>
        </div>

        <div class="mb-3">
        <img  src="img/captcha_r" alt="" class="w-50 m-auto img" style="display:grid;">
        </div>
        <div class="form-item">
        <input type="text" name="captcha" required>
          <label>Captcha:</label>
        </div>
        <!-- <small class="text-muted float-end">Make Sure Valid Details</small> -->
        <button class="submit-btn" name="contact_btn">Send <i class="fa fa-paper-plane"></i></button>  
      </form>
    </div>
  </div>
  
</section>
<div class="p-4 ">
<div class="container rounded shadow-lg  bg-white  mb-5 py-5 p-4" style="">
    <h1 class=" text-center n6">More Information</h1>
    <hr class="container w-25 bg-danger">
    <div class="row text-center">
                <div class="col-md-4 ">
                            <!-- <i class="fa fa-location-arrow display-3"></i> -->
                            <i class="fa fa-map-marker display-3 img "></i>
                            <h5 class="text-dark">
                                <address>
                                    Sonkh Mathura
                                </address>   
                            </h5> 
                </div>
                <div class="col-md-4">
                            <i class="fa fa-mobile-phone display-3 img"></i>
                            <h5 class="text-dark">
                              <p>+91 9389523794</p>  
                            </h5> 
                </div>
                <div class="col-md-4">
                            <i class="fa fa-envelope display-3 img"></i>
                            <h5 class="text-dark">
                                <p>kana@gmail.com</p>  
                            </h5> 
                </div>
                </div>
                
    </div>
  </div>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

@import url('https://fonts.googleapis.com/css2?family=Arimo:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&display=swap');

* {
  margin: 0;
  box-sizing: border-box;
}

body {
  background-color: #6a9ac4;
}

#contact {
  background-color: #6a9ac4;
  display: flex;
  justify-content: center;
  align-items: center;
}

.contact-box {
  width: clamp(100px, 90%, 1000px);
  margin: 80px 50px;
  display: flex;
  flex-wrap: wrap;
}

.contact-links, .contact-form-wrapper {
  width: 50%;
  padding: 8% 5% 10% 5%;
}


.contact-links {
  background-color: #1f2e43;
  background:
    radial-gradient(
      circle at 55% 92%, #426691 0 12%, transparent 12.2%
    ), 
    radial-gradient(
      circle at 94% 72%, #426691 0 10%, transparent 10.2%
    ), 
    radial-gradient(
      circle at 20% max(78%, 350px), #263a53 0 7%, transparent 7.2%
    ), 
    radial-gradient(
      circle at 0% 0%, #263a53 0 40%, transparent 40.2%
    ), 
    #1f2e43;
  border-radius: 10px 0 0 10px;
}

.contact-form-wrapper {
  background-color: #ffffff8f;
  border-radius: 0 10px 10px 0;
}

@media only screen and (max-width: 800px) {
  .contact-links, .contact-form-wrapper {
    width: 100%;
  }
  
  .contact-links {
    border-radius: 10px 10px 0 0;
  }
  
  .contact-form-wrapper {
    border-radius: 0 0 10px 10px;
  }
}

@media only screen and (max-width: 400px) {
  .contact-box {
    width: 95%;
    margin: 8% 5%;
  }
}

h2 {
  font-family: 'Arimo', sans-serif;
  color: #fff;
  font-size: clamp(30px, 6vw, 60px);
  letter-spacing: 2px;
  text-align: center;
  transform: scale(.95, 1);
}

.links {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  padding-top: 50px;
}

.link {
  margin: 10px;
  cursor: pointer;
}

.img {
  width: 45px;
  height: 45px;
  filter: 
    hue-rotate(220deg)
    drop-shadow(2px 4px 4px #0006);
  transition: 0.2s;
  user-select: none;
}

.img:hover {
  transform: scale(1.1, 1.1);
}

.img:active {
  transform: scale(1.1, 1.1);
  filter: 
    hue-rotate(220deg)
    drop-shadow(2px 4px 4px #222)
    sepia(0.3);
}

.form-item {
  position: relative;
}

label, input, textarea {
  font-family: 'Poppins', sans-serif;
}

label {
  position: absolute;
  top: 10px;
  left: 2%;
  color: #999;
  font-size: clamp(14px, 1.5vw, 18px);
  pointer-events: none;
  user-select: none;
}

input, textarea {
  width: 100%;
  outline: 0;
  border: 1px solid #ccc;
  border-radius: 4px;
  margin-bottom: 20px;
  padding: 12px;
  font-size: clamp(15px, 1.5vw, 18px);
}

input:focus+label, 
input:valid+label, 
textarea:focus+label, 
textarea:valid+label {
  font-size: clamp(13px, 1.3vw, 16px);
  color: #777;
  top: -20px;
  transition: all .225s ease;
}

.submit-btn {
  background-color: #fd917e;
  filter: drop-shadow(2px 2px 3px #0003);
  color: #fff;
  font-family: "Poppins",sans-serif;
  font-size: clamp(16px, 1.6vw, 18px);
  display: block;
  padding: 12px 20px;
  margin: 2px auto;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  user-select: none;
  transition: 0.2s;
}

.submit-btn:hover {
  transform: scale(1.1, 1.1);
}

.submit-btn:active {
  transform: scale(1.1, 1.1);
  filter: sepia(0.5);
}

@media only screen and (max-width: 800px) {
  h2 {
    font-size: clamp(40px, 10vw, 60px);
  }
}

@media only screen and (max-width: 400px) {
  h2 {
    font-size: clamp(30px, 12vw, 60px);
  }
  
  .links {
    padding-top: 30px;
  }
  
  img {
    width: 38px;
    height: 38px;
  }
}

</style>
<?php
include 'inc/footer.php';
?>