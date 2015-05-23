
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
          <section class="wrapper">
            <?php if($where == "calendario"):?>
            <a href="<?php echo base_url('main/calendar')?>"><h3><i class="fa fa-angle-left"></i> Calendario</h3></a>
            <?php else: ?>
            <a href="<?php echo base_url('main/detail_program/' . $client[0]['id'] . '/' . $program . '/' . 'clients')?>"><h3><i class="fa fa-angle-left"></i> <?php echo $client[0]['name']?> <?php echo $client[0]['last_name1'] . ' - ' . $program?></h3></a>
            <?php endif ?>
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
                      <h4 class="mb"><i class="fa fa-folder"></i> Datos para Jugos</h4>
                      <?php $attributes = array('role' => 'form', 'class' => 'form-horizontal style-form'); echo form_open('main/update_juices_to_db/' . $client[0]['id'] . '/' . $data[0]['id'], $attributes); ?>
                      <!-- <form class="form-horizontal style-form" method="get"> -->
                          <div class="form-group">
                              <label class="col-sm-2 control-label">Fecha y hora de envío</label>
                              <div class="col-sm-10 col-lg-4">
                                <div class='input-group date' id='datetimepicker1'>
                                  <?php 
                                  $datetime = array(
                                    'type' => 'text',
                                    'class' => 'form-control',
                                    'name' => 'datetime',
                                    'value' => $data[0]['datetime'],
                                    );

                                  echo form_input($datetime);
                                  ?>
                                  <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                </div>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Ubicación</label>
                              <div class="col-sm-10 col-lg-4">
                                  <?php 
                                  $address = array(
                                    'type' => 'text',
                                    'class' => 'form-control',
                                    'name' => 'address',
                                    'value' => $data[0]['address'],
                                    );

                                  echo form_input($address);
                                  ?>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Días</label>
                              <div class="col-sm-10 col-lg-4">
                                  <?php 
                                  $days = array(
                                    'type' => 'text',
                                    'class' => 'form-control',
                                    'name' => 'days',
                                    'value' => $data[0]['days'],
                                    );

                                  echo form_input($days);
                                  ?>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Número de entrega</label>
                              <div class="col-sm-10 col-lg-4">
                                  <?php 
                                  $numerodeentrega = array(
                                    'type' => 'text',
                                    'class' => 'form-control',
                                    'name' => 'numerodeentrega',
                                    'value' => $data[0]['numerodeentrega'],
                                    );

                                  echo form_input($numerodeentrega);
                                  ?>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Número de Pedido</label>
                              <div class="col-sm-10 col-lg-4">
                                  <?php 
                                  $numerodepedido = array(
                                    'type' => 'text',
                                    'class' => 'form-control',
                                    'name' => 'numerodepedido',
                                    'value' => $data[0]['numerodepedido'],
                                    );

                                  echo form_input($numerodepedido);
                                  ?>
                              </div>
                          </div>
                          <div class='form-group'>
                            <label class='col-sm-2 col-sm-2 control-label'>Confirmado por Ricardo</label>
                            <div class='col-sm-10 col-lg-4'>
                              <?php
                              if($data[0]['ricardo'] == 'accept')
                              {
                                $bool = TRUE;
                              }
                              else
                              {
                                $bool = FALSE;
                              }
                              echo form_checkbox('ricardo', 'accept', $bool);
                              echo " &nbsp Seleccionar si ya se ha confirmado";
                              ?>
                            </div>
                          </div>

                          <div class='form-group'>
                            <label class='col-sm-2 col-sm-2 control-label'>Llamar al paciente</label>
                            <div class='col-sm-10 col-lg-4'>
                              <?php
                              if($data[0]['llamada'] == 'accept')
                              {
                                $bool = TRUE;
                              }
                              else
                              {
                                $bool = FALSE;
                              }
                              echo form_checkbox('llamada', 'accept', $bool);
                              echo " &nbsp Seleccionar si ya se ha confirmado";
                              ?>
                            </div>
                          </div>
                              
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Especificaciones</label>
                              <div class="col-sm-10 col-lg-4">
                                <?php 
                                  $comments = array(
                                    'type' => 'text',
                                    'class' => 'form-control',
                                    'name' => 'comments',
                                    'rows' => 2,
                                    'value' => $data[0]['comments'],
                                    );

                                  echo form_textarea($comments);
                                  ?>
                              </div>
                          </div>
                          <!-- <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Pago a proveedor</label>
                              <div class="col-sm-10 col-lg-4">
                                <div class="input-group">
                                  <div class="input-group-addon">$</div>
                                  <?php 
                                  $payment = array(
                                    'type' => 'text',
                                    'class' => 'form-control',
                                    'name' => 'payment',
                                    'value' => $this->input->post('payment'),
                                    );

                                  echo form_input($payment);
                                  ?>
                                  <div class="input-group-addon">.00</div>
                                </div>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Estatus de pago</label>
                              <div class="col-sm-10 col-lg-4">
                                  <?php 
                                  $options = array(
                                    'Pagado' => 'Pagado',
                                    'Pendiente' => 'Pendiente',
                                    );

                                  echo form_dropdown('payment_status', $options, '', 'class="form-control"');

                                  ?>
                                </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Tipo de pago</label>
                              <div class="col-sm-10 col-lg-4">
                                  <?php 
                                  $options = array(
                                    'Efectivo' => 'Efectivo',
                                    'Tarjeta' => 'Tarjeta',
                                    'Depósito' => 'Depósito',
                                    );

                                  echo form_dropdown('payment_type', $options, '', 'class="form-control"');

                                  ?>
                                </div>
                          </div> -->
                          <?php 

                          $program = array(
                                    'type' => 'hidden',
                                    'name' => 'program',
                                    'value' => $program
                                    );
                          echo form_input($program);

                          ?>
                          <div class="form-group">
                            <div class="col-sm-10 col-lg-6">
                              <?php 
                              $submit = array(
                                'type' => 'submit',
                                'name' => 'submit',
                                'class' => 'btn btn-theme btn-block',
                                'value' => 'AGREGAR',
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
  });
  </script>

  <script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
  <script src="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/v4.0.0/src/js/bootstrap-datetimepicker.js"></script>

  </body>
</html>