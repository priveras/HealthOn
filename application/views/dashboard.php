
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/zabuto_calendar.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/js/gritter/css/jquery.gritter.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/lineicons/style.css">    

    <script src="<?php echo base_url()?>assets/js/chart-master/Chart.js"></script>

  </head>

  <body>

      <!-- header start-->

      <?php $this->load->view('header');?>

      <!-- header end-->

      <!-- sidebar start-->

      <?php $this->load->view('menu');?>

      <!-- sidebar end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">

              <div class="row">
                  <div class="col-lg-9 main-chart">
                  
                    <div class="row mtbox">
                      <div class="col-md-2 col-sm-2 col-md-offset-1 box0">
                        <div class="box1">
                  <span class="li_heart"></span>
                  <h3><?php echo $clients ?></h3>
                        </div>
                  <p>Hay <?php echo $clients ?> contactos en la base de datos</p>
                      </div>
                      <div class="col-md-2 col-sm-2 box0">
                        <div class="box1">
                  <span class="li_cloud"></span>
                  <h3>+48</h3>
                        </div>
                  <p>48 New files were added in your cloud storage.</p>
                      </div>
                      <div class="col-md-2 col-sm-2 box0">
                        <div class="box1">
                  <span class="li_stack"></span>
                  <h3>23</h3>
                        </div>
                  <p>You have 23 unread messages in your inbox.</p>
                      </div>
                      <div class="col-md-2 col-sm-2 box0">
                        <div class="box1">
                  <span class="li_news"></span>
                  <h3>+<?php echo count($appointments)?></h3>
                        </div>
                  <p>Hoy hay <?php echo count($appointments)?> asuntos programados</p>
                      </div>
                      <div class="col-md-2 col-sm-2 box0">
                        <div class="box1">
                  <span class="li_data"></span>
                  <h3>OK!</h3>
                        </div>
                  <p>Your server is working perfectly. Relax & enjoy.</p>
                      </div>
                    
                    </div><!-- /row mt -->  
          
          <div class="row mt">
                      <!--CUSTOM CHART START -->
                      <div class="border-head">
                          <h3>INGRESOS</h3>
                      </div>
                      <div class="custom-bar-chart">
                          <ul class="y-axis">
                              <li><span>10.000</span></li>
                              <li><span>8.000</span></li>
                              <li><span>6.000</span></li>
                              <li><span>4.000</span></li>
                              <li><span>2.000</span></li>
                              <li><span>0</span></li>
                          </ul>
                          <div class="bar">
                              <div class="title">JAN</div>
                              <div class="value tooltips" data-original-title="8.500" data-toggle="tooltip" data-placement="top">85%</div>
                          </div>
                          <div class="bar ">
                              <div class="title">FEB</div>
                              <div class="value tooltips" data-original-title="5.000" data-toggle="tooltip" data-placement="top">50%</div>
                          </div>
                          <div class="bar ">
                              <div class="title">MAR</div>
                              <div class="value tooltips" data-original-title="6.000" data-toggle="tooltip" data-placement="top">60%</div>
                          </div>
                          <div class="bar ">
                              <div class="title">APR</div>
                              <div class="value tooltips" data-original-title="4.500" data-toggle="tooltip" data-placement="top">45%</div>
                          </div>
                          <div class="bar">
                              <div class="title">MAY</div>
                              <div class="value tooltips" data-original-title="3.200" data-toggle="tooltip" data-placement="top">32%</div>
                          </div>
                          <div class="bar ">
                              <div class="title">JUN</div>
                              <div class="value tooltips" data-original-title="6.200" data-toggle="tooltip" data-placement="top">62%</div>
                          </div>
                          <div class="bar">
                              <div class="title">JUL</div>
                              <div class="value tooltips" data-original-title="7.500" data-toggle="tooltip" data-placement="top">75%</div>
                          </div>
                      </div>
                      <!--custom chart end-->
          </div><!-- /row --> 
          
                  </div><!-- /col-lg-9 END SECTION MIDDLE -->
                  
                  
      <!-- **********************************************************************************************************************************************************
      RIGHT SIDEBAR CONTENT
      *********************************************************************************************************************************************************** -->                  
                  
                  <div class="col-lg-3 ds">
                    <!--COMPLETED ACTIONS DONUTS CHART-->
            <h3>ASUNTOS PARA HOY</h3>
   
                      <!-- First Action -->
                      <?php foreach ($appointments as $row):?>
                      <?php 
                      switch ($row['category']) {
                        case 'intolerance':
                          $category = "Intolerancia";
                          break;


                        case 'juices':
                          $category = "Enviar Jugos";
                          break;

                        case 'consultation':
                          $category = "Consulta";
                          break;

                        case 'cavitation':
                          $category = "Cavitación";
                          break;
                      }
                      ?>
                      <div class="desc">
                        <div class="thumb">
                          <span class="badge bg-theme"><i class="fa fa-clock-o"></i></span>
                        </div>
                        <div class="details">
                          <p><muted><?php echo date_format(new DateTime($row['datetime']), 'g:i a')?></muted><br/>
                             <a href="<?php echo base_url('main/detail/' . $row['id'] . '/' . $row['program'] . '/dashboard')?>"><?php echo $category?></a> <?php echo $row['full_name']?><br/>
                          </p>
                        </div>
                      </div>
                      <?php endforeach ?>
                       <!-- USERS ONLINE SECTION -->
            <h3>EQUIPO</h3>
                      <!-- First Member -->
                      <?php foreach ($team as $row):?>
                      <div class="desc">
                        <div class="thumb">
                          <img class="img-circle" src="<?php echo $row['image']?>" width="35px" height="35px" align="">
                        </div>
                        <div class="details">
                          <p><a href="#"><?php echo $row['full_name']?></a><br/>
                             <muted>Available</muted>
                          </p>
                        </div>
                      </div>
                      <?php endforeach ?>
                  </div><!-- /col-lg-3 -->
              </div><! --/row -->
          </section>
      </section>

      <!--main content end-->
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              healthON - <?php echo date('Y') ?>
              <a href="index.html#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url()?>assets/js/jquery.js"></script>
    <script src="<?php echo base_url()?>assets/js/jquery-1.8.3.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="<?php echo base_url()?>assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="<?php echo base_url()?>assets/js/jquery.scrollTo.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="<?php echo base_url()?>assets/js/jquery.sparkline.js"></script>


    <!--common script for all pages-->
    <script src="<?php echo base_url()?>assets/js/common-scripts.js"></script>
    
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/gritter/js/jquery.gritter.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/gritter-conf.js"></script>

    <!--script for this page-->
    <script src="<?php echo base_url()?>assets/js/sparkline-chart.js"></script>    
  <script src="<?php echo base_url()?>assets/js/zabuto_calendar.js"></script>  
  
  // <script type="text/javascript">
  //       $(document).ready(function () {
  //       var unique_id = $.gritter.add({
  //           // (string | mandatory) the heading of the notification
  //           title: 'Welcome to Dashgum!',
  //           // (string | mandatory) the text inside the notification
  //           text: 'Hover me to enable the Close Button. You can hide the left sidebar clicking on the button next to the logo. Free version for <a href="http://blacktie.co" target="_blank" style="color:#ffd777">BlackTie.co</a>.',
  //           // (string | optional) the image to display on the left
  //           image: '<?php echo base_url()?>assets/img/ui-sam.jpg',
  //           // (bool | optional) if you want it to fade out on its own or just sit there
  //           sticky: true,
  //           // (int | optional) the time you want it to be alive for before fading out
  //           time: '',
  //           // (string | optional) the class name you want to apply to that specific message
  //           class_name: 'my-sticky-class'
  //       });

  //       return false;
  //       });
  // </script>
  
  <script type="application/javascript">
        $(document).ready(function () {
            $("#date-popover").popover({html: true, trigger: "manual"});
            $("#date-popover").hide();
            $("#date-popover").click(function (e) {
                $(this).hide();
            });
        
            $("#my-calendar").zabuto_calendar({
                action: function () {
                    return myDateFunction(this.id, false);
                },
                action_nav: function () {
                    return myNavFunction(this.id);
                },
                ajax: {
                    url: "show_data.php?action=1",
                    modal: true
                },
                legend: [
                    {type: "text", label: "Special event", badge: "00"},
                    {type: "block", label: "Regular event", }
                ]
            });
        });
        
        
        function myNavFunction(id) {
            $("#date-popover").hide();
            var nav = $("#" + id).data("navigation");
            var to = $("#" + id).data("to");
            console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
        }
    </script>
  

  </body>
</html>