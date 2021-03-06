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
          	<a href="<?php echo base_url('main/detail/' . $client[0]['id'] . '/' . 'clients')?>"><h3><i class="fa fa-angle-left"></i> <?php echo $client[0]['full_name']?></h3></a>
          	<br>
          	<div class="row">
          		<div class="col-lg-12">
          			<div class="content-panel">
	                    <table class="table table-striped table-advance table-hover">
	                      <h4><i class="fa fa-dollar"></i> Pagos<span><a style="margin-left:7px"class="btn btn-success btn-sm" href="<?php echo base_url('main/add_view/' . $client[0]['id'] . '/' . 'add_payment')?>"><i class="fa fa-plus"></i></a></span></h4>
	                        <hr>
	                        <thead>
	                        <tr>
	                            <th><i class="fa fa-clock-o"></i> Programa</th>
	                            <th><i class="fa fa-dollar"></i> Pago Realizado</th>
	                            <th><i class=" fa fa-usd"></i> Forma de pago</th>
	                            <th><i class=" fa fa-usd"></i> Debe</th>
	                            <th><i class="fa fa-calendar"></i> Fecha de registro</th>
	                            <th><i class="fa fa-clock-o"></i> Hora de registro</th>
	                            <th><i class=" fa fa-usd"></i> Comentarios</th>
	                        </tr>
	                        </thead>
	                        <tbody>
	                        <?php if(empty($payments)):?>
	                        <tr>
	                          <td>-</td><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td>
	                        </tr>
	                        <?php else: ?>
	                        <?php foreach ($payments as $row):?>
	                        <tr>
	                        	<td><a href="<?php echo base_url('main/edit_payment/' . $row['id'] . '/' . $client[0]['id'])?>"><?php echo $row['program']?></a></td>
	                        	<td>$ <?php echo $row['payment']?></td>
	                        	<td><?php echo $row['payment_type']?></td>
	                        	<td>$ <?php echo $row['payment']?></td>
	                            <td><?php echo date_format(new DateTime($row['created_at']), 'd F Y')?></td>
	                            <td class="hidden-phone"><?php echo date_format(new DateTime($row['created_at']), 'g:i a')?></td>
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