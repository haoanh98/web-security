<?php session_start();
require_once('dbconnection.php');

//Code for Registration 
if(isset($_POST['signup']))
{
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$email=$_POST['email'];
	$username=$_POST['username'];
	$password=$_POST['password'];
	$contact=$_POST['contact'];
	$enc_password=$password;
$sql=mysqli_query($con,"select id from users where username='$username'");
$row=mysqli_num_rows($sql);
if($row>0)
{
	echo "<script>alert('Tên đăng nhập đã được tạo. Hãy chọn tên đăng nhập khác');</script>";
} else{
	$msg=mysqli_query($con,"insert into users(fname,lname,email,password,contactno,username,position) values('$fname','$lname','$email','$enc_password','$contact','$username','Student')");

if($msg)
{
	echo "<script>alert('Đăng kí thành công');</script>";
}
}
}

// Code for login 
if(isset($_POST['login']))
{
$password=$_POST['password'];
$dec_password=$password;
$username1=$_POST['username'];
$ret= mysqli_query($con,"SELECT * FROM users WHERE username='$username1' and password='$dec_password' and position='Student'");
$num=mysqli_fetch_array($ret);
if($num>0)
{
$extra="view-details.php";
$_SESSION['login']=$_POST['username'];
$_SESSION['id']=$num['id'];
$_SESSION['name']=$num['fname'];
$host=$_SERVER['HTTP_HOST'];
$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}
else
{
echo "<script>alert('Tài Khoản hoặc mật khẩu không chính xác.');</script>";
$extra="index.php";
$host  = $_SERVER['HTTP_HOST'];
$uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
//header("location:http://$host$uri/$extra");
exit();
}
}


?>
<!DOCTYPE html>
<html>
<head>
<title> HỆ THỐNG ĐĂNG NHẬP </title>
<link href="css/style.css" rel='stylesheet' type='text/css' />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
</script>
<script src="js/jquery.min.js"></script>
<script src="js/easyResponsiveTabs.js" type="text/javascript"></script>
				<script type="text/javascript">
					$(document).ready(function () {
						$('#horizontalTab').easyResponsiveTabs({
							type: 'default',       
							width: 'auto', 
							fit: true 
						});
					});
				   </script>
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,400,600,700,200italic,300italic,400italic,600italic|Lora:400,700,400italic,700italic|Raleway:400,500,300,600,700,200,100' rel='stylesheet' type='text/css'>
</head>
<body>
<div class="main">
		<h1>ĐĂNG NHẬP VÀ ĐĂNG KÍ</h1>
	 <div class="sap_tabs">	
			<div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
			  <ul class="resp-tabs-list">
			  	  <li class="resp-tab-item" aria-controls="tab_item-0" role="tab" style="width: 50%;"><div class="top-img"><img src="images/top-note.png" alt=""/></div><span>ĐĂNG KÍ</span>
			  	  	
				</li>
				  <li class="resp-tab-item" aria-controls="tab_item-1" role="tab" style="width: 50%;"><div class="top-img" ><img src="images/top-lock.png" alt=""/></div><span>ĐĂNG NHẬP</span></li>
				  <div class="clear"></div>
			  </ul>		
			  	 
			<div class="resp-tabs-container">
					<div class="tab-1 resp-tab-content" aria-labelledby="tab_item-0">
					<div class="facts">
					
						<div class="register">
							<form name="registration" method="post" action="" enctype="multipart/form-data">
								<p>Tên  </p>
								<input type="text" class="text" value=""  name="fname" required >
								<p>Họ </p>
								<input type="text" class="text" value="" name="lname"  required >
								<p>Tên Đăng Nhập</p>
								<input type="text" class="text" value=""  name="username" required >
								<p>Mật Khẩu </p>
								<input type="password" value="" name="password" required>
								<p>Địa Chỉ Email</p>
								<input type="text" class="text" value="" name="email"  >
								<p>Số Điện Thoại </p>
								<input type="text" value="" name="contact"  required>
								<div class="sign-up">
									<input type="reset" value="Làm Mới">
									<input type="submit" name="signup"  value="Đăng Kí" >
									<div class="clear"> </div>
								</div>
							</form>

						</div>
					</div>
				</div>		
			 <div class="tab-2 resp-tab-content" aria-labelledby="tab_item-1">
					 	<div class="facts">
							<div class="login">
							<div class="buttons">
								
								
							</div>
							<form name="login" action="" method="post">
								<input type="text" class="text" name="username" value="" placeholder="Tên Đăng Nhập"  ><a href="#" class=" icon email"></a>

								<input type="password" value="" name="password" placeholder="Mật Khẩu"><a href="#" class=" icon lock"></a>

								<div class="p-container">
								
									<div class="submit two">
									<input type="submit" name="login" value="Đăng Nhập" >
									</div>
									<div class="clear"> </div>
								</div>

							</form>
					</div>
				</div> 
			</div> 			        					 
	        </div>
	     </div>

</body>
</html>