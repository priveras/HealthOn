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
          	<div class="row">
          		<div class="col-lg-12">
          			<div class="content-panel">
	                    <table class="table table-striped table-advance table-hover">
	                      <h4><i class="fa fa-calendar"></i> Citas<span><a style="margin-left:7px"class="btn btn-success btn-sm" href="<?php echo base_url('main/session_add_program/' . $client[0]['id'])?>"><i class="fa fa-plus"></i></a></span></h4>
	                        <hr>
	                        <thead>
	                        <tr>
                              <th><i class="fa fa-calendar"></i> Fecha</th>
                              <th><i class="fa fa-clock-o"></i> Hora</th>
                              <th><i class="fa fa-user-md"></i> Terapeuta</th>
	                            <th><i class="fa fa-file-o"></i> Programa</th>
	                            <th><i class="fa fa-check-square-o"></i> Status</th>
                              <th><i class="fa fa-check"></i> Completada</th>
                              <th><i class="fa fa-user"></i> Recomendó</th>
                              <th><i class=" fa fa-comment"></i> Comentarios</th>
	                        </tr>
	                        </thead>
	                        <tbody>
	                        <?php if(empty($sessions)):?>
	                        <tr>
	                          <td>-</td><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td>
	                        </tr>
	                        <?php else: ?>
	                        <?php foreach ($sessions as $row):?>
	                        <tr>
	                        	<td><a href="<?php echo base_url('main/edit_session/' . $row['id'] . '/' . $client[0]['id'] . '/' . $row['program'] . '/sessions')?>"><?php echo date_format(new DateTime($row['datetime']), 'd F Y')?></a></td>
                            <td class="hidden-phone"><?php echo date_format(new DateTime($row['datetime']), 'g:i a')?></td>
	                        	<td><?php echo $row['therapist']?></td>
	                        	<td><?php echo $row['program']?></td>


                            <?php 

                            switch ($row['status']) {
                              case 'Confirmada':
                                $label = '<span class="label label-success">Confirmada</span>';
                                break;
                              
                              case 'Pendiente':
                                $label = '<span class="label label-warning">Pendiente</span>';
                                break;

                              case 'Cancelada':
                                $label = '<span class="label label-danger">Cancelada</span>';
                                break;
                            }
                            ?>

	                        	<td><?php echo $label ?></td>
                            <?php if($row['completed'] == 'accept'):?>
                            <td><i style="color: green"class="fa fa-check"></i></td>
                            <?php else: ?>
                            <td><i style="color: red" class="fa fa-times"></i></td>
                            <?php endif ?>
                            <td><?php echo $row['recommended']?></td>
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