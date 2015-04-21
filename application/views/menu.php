      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
              
                  <p class="centered"><img src="<?php echo base_url()?>assets/img/logo.png" class="img-circle" width="60"></p>
                  <h5 class="centered"><?php echo $this->session->userdata('admin_full_name')?></h5>
                    
                  <li class="mt">
                      <a class="<?php if($this->router->fetch_method()=='clients'){ echo 'active'; }?>"href="<?php echo base_url()?>main/clients" >
                          <i class="fa fa-group"></i>
                          <span>Clientes</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a class="<?php if($this->router->fetch_method()=='calendar'){ echo 'active'; }?>" href="<?php echo base_url()?>main/calendar" >
                          <i class="fa fa-calendar"></i>
                          <span>Calendario</span>
                      </a>
                  </li>

                  <!--<li class="sub-menu">
                      <a class="<?php if($this->router->fetch_method()=='dashboard'){ echo 'active'; }?>" href="<?php echo base_url()?>main/dashboard">
                          <i class="fa fa-dashboard"></i>
                          <span>Escritorio</span>
                      </a>
                  </li>-->
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->