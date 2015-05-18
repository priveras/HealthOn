      </head>

      <body ng-app="HealthOnApp" ng-controller="clientsController">

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
          	<h3><i class="fa fa-group"></i> Clientes</h3>
              <div class="row mt">
                  <div class="col-md-12">
                      <div class="content-panel">
                          <table class="table table-striped table-advance table-hover">
                              <h4><i class="fa fa-list-ul"></i> Directorio<span><a style="margin-left:7px"class="btn btn-success btn-sm" href="<?php echo base_url()?>main/add_client"><i class="fa fa-plus"></i></a></span></h4>
                              <div style="width:300px; margin-left:6px;">
                                <input type="text" ng-model="nameFilter" class="form-control" placeholder="Buscar...">
                              </div>
                              <hr>
                              <br>
                              <thead>
                              <tr>
                                  <th><i class="fa fa-user"></i> Nombre</th>
                                  <th><i class="fa fa-envelope-o"></i> Email</th>
                                  <th><i class="fa fa-mobile-phone"></i> Celular</th>
                                  <th><i class="fa fa-phone"></i> Casa</th>
                                  <th><i class="fa fa-phone"></i> Programa</th>
                                  <!-- <th><i class="fa fa-envelope"></i> Programa</th> -->
                              </tr>
                              </thead>
                              <tbody infinite-scroll='loadMore()' infinite-scroll-distance='2'>
                                <tr ng-repeat="client in clientsList | filter: nameFilter">
                                  <td><a href="<?php echo base_url()?>main/detail/{{client.id}}/clients">{{client.name}} {{client.last_name1}}</a></td>
                                  <td>{{client.email}}</td>
                                  <td>{{client.cellphone}}</td>
                                  <td>{{client.phone}}</td>
                                  <td>{{client.programs}}</td>
                                  <!-- <td>{{client.program}}</td> -->
                                </tr>
                              </tbody>
                          </table>

                      </div><!-- /content-panel -->
                  </div><!-- /col-md-12 -->
              </div><!-- /row -->
          </section><!--/wrapper -->
      </section><!-- /MAIN CONTENT -->

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

    <!-- AngularJS -->
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.3.14/angular-route.js"></script>
    <script src="<?php echo base_url()?>assets/js/angular/app.js"></script>
    <script src="<?php echo base_url()?>assets/js/angular/services.js"></script>
    <script src="<?php echo base_url()?>assets/js/angular/controllers.js"></script>
    <script src="<?php echo base_url()?>assets/js/angular/ng-infinite-scroll.min.js"></script>

  </body>
</html>
