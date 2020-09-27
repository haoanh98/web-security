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
    <title>GIẢNG VIÊN | BÀI TẬP </title>
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
                    <li><a class="logout" href="logout.php">Đăng Xuất</a></li>
            	</ul>
            </div>
        </header>
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <ul class="sidebar-menu" id="nav-accordion">
              
              	  <p class="centered"><a href="#"><img src="assets/img/ui-sam.jpg" class="img-circle" width="60"></a></p>
              	  <h5 class="centered"><?php echo $_SESSION['name'];?></h5>
              	  	
                  <li class="mt">
                      <a href="change-password.php">
                          <i class="fa fa-key"></i>
                          <span>Thay Đổi Mật Khẩu</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="manage-users.php" >
                          <i class="fa fa-users"></i>
                          <span>Thông Tin Người Dùng</span>
                      </a> 
                  </li>

                  <li class="sub-menu">
                      <a href="update.php" >
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
                              <?php $ret=mysqli_query($con,"select * from upload where type = '0'");
							  while($row=mysqli_fetch_array($ret))
							  {?>
                              <tr>
                                  <td><?php echo $row['link'];?></td>
                                  <td><?php echo $row['users'];?></td>
                                  <td>
                                     <a href="upload/<?php echo $row['id'].'/'.$row['link'];?>"> 
                                     <button class="btn btn-primary btn-xs"><i class="fa fa-download"></i></button></a>
                                  </td>
                                  <td>
                                     <a href="list.php?id=<?php echo $row['id'];?>"> 
                                     <button class="btn btn-primary btn-xs"><i class="fa fa-user"></i></button></a>
                                  </td>
                              </tr>
                              <?php }?>
                             
                              </tbody>
                          </table>

                          <h4><i class="fa fa-angle-right"></i> Upload File Bài Tập </h4>
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
                                                $c=$_SESSION['name'];
                                                $msg=mysqli_query($con,"insert into upload(link,users,type) values('$a','$c','0')");
                                                $msg=mysqli_query($con,"select * from upload where link = '$a' and users = '$c' and type = '0'");
                                                $b=mysqli_fetch_array($msg);
                                                mkdir('upload/'.$b['id']);
                                                move_uploaded_file($_FILES['fileUpload']['tmp_name'], 'upload/'.$b['id'].'/'.$_FILES['fileUpload']['name']);
                                                echo "<script>alert('Thêm Bài Tập Thành Công');</script>";
                                            }
                                        }
                                    ?>
                                    </div>
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
<?php } ?>