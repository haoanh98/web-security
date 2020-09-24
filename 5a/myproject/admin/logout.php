<?php
session_start();
$_SESSION['login']=="";

session_unset();
$_SESSION['action1']="Bạn đã đăng xuất thành công..!";
?>
<script language="javascript">
document.location="index.php";
</script>
