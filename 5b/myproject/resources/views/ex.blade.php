<!DOCTYPE html>
<html lang="en">
  <head>
    <title>SINH VIÊN | BÀI TẬP</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
  </head>

  <body>

  <section id="container" >
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <a href="#" class="logo"><b>HỆ THỐNG SINH VIÊN</b></a>
            <div class="nav notify-row" id="top_menu">
               
                         
                   
                </ul>
            </div>
            <div class="top-menu">
            	<ul class="nav pull-right top-menu">

                    <li><a class="logout" href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">Đăng Xuất</a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            	</ul>
            </div>
        </header>
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <ul class="sidebar-menu" id="nav-accordion">
              
              	  <p class="centered"><a href="#"><img src="assets/img/ui-sam.jpg" class="img-circle" width="60"></a></p>
              	  <h5 class="centered"> {{Auth::user()->name}}</h5>
              	  	
                  <li class="mt">
                      <a href="/changepassword">
                          <i class="fa fa-key"></i>
                          <span>Thay Đổi Mật Khẩu</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="/home" >
                          <i class="fa fa-users"></i>
                          <span> Thông Tin Người Dùng </span>
                      </a>
                  </li>
                  
                  <li class="sub-menu">
                      <a href="/updateprofile">
                          <i class="fa fa-file"></i>
                          <span>Cập Nhật Thông tin</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="/ex" >
                          <i class="fa fa-tag"></i>
                          <span> Bài Tập </span>
                      </a> 
                  </li>
                  <li class="sub-menu">
                      <a href="/challengee" >
                          <i class="fa fa-tags"></i>
                          <span> Giải Đố </span>
                      </a> 
                  </li>
                 
              </ul>
          </div>
      </aside>
      <section id="main-content">
          <section class="wrapper">
              <h3><i class="fa fa-star"></i> Bài Tập </h3>
              <div class="row">
	                  
                  <div class="col-md-12">
                      <div class="content-panel">
                          <table class="table table-striped table-advance table-hover">
	                  	  	  <h4><i class="fa fa-angle-right"></i> Danh Sách Bài Tập </h4>
	                  	  	  <hr>
                              <thead>
                              <tr>
                                  <th class="hidden-phone">File </th>
                                  <th> Người Ra Đề </th>
                              </tr>
                              </thead>
                              <tbody>
                              <?php 
                              for ($i = 0; $i < count($upload); $i++) {
							  ?>
                              <tr>
                                  <td><?php echo $upload[$i]['link'];?></td>
                                  <td><?php echo $upload[$i]['users'];?></td>
                                  <td>
                                     <a href="/download<?php echo $upload[$i]['id'];?>&<?php echo $upload[$i]['link'];?>"> 
                                     <button class="btn btn-primary btn-xs"><i class="fa fa-download"></i></button></a>
                                  </td>
                                  <td>
                                     <a href="/upfile<?php echo $upload[$i]['id'];?>"> 
                                     <button class="btn btn-primary btn-xs"><i class="fa fa-paper-plane"></i></button></a>
                                  </td>
                              </tr>
                              <?php }?>
                             
                              </tbody>
                          </table>
                      </div>
                  </div>
              </div>
		</section>
      </section>
      </section>
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="assets/js/common-scripts.js"></script>
  <script>
      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  </body>
</html>