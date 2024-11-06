<?php
session_start();

if(isset($_SESSION['m_a'])=="")
{
	header("location:index.php?msg4=stop");
	exit(0);
}
//last login Date
require_once("connect.php");
$a12=$_SESSION['m_a'];
$dt=date('Y-m-d');
mysqli_query($cc,"update admin_tbl set last_login_date='$dt' where aid='$a12'")or die ("QF2");

$_SESSION['m_a']='';
session_destroy();
	if($_REQUEST['m']=="1")
{
	header("location:index.php?msg2=change");
}
else
{
	header("location:index.php?msg5=logout");
}

?>