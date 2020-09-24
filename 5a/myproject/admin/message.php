<?php
session_start();
include'dbconnection.php';
// checking session is valid for not 
if (strlen($_SESSION['id']==0)) {
  header('location:logout.php');
  } else{

// for deleting messages
if(isset($_GET['uid']))
{
if(isset($_POST['Submit'])){}
else{
$messageid=$_GET['uid'];
$msg=mysqli_query($con,"delete from message where id='$messageid'");
echo "<script>alert('Xóa Tin');</script>";

}}


// send messages
if(isset($_POST['Submit'])&&($_POST['content']!=""))
{
    $content=$_POST['content'];
    $id_1=$_SESSION['id'];
    $id_2=$_GET['id'];
    $msg=mysqli_query($con,"insert into message (id_1,id_2,text) values($id_1,$id_2,'$content')");
if($msg)
{
    echo "<script>alert('Gửi Tin Nhắn Thành Công');</script>";
}
}

?><!DOCTYPE html>
<html lang="en">
  <head>
    <title>GIẢNG VIÊN | MESSAGE</title>
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
                    <li><a class="logout" href="logout.php">Đăng xuất</a></li>
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
                          <span> Thay Đổi Mật Khẩu </span>
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
                 
              </ul>
          </div>
      </aside>
      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-star"></i> Tin Nhắn </h3>
				<div class="row">
				
                  
	                  
                  <div class="col-md-12">
                      <div class="content-panel">
                      <table class="table table-striped table-advance table-hover">
	                  	  	  <h4><i class="fa fa-angle-right"></i> Tin nhắn đến </h4>
	                  	  	  <hr>
                              <thead>
                              <tr>
                                  <th> Người Gửi </th>
                                  <th class="hidden-phone"> Nội Dung </th>
                              </tr>
                              </thead>
                              <tbody>
                              <?php $ret=mysqli_query($con,"select * from message");
							  while($row=mysqli_fetch_array($ret))
							  {if (($row['id_2']==$_SESSION['id']) and ($row['id_1']==$_GET['id'])){
                                  $a=$_GET['id'];
                                  $ret1=mysqli_query($con,"select * from users where id = $a");
                                  $num1=mysqli_fetch_array($ret1)
                                  ?>
                              <tr>
                              <td><?php echo $num1['fname'];?></td>
                                  <td><?php echo $row['text'];?></td>  
                              </tr>
                              <?php }
                            else
                              {if (($row['id_1']==$_SESSION['id']) and ($row['id_2']==$_GET['id'])){
                                $b=$_SESSION['id'];
                                $ret2=mysqli_query($con,"select * from users where id = $b");
                                $num2=mysqli_fetch_array($ret2)
                                ?>
                                <tr>
                                <td><?php echo $num2['fname'];?></td>
                                    <td><?php echo $row['text'];?></td>
                                    <td>
                                        <a href="message.php?id=<?php echo $_GET['id'];?>&uid=<?php echo $row['id'];?>"> 
                                        <button class="btn btn-danger btn-xs" onClick="return confirm('Bạn có muốn xóa tin nhắn không?');"><i class="fa fa-trash-o "></i></button></a>

                                    </td>

                                    <td>
                                        <a href="update-message.php?id=<?php echo $row['id'];?>"> 
                                        <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
                                    </td>
                                </tr>
                                <?php }}}?>
                              </tbody>
                          </table>

                          <h4><i class="fa fa-angle-right"></i> Soạn Tin Nhắn </h4>
                          <hr>
                          <div class="row">

                            <div class="col-md-12">
                                <div class="content-panel">
                                    <form class="form-horizontal style-form" name="form1" method="post" action="" onSubmit="return valid();">
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;"> Nội Dung </label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="content" value="" >
                                        </div>
                                    </div>
                                    <div style="margin-left:100px;">
                                    <input type="submit" name="Submit" value="GỬI TIN NHẮN" class="btn btn-theme"></div>
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