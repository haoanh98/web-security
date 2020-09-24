<?php
session_start();
include'dbconnection.php';
//Checking session is valid or not
if (strlen($_SESSION['id']==0)) {
  header('location:logout.php');
  } else{

// for updating user info    
if(isset($_POST['Submit']))
{
	$fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $email=$_POST['email'];
    $contact=$_POST['contact'];
    $uid=intval($_SESSION['id']);
$query=mysqli_query($con,"update users set fname='$fname' ,lname='$lname' ,email='$email' ,contactno='$contact'  where id='$uid'");
echo "<script>alert('Cập Nhật Thành Công');</script>";
}
?>

<!DOCTYPE html>
<html lang="vi">
  <head>
    <title>Sinh Viên | Cập Nhật Thông Tin </title>
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
            <a href="#" class="logo"><b>Hệ Thống Sinh Viên</b></a>
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
                          <span> Thay Đổi Mật Khẩu </span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="view-details.php" >
                          <i class="fa fa-users"></i>
                          <span> Thông Tin Người Dùng </span>
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
              </ul>
          </div>
      </aside>
      <?php $ret=mysqli_query($con,"select * from users where id='".$_SESSION['id']."'");
	  while($row=mysqli_fetch_array($ret))
	  
	  {?>
      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-star"></i> Thông Tin của <?php echo $row['fname'];?></h3>
             	
				<div class="row">
				
                  
	                  
                  <div class="col-md-12">
                      <div class="content-panel">
                           <form class="form-horizontal style-form" name="form1" method="post" action="" onSubmit="return valid();">
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;"> Tên </label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="fname" value="<?php echo $row['fname'];?>" >
                              </div>
                          </div>
                          
                              <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;"> Họ </label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="lname" value="<?php echo $row['lname'];?>" >
                              </div>
                          </div>
                              <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;"> Địa Chỉ Email </label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="email" value="<?php echo $row['email'];?>" >
                              </div>
                          </div>
                               <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;"> Số Điện Thoại </label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="contact" value="<?php echo $row['contactno'];?>" >
                              </div>
                          </div>
                          <div style="margin-left:100px;">
                          <input type="submit" name="Submit" value="Cập Nhật" class="btn btn-theme"></div>
                          </form>
                      </div>
                  </div>
              </div>
		</section>
        <?php } ?>
      </section></section>
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