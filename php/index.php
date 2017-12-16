<!DOCTYPE html>
<html>
  <head>
    <?php include './head.php'; ?>
  </head>

  <body class="home">
    
    <div id="splash-container">
      <div id="splash"></div>

      <img class="splash-content" id="desktop" src="./img/orangelogo_outline.png">
      <img class="splash-content" id="mobile" src="./img/orangelogoleft_outline.png">
    </div>

    <?php include './header.php'; ?>
    <div id="content-wrapper" class="content container">
      <div id="main-content" class="row">
        <div class="col-md-7">

          <h3>About Us</h3>

          <p>The collegiate chapter of the Society of Automotive Engineers (SAE) at the University of Illinois aims to provide its members with numerous educational, professional, and social opportunities related to vehicular design. As part of this initiative, UIUC fields the Formula SAE team.</p>

          <p>Each year, Formula SAE teams are challenged by a fictional manufacturing company to design and develop a small formula-style racing car targeted at the nonprofessional weekend autocross enthusiast. Based on a predetermined set of templates and rules, teams must design the fastest, most effective racing machine possible while minimizing costs, maximizing reliability, and utilizing the latest technologies in racing today. Competitions are held annually in various places all over the world (Michigan, Nebraska, Australia, Brazil, Italy, Germany, etc.) where these design teams bring their car and compete against some of the best engineering students worldwide.</p>

          <h4>
            Have something awesome to contribute?

            <a href="./join.php">Join the Team</a>
          </h4>

          <img src="./img/rendered_five.jpg">
        </div>

        <div class="col-md-5">
            <div class="panel panel-default">
            <div class="panel-heading">
              <strong>Attend our meetings</strong>
            </div>

            <div class="panel-body">
              <table class="table table-hover">
                <thead>
                  <th>Meetings</th>
                  <th>Time</th>
                  <th>Location</th>
                </thead>

                <tbody>
                  <tr>
                    <td>General Team Meeting</td>
                    <td>Tuesday @ 7pm</td>
                    <td>MSEB 100</td>
                  </tr>

                  <tr>
                    <td>Electronics Subsystem Meeting</td>
                    <td>Monday @ 7pm</td>
                    <td>ESPL</td>
                  </tr>

                  <tr>
                    <td>Chassis Subsystem Meeting</td>
                    <td>Tuesday @ 6pm</td>
                    <td>ESPL</td>
                  </tr>

                  <tr>
                    <td>Suspension Subsystem Meeting</td>
                    <td>Wednesday @ 8pm</td>
                    <td>ESPL</td>
                  </tr>

                  <tr>
                    <td>Composites Subsystem Meeting</td>
                    <td>Wednesday @ 6pm</td>
                    <td>ESPL</td>
                  </tr>

                  <tr>
                    <td>Aerodynamics Subsystem Meeting</td>
                    <td>Wednesday @ 7pm</td>
                    <td>ESPL</td>
                  </tr>

                  <tr>
                    <td>Drivetrain Subsystem Meeting</td>
                    <td>Thursday @ 6pm</td>
                    <td>ESPL</td>
                  </tr>

                  <tr>
                    <td>Engine Subsystem Meeting</td>
                    <td>Thursday @ 7pm</td>
                    <td>ESPL</td>
                  </tr>
                </tbody>
              </table>

              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1525.682779810416!2d-88.2239047301758!3d40.1118561518791!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x880cd76b4f8cbb67%3A0x87077bee4a408c8c!2sEngineering+Student+Project+Laboratory!5e0!3m2!1sen!2sus!4v1472591423903" width="100%" height="400px" frameborder="0" style="border: 2px solid gray" allowfullscreen></iframe>
            </div>
        </div>
      </div>
    </div>

    <?php include './footer.php'; ?>
  </body>
</html>
