    <link href="<?php echo base_url()?>assets/js/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />
  
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
            <h3><i class="fa fa-calendar"></i> Calendario</h3>
              <!-- page start-->
              <div class="row mt">
                  <aside class="col-lg-12 mt">
                      <section class="panel">
                          <div class="panel-body">
                              <div id="calendar" class="has-toolbar"></div>
                          </div>
                      </section>
                  </aside>
              </div>
              <!-- page end-->
    </section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->

      <!--main content end-->
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              healthON - <?php echo date('Y') ?>
              <a href="calendar.html#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
  </section>

  <!-- js placed at the end of the document so the pages load faster -->
  <script src="<?php echo base_url()?>assets/js/jquery.js"></script>
  <script src="<?php echo base_url()?>assets/js/jquery-ui-1.9.2.custom.min.js"></script>
  <script src="<?php echo base_url()?>assets/js/fullcalendar/fullcalendar.min.js"></script>    
  <script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
  <script class="include" type="text/javascript" src="<?php echo base_url()?>assets/js/jquery.dcjqaccordion.2.7.js"></script>
  <script src="<?php echo base_url()?>assets/js/jquery.scrollTo.min.js"></script>
  <script src="<?php echo base_url()?>assets/js/jquery.nicescroll.js" type="text/javascript"></script>


  <!--common script for all pages-->
  <script src="<?php echo base_url()?>assets/js/common-scripts.js"></script>

    <!--script for this page-->
  <script src="<?php echo base_url()?>assets/js/calendar-conf-events.js"></script>    
  
  <script>
      //custom select box

      $(function(){
          $("select.styled").customSelect();
      });

  </script>

  </body>
</html>