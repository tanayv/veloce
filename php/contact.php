<?php
  // NetIDs to update year by year.
  $engineLead = "jkoszut2";
  $suspensionLead = "kogucki2";
  $electronicsLead = "jdrewni2";
  $chassisLead = "papalia2";
  $aerodynamicsLead = "akirr2";
  $drivetrainLead = "sabosch2";
  $compositesLead = "mprogal2";

  // Initialze error booleans to FALSE to avoid undefined variable warnings.
  $msgSubjectJoin = FALSE;
  $msgSubjectSponsor = FALSE;
  $authorError = FALSE;
  $authorLastError = FALSE;
  $authorFirstError = FALSE;
  $emailError = FALSE;
  $subjectError = FALSE;
  $commentError = FALSE;
?>

<!DOCTYPE html>
<html>
  <head>
    <?php include './head.php'; ?>
  </head>

  <body class="contact">
    <?php include './header.php'; ?>


    <div class="content container">
      <h1>Contact the Team</h1>

      <?php
      //If the form is submitted:
      if(isset($_POST['submit'])){

        //Check to make sure that a contact name has been entered
        $authorName = (filter_var($_POST['name'], FILTER_SANITIZE_STRING));
        $authorName = ucfirst(strtolower($authorName));

        if ($authorName == "") {
          $authorError = true;
          $hasError = true;
        } else {
          $authorError = false;
          $formAuthor = $authorName;
        }

        $authorLastName = (filter_var($_POST['Lname'], FILTER_SANITIZE_STRING));
        $authorLastName = str_replace('\' ', '\'', ucwords(str_replace('\'', '\' ', strtolower($authorLastName))));

        if ($authorLastName == "") {
          $authorLastError = true;
          $hasError = true;
        }

        //Check to make sure sure that a valid email address is submitted
        $authorEmail = (filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
        if (!(filter_var($authorEmail, FILTER_VALIDATE_EMAIL))) {
          $emailError = true;
          $hasError = true;
        } else {
          $formEmail = $authorEmail;
        };

        //Check to make sure the subject of the message has been entered
        $msgSubjectJoin = (isset($_POST['joining']));
        $msgSubjectSponsor = (isset($_POST['sponsorship']));
        $msgSubjectWebsite = (isset($_POST['website']));
        $msgSubjectOther = (isset($_POST['other']));
        $msgSubjectOrganization = (isset($_POST['recruiting']));
        $msgSubject = "";

        if($msgSubjectJoin == TRUE) {
          $msgSubject .= "Joining the team ";
        }

        if($msgSubjectSponsor == TRUE) {
          if($msgSubject != "") {
            $msgSubject .= ", sponsorship ";
          } else {
            $msgSubject .= "Sponsorship ";
          }
        }

        if($msgSubjectOrganization == TRUE) {
          if($msgSubject != "") {
            $msgSubject .= ", recruiting ";
          } else {
            $msgSubject .= "Recruiting ";
          }
        }

        if($msgSubjectWebsite == TRUE) {
          if($msgSubject != "") {
            $msgSubject .= ", website issue ";
          } else {
            $msgSubject .= "Website issue ";
          }
        }

        if($msgSubjectOther) {
          if($msgSubject != "") {
            $msgSubject .= "& " + $_POST[otherSubjectInput];
          } else {
            $msgSubject .= $_POST[otherSubjectInput];
          }
        }

        if ($msgSubjectJoin == FALSE && $msgSubjectSponsor == FALSE && $msgSubjectWebsite == FALSE
            && $msgSubjectOther == FALSE && $msgSubjectOrganization == FALSE) {
          $subjectError = true;
          $hasError = true;
        } else {
          $formSubject = $msgSubject;
        };

        //Check to make sure content has been entered
        $msgContent = (filter_var($_POST['message'], FILTER_SANITIZE_STRING));
        if ($msgContent == "") {
          $commentError = true;
          $hasError = true;
        } else {
          $formContent = $msgContent;
        };

        $authorPhone = $_POST['phone'];

        // if all the fields have been entered correctly build an email message
        if (!isset($hasError)) {
          $emailTo = 'illinimotorsports@gmail.com';
          if(isset($_POST['engine'])) {
            $emailTo .= ',' . $engineLead . '@illinois.edu';
          }
          if(isset($_POST['suspension'])) {
            $emailTo .= ',' . $suspensionLead . '@illinois.edu';
          }
          if(isset($_POST['electronics'])) {
            $emailTo .= ',' . $electronicsLead . '@illinois.edu';
          }
          if(isset($_POST['chassis'])) {
            $emailTo .= ',' . $chassisLead . '@illinois.edu';
          }
          if(isset($_POST['aerodynamics'])) {
            $emailTo .= ',' . $aerodynamicsLead . '@illinois.edu';
          }
          if(isset($_POST['drivetrain'])) {
            $emailTo .= ',' . $drivetrainLead . '@illinois.edu';
          }
          if(isset($_POST['composites'])) {
            $emailTo .= ',' . $compositesLead . '@illinois.edu';
          }
          if($msgSubjectWebsite) {
            $emailTo .= ',' . 'jdrewni2@illinois.edu';
          }

          $subject = 'New message from ' . $authorName . ' ' . $authorLastName . ' on Motorsports.illinois.edu: ' . $msgSubject; // This is what the subject of the email will look like
          $body = $authorName . ' ' . $authorLastName;

          if($_POST['companyInput'] != '') {
            $body .= ' of ' . $_POST['companyInput'];
          }

          $body .= " has sent you a new message on motorsports.illinois.edu! \n Return Email Address: " . $authorEmail . "\n Return Phone Number: " . $authorPhone;

          if(isset($_POST['joining'])) {
            $body .= "\n Subteam(s) Selected: ";
          }

          if(isset($_POST['engine'])) {
            $body .= " engine ";
          }

          if(isset($_POST['suspension'])) {
            $body .= " suspension ";
          }

          if(isset($_POST['electronics'])) {
            $body .= " electronics ";
          }

          if(isset($_POST['chassis'])) {
            $body .= " chassis ";
          }

          if(isset($_POST['aerodynamics'])) {
            $body .= " aerodynamics ";
          }

          if(isset($_POST['drivetrain'])) {
            $body .= " drivetrain ";
          }

          if(isset($_POST['composites'])) {
            $body .= " composites ";
          }

          if($_POST['companyInput'] != '') {
            $body .= "\n Representing: " . $_POST['companyInput'];
          }

          $body .= "\n Message: " . $msgContent;
          $headers = 'From: <' . $formEmail . '>' . "\r\n" . 'Reply-To: ' . $formEmail . "\r\n" . 'Return-Path: ' . $formEmail . "\r\n" . 'BCC: ' . 'fsae@nickkortendick.com'; // Email headers

          mail($emailTo, $subject, $body, $headers);

          // Set a variable that confirms that an email has been sent
          $emailSent = true;
        }
      }
      ?>

      <?php if($msgSubjectJoin == TRUE && isset($emailSent) && $emailSent == true) {
        echo('<div class="alert alert-success"><h3>Success! Make sure to join the Google group by clicking <a href="//groups.google.com/forum/#!forum/illinimotorsports">here</a>!</h3></div>');
      }

      if($msgSubjectSponsor == TRUE && isset($emailSent) && $emailSent == true) {
        echo('<div class="alert alert-success"><h3>Thank you for your interest in sponsoring Illini Motorsports. A representative will contact you shortly!</h3></div>');
      }
      ?>

      <?php // if the page the variable "email sent" is set to true show confirmation instead of the form
      if(isset($emailSent) && $emailSent == true) {
        if( $msgSubjectJoin == FALSE && $msgSubjectSponsor == FALSE) {
          echo('<div class="alert alert-success">         <p>
              <h5>Success! </h5> Thank you for your query. A copy has been sent to the email address you provided.
              </p> </div>');
        }
      } else if(isset($_POST['submit'])) {
          echo('<div class="alert alert-danger">        <p>
              <h5> Oops! </h5> There\'s a problem. Fix up your errors and try again.
              </p> </div>');
      }
      ?>

      <form id="contactForm" role="form" method="post" class="form-horizontal">
        <div class="form-group <?php if($authorError || $authorLastError) { echo 'has-error'; } ?>">

          <label class="col-lg-2 control-label" for="input1">Your Name*</label>

          <div class="col-lg-4">
            <input type="text" class="form-control" placeholder="First" name="name" id="name" value="<?php if(isset($_POST['name']) && $emailSent == FALSE)  echo $_POST['name'];?>">
            <?php if($authorError || $authorFirstError) {
                echo'<span class="help-block"> Please enter a first name </span>';
              }
            ?>
          </div>

          <div class="col-lg-6">
            <input type="text" class="form-control" placeholder="Last" name="Lname" id="Lname" value="<?php if(isset($_POST['Lname']) && $emailSent == FALSE) echo $_POST['Lname'];?>">
            <?php if($authorError || $authorLastError) {
              echo'<span class="help-block"> Please enter a last name </span>';
            }
          ?>
          </div>
        </div>

        <div class="form-group <?php if($emailError) { echo 'has-error'; } ?>">

           <label class="col-lg-2 control-label" for="input2">Your Email Address*
           </label>

            <div class="col-lg-10">
              <input type="email" class="form-control" name="email" id="email" value="<?php if(isset($_POST['email']) && $emailSent == FALSE)  echo $_POST['email'];?>">
              <?php if($emailError){echo'<span class="help-block"> Please enter a valid email address </span>';} ?>
          </div>
        </div>

        <div class="form-group">
          <label class="col-lg-2 control-label" for="input04">Your Phone Number</label>

          <div class="col-lg-10">
            <input type="tel" class="form-control" name="phone" id="phone" value="<?php if(isset($_POST['phone'])&& $emailSent == FALSE)  echo $_POST['phone'];?>">
          </div>
        </div>

        <div class="form-group
          <?php if($subjectError) { echo 'has-error'; } ?>">
          <label class="col-lg-2 control-label" for="input3">Subject*</label>

          <div class="col-lg-10">
            <label class="checkbox-inline">
              <input type="checkbox" id="joining" name="joining" value="joining" <?php if(isset($_POST['joining'])&& $emailSent == FALSE)  echo ('checked="checked"');?>>Joining the team
            </label>

            <label class="checkbox-inline">
             <input type="checkbox" id="sponsorship" name="sponsorship" value="sponsorship" <?php if(isset($_POST['sponsorship'])&& $emailSent == FALSE)  echo ('checked="checked"');?>>Sponsorship
            </label>

            <label class="checkbox-inline">
             <input type="checkbox" id="recruiting" name="recruiting" value="recruiting" <?php if(isset($_POST['recruiting'])&& $emailSent == FALSE)  echo ('checked="checked"');?>>Corporate Recruiting
            </label>

            <label class="checkbox-inline">
              <input type="checkbox" id="website" name="website" value="website" <?php if(isset($_POST['website'])&& $emailSent == FALSE)  echo ('checked="checked"');?>>Website issue
            </label>

            <label class="checkbox-inline">
              <input type="checkbox" id="other" name="other" value="other" <?php if(isset($_POST['other'])&& $emailSent == FALSE)  echo ('checked="checked"');?>>Other
            </label>

            <?php if($subjectError){echo'<span class="help-block"> Please enter a subject </span>';} ?>
          </div>
        </div>

        <div class="form-group" id="otherSubject" <?php if(isset($_POST['other'])&& $emailSent == FALSE) echo 'style="display:block"'; else echo 'style="display:none"'; ?>>
          <label class="col-lg-2 control-label"></label>

          <div class="col-lg-10">
            <input type="text" class="form-control" id="otherSubjectInput" name="otherSubjectInput" <?php if(isset($_POST['other'])&& $emailSent == FALSE) {echo 'value = "'; echo $_POST['otherSubjectInput']; echo '"';}?>>
          </div>
        </div>

        <div class="form-group" id="subteam" <?php if(isset($_POST['joining']) && $emailSent == FALSE) echo 'style="display:block"'; else echo 'style="display:none"'; ?>>
          <label class="col-lg-2 control-label" for="input3a">Subteam</label>

          <div class="col-lg-10">
            <label class="checkbox-inline">
              <input <?php if(isset($_GET['engine'])) echo 'disabled' ?> type="checkbox" id="engine" name="engine" value="engine" <?php if((isset($_POST['engine']) || isset($_GET['engine']))&& $emailSent == FALSE)  echo ('checked="checked"');?>>Engine
            </label>
            <label class="checkbox-inline">
              <input <?php if(isset($_GET['chassis'])) echo 'disabled' ?> type="checkbox" id="chassis" name="chassis" value="chassis" <?php if((isset($_POST['chassis']) || isset($_GET['chassis']))&& $emailSent == FALSE)  echo ('checked="checked"');?>>Chassis
            </label>
            <label class="checkbox-inline">
              <input <?php if(isset($_GET['electronics'])) echo 'disabled' ?> type="checkbox" id="electronics" name="electronics" value="electronics" <?php if((isset($_POST['electronics']) || isset($_GET['electronics']))&& $emailSent == FALSE)  echo ('checked="checked"');?>>Electronics
            </label>
            <label class="checkbox-inline">
              <input <?php if(isset($_GET['drivetrain'])) echo 'disabled' ?> type="checkbox" id="drivetrain" name="drivetrain" value="drivetrain" <?php if((isset($_POST['drivetrain']) || isset($_GET['drivetrain']))&& $emailSent == FALSE)  echo ('checked="checked"');?>>Drivetrain
            </label>
            <label class="checkbox-inline">
              <input <?php if(isset($_GET['composites'])) echo 'disabled' ?> type="checkbox" id="composites" name="composites" value="composites" <?php if((isset($_POST['composites']) || isset($_GET['composites']))&& $emailSent == FALSE)  echo ('checked="checked"');?>>Composites
            </label>
            <label class="checkbox-inline">
              <input <?php if(isset($_GET['aerodynamics'])) echo 'disabled' ?> type="checkbox" id="aerodynamics" name="aerodynamics" value="aerodynamics" <?php if((isset($_POST['aerodynamics']) || isset($_GET['aerodynamics']))&& $emailSent == FALSE)  echo ('checked="checked"');?>>Aerodynamics
            </label>
            <label class="checkbox-inline">
              <input <?php if(isset($_GET['suspension'])) echo 'disabled' ?> type="checkbox" id="suspension" name="suspension" value="suspension" <?php if((isset($_POST['suspension']) || isset($_GET['suspension']))&& $emailSent == FALSE)  echo ('checked="checked"');?>>Suspension
            </label>
          </div>
        </div>

        <div class="form-group" <?php if((isset($_POST['sponsorship']) || isset($_POST['recruiting']))&& $emailSent == FALSE) echo 'style="display:block"'; else echo 'style="display:none"'; ?> id="company">
          <label class="col-lg-2 control-label" for="input3b">Organization</label>

          <div class="col-lg-10">
            <input type="text" class="form-control" id="companyInput" name="companyInput" value="<?php if(isset($_POST['companyInput']) && $emailSent == FALSE)  echo $_POST['companyInput'];?>">
          </div>
        </div>

        <div class="form-group <?php if($commentError) { echo 'has-error'; } ?>">
          <label class="col-lg-2 control-label" for="textarea">Your Message*</label>

          <div class="col-lg-10">
            <textarea class="form-control" name="message" id="message" rows="5"?><?php if(isset($_POST['message'])&& $emailSent == FALSE)  echo$_POST['message']; ?></textarea>

            <?php if($commentError){echo'<span class="help-block">Please enter a message.</span>';}?>
          </div>
        </div>

        <div class="form-group" style="color:black">
          <div class="col-md-offset-2 col-lg-10">
            <p> * indicates required field </p>

            <button type="submit" class="btn btn-primary" id="submit" name="submit">Submit Form</button>
          </div>
        </div>
      </form>
    </div>

    <script type="text/javascript">
      $("#joining").click(function(){
      $("#joining").is(':checked') ? $("#subteam").slideDown() : $("#subteam").slideUp();});

      $("#sponsorship").click(function(){
      if($("#sponsorship").is(':checked'))
        $("#company").slideDown();
      else if(!$("#recruiting").is(':checked'))
        $("#company").slideUp();});

      $("#recruiting").click(function(){
      if($("#recruiting").is(':checked'))
        $("#company").slideDown();
      else if(!$("#sponsorship").is(':checked'))
        $("#company").slideUp();});

      $("#other").click(function(){
      $("#other").is(':checked') ? $("#otherSubject").slideDown() : $("#otherSubject").slideUp();});
    </script>

    <?php include './footer.php'; ?>
  </body>
</html>
