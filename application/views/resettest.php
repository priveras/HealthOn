      </head>

      <body ng-app="HealthOnApp2" ng-controller="suppliersController">

      <section id="container" >

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
          <section class="wrapper site-min-height">
          	<h3><i class="fa fa-folder-open-o"></i> RESETest</h3>
              <div class="row mt">
                  <div class="col-md-12">
                      <div class="content-panel">
                          <table class="table table-striped table-advance table-hover">
                              <h4>Datos de RESETest</h4>
                              <hr>
                              <br>
                              <thead>
                              <tr>
                                  <th><i class="fa fa-user"></i> Cliente</th>
                                  <th><i class="fa fa-calendar"></i> Fecha de muestra</th>
                                  <!-- <th><i class="fa fa-clock-o"></i> Hora de muestra</th> -->
                                  <th><i class="fa fa-user-md"></i> Tomo la muestra</th>
                                  <th><i class="fa fa-calendar"></i> Fecha Envío</th>
                                  <th><i class="fa fa-calendar"></i> Fecha Resultados</th>
                                  <th><i class="fa fa-folder"></i> Programa</th>
                                  <th><i class="fa fa-comment"></i> Comentarios</th>
                              </tr>
                              </thead>
                              <tbody infinite-scroll='loadMore()' infinite-scroll-distance='2'>
                                <?php foreach ($data as $row):?>
                                <tr>
                                  <td><a href="<?php echo base_url('main/detail/' . $row['client_id'] . '/' . 'resettest')?>"><?php echo $row['name'] . ' ' . $row['last_name1']?></a></td>
                                  <td><?php echo date_format(new DateTime($row['datetime']), 'd F Y')?></td>
                                  <!-- <td class="hidden-phone"><?php echo date_format(new DateTime($row['datetime']), 'g:i a')?></td> -->
                                  <td><?php echo $row['therapist']?></td>
                                  <td><?php echo date_format(new DateTime($row['delivery_date']), 'd F Y')?></td>
                                  <td><?php echo date_format(new DateTime($row['results_date']), 'd F Y')?></td>
                                  <td><?php echo $row['program']?></td>
                                  <td><?php echo $row['comments']?></td>
                                </tr>
                                <?php endforeach ?>
                              </tbody>
                          </table>

                      </div><!-- /content-panel -->
                  </div><!-- /col-md-12 -->
              </div><!-- /row -->
          </section><!--/wrapper -->
      </section><!-- /MAIN CONTENT -->

      <!--main content end-->
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              healthON - <?php echo date('Y') ?>
              <a href="basic_table.html#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url()?>assets/js/jquery.js"></script>
    <script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="<?php echo base_url()?>assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="<?php echo base_url()?>assets/js/jquery.scrollTo.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/jquery.nicescroll.js" type="text/javascript"></script>


    <!--common script for all pages-->
    <script src="<?php echo base_url()?>assets/js/common-scripts.js"></script>


  </body>
</html>
