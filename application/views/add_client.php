      </head>

      <body>

      <section id="container" >

      <!-- header start-->

      <?php $this->load->view('header');?>

      <!-- header end-->
      
      <!-- sidebar start-->

      <?php $this->load->view('menu');?>

      <!-- sidebar end-->
      
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
          	<a href="<?php echo base_url()?>main/clients"><h3><i class="fa fa-angle-left"></i> Clientes</h3></a>
            <?php if($this->session->userdata('error')): ?>
            <div class="col-lg-5">
            <div class="alert alert-danger alert-dismissible fade in" role="alert">
                <button type="button" class="close" data-dismiss="alert">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <strong>¡Hubo un error!</strong>
                <?php 

                if(validation_errors() == 1){
                  echo "Ese email ya está registrado";
                }else{
                  echo $this->session->userdata('error');
                }
                $this->session->unset_userdata('error');
                ?>
            </div>
            </div>
            <?php endif ?>
          	<!-- BASIC FORM ELELEMNTS -->
          	<div class="row mt">
          		<div class="col-lg-12">
                  <div class="form-panel">
                  	  <h4 class="mb"><i class="fa fa-book"></i> Datos del Cliente</h4>
                      <?php $attributes = array('role' => 'form', 'class' => 'form-horizontal style-form'); echo form_open('main/add_client_to_db', $attributes); ?>
                      <!-- <form class="form-horizontal style-form" method="get"> -->
                          <div class="form-group">
                              <label class="col-sm-2 control-label">Nombre completo</label>
                              <div class="col-sm-10 col-lg-4">
                                  <?php 
                                  $full_name = array(
                                    'type' => 'text',
                                    'class' => 'form-control',
                                    'name' => 'full_name',
                                    'value' => $this->input->post('full_name'),
                                    );

                                  echo form_input($full_name);
                                  ?>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Dirección</label>
                              <div class="col-sm-10 col-lg-4">
                                  <?php 
                                  $address = array(
                                    'type' => 'text',
                                    'class' => 'form-control',
                                    'name' => 'address',
                                    'value' => $this->input->post('address'),
                                    );

                                  echo form_input($address);
                                  ?>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Email</label>
                              <div class="col-sm-10 col-lg-4">
                                <?php 
                                  $email = array(
                                    'type' => 'email',
                                    'class' => 'form-control',
                                    'name' => 'email',
                                    'value' => $this->input->post('email'),
                                    );

                                  echo form_input($email);
                                  ?>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Teléfono</label>
                              <div class="col-sm-10 col-lg-4">
                                <?php 
                                  $phone = array(
                                    'type' => 'number',
                                    'class' => 'form-control',
                                    'name' => 'phone',
                                    'value' => $this->input->post('phone'),
                                    );

                                  echo form_input($phone);
                                  ?>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Celular</label>
                              <div class="col-sm-10 col-lg-4">
                                <?php 
                                  $cellphone = array(
                                    'type' => 'number',
                                    'class' => 'form-control',
                                    'name' => 'cellphone',
                                    'value' => $this->input->post('cellphone'),
                                    );

                                  echo form_input($cellphone);
                                  ?>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Programa</label>
                              <div class="col-sm-10 col-lg-4">
                                <?php
                                $options = array(
                                  'error' => 'Escoger Programa...',
                                  'OnDetox' => 'OnDetox',
                                  'MiniOnDetox' => 'Mini OnDetox',
                                  'Intolerancia' => 'Test de Intolerancia',
                                  'Consulta' => 'Consulta',
                                  'Cavitacion' => 'Cavitación',
                                  );

                                // foreach ($lists as $row) {
                                //     $list_id = $row['id'];
                                //     $list = $row['list'];
                                //     $options[$list_id] = $list;
                                // }

                                echo form_dropdown('program', $options, '', 'class="form-control"');

                                ?>
                              </div>
                          </div>
                          <h4 class="mb"><i class="fa fa-barcode"></i> Datos de Facturación</h4>
                          <div class="form-group">
                              <label class="col-sm-2 control-label">Nombre</label>
                              <div class="col-sm-10 col-lg-4">
                                  <?php 
                                  $full_name = array(
                                    'type' => 'text',
                                    'class' => 'form-control',
                                    'name' => 'name_invoice',
                                    'value' => $this->input->post('full_name'),
                                    );

                                  echo form_input($full_name);
                                  ?>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Dirección</label>
                              <div class="col-sm-10 col-lg-4">
                                  <?php 
                                  $address = array(
                                    'type' => 'text',
                                    'class' => 'form-control',
                                    'name' => 'address',
                                    'value' => $this->input->post('address'),
                                    );

                                  echo form_input($address);
                                  ?>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">RFC</label>
                              <div class="col-sm-10 col-lg-4">
                                <?php 
                                  $rfc = array(
                                    'type' => 'text',
                                    'class' => 'form-control',
                                    'name' => 'rfc',
                                    'value' => $this->input->post('rfc'),
                                    );

                                  echo form_input($rfc);
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
                                'value' => 'CONTINUAR',
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

  </body>
</html>