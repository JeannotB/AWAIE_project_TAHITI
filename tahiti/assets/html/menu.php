<!--sidebar start-->
      <aside>
            <div id="sidebar"  class="nav-collapse ">
                  <!-- sidebar menu start-->
                        <ul class="sidebar-menu" id="nav-accordion">
                  
                              <?php
                                    $name = 'Username';
                              //display name and logo
                                    if(isset($_SESSION['username']))
                                          $name = $_SESSION['username'];
                              ?>
                        <p class="centered"><a href="profile.php"><img src="assets/img/jeannot.jpg" class="img-circle" width="60"></a></p>
                        <h5 class="centered"><?php echo $name;?></h5>
                          
                        <li class="mt">
                              <?php
                                    //get company id
                                    $company_path = 'dashboard.php';
                                    if(isset($_SESSION['id_company']))
                                          $company_path = "dashboard.php?id_company=".md5($_SESSION['id_company']);
                              ?>
                              <a href=<?php echo '"'.$company_path.'"';?>>
                                    <i class="fa fa-dashboard"></i>
                                    <span>Dashboard</span>
                              </a>
                        </li>

                        <li class="sub-menu">
                              <a href="index.html" target="_blank">
                                    <i class="fa fa-sign-out"></i>
                                    <span>Retour au site</span>
                              </a>
                        </li>
                        
                        <?php
                              $admin = false;
                              if(isset($_SESSION['admin']))
                                    $admin = $_SESSION['admin'];
                  if($admin)
                  {
                  ?>
                        <li class="sub-menu">
                              <a href="capteurs_temp.php">
                                    <i class="fa fa-bar-chart-o"></i>
                                    <span>Exemple Page Capteur</span>
                              </a>
                        </li>

                        <li class="sub-menu">
                              <a href="dashboard_admin.php">
                                    <i class="fa fa-dashboard"></i>
                                    <span>Dashboard ADMIN</span>
                              </a>
                        </li>

                        <li class="sub-menu">
                              <a href="javascript:;" >
                                    <i class="fa fa-desktop"></i>
                                    <span>UI Elements</span>
                              </a>
                              <ul class="sub">
                                    <li><a  href="general.php">General</a></li>
                                    <li><a  href="buttons.php">Buttons</a></li>
                                    <li><a  href="panels.php">Panels</a></li>
                              </ul>
                        </li>

                        <li class="sub-menu">
                              <a href="javascript:;" >
                                    <i class="fa fa-cogs"></i>
                                    <span>Components</span>
                              </a>
                              <ul class="sub">
                                    <li><a  href="calendar.php">Calendar</a></li>
                                    <li><a  href="gallery.php">Gallery</a></li>
                                    <li><a  href="todo_list.php">Todo List</a></li>
                              </ul>
                        </li>
                        <li class="sub-menu">
                              <a href="javascript:;" >
                                    <i class="fa fa-book"></i>
                                    <span>Extra Pages</span>
                              </a>
                              <ul class="sub">
                                    <li><a  href="blank.php">Blank Page</a></li>
                                    <li><a  href="index.php">Login</a></li>
                                    <li><a  href="lock_screen.php">Lock Screen</a></li>
                              </ul>
                        </li>
                        <li class="sub-menu">
                              <a href="javascript:;" >
                                    <i class="fa fa-tasks"></i>
                                    <span>Forms</span>
                              </a>
                              <ul class="sub">
                                    <li><a  href="form_component.php">Form Components</a></li>
                              </ul>
                        </li>
                        <li class="sub-menu">
                              <a href="javascript:;" >
                                    <i class="fa fa-th"></i>
                                    <span>Data Tables</span>
                              </a>
                              <ul class="sub">
                                    <li><a  href="basic_table.php">Basic Table</a></li>
                                    <li><a  href="responsive_table.php">Responsive Table</a></li>
                              </ul>
                        </li>
                        <li class="sub-menu">
                              <a href="javascript:;" >
                                    <i class=" fa fa-bar-chart-o"></i>
                                    <span>Charts</span>
                              </a>
                              <ul class="sub">
                                    <li><a  href="morris.php">Morris</a></li>
                                    <li><a  href="chartjs.php">Chartjs</a></li>
                              </ul>
                        </li>

                  <?php
                  }
                  ?>      
                        <li class="sub-menu">
                              <a href="./assets/php/logout_function.php">
                                    <i class="fa fa-sign-out"></i>
                                    <span>Logout</span>
                              </a>
                        </li>

                  </ul>
                  <!-- sidebar menu end-->
            </div>
      </aside>
<!--sidebar end-->