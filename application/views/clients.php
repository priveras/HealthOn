      </head>

      <body>

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
          	<h3><i class="fa fa-group"></i> Clientes</h3>
				

              <div class="row mt">
                  <div class="col-md-12">
                      <div class="content-panel">
                          <table class="table table-striped table-advance table-hover">
                              <h4><i class="fa fa-list-ul"></i> Directorio<span><a style="margin-left:7px"class="btn btn-success btn-sm" href="<?php echo base_url()?>main/add_client"><i class="fa fa-plus"></i></a></span></h4>
                              <hr>
                              <thead>
                              <tr>
                                  <th><i class="fa fa-user"></i> Nombre</th>
                                  <th><i class="fa fa-envelope-o"></i> Email</th>
                                  <th><i class="fa fa-mobile-phone"></i> Celular</th>
                                  <th><i class="fa fa-phone"></i> Casa</th>
                                  <th><i class=" fa fa-file-text-o"></i> Programa</th>
                              </tr>
                              </thead>
                              <tbody>
                              <?php foreach ($clients as $row):?>
                              <?php 

                              switch ($row['program_id']) {
                                case '0':
                                  $label = 'danger'; $program = "Ondetox";
                                  break;
                                
                                case '1':
                                  $label = 'info'; $program = "Mini Ondetox";
                                  break;

                                case '2':
                                  $label = 'warning'; $program = "Intolerancia";
                                  break;

                                case '3':
                                  $label = 'primary'; $program = "Consulta";
                                  break;

                                case '4':
                                  $label = 'success'; $program = "Cavitación";
                                  break;
                              }
                              ?>
                              <tr>
                                  <td><a href="<?php echo base_url('main/detail/' . $row['id'] . '/' . $row['program_id'] . '/' . 'clients')?>"><?php echo $row['full_name']?></a></td>
                                  <td class="hidden-phone"><?php echo $row['email']?></td>
                                  <td><?php echo $row['cellphone']?></td>
                                  <td><?php echo $row['phone']?></td>
                                  <td><span class="label label-<?php echo $label?> label-mini"><?php echo $program?></span></td>
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
