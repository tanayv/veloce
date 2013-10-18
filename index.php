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
          <div id="overlay-right" class="content container overlay">
            Interesting facts about the car.
          </div>

          <div id="overlay-bottom" class="content container overlay">
            <h1>Illini Motorsports</h1>
          </div>
        </div>
      </div>
    </div>

    <div class="content container">
      <div class="row">
        <div class="col-md-8">
          <h3>About Us</h3>

          <p>The collegiate chapter of the Society of Automotive Engineers (SAE) at the University of
Illinois aims to provide its members with numerous educational, professional, and social
opportunities related to vehicular design. As part of this initiative, UIUC fields the Formula
SAE team.</p>

          <p>Each year, Formula SAE teams are challenged by a fictional manufacturing company to
design and develop a small formula-style racing car targeted at the nonprofessional
weekend autocross enthusiast. Based on a predetermined set of templates and rules,
teams must design the fastest, most effective racing machine possible while minimizing
costs, maximizing reliability, and utilizing the latest technologies in racing today.
C ompetitions are held annually in various places all over the world (Michigan, Nebraska,
Australia, Brazil, Italy, Germany, etc.) where these design teams bring their car and
compete against some of the best engineering students worldwide.</p>

          <h4>Want to see your company's logo on this page? <a href="./img/sponsor.pdf" target="_blank">Sponsor Us</a></h4>

          <img src="./img/rendered.jpg">
        </div>

        <div id="twitter-box" class="col-md-4">
          <a class="twitter-timeline" href="https://twitter.com/IllinoisFSAE" data-widget-id="383104434047180800"></a>

          <script>
            !function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");
          </script>

          <!-- FACEBOOK -->
        </div>
      </div>
    </div>

    <div id="sponsors" class="content container">
      <hr>

      <div class="row">
        <div class="col-md-3">
          <img src="./img/logos/mechse.jpg">
        </div>

        <div class="col-md-3">
          <img src="./img/logos/cat.jpg">
        </div>

        <div class="col-md-3">
          <img src="./img/logos/bosch.jpg">
        </div>

        <div class="col-md-3">
          <img src="./img/logos/spacex.jpg">
        </div>
      </div>
    </div>

    <?php include './footer.php'; ?>
  </body>
</html>
