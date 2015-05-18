
      <link href="<?php echo base_url()?>assets/css/bootstrap-datetimepicker.css" rel="stylesheet">

      </head>

      <body>

      <!-- header start-->

      <?php $this->load->view('header');?>

      <!-- header end-->
      
      <!-- sidebar start-->

      <?php $this->load->view('menu');?>

      <!-- sidebar end-->
      
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper site-min-height">
          	<a href="<?php echo base_url('main/payments/' . $client[0]['id'] . '/' . 'clients')?>"><h3><i class="fa fa-angle-left"></i> Pagos - <?php echo $client[0]['name']?> <?php echo $client[0]['last_name1']?></h3></a>
          	<?php if($this->session->userdata('error')): ?>
            <div class="col-lg-5">
            <div class="alert alert-danger alert-dismissible fade in" role="alert">
                <button type="button" class="close" data-dismiss="alert">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <strong>¡Hubo un error!</strong>
                <?php echo $this->session->userdata('error'); $this->session->unset_userdata('error'); ?>
            </div>
            </div>
            <?php endif ?>
          	<!-- BASIC FORM ELELEMNTS -->
          	<div class="row mt">
          		<div class="col-lg-12">
                  <div class="form-panel">
                  	  <h4 class="mb"><i class="fa fa-dollar"></i> Datos de Pago</h4>
                      <?php $attributes = array('role' => 'form', 'class' => 'form-horizontal style-form'); echo form_open('main/update_payments_to_db/' . $client[0]['id'] . '/' . $payment_data[0]['id'], $attributes); ?>
                      <!-- <form class="form-horizontal style-form" method="get"> -->
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Requiere Factura</label>
                              <div class="col-sm-10 col-lg-4">
                                  <?php 
                                  $options = array(
                                    $payment_data[0]['billing'] => $payment_data[0]['billing'],
                                    'No' => 'No',
                                    'Si' => 'Si',
                                    );

                                  echo form_dropdown('billing', $options, '', 'class="form-control"');

                                  ?>
                                </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Programa</label>
                              <div class="col-sm-10 col-lg-4">
                                  <?php 

                                  $options = array(
                                    $payment_data[0]['program'] => $payment_data[0]['program'],
                                    'OnDetox' => 'OnDetox',
                                    'MiniOndetox' => 'MiniOndetox',
                                    'Intolerancia' => 'Intolerancia',
                                    'Cavitacion' => 'Cavitacion',
                                    'Consulta1aVez' => 'Consulta 1a Vez',
                                    'ConsultaSubsecuente' => 'Consulta Subsecuente',
                                    );

                                  echo form_dropdown('program', $options, '', 'class="form-control"');

                                  ?>
                                </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Cuánto pagó del programa</label>
                              <div class="col-sm-10 col-lg-4">
                                <div class="input-group">
                                  <div class="input-group-addon">$</div>
                                  <?php 
                                  $payment = array(
                                    'type' => 'text',
                                    'class' => 'form-control',
                                    'name' => 'payment',
                                    'value' => $payment_data[0]['payment'],
                                    );

                                  echo form_input($payment);
                                  ?>
                                  <div class="input-group-addon">.00</div>
                                </div>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Cuánto pagó de la cavitación</label>
                              <div class="col-sm-10 col-lg-4">
                                <div class="input-group">
                                  <div class="input-group-addon">$</div>
                                  <?php 
                                  $payment_cavitation = array(
                                    'type' => 'text',
                                    'class' => 'form-control',
                                    'name' => 'payment_cavitation',
                                    'value' => $payment_data[0]['payment_cavitation'],
                                    );

                                  echo form_input($payment_cavitation);
                                  ?>
                                  <div class="input-group-addon">.00</div>
                                </div>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Total Pago</label>
                              <div class="col-sm-10 col-lg-4">
                                <div class="input-group">
                                  <div class="input-group-addon">$</div>
                                  <?php 
                                  $totalpago = array(
                                    'type' => 'number',
                                    'class' => 'form-control',
                                    'name' => 'totalpago',
                                    'value' => $payment_data[0]['totalpago'],
                                    );

                                  echo form_input($totalpago);
                                  ?>
                                  <div class="input-group-addon">.00</div>
                                </div>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Forma de Pago</label>
                              <div class="col-sm-10 col-lg-4">
                                  <?php 

                                  $options = array(
                                    $payment_data[0]['payment_type'] => $payment_data[0]['payment_type'],
                                    'Efectivo' => 'Efectivo',
                                    'Cheque' => 'Cheque',
                                    'Deposito' => 'Depósito',
                                    'Tarjeta' => 'Tarjeta',
                                    '3Meses' => '3Meses',
                                    'Clip' => 'Clip',
                                    );

                                  echo form_dropdown('payment_type', $options, '', 'class="form-control"');

                                  ?>
                                </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Comentarios</label>
                              <div class="col-sm-10 col-lg-4">
                                <?php 
                                  $comments = array(
                                    'type' => 'text',
                                    'class' => 'form-control',
                                    'name' => 'comments',
                                    'rows' => 2,
                                    'value' => $payment_data[0]['comments'],
                                    );

                                  echo form_textarea($comments);
                                  ?>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Datos de Pago</label>
                              <div class="col-sm-10 col-lg-4">
                                <?php 
                                  $datosdepago = array(
                                    'type' => 'text',
                                    'class' => 'form-control',
                                    'name' => 'datosdepago',
                                    'rows' => 2,
                                    'value' => $payment_data[0]['datosdepago'],
                                    );

                                  echo form_textarea($datosdepago);
                                  ?>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Número de Factura</label>
                              <div class="col-sm-10 col-lg-4">
                                  <?php 
                                  $numerodefactura = array(
                                    'type' => 'text',
                                    'class' => 'form-control',
                                    'name' => 'numerodefactura',
                                    'value' => $payment_data[0]['numerodefactura'],
                                    );

                                  echo form_input($numerodefactura);
                                  ?>
                              </div>
                          </div>
                          <div class="form-group">
                            <div class="col-sm-10 col-lg-6">
                              <?php 
                              $submit = array(
                                'type' => 'submit',
                                'name' => 'submit',
                                'class' => 'btn btn-theme btn-block',
                                'value' => 'ACTUALIZAR PAGO',
                                );

                              //<i class="fa fa-lock"></i>
                              echo form_submit($submit);
                              echo form_close(); 
                              ?>
                            </div>
                          </div>
                      </form>
                  </div>
          		</div><!-- col-lg-12-->      	
          	</div><!-- /row -->
          </section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->

      <!--main content end-->
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              healthON - <?php echo date('Y') ?>
              <a href="form_component.html#" class="go-top">
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

    <!--script for this page-->
    <script src="<?php echo base_url()?>assets/js/jquery-ui-1.9.2.custom.min.js"></script>

	<!--custom switch-->
	<script src="<?php echo base_url()?>assets/js/bootstrap-switch.js"></script>
	
	<!--custom tagsinput-->
	<script src="<?php echo base_url()?>assets/js/jquery.tagsinput.js"></script>
	
	<script type="text/javascript" src="<?php echo base_url()?>assets/js/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>

  <!-- DateTime picker -->

  <script type="text/javascript">
  $(function () {
    $('#datetimepicker1').datetimepicker({
      format: 'YYYY-MM-DD HH:mm',
      });

    $('#datetimepicker2').datetimepicker({
      format: 'YYYY-MM-DD',
      });
  });
  </script>

  <script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
  <script src="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/v4.0.0/src/js/bootstrap-datetimepicker.js"></script>

  </body>
</html>