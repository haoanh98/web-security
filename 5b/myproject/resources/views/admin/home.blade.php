<!DOCTYPE html>
<html lang="en">
  <head>
    <title>GIẢNG VIÊN | THÔNG TIN NGƯỜI DÙNG</title>
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
            <a href="#" class="logo"><b>HỆ THỐNG GIẢNG VIÊN</b></a>
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
          	<h3><i class="fa fa-star"></i> Thông Tin Người Dùng </h3>
				<div class="row">
				
                  
	                  
                  <div class="col-md-12">
                      <div class="content-panel">
                          <table class="table table-striped table-advance table-hover">
	                  	  	  <h4><i class="fa fa-angle-right"></i> Danh Sách Sinh Viên </h4>
	                  	  	  <hr>
                              <thead>
                              <tr>
                                  <th> Số Thứ Tự </th>
                                  <th> Tên Đăng Nhập </th>
                                  <th> Tên </th>
                                  <th> Địa Chỉ Email </th>
                                  <th> Số Điện Thoại </th>
                              </tr>
                              </thead>
                              <tbody>
                              <?php 
							  for ($i = 0; $i < count($student); $i++) {
                                ?>
                              <tr>
                              <td><?php echo $i+1;?></td>
                              <td><?php echo $student[$i]['username'];?></td>
                                  <td><?php echo $student[$i]['name'];?></td>
                                  <td><?php echo $student[$i]['email'];?></td>
                                  <td><?php echo $student[$i]['contactno'];?></td>  
                                  <td>
                                     <a href="/profile<?php echo $student[$i]['id'];?>"> 
                                     <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
                                     
                                     <a href="/home/<?php echo $student[$i]['id'];?>"> 
                                     <button class="btn btn-danger btn-xs" onClick="return confirm('Bạn Có Muốn Xóa Không?');"><i class="fa fa-trash-o "></i></button></a>
                                  
                                     <a href="/message<?php echo $student[$i]['id'];?>&<?php echo $student[$i]['name'];?>"> 
                                     <button class="btn btn-primary btn-xs"><i class="fa fa-envelope-o"></i></button></a>
                                  </td>
                              </tr>
                              <?php }?>
                             
                              </tbody>
                          </table>

                          <table class="table table-striped table-advance table-hover">
	                  	  	  <h4><i class="fa fa-angle-right"></i> Danh Sách Giảng Viên </h4>
	                  	  	  <hr>
                              <thead>
                              <tr>
                                  <th> Số Thứ Tự </th>
                                  <th> Tên Đăng Nhập </th>
                                  <th> Tên </th>
                                  <th> Địa Chỉ Email </th>
                                  <th> Số Điện Thoại </th>
                              </tr>
                              </thead>
                              <tbody>
                              <?php 
							 for ($i = 0; $i < count($teacher); $i++) {
                                 ?>
                              <tr>
                              <td><?php echo $i+1;?></td>
                              <td><?php echo $teacher[$i]['username'];?></td>
                                  <td><?php echo $teacher[$i]['name'];?></td>
                                  <td><?php echo $teacher[$i]['email'];?></td>
                                  <td><?php echo $teacher[$i]['contactno'];?></td> 
                                  <?php if ($teacher[$i]['id']!=Auth::user()->id){?> 
                                  <td>
                                     <a href="/message<?php echo $teacher[$i]['id'];?>&<?php echo $teacher[$i]['name'];?>"> 
                                     <button class="btn btn-primary btn-xs"><i class="fa fa-envelope-o"></i></button></a>
                                  </td>
                                  <?php } ?>
                              </tr>
                              <?php  }?>
                             
                              </tbody>
                          </table>
                          <h4><i class="fa fa-angle-right"></i> Tạo Tài Khoản Sinh Viên </h4>
                          <hr>
                          <div class="row">

                            <div class="col-md-12">
                                <div class="content-panel">
                                    <form class="form-horizontal style-form" name="form1" method="post" action="" onSubmit="return valid();">
                                    @csrf
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Tên </label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="name" value="" >
                                        </div>
                                    </div>
                                        <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;"> Tên Đăng Nhập </label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="username" value="" >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;"> Mật Khẩu </label>
                                        <div class="col-sm-10">
                                            <input type="password" class="form-control" name="password" value="" >
                                        </div>
                                    </div>
                                        <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Địa Chỉ Email </label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="email" value="" >
                                        </div>
                                    </div>
                                        <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Số Điện Thoại </label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="contact" value="" >
                                        </div>
                                    </div>
                                    <div style="margin-left:400px;">
                                    <input type="submit" name="Submit" value="TẠO" class="btn btn-theme"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                      </div>
                  </div>
              </div>
		</section>
      </section
  ></section>
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