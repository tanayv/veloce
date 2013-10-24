<?php
  /**
  * PHP - Index
  * Authors - Andrew Mass, Nick Kortendick
  */
?>

<!DOCTYPE html>
<html>
  <head>
    <?php include './head.php'; ?>
  </head>

  <body class="home">
    <?php include './header.php'; ?>

    <div class="overlay-container">
      <img id="hero-main" src="./img/hero-main.jpg">

      <div class="overlay-container-inner">
        <div class="inner-inner">
          <div class="content container overlay">
            <img src="./img/overlay-logo.png">
          </div>
        </div>
      </div>
    </div>

    <div class="content container">
      <div id="main-content" class="row">
        <div class="col-md-8">
          <h3>About Us</h3>

          <p>The collegiate chapter of the Society of Automotive Engineers (SAE) at the University of Illinois aims to provide its members with numerous educational, professional, and social opportunities related to vehicular design. As part of this initiative, UIUC fields the Formula SAE team.</p>

          <p>Each year, Formula SAE teams are challenged by a fictional manufacturing company to design and develop a small formula-style racing car targeted at the nonprofessional weekend autocross enthusiast. Based on a predetermined set of templates and rules, teams must design the fastest, most effective racing machine possible while minimizing costs, maximizing reliability, and utilizing the latest technologies in racing today. Competitions are held annually in various places all over the world (Michigan, Nebraska, Australia, Brazil, Italy, Germany, etc.) where these design teams bring their car and compete against some of the best engineering students worldwide.</p>

          <h4>
            Have something awesome to contribute?

            <a href="./join.php">Join the Team</a>
          </h4>

          <img src="./img/rendered.jpg">
          <!-- <div id="likebox-wrapper">
          <iframe src="//www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2Fillinimotorsports&amp;width=400&amp;height=590&amp;colorscheme=light&amp;show_faces=true&amp;header=true&amp;stream=true&amp;show_border=false&amp;appId=143039425897009" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:400px; height:590px;" allowTransparency="true"></iframe>

          </div> -->
        </div>

        <div id="twitter-box" class="col-md-4">
          <a class="twitter-timeline" href="https://twitter.com/IllinoisFSAE" data-widget-id="383104434047180800"></a>

          <script>
            !function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");
          </script>

        </div>
      </div>
    </div>
    <?php include './topsponsors.php'; ?>

    <?php include './footer.php'; ?>
  </body>
</html>
