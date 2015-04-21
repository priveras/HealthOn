	<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>healthON - Admin</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body onload="getTime()">

      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->

	  	<div class="container">
	  	
	  		<div id="showtime"></div>
	  			<div class="col-lg-4 col-lg-offset-4">
	  				<?php if($this->session->userdata('error')): ?>
	  				<div class="alert alert-danger alert-dismissable">
	  					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	  					<strong>¡Error! </strong><?php echo $this->session->userdata('error');?>
	  				</div>
	  				<?php $this->session->unset_userdata('error');?>
	  				<?php endif ?>
	  				<div class="lock-screen">
		  				<h2><a data-toggle="modal" href="#myModal"><i class="fa fa-lock"></i></a></h2>
		  				<p>INICIAR SESIÓN</p>
		  				
				          <!-- Modal -->
				          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade bs-example-modal-sm">
				              <div class="modal-dialog modal-sm">
				                  <div class="modal-content">
				                      <div class="modal-header">
				                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				                          <h4 class="modal-title">Iniciar Sesión</h4>
				                      </div>
				                      <div class="modal-body">
				                          <p class="centered"><img class="img-circle" width="80" src="<?php echo base_url() ?>assets/img/healthonLogo.jpg"></p>
				                          <?php $attributes = array('role' => 'form'); echo form_open('main/login_validation', $attributes); ?>
				                      <?php 
				                      $username = array(
				                      	'type' => 'text',
				                      	'class' => 'form-control',
				                      	'id' => 'username',
				                      	'name' => 'username',
				                      	'placeholder' => 'Usuario',
				                      	'value' => $this->input->post('username'),
				                      	);

				                      echo form_input($username);
				                      ?>
				                      <br>
				                      <?php 
				                      $password = array(
				                      	'type' => 'password',
				                      	'class' => 'form-control',
				                      	'id' => 'password',
				                      	'name' => 'password',
				                      	'placeholder' => 'Contraseña',
				                      	'value' => $this->input->post('category'),
				                      	);

				                      echo form_input($password);
				                      ?>
				                      </div>
				                      <div class="modal-footer centered">
				                          <button data-dismiss="modal" class="btn btn-theme04" type="button">CANCELAR</button>
				                          <?php 
				                          $submit = array(
				                          	'type' => 'submit',
				                          	'name' => 'submit',
				                          	'class' => 'btn btn-theme03',
				                          	'value' => 'ENTRAR',
				                          	);
				                          	//<i class="fa fa-lock"></i>
				                          echo form_submit($submit);
				                          echo form_close(); 
				                          ?>
				                      </div>
				                  </div>
				              </div>
				          </div>
				          <!-- modal -->
		  				
		  				
	  				</div><! --/lock-screen -->
	  			</div><!-- /col-lg-4 -->
	  	
	  	</div><!-- /container -->

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script type="text/javascript" src="assets/js/jquery.backstretch.min.js"></script>
    <script>
        $.backstretch("assets/img/login-bg.jpg", {speed: 500});
    </script>

    <script>
        function getTime()
        {
            var today=new Date();
            var h=today.getHours();
            var m=today.getMinutes();
            var s=today.getSeconds();
            // add a zero in front of numbers<10
            m=checkTime(m);
            s=checkTime(s);
            document.getElementById('showtime').innerHTML=h+":"+m+":"+s;
            t=setTimeout(function(){getTime()},500);
        }

        function checkTime(i)
        {
            if (i<10)
            {
                i="0" + i;
            }
            return i;
        }
    </script>

  </body>
</html>
