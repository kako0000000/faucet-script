<?php
if(isset($_POST['submit'])):
    if(isset($_POST['h-captcha-response']) && !empty($_POST['h-captcha-response'])):
        // your secret key
        $secret = '<YOUR-SECRET-KEY>';
        // get verify response
        $verifyResponse = file_get_contents('https://hcaptcha.com/siteverify?secret='.$secret.'&response='.$_POST['h-captcha-response'].'&remoteip='.$_SERVER['REMOTE_ADDR']);
        $responseData = json_decode($verifyResponse);
    
    $name = !empty($_POST['name'])?$_POST['name']:'';
    $email = !empty($_POST['email'])?$_POST['email']:'';
    $message = !empty($_POST['message'])?$_POST['message']:'';
        if($responseData->success):
      //contact form submission code
      $to = 'your@email.com';
      $subject = 'New contact form has been submitted';
      $htmlContent = "
        <h1>Contact request details</h1>
        <p><b>Name: </b>".$name."</p>
        <p><b>Email: </b>".$email."</p>
        <p><b>Message: </b>".$message."</p>
      ";
      // Always set content-type when sending HTML email
      $headers = "MIME-Version: 1.0" . "\r\n";
      $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
      // More headers
      $headers .= 'From:'.$name.' <'.$email.'>' . "\r\n";
      //send email
      @mail($to,$subject,$htmlContent,$headers);
      
            $succMsg = 'Your contact request has been submitted successfully.';
      $name = '';
      $email = '';
      $message = '';
        else:
            $errMsg = 'hCaptcha verification failed. Please try again.';
        endif;
    else:
        $errMsg = 'Please click on the hCaptcha button.';
    endif;
else:
    $errMsg = '';
    $succMsg = '';
  $name = '';
  $email = '';
  $message = '';
endif;
?>
<html>
    <head>
      <title>Using hCaptcha with PHP</title>
       <script src="https://www.hCaptcha.com/1/api.js" async defer></script>
    </head>
    <body>
    <div>
    <h2>Contact Form</h2>
        <?php if(!empty($errMsg)): ?><div class="errMsg"><?php echo $errMsg; ?></div><?php endif; ?>
        <?php if(!empty($succMsg)): ?><div class="succMsg"><?php echo $succMsg; ?></div><?php endif; ?>
    <div>
      <form action="" method="POST">
        <input type="text" class="text" value="<?php echo !empty($name)?$name:''; ?>" placeholder="Your full name" name="name" >
                <input type="text" class="text" value="<?php echo !empty($email)?$email:''; ?>" placeholder="Email adress" name="email" >
                <textarea type="text" placeholder="Message..." required="" name="message"><?php echo !empty($message)?$message:''; ?></textarea>
        <div class="h-captcha" data-sitekey="<YOUR-SITE-KEY>"></div>
        <input type="submit" name="submit" value="SUBMIT">
      </form>
    </div>      
    <div class="clear"> </div>
  </div>
  </body>
</html>