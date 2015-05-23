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
            <h3><i class="fa fa-user-md"></i> Comisiones</h3>
          	<br>          	<div class="row">
          		<div class="col-lg-12">
          			<div class="content-panel">
	                    <table class="table table-striped table-advance table-hover">
	                      <h4><i class="fa fa-list-ul"></i> Info<span></h4>
	                        <hr>
	                        <thead>
	                        <tr>
	                            <th><i class="fa fa-user-md"></i> Terapeuta</th>
	                            <th><i class="fa fa-user"></i> Paciente</th>
                              <th><i class="fa fa-user"></i> # de Consulta</th>
                              <th><i class="fa fa-user"></i> Programa</th>
                              <th><i class=" fa fa-dollar"></i> Comisión</th>
	                        </tr>
	                        </thead>
	                        <tbody>
	                        <?php if(empty($sessions)):?>
	                        <tr>
	                          <td>-</td><td>-</td><td>-</td><td>-</td><td>-</td>
	                        </tr>
	                        <?php else: ?>
	                        <?php $i = 1; foreach ($sessions as $row):?>
                          <?php if($row['completed'] == 'accept'):?>
	                        <tr>
	                        	<td><?php echo $row['therapist']?></a></td>
	                        	<td><?php echo $row['name'] . ' ' . $row['last_name1']?></td>
                            <td><?php echo $i ?></td>
	                        	<td><?php echo $row['program']?></td>
	                        	<td>$ 200</td>
	                        </tr>
                          <?php endif ?>
	                        <?php $i++; endforeach ?>
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