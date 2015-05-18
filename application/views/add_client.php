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
          	<div class="row mt">
          		<div class="col-lg-12">
                  <div class="form-panel">
                  	  <h4 class="mb"><i class="fa fa-book"></i> Datos del Cliente</h4>
                      <div rol="form" class="form-horizontal">
                      <?php $attributes = array('role' => 'form', 'class' => 'form-horizontal style-form'); echo form_open('main/add_client_to_db', $attributes); ?>
                      <!-- <form class="form-horizontal style-form" method="get"> -->
                        <div class="form-inline">
                          <div class="form-group">
                            <div class="col-sm-10 col-lg-4">
                              <?php 
                              $name = array(
                                'type' => 'text',
                                'class' => 'form-control',
                                'name' => 'name',
                                'placeholder' => 'Nombre(s)',
                                'value' => $this->input->post('name'),
                                );

                              echo form_input($name);
                              ?>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="col-sm-10 col-lg-4">
                              <?php 
                              $last_name1 = array(
                                'type' => 'text',
                                'class' => 'form-control',
                                'name' => 'last_name1',
                                'placeholder' => 'Apellido Paterno',
                                'value' => $this->input->post('last_name1'),
                                );

                              echo form_input($last_name1);
                              ?>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="col-sm-10 col-lg-4">
                              <?php 
                              $last_name2 = array(
                                'type' => 'text',
                                'class' => 'form-control',
                                'name' => 'last_name2',
                                'placeholder' => 'Apellido Materno',
                                'value' => $this->input->post('last_name2'),
                                );

                              echo form_input($last_name2);
                              ?>
                            </div>
                          </div>
                        </div>
                        <div class="form-inline">
                          <div class="form-group">
                            <div class="col-sm-10 col-lg-4">
                              <?php 
                              $street = array(
                                'type' => 'text',
                                'class' => 'form-control',
                                'name' => 'street',
                                'placeholder' => 'Calle y número',
                                'value' => $this->input->post('street'),
                                );

                              echo form_input($street);
                              ?>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="col-sm-10 col-lg-4">
                              <?php 
                              $interior_number = array(
                                'type' => 'text',
                                'class' => 'form-control',
                                'name' => 'interior_number',
                                'placeholder' => 'Número interior',
                                'value' => $this->input->post('interior_number'),
                                );

                              echo form_input($interior_number);
                              ?>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="col-sm-10 col-lg-4">
                              <?php 
                              $colonia = array(
                                'type' => 'text',
                                'class' => 'form-control',
                                'name' => 'colonia',
                                'placeholder' => 'Colonia',
                                'value' => $this->input->post('colonia'),
                                );

                              echo form_input($colonia);
                              ?>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="col-sm-10 col-lg-4">
                              <?php 
                              $delegacion = array(
                                'type' => 'text',
                                'class' => 'form-control',
                                'name' => 'delegacion',
                                'placeholder' => 'Delegación',
                                'value' => $this->input->post('delegacion'),
                                );

                              echo form_input($delegacion);
                              ?>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="col-sm-10 col-lg-4">
                              <?php 
                              $cp = array(
                                'type' => 'text',
                                'class' => 'form-control',
                                'name' => 'cp',
                                'placeholder' => 'CP',
                                'value' => $this->input->post('cp'),
                                );

                              echo form_input($cp);
                              ?>
                            </div>
                          </div>
                        </div>
                          <div class="form-group">
                              <div class="col-sm-10 col-lg-4">
                                <?php 
                                  $ciudad = array(
                                    'type' => 'text',
                                    'class' => 'form-control',
                                    'name' => 'ciudad',
                                    'placeholder' => 'Ciudad',
                                    'value' => $this->input->post('ciudad'),
                                    );

                                  echo form_input($ciudad);
                                  ?>
                              </div>
                          </div>
                          <div class="form-group">
                              <div class="col-sm-10 col-lg-4">
                                <?php 
                                  $email = array(
                                    'type' => 'email',
                                    'class' => 'form-control',
                                    'name' => 'email',
                                    'placeholder' => 'Email',
                                    'value' => $this->input->post('email'),
                                    );

                                  echo form_input($email);
                                  ?>
                              </div>
                          </div>
                          <div class="form-group">
                              <div class="col-sm-10 col-lg-4">
                                <?php 
                                  $phone = array(
                                    'type' => 'number',
                                    'class' => 'form-control',
                                    'name' => 'phone',
                                    'placeholder' => 'Teléfono',
                                    'value' => $this->input->post('phone'),
                                    );

                                  echo form_input($phone);
                                  ?>
                              </div>
                          </div>
                          <div class="form-group">
                              <div class="col-sm-10 col-lg-4">
                                <?php 
                                  $cellphone = array(
                                    'type' => 'number',
                                    'class' => 'form-control',
                                    'name' => 'cellphone',
                                    'placeholder' => 'Celular',
                                    'value' => $this->input->post('cellphone'),
                                    );

                                  echo form_input($cellphone);
                                  ?>
                              </div>
                          </div>
                          <div class="form-group">
                              <div class="col-sm-10 col-lg-4">
                                  <?php 
                                  $contact_form = array(
                                    'type' => 'text',
                                    'class' => 'form-control',
                                    'name' => 'contact_form',
                                    'placeholder' => '¿Cómo prefiere ser contactado?',
                                    'value' => $this->input->post('contact_form'),
                                    );

                                  echo form_input($contact_form);
                                  ?>
                              </div>
                          </div>
                          <div class="form-group">
                              <div class="col-sm-10 col-lg-4">
                                  <?php 
                                  $recomendo = array(
                                    'type' => 'text',
                                    'class' => 'form-control',
                                    'name' => 'recomendo',
                                    'placeholder' => 'Recomendó',
                                    'value' => $this->input->post('recomendo'),
                                    );

                                  echo form_input($recomendo);
                                  ?>
                              </div>
                          </div>
                          <h4 class="mb"><i class="fa fa-barcode"></i> Datos de Facturación</h4>
                          <div class="form-group">
                              <div class="col-sm-10 col-lg-4">
                                  <?php 
                                  $billing_full_name = array(
                                    'type' => 'text',
                                    'class' => 'form-control',
                                    'name' => 'billing_full_name',
                                    'placeholder' => 'Nombre o razón social',
                                    'value' => $this->input->post('billing_full_name'),
                                    );

                                  echo form_input($billing_full_name);
                                  ?>
                              </div>
                          </div>
                          <div class="form-group">
                              <div class="col-sm-10 col-lg-4">
                                  <?php 
                                  $billing_address = array(
                                    'type' => 'text',
                                    'class' => 'form-control',
                                    'name' => 'billing_address',
                                    'placeholder' => 'Dirección Fiscal',
                                    'value' => $this->input->post('billing_address'),
                                    );

                                  echo form_input($billing_address);
                                  ?>
                              </div>
                          </div>
                          <div class="form-group">
                              <div class="col-sm-10 col-lg-4">
                                <?php 
                                  $rfc = array(
                                    'type' => 'text',
                                    'class' => 'form-control',
                                    'name' => 'rfc',
                                    'placeholder' => 'RFC',
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
                                'value' => 'GUARDAR CLIENTE',
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