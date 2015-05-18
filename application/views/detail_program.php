      
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
            <a href="<?php echo base_url('main/detail/' . $client[0]['id'] . '/' . 'clients' )?>"><h3><i class="fa fa-angle-left"></i> <?php echo $client[0]['name'] . ' ' . $client[0]['last_name1'] . ' - ' . $program ?></h3></a>
            <div class="row mt">
              <div class="col-lg-2"></div>
              <div class="col-lg-8">
              </div>
              <div class="col-lg-12">
                <?php if($program == "OnDetox" || $program == "RESETest" ): ?>
                <div class="content-panel">
                    <table class="table table-striped table-advance table-hover">
                      <h4><i class="fa fa-flask"></i> RESETest<span><a style="margin-left:7px"class="btn btn-success btn-sm" href="<?php echo base_url('main/add_resettest/' . $client[0]['id'] . '/' . $program)?>"><i class="fa fa-plus"></i></a></span></h4>
                        <hr>
                        <thead>
                        <tr>
                          <th><i class="fa fa-calendar"></i> Fecha de muestra</th>
                            <th><i class="fa fa-clock-o"></i> Hora de muestra</th>
                            <th><i class="fa fa-user-md"></i> Tomo la muestra</th>
                            <th><i class="fa fa-calendar"></i> Fecha Envío</th>
                            <th><i class="fa fa-calendar"></i> Fecha Resultados</th>
                            <th><i class="fa fa-folder"></i> Programa</th>
                            <th><i class="fa fa-comment"></i> Comentarios</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if(empty($appointments)):?>
                        <tr>
                          <td>-</td><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td>
                        </tr>
                        <?php else: ?>
                        <?php foreach ($appointments as $row):?>
                        <?php if($row['category'] == 'resettest'):?>
                        <tr>
                          <td><a href="<?php echo base_url('main/edit_resettest/' . $client[0]['id'] . '/' . $program  . '/' . $row['id'])?>"><?php echo date_format(new DateTime($row['datetime']), 'd F Y')?></a></td>
                          <td class="hidden-phone"><?php echo date_format(new DateTime($row['datetime']), 'g:i a')?></td>
                          <td><?php echo $row['therapist']?></td>
                          <td><?php echo date_format(new DateTime($row['delivery_date']), 'd F Y')?></td>
                          <td><?php echo date_format(new DateTime($row['results_date']), 'd F Y')?></td>
                          <td><?php echo $row['program']?></td>
                          <td><?php echo $row['comments']?></td>
                        </tr>
                        <?php endif ?>
                        <?php endforeach ?>
                        <?php endif ?>
                        </tbody>
                    </table>
                </div><!-- /content-panel -->
                <br>
                <?php endif ?>
                <?php if($program == "OnDetox" || $program == "MiniOndetox" ): ?>
                <div class="content-panel">
                    <table class="table table-striped table-advance table-hover">
                      <h4><i class="fa fa-glass"></i> Jugos<span><a style="margin-left:7px"class="btn btn-info btn-sm" href="<?php echo base_url('main/add_juices/' . $client[0]['id'] . '/' . $program)?>"><i class="fa fa-plus"></i></a></span></h4>
                        <hr>
                        <thead>
                        <tr>
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
                        <tbody>
                        <?php if(empty($appointments)):?>
                        <tr>
                          <td>-</td><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td>
                        </tr>
                        <?php else: ?>
                        <?php foreach ($appointments as $row):?>
                        <?php if($row['category'] == 'juices'):?>
                        <tr>
                            <td><a href="<?php echo base_url('main/edit_juices/' . $client[0]['id'] . '/' . $program  . '/' . $row['id'])?>"><?php echo date_format(new DateTime($row['datetime']), 'd F Y')?></a></td>
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