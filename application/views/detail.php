      
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

            }
            ?></h3></a>
          	<div class="row mt">
              <div class="col-lg-2"></div>
              <div class="col-lg-8">
                <div class="panel panel-default">
                  <div class="panel-heading text-center">
                    <i class="fa fa-user"></i> 
                    <h3 class="panel-title"><?php echo $client[0]['full_name']?><a href="<?php echo base_url('main/edit_client_view/' . $client[0]['id'] . '/' . $program)?>"><span class="pull-right fa fa-pencil"></span></a></h3>
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
                      <div class="col-lg-4 col-md-4 text-center">
                      <i class="fa fa-map-marker"></i> <?php echo $client[0]['address']?></div>
                      <div class="col-lg-4 col-md-4 text-center">
                        <i class="fa fa-book"></i> <?php echo $client[0]['rfc']?>
                      </div>
                      <div class="col-lg-4 col-md-4 text-center"><?php echo $program?></div>
                    </div>
                  </div>
                </div>
              </div>
          		<div class="col-lg-12">
                <?php if($program == "OnDetox" || $program == "Intolerancia" ): ?>
                <div class="content-panel">
                    <table class="table table-striped table-advance table-hover">
                      <h4><i class="fa fa-flask"></i> Test de Intolerancia<span><a style="margin-left:7px"class="btn btn-success btn-sm" href="<?php echo base_url('main/add_view/' . $client[0]['id'] . '/' . $program . '/' . 'add_intolerance')?>"><i class="fa fa-plus"></i></a></span></h4>
                        <hr>
                        <thead>
                        <tr>
                            <th><i class="fa fa-calendar"></i> Fecha</th>
                            <th><i class="fa fa-clock-o"></i> Hora</th>
                            <th><i class="fa fa-truck"></i> Fecha Envío</th>
                            <th><i class="fa fa-user-md"></i> Terapeuta</th>
                            <th><i class=" fa fa-usd"></i> Pago a proveedor</th>
                            <th><i class=" fa fa-usd"></i> Estatus de Pago</th>
                            <th><i class=" fa fa-usd"></i> Tipo de Pago</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if(empty($appointments)):?>
                        <tr>
                          <td>-</td><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td>
                        </tr>
                        <?php else: ?>
                        <?php foreach ($appointments as $row):?>
                        <?php if($row['category'] == 'intolerance'):?>
                        <tr>
                            <td><a href="<?php echo base_url('main/edit_view/' . $client[0]['id'] . '/' . $program . '/' . 'edit_intolerance' . '/' . $row['appointment_id'])?>"><?php echo date_format(new DateTime($row['datetime']), 'd F Y')?></a></td>
                            <td class="hidden-phone"><?php echo date_format(new DateTime($row['datetime']), 'g:i a')?></td>
                            <td><?php echo date_format(new DateTime($row['delivery_date']), 'd F Y')?></td>
                            <td><?php echo $row['therapist']?></td>
                            <td><?php echo money_format('%(#10n', $row['payment']) . "\n";?></td>
                            <?php switch ($row['payment_status']) {
                              case 'Pagado':
                                $label = 'success';
                                break;
                              
                              case 'Pendiente':
                                $label = 'warning';
                                break;
                            }
                            ?>
                            <td><span class="label label-<?php echo $label ?> label-mini"><?php echo $row['payment_status']?></span></td>
                            <td><?php echo $row['payment_type'] ?></td>
                        </tr>
                        <?php endif ?>
                        <?php endforeach ?>
                        <?php endif ?>
                        </tbody>
                    </table>
                </div><!-- /content-panel -->
                <br>
                <?php endif ?>
                <?php if($program == "OnDetox" || $program == "MiniOnDetox" ): ?>
                <div class="content-panel">
                    <table class="table table-striped table-advance table-hover">
                      <h4><i class="fa fa-glass"></i> Jugos<span><a style="margin-left:7px"class="btn btn-info btn-sm" href="<?php echo base_url('main/add_view/' . $client[0]['id'] . '/' . $program . '/' . 'add_juices')?>"><i class="fa fa-plus"></i></a></span></h4>
                        <hr>
                        <thead>
                        <tr>
                            <th><i class="fa fa-truck"></i> Fecha Envío</th>
                            <th><i class="fa fa-clock-o"></i> Hora</th>
                            <th><i class="fa fa-map-marker"></i> Ubicacion</th>
                            <th><i class="fa fa-sun-o"></i> Días</th>
                            <th><i class="fa fa-file-o"></i> Especificaciones</th>
                            <th><i class=" fa fa-usd"></i> Pago a proveedor</th>
                            <th><i class=" fa fa-usd"></i> Estatus de Pago</th>
                            <th><i class=" fa fa-usd"></i> Tipo de Pago</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if(empty($appointments)):?>
                        <tr>
                          <td>-</td><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td>
                        </tr>
                        <?php else: ?>
                        <?php foreach ($appointments as $row):?>
                        <?php if($row['category'] == 'juices'):?>
                        <tr>
                            <td><a href="<?php echo base_url('main/edit_view/' . $client[0]['id'] . '/' . $program . '/' . 'edit_juices' . '/' . $row['appointment_id'])?>"><?php echo date_format(new DateTime($row['datetime']), 'd F Y')?></a></td>
                            <td class="hidden-phone"><?php echo date_format(new DateTime($row['datetime']), 'g:i a')?></td>
                            <td><?php echo $row['address']?></td>
                            <td><?php echo $row['days']?></td>
                            <td><?php echo $row['comments']?></td>
                            <td><?php echo money_format('%(#10n', $row['payment']) . "\n";?></td>
                            <?php switch ($row['payment_status']) {
                              case 'Pagado':
                                $label = 'success';
                                break;
                              
                              case 'Pendiente':
                                $label = 'warning';
                                break;
                            }
                            ?>
                            <td><span class="label label-<?php echo $label ?> label-mini"><?php echo $row['payment_status']?></span></td>
                            <td><?php echo $row['payment_type'] ?></td>
                        </tr>
                        <?php endif ?>
                        <?php endforeach ?>
                        <?php endif ?>
                        </tbody>
                    </table>
                </div><!-- /content-panel -->
                <?php endif ?>
                <?php if($program == "Consulta"): ?>
                <div class="content-panel">
                    <table class="table table-striped table-advance table-hover">
                      <h4><i class="fa fa-user-md"></i> Consulta<span><a style="margin-left:7px"class="btn btn-success btn-sm" href="<?php echo base_url('main/add_view/' . $client[0]['id'] . '/' . $program . '/' . 'add_consultation')?>"><i class="fa fa-plus"></i></a></span></h4>
                        <hr>
                        <thead>
                        <tr>
                            <th><i class="fa fa-calendar"></i> Fecha de Consulta</th>
                            <th><i class="fa fa-clock-o"></i> Hora</th>
                            <th><i class="fa fa-paperclip"></i> Tipo</th>
                            <th><i class=" fa fa-usd"></i> Pago a Nutrióloga</th>
                            <th><i class=" fa fa-usd"></i> Estatus de Pago</th>
                            <th><i class=" fa fa-usd"></i> Tipo de Pago</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if(empty($appointments)):?>
                        <tr>
                          <td>-</td><td>-</td><td>-</td><td>-</td><td>-</td>
                        </tr>
                        <?php else: ?>
                        <?php foreach ($appointments as $row):?>
                        <?php if($row['category'] == 'consultation'):?>
                        <tr>
                            <td><a href="<?php echo base_url('main/edit_view/' . $client[0]['id'] . '/' . $program . '/' . 'edit_consultation' . '/' . $row['appointment_id'])?>"><?php echo date_format(new DateTime($row['datetime']), 'd F Y')?></a></td>
                            <td class="hidden-phone"><?php echo date_format(new DateTime($row['datetime']), 'g:i a')?></td>
                            <td><?php echo $row['type']?></td>
                            <td><?php echo money_format('%(#10n', $row['payment']) . "\n";?></td>
                            <?php switch ($row['payment_status']) {
                              case 'Pagado':
                                $label = 'success';
                                break;
                              
                              case 'Pendiente':
                                $label = 'warning';
                                break;
                            }
                            ?>
                            <td><span class="label label-<?php echo $label ?> label-mini"><?php echo $row['payment_status']?></span></td>
                            <td><?php echo $row['payment_type'] ?></td>
                        </tr>
                        <?php endif ?>
                        <?php endforeach ?>
                        <?php endif ?>
                        </tbody>
                    </table>
                </div><!-- /content-panel -->
                <?php endif ?>
                <?php if($program == "Cavitacion"): ?>
                <div class="content-panel">
                    <table class="table table-striped table-advance table-hover">
                      <h4><i class="fa fa-stethoscope"></i> Cavitación<span><a style="margin-left:7px"class="btn btn-success btn-sm" href="<?php echo base_url('main/add_view/' . $client[0]['id'] . '/' . $program . '/' . 'add_cavitation')?>"><i class="fa fa-plus"></i></a></span></h4>
                        <hr>
                        <thead>
                        <tr>
                            <th><i class="fa fa-calendar"></i> Fecha de Consulta</th>
                            <th><i class="fa fa-clock-o"></i> Hora</th>
                            <th><i class="fa fa-paperclip"></i> Tipo</th>
                            <th><i class=" fa fa-usd"></i> Pago a proveedor</th>
                            <th><i class=" fa fa-usd"></i> Estatus de Pago</th>
                            <th><i class=" fa fa-usd"></i> Tipo de Pago</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if(empty($appointments)):?>
                        <tr>
                          <td>-</td><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td>
                        </tr>
                        <?php else: ?>
                        <?php foreach ($appointments as $row):?>
                        <?php if($row['category'] == 'cavitation'):?>
                        <tr>
                            <td><a href="<?php echo base_url('main/edit_view/' . $client[0]['id'] . '/' . $program . '/' . 'edit_cavitation' . '/' . $row['appointment_id'])?>"><?php echo date_format(new DateTime($row['datetime']), 'd F Y')?></a></td>
                            <td class="hidden-phone"><?php echo date_format(new DateTime($row['datetime']), 'g:i a')?></td>
                            <td><?php echo $row['type']?></td>
                            <?php if($row['payment_status'] == 1):?>
                            <td></td>
                            <td></td>
                            <td></td>
                            <?php else: ?>
                            <td><?php echo money_format('%(#10n', $row['payment']) . "\n";?></td>
                            <?php switch ($row['payment_status']) {
                              case 'Pagado':
                                $label = 'success';
                                break;
                              
                              case 'Pendiente':
                                $label = 'warning';
                                break;
                            }
                            ?>
                            <td><span class="label label-<?php echo $label ?> label-mini"><?php echo $row['payment_status']?></span></td>
                            <td><?php echo $row['payment_type'] ?></td>
                            <?php endif ?>
                        </tr>
                        <?php endif ?>
                        <?php endforeach ?>
                        <?php endif ?>
                        </tbody>
                    </table>
                </div><!-- /content-panel -->
                <?php endif ?>
          		</div>
          	</div>
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
