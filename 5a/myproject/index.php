<?php session_start();
require_once('dbconnection.php');

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
echo "<script>window.location.href='".$extra."'</script>";
exit();
}
else
{
echo "<script>alert('Tài Khoản hoặc mật khẩu không chính xác.');</script>";
$extra="index.php";
echo "<script>window.location.href='".$extra."'</script>";
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
		<h1>ĐĂNG NHẬP SINH VIÊN</h1>
	 <div class="sap_tabs">	
			<div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
			  <ul class="resp-tabs-list">
				  <li class="resp-tab-item" aria-controls="tab_item-1" role="tab" style="width: 100%;"><div class="top-img" ><img src="images/top-lock.png" alt=""/></div><span>ĐĂNG NHẬP</span></li>
				  <div class="clear"></div>
			  </ul>		
			  	 
			<div class="resp-tabs-container">	
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