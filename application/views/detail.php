      
      </head>

      <body>

      <section id="container" >

      <!-- header start-->

      <?php $this->load->view('header');?>

      <!-- header end-->
      
      <!-- sidebar start-->

      <?php $this->load->view('menu');?>

      <?php setlocale(LC_MONETARY, 'en_US'); ?>

      <!-- sidebar end-->
      <!-- Small modal -->

      <section id="main-content">
          <section class="wrapper site-min-height">
          	<a href="<?php echo base_url('main/' . $source)?>"><h3><i class="fa fa-angle-left"></i> 
              <?php switch ($source) {
              case 'clients':
                echo 'Clientes';
                break;
              
              case 'calendar':
                echo 'Calendario';
                break;

              case 'dashboard':
                echo 'Escritorio';
                break;

              case 'suppliers':
                echo 'Proveedores';
                break;

            }
            ?></h3></a>
          	<div class="row mt">
              <div class="col-lg-2"></div>
              <div class="col-lg-8">
                <div class="panel panel-default">
                  <div class="panel-heading text-center">
                    <i class="fa fa-user"></i> 
                    <h3 class="panel-title"><?php echo $client[0]['name']?> <?php echo $client[0]['last_name1']?> <?php echo $client[0]['last_name2']?><a href="<?php echo base_url('main/edit_client_view/' . $client[0]['id'])?>"><span class="pull-right fa fa-pencil"></span></a></h3>
                  </div>
                  <div class="panel-body">
                    <div class="row">
                      <div class="col-lg-4 col-md-4 text-center">
                      <a href="mailto:<?php echo $client[0]['email']?>"><i class="fa fa-envelope-o"></i> <?php echo $client[0]['email']?></div></a>
                      <div class="col-lg-4 col-md-4 text-center">
                        <i class="fa fa-mobile-phone"></i> <?php echo $client[0]['cellphone']?>
                      </div>
                      <div class="col-lg-4 col-md-4 text-center">
                        <i class="fa fa-phone"></i> <?php echo $client[0]['phone']?>
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-lg-4 col-md-4 text-center"></div>
                      <div class="col-lg-4 col-md-4 text-center">
                        <i class="fa fa-map-marker"></i> <?php echo $client[0]['street']?> <?php echo $client[0]['interior_number']?>, <?php echo $client[0]['colonia']?> <?php echo $client[0]['delegacion']?>, <?php echo $client[0]['cp']?>
                      </div>
                      <div class="col-lg-4 col-md-4 text-center"></div>
                    </div>
                  </div>
                </div>
              </div>
          	</div>
            <div class="row">
              <div class="col-lg-2"></div>
              <div class="col-lg-4 text-center">
                <a href="<?php echo base_url('main/payments/'  . $client[0]['id'])?>" class="btn btn-primary" style="width:100%;">Pagos</a>
              </div>
              <div class="col-lg-4 text-center">
                <a href="<?php echo base_url('main/sessions/'  . $client[0]['id'])?>" class="btn btn-success" style="width:100%;">Citas</a>
              </div>
              <div class="col-lg-2"></div>
            </div>
            <br>
            <div class="row">
              <div class="col-lg-2"></div>
              <div class="col-lg-8">
                <ul class="list-group text-center">
                  <li class="list-group-item list-group-item-warning">Programas</li>
                  <?php if(!empty($sessions)): ?>
                  <?php foreach ($sessions as $row):?>
                  <li class="list-group-item"><?php echo $row['program']?></li>
                  <?php endforeach ?>
                  <?php else: ?>
                  <li class="list-group-item">No es parte de ningún programa</li>
                  <?php endif ?>
                </ul>
                <div class="col-lg-2"></div>
              </div>
            </div>
            <br>
		      </section><!--/wrapper -->
      </section><!-- /MAIN CONTENT -->

      <!--main content end-->
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              healthON - <?php echo date('Y') ?>
              <a href="blank.html#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
      </section>

      <!-- js placed at the end of the document so the pages load faster -->
      <script src="<?php echo base_url()?>assets/js/jquery.js"></script>
      <script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
      <script src="<?php echo base_url()?>assets/js/jquery-ui-1.9.2.custom.min.js"></script>
      <script src="<?php echo base_url()?>assets/js/jquery.ui.touch-punch.min.js"></script>
      <script class="include" type="text/javascript" src="<?php echo base_url()?>assets/js/jquery.dcjqaccordion.2.7.js"></script>
      <script src="<?php echo base_url()?>assets/js/jquery.scrollTo.min.js"></script>
      <script src="<?php echo base_url()?>assets/js/jquery.nicescroll.js" type="text/javascript"></script>


      <!--common script for all pages-->
      <script src="<?php echo base_url()?>assets/js/common-scripts.js"></script>

  </body>
</html>
