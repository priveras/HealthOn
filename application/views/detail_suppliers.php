      
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
                    <h3 class="panel-title"><?php echo $supplier[0]['name']?> <?php echo $supplier[0]['last_name1']?> <?php echo $supplier[0]['last_name2']?><a href="<?php echo base_url('main/edit_supplier_view/' . $supplier[0]['id'])?>"><span class="pull-right fa fa-pencil"></span></a></h3>
                  </div>
                  <div class="panel-body">
                    <div class="row">
                      <div class="col-lg-4 col-md-4 text-center">
                        <a href="mailto:<?php echo $supplier[0]['email']?>"><i class="fa fa-envelope-o"></i> <?php echo $supplier[0]['email']?></div></a>
                        <div class="col-lg-4 col-md-4 text-center">
                          <i class="fa fa-mobile-phone"></i> <?php echo $supplier[0]['cellphone']?>
                        </div>
                        <div class="col-lg-4 col-md-4 text-center">
                          <i class="fa fa-phone"></i> <?php echo $supplier[0]['phone']?>
                        </div>
                      </div>
                      <br>
                      <div class="row">
                        <div class="col-lg-4 col-md-4 text-center"></div>
                        <div class="col-lg-4 col-md-4 text-center">
                          <i class="fa fa-map-marker"></i> <?php echo $supplier[0]['street']?> <?php echo $supplier[0]['interior_number']?>, <?php echo $supplier[0]['colonia']?> <?php echo $supplier[0]['delegacion']?>, <?php echo $supplier[0]['cp']?>
                        </div>
                        <div class="col-lg-4 col-md-4 text-center"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row mt">
              <div class="col-lg-2"></div>
              <div class="col-lg-8">
                <div class="panel panel-default">
                  <div class="panel-heading text-center">
                    <i class="fa fa-building"></i> 
                    <h3 class="panel-title">Datos de Facturación y Banco</h3>
                  </div>
                  <div class="panel-body">
                    <div class="row">
                      <div class="col-lg-4 col-md-4 text-center">
                        <b>Nombre Facturación:</b> <?php echo $supplier[0]['billing_full_name']?>
                      </div>
                      <div class="col-lg-4 col-md-4 text-center">
                        <b>Dir. Facturación:</b> <?php echo $supplier[0]['billing_address']?>
                      </div>
                      <div class="col-lg-4 col-md-4 text-center">
                        <b>RFC:</b></i> <?php echo $supplier[0]['rfc']?>
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-lg-4 col-md-4 text-center">
                        <b>Banco:</b> <?php echo $supplier[0]['bank']?>
                      </div>
                      <div class="col-lg-4 col-md-4 text-center">
                        <b>Sucursal:</b> <?php echo $supplier[0]['sucursal']?>
                      </div>
                      <div class="col-lg-4 col-md-4 text-center">
                        <b>No. Cuenta:</b> <?php echo $supplier[0]['cuenta']?>
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-lg-4 col-md-4 text-center">
                        <b>CLABE:</b> <?php echo $supplier[0]['clabe']?>
                      </div>
                      <div class="col-lg-4 col-md-4 text-center">
                        <b>Nombre:</b> <?php echo $supplier[0]['name']?>
                      </div>
                      <div class="col-lg-4 col-md-4 text-center">
                        
                      </div>
                    </div>
                  </div>
                </div>
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
