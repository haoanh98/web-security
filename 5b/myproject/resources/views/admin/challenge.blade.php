<!DOCTYPE html>
<html lang="en">
  <head>
    <title>GIẢNG VIÊN | GIẢI ĐỐ</title>
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
          	<h3><i class="fa fa-star"></i> Câu Hỏi Đố Vui </h3>
				<div class="row">
				
                  
	                  
                  <div class="col-md-12">
                      <div class="content-panel">
                          <table class="table table-striped table-advance table-hover">
	                  	  	  <h4><i class="fa fa-angle-right"></i> Danh Sách Câu Hỏi </h4>
	                  	  	  <hr>
                              <thead>
                              <tr>
                                  <th> STT </th>
                                  <th> Câu Hỏi </th>
                              </tr>
                              </thead>
                              <tbody>
                              <?php 
                               for ($i = 0; $i < count($challenge); $i++) {
							  ?>
                              <tr>
                              <td><?php echo $i+1;?></td>
                                  <td><?php echo $challenge[$i]['suggest'];?></td> 
                              </tr>
                              <?php }?>
                             
                              </tbody>
                          </table>
                          <h4><i class="fa fa-angle-right"></i> Tạo Câu Hỏi </h4>
                          <hr>
                          <div class="row">

                            <div class="col-md-12">
                                <div class="content-panel">
                                <form class="form-horizontal style-form" name="form1" method="post" action="" enctype="multipart/form-data" onSubmit="return valid();">
                                   @csrf
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Câu Hỏi </label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="suggest" value="" >
                                        </div>
                                    </div>
                                    <div style="margin-left:300px;">
                                    <input type="file" name="fileUpload" value="" class="btn btn-theme02" >
                                    <input type="submit" name="up" value="Tải Đáp Án" class="btn btn-theme03" >
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
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