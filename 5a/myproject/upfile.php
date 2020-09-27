<?php
session_start();
include'dbconnection.php';
// checking session is valid for not 
if (strlen($_SESSION['id']==0)) {
  header('location:logout.php');
  } else{


?><!DOCTYPE html>
<html lang="en">
  <head>
    <title>SINH VIÊN | BÀI TẬP </title>
    <link href="admin/assets/css/bootstrap.css" rel="stylesheet">
    <link href="admin/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="admin/assets/css/style.css" rel="stylesheet">
    <link href="admin/assets/css/style-responsive.css" rel="stylesheet">
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
                    <li><a class="logout" href="logout.php">Đăng Xuất</a></li>
            	</ul>
            </div>
        </header>
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <ul class="sidebar-menu" id="nav-accordion">
              
              	  <p class="centered"><a href="#"><img src="admin/assets/img/ui-sam.jpg" class="img-circle" width="60"></a></p>
              	  <h5 class="centered"><?php echo $_SESSION['name'];?></h5>
              	  	
                  <li class="mt">
                      <a href="change-password.php">
                          <i class="fa fa-key"></i>
                          <span>Thay Đổi Mật Khẩu</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="view-details.php" >
                          <i class="fa fa-users"></i>
                          <span>Thông Tin Người Dùng</span>
                      </a> 
                  </li>

                  <li class="sub-menu">
                      <a href="update-profile.php" >
                          <i class="fa fa-file"></i>
                          <span> Cập Nhật Thông Tin </span>
                      </a> 
                  </li>
                  
                  <li class="sub-menu">
                      <a href="ex.php" >
                          <i class="fa fa-tag"></i>
                          <span> Bài Tập </span>
                      </a> 
                  </li>
                  <li class="sub-menu">
                      <a href="challenge.php" >
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
              <h4><i class="fa fa-angle-right"></i> Upload File Bài Làm </h4>
                          <hr>
                          <div class="row">
                            <div class="col-md-12">
                                <div class="content-panel">
                                    <form class="form-horizontal style-form" name="form1" method="post" action="" enctype="multipart/form-data" onSubmit="return valid();">
                                    <div style="margin-left:300px;">
                                    <input type="file" name="fileUpload" value="" class="btn btn-theme02" >
                                    <input type="submit" name="up" value="Tải Bài Tập" class="btn btn-theme03" >
                                    <?php
                                        if (isset($_POST['up']) && isset($_FILES['fileUpload'])) {
                                            if ($_FILES['fileUpload']['error'] > 0) 
                                                echo "<script>alert('Lỗi..!');</script>";
                                            else {
                                                $a=$_FILES['fileUpload']['name'];
                                                $b=$_GET['id'];
                                                $c=$_SESSION['name'];
                                                $msg=mysqli_query($con,"insert into upload(link,ex,users,type) values('$a','$b','$c','1')");
                                                $msg=mysqli_query($con,"select * from upload where link = '$a' and users = '$c' and type = '1' and ex='$b'");
                                                $d=mysqli_fetch_array($msg);
                                                mkdir('admin/upload/'.$d['id']);
                                                move_uploaded_file($_FILES['fileUpload']['tmp_name'], 'admin/upload/'.$d['id'] .'/'. $_FILES['fileUpload']['name']);
                                                echo "<script>alert('Thêm Bài Làm Thành Công');</script>";
                                            }
                                        }
                                    ?>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
		</section>
      </section
  ></section>
    <script src="admin/assets/js/jquery.js"></script>
    <script src="admin/assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="admin/assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="admin/assets/js/jquery.scrollTo.min.js"></script>
    <script src="admin/assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="admin/assets/js/common-scripts.js"></script>
  <script>
      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  </body>
</html>
<?php } ?>