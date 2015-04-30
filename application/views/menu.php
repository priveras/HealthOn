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
                      <a class="<?php if($this->router->fetch_method()=='suppliers'){ echo 'active'; }?>"href="<?php echo base_url()?>main/suppliers" >
                          <i class="fa fa-archive"></i>
                          <span>Proveedores</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a class="<?php if($this->router->fetch_method()=='calendar'){ echo 'active'; }?>" href="javascript:;" >
                          <i class="fa fa-calendar"></i>
                          <span>Calendario</span>
                      </a>
                      <ul class="sub">
                        <li class="<?php if($this->router->fetch_method()=='calendar'){ echo 'active'; }?>" ><a href="<?php echo base_url()?>main/calendar" >General</a></li>
                        <!-- <li><a href="calendar.html">Mi Calendario</a></li>
                        <li><a href="calendar.html">Citas Nutrición</a></li>
                        <li><a href="gallery.html">Cavitación</a></li>
                        <li><a href="todo_list.html">RESETest</a></li>
                        <li><a href="todo_list.html">Pagos</a></li>
                        <li><a href="todo_list.html">Eventos</a></li> -->
                      </ul>
                  </li>

                  <li class="sub-menu">
                      <a class="<?php if($this->router->fetch_method()=='commission'){ echo 'active'; }?>" href="<?php echo base_url()?>main/commission" >
                          <i class="fa fa-user-md"></i>
                          <span>Comisiones</span>
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