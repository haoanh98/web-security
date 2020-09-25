<?php
session_start();
include'dbconnection.php';
// checking session is valid for not 
if (strlen($_SESSION['id']==0)) {
  header('location:logout.php');
  } else{

// for deleting student
if(isset($_GET['id']))
{
if(isset($_POST['Submit'])) {}
else
{
$adminid=$_GET['id'];
$msg=mysqli_query($con,"delete from users where id='$adminid'");
if($msg)
{
echo "<script>alert('ĐÃ XÓA SINH VIÊN');</script>";
}
}
}

// Add student
if(isset($_POST['Submit']))
{
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$email=$_POST['email'];
	$username=$_POST['username'];
	$password=$_POST['password'];
	$contact=$_POST['contact'];
	$enc_password=$password;
$sql=mysqli_query($con,"select id from users where username='$username' and position = 'Student'");
$row=mysqli_num_rows($sql);
if($row>0)
{
	echo "<script>alert('Tên Đăng Nhập Đã Được Tạo. Vui Lòng Chọn Tên Đăng Nhập Khác');</script>";
} else{
	$msg=mysqli_query($con,"insert into users(fname,lname,email,password,contactno,username,position) values('$fname','$lname','$email','$enc_password','$contact','$username','Student')");

if($msg)
{
    echo "<script>alert('Thêm Tài Khoản Thành Công');</script>";
}
}
}

?><!DOCTYPE html>
<html lang="en">
  <head>
    <title>GIẢNG VIÊN | THÔNG TIN NGƯỜI DÙNG </title>
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
          	<h3><i class="fa fa-star"></i> Thông Tin Người Dùng </h3>
				<div class="row">
                  <div class="col-md-12">
                      <div class="content-panel">
                          <table class="table table-striped table-advance table-hover">
	                  	  	  <h4><i class="fa fa-angle-right"></i> Danh Sách Sinh Viên </h4>
	                  	  	  <hr>
                              <thead>
                              <tr>
                                  <th> Số Thứ Tụ </th>
                                  <th class="hidden-phone">Tên</th>
                                  <th> Họ </th>
                                  <th> Tên Đăng Nhập</th>
                                  <th> Địa Chỉ Email </th>
                                  <th> Số Điện Thoại</th>
                              </tr>
                              </thead>
                              <tbody>
                              <?php $ret=mysqli_query($con,"select * from users where position = 'Student'");
							  $cnt=1;
							  while($row=mysqli_fetch_array($ret))
							  {?>
                              <tr>
                              <td><?php echo $cnt;?></td>
                                  <td><?php echo $row['fname'];?></td>
                                  <td><?php echo $row['lname'];?></td>
                                  <td><?php echo $row['username'];?></td>
                                  <td><?php echo $row['email'];?></td>
                                  <td><?php echo $row['contactno'];?></td>  
                                  <td>
                                     <a href="update-profile.php?uid=<?php echo $row['id'];?>"> 
                                     <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
                                     
                                     <a href="manage-users.php?id=<?php echo $row['id'];?>"> 
                                     <button class="btn btn-danger btn-xs" onClick="return confirm('Bạn Có Muốn Xóa Không?');"><i class="fa fa-trash-o "></i></button></a>
                                  
                                     <a href="message.php?id=<?php echo $row['id'];?>"> 
                                     <button class="btn btn-primary btn-xs"><i class="fa fa-envelope-o"></i></button></a>

                                  </td>
                              </tr>
                              <?php $cnt=$cnt+1; }?>
                             
                              </tbody>
                          </table>
                          <table class="table table-striped table-advance table-hover">
	                  	  	  <h4><i class="fa fa-angle-right"></i> Danh Sách Giảng Viên </h4>
	                  	  	  <hr>
                              <thead>
                              <tr>
                                  <th> Số Thứ Tự </th>
                                  <th class="hidden-phone"> Tên </th>
                                  <th> Họ </th>
                                  <th> Địa Chỉ Email </th>
                                  <th> Số Diện Thoại </th>
                              </tr>
                              </thead>
                              <tbody>
                              <?php $ret=mysqli_query($con,"select * from users where position = 'Teacher'");
							  $cnt=1;
							  while($row=mysqli_fetch_array($ret))
							  {?>
                              <tr>
                              <td><?php echo $cnt;?></td>
                                  <td><?php echo $row['fname'];?></td>
                                  <td><?php echo $row['lname'];?></td>
                                  <td><?php echo $row['email'];?></td>
                                  <td><?php echo $row['contactno'];?></td>  
                                  <?php
                                     if ($_SESSION['id']!= $row['id']){?>
                                  <td>
                                     <a href="message.php?uid=<?php echo $row['id'];
                                     $_SESSION['receiver'] = $row['id'];?>"> 
                                     <button class="btn btn-primary btn-xs"><i class="fa fa-envelope-o"></i></button></a>
                                  </td>
                                     <?php } ?>
                              </tr>
                              <?php $cnt=$cnt+1; }?>
                             
                              </tbody>
                          </table>

                          <h4><i class="fa fa-angle-right"></i> Tạo Tài Khoản Sinh Viên </h4>
                          <hr>
                          <div class="row">

                            <div class="col-md-12">
                                <div class="content-panel">
                                    <form class="form-horizontal style-form" name="form1" method="post" action="" onSubmit="return valid();">
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Tên </label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="fname" value="" >
                                        </div>
                                    </div>
                                    
                                        <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;"> Họ </label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="lname" value="" >
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
<?php } ?>