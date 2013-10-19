<?php
  /**
  * PHP - Contact
  * Authors - Andrew Mass, Nick Kortendick
  */
  ?>

<!DOCTYPE html>
<html>
  <head>
    <?php include './head.php'; ?>
  </head>

  <body class="sponsors">
    <?php include './header.php'; ?>

    <script type="text/javascript">
      var RecaptchaOptions = {
      theme : 'clean'
      };
    </script>
    <div class="content container">
      <?php
      //If the form is submitted:
      if(isset($_POST['submit'])){
        //load recaptcha file
        require_once('./recaptchalib.php');

        //enter your recaptcha private key
        $privatekey = "6LfbA-kSAAAAACpfwyENAR5CUssf5r9pWzcsG1p7";

        //check recaptcha fields
        $resp = recaptcha_check_answer ($privatekey,
        $_SERVER["REMOTE_ADDR"],
        $_POST["recaptcha_challenge_field"],
        $_POST["recaptcha_response_field"]);

        //Check to make sure that a contact name has been entered 
        $authorName = (filter_var($_POST['name'], FILTER_SANITIZE_STRING));

        if ($authorName == "")
        {
          $authorError = true;
          $hasError = true;
        }
        else
        {
          $authorError = false;
          $formAuthor = $authorName;
        }

        $authorLastName = (filter_var($_POST['Lname'], FILTER_SANITIZE_STRING));

        if ($authorLastName == "")
        {
          $authorLastError = true;
          $hasError = true;
        }

        //Check to make sure sure that a valid email address is submitted
        $authorEmail = (filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
        if (!(filter_var($authorEmail, FILTER_VALIDATE_EMAIL))){
          $emailError = true;
          $hasError = true;
        //echo("EMAIL ERROR ");
        } 
        else
        {
          $formEmail = $authorEmail;
        };

        //Check to make sure the subject of the message has been entered
        $msgSubjectJoin = (isset($_POST['joining']));
        $msgSubjectSponsor = (isset($_POST['sponsorship']));
        $msgSubjectWebsite = (isset($_POST['website']));
        $msgSubjectOther = (isset($_POST['other']));
        $msgSubject = "";
        if($msgSubjectJoin == TRUE)
          $msgSubject .= "Joining the team ";
        if($msgSubjectSponsor == TRUE)
          $msgSubject .= "Sponsorship ";
        if($msgSubjectWebsite == TRUE)
          $msgSubject .= "Website issue ";
        if($msgSubject)
          $msgSubject .= "Other";
        if ($msgSubjectJoin == FALSE && $msgSubjectSponsor == FALSE && $msgSubjectWebsite == FALSE && $msgSubjectOther == FALSE)
        {
          $subjectError = true;
          $hasError = true;
        //echo("SUBJECT ERROR ");
        }
        else
        {
          $formSubject = $msgSubject;
        };

        //Check to make sure content has been entered
        $msgContent = (filter_var($_POST['message'], FILTER_SANITIZE_STRING));
        if ($msgContent == "")
        {
          $commentError = true;
          $hasError = true;
        //echo("MESSAGE ERROR ");
        }
        else
        {
          $formContent = $msgContent;
        };

        $authorIP = getenv("REMOTE_ADDR");
        $authorPhone = $_POST['phone'];
        $authorUserAgent = $_SERVER['HTTP_USER_AGENT'];

        // if all the fields have been entered correctly and there are no recaptcha errors build an email message
        if (($resp->is_valid) && (!isset($hasError))) 
        {
          $emailTo = 'fsae@nickkortendick.com, illinimotorsports@gmail.com'; // here you must enter the email address you want the email sent to
          $subject = $msgSubject; // This is how the subject of the email will look like
          $body = $authorName . ' ' . $authorLastName . " has sent you a new message on motorsports.illinois.edu! \n Return Email Address: " . $authorEmail . "\n Return Phone Number: " . $authorPhone . "\n IP Address: " . $authorIP . "\n User Agent: " . $authorUserAgent . "\n Message: " . $msgContent;
          $headers = 'From: <'.$formEmail.'>' . "\r\n" . 'Reply-To: ' . $formEmail . "\r\n" . 'Return-Path: ' . $formEmail; // Email headers

          mail($emailTo, $subject, $body, $headers);
          
          $replySubject = $authorName . ", you sent a message about" . $subject; 
          $replyBody = "You just sent the following message to Illini Motorsports: " . "\n" . $msgContent;
          $replyHeaders = 'From: <illinimotorsports@gmail.com>' . "\r\n" . 'Reply-To: ' . 'illinimotorsports@gmail.com' . "\r\n" . 'Return-Path: ' . 'illinimotorsports@gmail.com';
          
          mail($authorEmail, $replySubject, $replyBody, $headers);
          
          // set a variable that confirms that an email has been sent
          $emailSent = true;
        }
        
        // if there are errors in captcha fields set an error variable
        if (!($resp->is_valid))
        {
          $captchaErrorMsg = true;
        }
      }
      ?>  

      <?php if($msgSubjectJoin == TRUE && isset($emailSent) && $emailSent == true)
      {
        echo('<div class="alert alert-success"><h3>Success! Make sure to join the Google group by clicking <a href="//groups.google.com/forum/#!forum/illinimotorsports">here</a>!</h3></div>');
      }
      if($msgSubjectSponsor == TRUE && isset($emailSent) && $emailSent == true)
      {
        echo('<div class="alert alert-success"><h3>Thank you for your interest in sponsoring Illini Motorsports. A representative will contact you shortly!</h3></div>');
      }
      ?>

      <?php // if the page the variable "email sent" is set to true show confirmation instead of the form
      if(isset($emailSent) && $emailSent == true) 
      {
        if( $msgSubjectJoin == FALSE && $msgSubjectSponsor == FALSE)
        echo('<div class="alert alert-success">         <p>
              <h5>Success! </h5> Thank you for your query. A copy has been sent to the email address you provided. 
              </p> </div>');
      }
      else if(isset($_POST['submit'])) 
        echo('<div class="alert alert-danger">        <p>
              <h5> Oops! </h5> There\'s a problem. Fix up your errors and try again. 
              </p> </div>');
      ?>


    <form id="contactForm" role="form" method="post" class="form-horizontal">
        <div class="form-group 
        <?php if($authorError || $authorLastError) 
        {
        echo 'has-error';
        }
        ?>">  

          <label class="col-lg-2 control-label" for="input1">Your Name*
          </label>  
          
          <div class="col-lg-4">  
            <input type="text" class="form-control" placeholder="First" name="name" id="name" value="<?php if(isset($_POST['name']))  echo $_POST['name'];?>"> 
            <?php if($authorError || $authorFirstError)
          {
            echo'<span class="help-block"> Please enter a first name </span>';
          } 
         ?>
          </div>
          <div class="col-lg-6">
            <input type="text" class="form-control" placeholder="Last" name="Lname" id="Lname" value="<?php if(isset($_POST['Lname'])) echo $_POST['Lname'];?>">  
          <?php if($authorError || $authorLastError)
          {
            echo'<span class="help-block"> Please enter a last name </span>';
          } 
         ?>
          </div>  
        </div>

        <div class="form-group 
        <?php if($emailError)
          {
          echo 'has-error';
          }
          ?>">

           <label class="col-lg-2 control-label" for="input2">Your Email Address*
           </label>

            <div class="col-lg-10">  
              <input type="text" class="form-control" name="email" id="email" value="<?php if(isset($_POST['email']))  echo $_POST['email'];?>">  
              <?php if($emailError){echo'<span class="help-block"> Please enter a valid email address </span>';} ?>
          </div> 
        </div> 

        <div class="form-group 
        <?php if($subjectError) { echo 'has-error'; } ?>">  
          <label class="col-lg-2 control-label" for="input3">Subject*
          </label>  
          
          <div class="col-lg-10">  

            <label class="checkbox-inline">
              <input type="checkbox" id="joining" name="joining" value="joining" <?php if(isset($_POST['joining']))  echo ('checked="checked"');?>>Joining the team
            </label>
            <label class="checkbox-inline">
             <input type="checkbox" id="sponsorship" name="sponsorship" value="sponsorship" <?php if(isset($_POST['sponsorship']))  echo ('checked="checked"');?>>Sponsorship
            </label>
            <label class="checkbox-inline">
              <input type="checkbox" id="website" name="website" value="website" <?php if(isset($_POST['website']))  echo ('checked="checked"');?>>Website issue
            </label>
            <label class="checkbox-inline">
              <input type="checkbox" id="other" name="other" value="other" <?php if(isset($_POST['other']))  echo ('checked="checked"');?>>Other
            </label>
            <?php if($subjectError){echo'<span class="help-block"> Please enter a subject </span>';} ?>
          </div>  
        </div>

        <div class="form-group">  
          <label class="col-lg-2 control-label" for="input04">Your Phone Number
          </label>

          <div class="col-lg-10">  
            <input type="text" class="form-control" name="phone" id="phone" value="<?php if(isset($_POST['phone']))  echo $_POST['phone'];?>">  
          </div>  
        </div>  

        <div class="form-group <?php if($commentError) { echo 'has-error'; } ?>">  
          <label class="col-lg-2 control-label" for="textarea">Your Message*
          </label>  

          <div class="col-lg-10">  
            <textarea class="form-control" name="message" id="message" rows="5"?><?php if(isset($_POST['message']))  echo$_POST['message']; ?></textarea> 
            <?php if($commentError){echo'<span class="help-block">Please enter a message.</span>';}?>
          </div>  
        </div>  

        <div class="form-group">
          <label class="col-lg-2 control-label" for="captcha">Verification*
          </label>
          <div class="col-lg-10">
            <?php

              require_once('./recaptchalib.php');
              $publickey = "6LfbA-kSAAAAAI3fQVtljpWpIPI3sRPuIX3YdEVV"; // you got this from the signup page
              echo recaptcha_get_html($publickey);

              if($captchaErrorMsg)
              {
                echo'<span class="help-block has-error"> <p style="color:#b94a48">Incorrect Captcha </p></span>';
              } 
            ?>
          </div>
        </div>
        <hr>
        <div class="form-group" style="color:black">  
          <p> * indicates required field </p>  
          <button type="submit" class="btn btn-primary" id="submit" name="submit">Submit Form
          </button>
        </div>
      </fieldset>
    </form>
  </div>
  <?php include './footer.php'; ?>
  </body>
</html>