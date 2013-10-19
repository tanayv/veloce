<?php
  /**
  * PHP - Cars
  * Authors - Andrew Mass, Nick Kortendick
  */
?>

<!DOCTYPE html>
<html>
  <head>
    <?php include './head.php'; ?>
  </head>

  <body class="cars">
    <?php include './header.php'; ?>

    <div class="content container">
      <div class="panel-group" id="accordion">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title">
              <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                2013-2014
              </a>
            </h4>
          </div>

          <div id="collapseOne" class="panel-collapse collapse">
            <div class="panel-body">
              More to come...
            </div>
          </div>
        </div>

        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title">
              <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                2012-2013
              </a>
            </h4>
          </div>

          <div id="collapseTwo" class="panel-collapse collapse in">
            <div class="panel-body">
              <div class="row">
                <div class="col-md-4">
                  <h2>"Cool Name of Car"</h2>

                  <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</p>
                </div>

                <div class="col-md-8">
                  <img src="./img/car_2013.jpg">
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <table class="table table-hover">
                    <thead>
                      <th>Awesome Raw Data To Make You Drool</th>
                      <th>
                    </thead>

                    <tbody>
                      <tr>
                        <td>Zero To Sixty</td>
                        <td>0.001 seconds</td>
                      </tr>

                      <tr>
                        <td>Horsepower</td>
                        <td>9001 hp</td>
                      </tr>

                      <tr>
                        <td>Weight</td>
                        <td>2 kg</td>
                      </tr>
                    </tbody>
                  </table>
                </div>

                <div class="col-md-6">
                  <table class="table table-hover">
                    <thead>
                      <th>Moar Data</th>
                      <th>
                    </thead>

                    <tbody>
                      <tr>
                        <td>Materials</td>
                        <td>Carbon Fiber, Gold</td>
                      </tr>

                      <tr>
                        <td>Engine</td>
                        <td>Rotary Aircraft Engine</td>
                      </tr>

                      <tr>
                        <td>Brakes</td>
                        <td>Disc Brakes</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title">
              <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                2011-2012
              </a>
            </h4>
          </div>

          <div id="collapseThree" class="panel-collapse collapse">
            <div class="panel-body">
              Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php include './footer.php'; ?>
  </body>
</html>
