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

    <div id="splashContainer">
      <div id="splash">
      </div>

        <img id="splashContent" src="./img/orangelogo.png">
    </div>

    <?php include './header.php'; ?>
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
        </div>

        <div class="col-md-4">
          <div id="likebox-wrapper">
            <iframe src="//www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2Fillinimotorsports&amp;width=400&amp;height=593&amp;colorscheme=light&amp;show_faces=false&amp;header=true&amp;stream=true&amp;show_border=true&amp;appId=143039425897009" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:100%; height:593px; margin-top: 30px;" allowTransparency="true"></iframe>
          </div>
        </div>
      </div>
    </div>

    <?php include './footer.php'; ?>
  </body>
</html>
