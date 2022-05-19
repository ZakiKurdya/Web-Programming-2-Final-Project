<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

<?php
include "../components/header.php";

if (isset($_SESSION['is_login']) && !$_SESSION['is_login']) {
    header('Location: ../authentication/login.php');
}
?>

<body class="vertical-layout vertical-menu-modern 2-columns   menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">
  <!-- fixed-top-->
 <?php include "../components/nav.php"?>
 <?php include "../components/sidebar.php"?>

  <div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row"></div>

      <div class="content-body">
        <!-- Revenue, Hit Rate & Deals -->
        <div class="row">
          <div class="col-xl-6 col-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Stores Ratings</h4>
                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                  <ul class="list-inline mb-0">
                    <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                  </ul>
                </div>
              </div>
              <div class="card-content collapse show">
                <div class="card-body pt-0">
                  <div class="row mb-1">
                    <div class="col-6 col-md-4">
                    </div>
                    <div class="col-6 col-md-4">
                    </div>
                  </div>
                  <div class="chartjs">
                    <canvas id="thisYearRevenue" width="400" style="position: absolute;"></canvas>
                    <canvas id="lastYearRevenue" width="400"></canvas>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-6 col-12">
            <div class="row">
              <div class="col-lg-6 col-12">
                <div class="card pull-up">
                  <div class="card-header bg-hexagons">
                    <h4 class="card-title">Website Visit Rate
                      <span class="danger">12%</span>
                    </h4>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                      <ul class="list-inline mb-0">
                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                      </ul>
                    </div>
                  </div>
                  <div class="card-content collapse show bg-hexagons">
                    <div class="card-body pt-0">
                      <div class="chartjs">
                        <canvas id="hit-rate-doughnut" height="275"></canvas>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 col-12">
                <div class="card pull-up">
                  <div class="card-content collapse show bg-gradient-directional-danger ">
                    <div class="card-body bg-hexagons-danger">
                      <h4 class="card-title white">Active Stores
                        <span class="white">55%</span>
                        <span class="float-right">
                          <span class="white">152</span>
                          <span class="red lighten-4">/200</span>
                        </span>
                      </h4>
                      <div class="chartjs">
                        <canvas id="deals-doughnut" height="275"></canvas>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6 col-12">
                <div class="card pull-up">
                  <div class="card-content">
                    <div class="card-body">
                      <div class="media d-flex">
                        <div class="media-body text-left">
                          <h6 class="text-muted">Five star stores</h6>
                          <h3>507</h3>
                        </div>
                        <div class="align-self-center">
                          <i class="icon-trophy success font-large-2 float-right"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 col-12">
                <div class="card pull-up">
                  <div class="card-content">
                    <div class="card-body">
                      <div class="media d-flex">
                        <div class="media-body text-left">
                          <h6 class="text-muted">Calls</h6>
                          <h3>3,568</h3>
                        </div>
                        <div class="align-self-center">
                          <i class="icon-call-in danger font-large-2 float-right"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--/ Revenue, Hit Rate & Deals -->
      </div>
    </div>
  </div>

  <?php
  include "../components/footer.php";
  ?>

</body>
</html>