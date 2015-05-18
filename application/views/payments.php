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
          	<a href="<?php echo base_url('main/detail/' . $client[0]['id'] . '/' . 'clients')?>"><h3><i class="fa fa-angle-left"></i> <?php echo $client[0]['name']?> <?php echo $client[0]['last_name1']?></h3></a>
          	<br>
            <?php if($client[0]['billing_full_name'] != ''):?>
            <div class="row">
              <div class="col-lg-6">
                <div class="panel panel-default">
                  <div class="panel-heading text-center">
                    <h3 class="panel-title">Datos de facturación</a></h3>
                  </div>
                  <div class="panel-body">
                    <div class="row">
                      <div class="col-lg-4 col-md-4 text-center">
                        <i class="fa fa-building"></i> <?php echo $client[0]['billing_full_name']?>
                      </div>
                      <div class="col-lg-4 col-md-4 text-center">
                        <i class="fa fa-map-marker"></i> <?php echo $client[0]['billing_address']?>
                      </div>
                      <div class="col-lg-4 col-md-4 text-center">
                        RFC <?php echo $client[0]['rfc']?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              </div>
            </div>
            <?php endif ?>
          	<div class="row">
          		<div class="col-lg-12">
          			<div class="content-panel">
	                    <table class="table table-striped table-advance table-hover">
	                      <h4><i class="fa fa-dollar"></i> Pagos Programas<span><a style="margin-left:7px"class="btn btn-success btn-sm" href="<?php echo base_url('main/add_view/' . $client[0]['id'] . '/' . 'add_payment')?>"><i class="fa fa-plus"></i></a></span></h4>
	                        <hr>
	                        <thead>
	                        <tr>
	                            <th><i class="fa fa-file-o"></i> Programa</th>
	                            <th><i class="fa fa-dollar"></i> Pago Programa</th>
                              <th><i class="fa fa-dollar"></i> Pago Cavitación</th>
                              <th><i class=" fa fa-barcode"></i> Require Factura</th>
	                            <th><i class=" fa fa-usd"></i> Forma de pago</th>
	                            <th><i class=" fa fa-usd"></i> Debe</th>
	                            <th><i class="fa fa-calendar"></i> Fecha de registro</th>
                              <th><i class=" fa fa-folder"></i> Datos de pago</th>
                              <th> # de factura</th>
                              <th><i class=" fa fa-comment"></i> Comentarios</th>
	                        </tr>
	                        </thead>
	                        <tbody>
	                        <?php if(empty($payments)):?>
	                        <tr>
	                          <td>-</td><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td>
	                        </tr>
	                        <?php else: ?>
	                        <?php foreach ($payments as $row):?>
	                        <tr>
                            <?php if($row['payment_cavitation'] != '0'):?>
	                        	<td><a href="<?php echo base_url('main/edit_payment2/' . $row['id'] . '/' . $client[0]['id'])?>"><?php echo $row['program']?></a></td>
                            <?php else: ?>
                            <td><a href="<?php echo base_url('main/edit_payment/' . $row['id'] . '/' . $client[0]['id'])?>"><?php echo $row['program']?></a></td>
                            <?php endif ?>
	                        	<td>$ <?php echo $row['payment']?></td>
                            <?php 
                            if($row['payment_cavitation'] != '0'){
                              echo '<td>$ ' . $row['payment_cavitation'] . '</td>';
                            }else{
                              echo '<td>-</td>';
                            }
                            ?>
                            <td><?php echo $row['billing']?></td>
	                        	<td><?php echo $row['payment_type']?></td>
	                        	<td>$ <?php
                            $debe = $row['totalpago'] - $row['payment'] - $row['payment_cavitation'];
                            if($debe > 0)
                            {
                              echo $debe;
                            }
                            else
                            {
                              echo 0;
                            }
                            ?></td>
                            <td><?php echo date_format(new DateTime($row['created_at']), 'd F Y')?></td>
                            <td><?php echo $row['datosdepago']?></td>
                            <td><?php echo $row['numerodefactura']?></td>
                            <?php if($row['comments'] == ""):?>
                            <td>-</td>
	                        	<?php else:?>
	                            <td style="max-width:150px;"><?php echo $row['comments']?></td>
	                        	<?php endif?>
	                        </tr>
	                        <?php endforeach ?>
	                        <?php endif ?>
	                        </tbody>
	                    </table>
	                </div><!-- /content-panel -->
          		</div>
          	</div>
          </section>
      </section>
    
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