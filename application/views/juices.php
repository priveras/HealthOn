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
          	<h3><i class="fa fa-glass"></i> Jugos</h3>
              <div class="row mt">
                  <div class="col-md-12">
                      <div class="content-panel">
                          <table class="table table-striped table-advance table-hover">
                              <h4>Datos de Jugos</h4>
                              <hr>
                              <br>
                              <thead>
                              <tr>
                                  <th><i class="fa fa-user"></i> Cliente</th>
                                  <th><i class="fa fa-truck"></i> Fecha Envío</th>
                                  <th><i class="fa fa-clock-o"></i> Hora</th>
                                  <th><i class="fa fa-map-marker"></i> Ubicacion</th>
                                  <th><i class="fa fa-sun-o"></i> Días</th>
                                  <th> # de Entrega</th>
                                  <th><i class=" fa fa-check"></i> Conf. Ricardo</th>
                                  <th><i class=" fa fa-check"></i> Conf. Paciente</th>
                                  <th><i class=" fa fa-folder"></i> Programa</th>
                                  <th><i class=" fa fa-comment"></i> Especificaciones</th>
                              </tr>
                              </thead>
                              <tbody infinite-scroll='loadMore()' infinite-scroll-distance='2'>
                                <?php foreach ($data as $row):?>
                                <tr>
                                  <td><a href="<?php echo base_url('main/detail/' . $row['client_id'] . '/' . 'juices')?>"><?php echo $row['name'] . ' ' . $row['last_name1']?></a></td>
                                  <td><?php echo date_format(new DateTime($row['datetime']), 'd F Y')?></td>
                                  <td class="hidden-phone"><?php echo date_format(new DateTime($row['datetime']), 'g:i a')?></td>
                                  <td><?php echo $row['address']?></td>
                                  <td><?php echo $row['days']?></td>
                                  <td><?php echo $row['numerodeentrega']?></td>
                                  <td>
                                    <?php 
                                    if($row['ricardo'] == 'accept'){
                                      echo "<i style='color: green' class='fa fa-check'></i>";
                                    }else{
                                      echo "<i style='color: red' class='fa fa-times'></i>";
                                    }
                                    ?>
                                  </td>
                                  <td>
                                    <?php 
                                    if($row['llamada'] == 'accept'){
                                      echo "<i style='color: green' class='fa fa-check'></i>";
                                    }else{
                                      echo "<i style='color: red' class='fa fa-times'></i>";
                                    }
                                    ?>
                                  </td>
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
