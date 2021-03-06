
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
            <?php if($view == 'calendar'):?>
            <a href="<?php echo base_url('main/calendar')?>"><h3><i class="fa fa-angle-left"></i> Calendario</h3></a>
            <?php else: ?>
            <a href="<?php echo base_url('main/sessions/' . $client[0]['id'] . '/' . 'clients')?>"><h3><i class="fa fa-angle-left"></i> Citas - <?php echo $client[0]['name']?> <?php echo $client[0]['last_name1']?></h3></a>
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
                      <h4 class="mb"><i class="fa fa-calendar-o"></i> Datos de Cita</h4>
                      <?php $attributes = array('role' => 'form', 'class' => 'form-horizontal style-form'); echo form_open('main/update_session_to_db/' . $client[0]['id'] . '/' . $session_data[0]['id'], $attributes); ?>
                      <!-- <form class="form-horizontal style-form" method="get"> -->
                          <div class="form-group">
                            <div class="col-sm-10 col-lg-6">
                              <div style="width:100%;"class="list-group-item list-group-item-warning text-center"><?php echo $program?></div>
                            </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 control-label">
                                <?php if($program == "OnDetox" || $program == "MiniOndetox"){
                                  echo "Fecha y hora de entrega";
                                } else {
                                  echo "Fecha y hora de cita";
                                }
                                ?>
                              </label>
                              <div class="col-sm-10 col-lg-4">
                                <div class='input-group date' id='datetimepicker1'>
                                  <?php 
                                  $datetime = array(
                                    'type' => 'text',
                                    'class' => 'form-control',
                                    'name' => 'datetime',
                                    'value' => $session_data[0]['datetime'],
                                    );

                                  echo form_input($datetime);
                                  ?>
                                  <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                </div>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Terapeuta</label>
                              <div class="col-sm-10 col-lg-4">
                                  <?php 
                                  $therapist = array(
                                    'type' => 'text',
                                    'class' => 'form-control',
                                    'name' => 'therapist',
                                    'value' => $session_data[0]['therapist'],
                                    );

                                  echo form_input($therapist);
                                  ?>
                              </div>
                          </div>
                          <?php

                          switch ($program) {
                            case 'Cavitacion':
                              echo "
                              <div class='form-group'>
                                <label class='col-sm-2 col-sm-2 control-label'>Zona</label>
                                <div class='col-sm-10 col-lg-4'>";
                                    $zona = array(
                                      'type' => 'text',
                                      'class' => 'form-control',
                                      'name' => 'zona',
                                      'value' => $session_data[0]['zone'],
                                      );

                                    echo form_input($zona);
                                echo "    
                                </div>
                              </div>
                              ";
                              break;

                            case 'RESETest':
                              echo "
                              <div class='form-group'>
                                <label class='col-sm-2 col-sm-2 control-label'>¿Quien tomó la muestra?</label>
                                <div class='col-sm-10 col-lg-4'>";
                                    $muestra = array(
                                      'type' => 'text',
                                      'class' => 'form-control',
                                      'name' => 'muestra',
                                      'value' => $session_data[0]['muestra'],
                                      );

                                    echo form_input($muestra);
                                echo "    
                                </div>
                              </div>
                              ";
                              break;
                            
                            case 'OnDetox':
                              echo "
                              <div class='form-group'>
                                <label class='col-sm-2 col-sm-2 control-label'># Días</label>
                                <div class='col-sm-10 col-lg-4'>";
                                    $dias = array(
                                      'type' => 'text',
                                      'class' => 'form-control',
                                      'name' => 'dias',
                                      'value' => $session_data[0]['dias'],
                                      );

                                    echo form_input($dias);
                                echo "    
                                </div>
                              </div>
                              ";
                              echo "
                              <div class='form-group'>
                                <label class='col-sm-2 col-sm-2 control-label'># Entrega</label>
                                <div class='col-sm-10 col-lg-4'>";
                                    $entrega = array(
                                      'type' => 'text',
                                      'class' => 'form-control',
                                      'name' => 'entrega',
                                      'value' => $session_data[0]['entrega'],
                                      );

                                    echo form_input($entrega);
                                echo "    
                                </div>
                              </div>
                              ";
                              echo "
                              <div class='form-group'>
                                <label class='col-sm-2 col-sm-2 control-label'>Especificaciones</label>
                                <div class='col-sm-10 col-lg-4'>";
                                    $especificaciones = array(
                                      'type' => 'text',
                                      'class' => 'form-control',
                                      'name' => 'especificaciones',
                                      'rows' => 2,
                                      'value' => $session_data[0]['especificaciones'],
                                      );

                                    echo form_textarea($especificaciones);
                                echo "    
                                </div>
                              </div>
                              ";

                              echo "
                              <div class='form-group'>
                                <label class='col-sm-2 col-sm-2 control-label'>Confirmado por Ricardo</label>
                                <div class='col-sm-10 col-lg-4'>";
                                  if($session_data[0]['ricardo'] == 'accept')
                                    {
                                      $bool = TRUE;
                                    }
                                    else
                                    {
                                      $bool = FALSE;
                                    }
                                    echo form_checkbox('Ricardo', 'accept', $bool);
                                    echo " &nbsp Seleccionar si ya se ha confirmado";
                                echo "    
                                </div>
                              </div>
                              ";

                              echo "
                              <div class='form-group'>
                                <label class='col-sm-2 col-sm-2 control-label'>Llamad al paciente</label>
                                <div class='col-sm-10 col-lg-4'>";
                                if($session_data[0]['llamada'] == 'accept')
                                    {
                                      $bool = TRUE;
                                    }
                                    else
                                    {
                                      $bool = FALSE;
                                    }
                                    echo form_checkbox('llamada', 'accept', $bool);
                                    echo " &nbsp Seleccionar si ya se ha confirmado";
                                echo "    
                                </div>
                              </div>
                              ";

                              echo "
                              <div class='form-group'>
                                <label class='col-sm-2 col-sm-2 control-label'>A distancia</label>
                                <div class='col-sm-10 col-lg-4'>";
                                if($session_data[0]['distancia'] == 'accept')
                                    {
                                      $bool = TRUE;
                                    }
                                    else
                                    {
                                      $bool = FALSE;
                                    }
                                    echo form_checkbox('distancia', 'accept', $bool);
                                    echo " &nbsp Seleccionar si es a distancia";
                                echo "    
                                </div>
                              </div>
                              ";
                              break;
                          }

                          ?>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Estatus</label>
                              <div class="col-sm-10 col-lg-4">
                                  <?php 

                                  $options = array(
                                    $session_data[0]['status'] => $session_data[0]['status'],
                                    'Confirmada' => 'Confirmada',
                                    'Pendiente' => 'Pendiente',
                                    'Cancelada' => 'Cancelada',
                                    );

                                  echo form_dropdown('status', $options, '', 'class="form-control"');

                                  ?>
                                </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Recomendó</label>
                              <div class="col-sm-10 col-lg-4">
                                  <?php 
                                  $recommended = array(
                                    'type' => 'text',
                                    'class' => 'form-control',
                                    'name' => 'recommended',
                                    'value' => $session_data[0]['recommended'],
                                    );

                                  echo form_input($recommended);
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
                                    'value' => $session_data[0]['comments'],
                                    );

                                  echo form_textarea($comments);
                                  ?>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Completada</label>
                              <div class="col-sm-10 col-lg-4">
                                <div class="checkbox">
                                  <label>
                                    <?php 
                                    if($session_data[0]['completed'] == 'accept')
                                    {
                                      $bool = TRUE;
                                    }
                                    else
                                    {
                                      $bool = FALSE;
                                    }
                                    ?>
                                    <?php echo form_checkbox('completed', 'accept', $bool); ?>
                                    Seleccionar si ya se ha completado
                                  </label>
                                </div>
                              </div>
                          </div>
                          <div class="form-group">
                            <div class="col-sm-10 col-lg-6">
                              <?php 

                              $program = array(
                                'type' => 'hidden',
                                'name' => 'program',
                                'value' => $program,
                                );

                              //<i class="fa fa-lock"></i>
                              echo form_submit($program);

                              $submit = array(
                                'type' => 'submit',
                                'name' => 'submit',
                                'class' => 'btn btn-theme btn-block',
                                'value' => 'GUARDAR CITA',
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