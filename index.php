<?php
session_start();

if(isset($_REQUEST['login']))
{
	require_once("connect.php");
	extract($_POST);
	
	
	$q=mysqli_query($cc,"select * from admin_tbl where loginid='$lid' and password='$pwd'")or die ("QF");
	
	if(mysqli_num_rows($q))
	{
		$data=mysqli_fetch_array($q);
		$_SESSION['m_a']=$data['aid'];
		header("location:home.php");
	}
	else
	{
		header("location:index.php?msg=wrong");
	}
	
}
?>
<!DOCTYPE html>
<head>
<title>Title Here</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="css/bootstrap.min.css" >
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/style-responsive.css" rel="stylesheet"/>
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="css/font.css" type="text/css"/>
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
<script src="js/jquery2.0.3.min.js"></script>
</head>
<body>
<div class="log-w3">
<div class="w3layouts-main">
	<h2>Login</h2>
		<form action="#" method="post" form id="form1" name="form1">
			<input name="lid" type="text" class="ggg" id="lid" placeholder="E-MAIL" required="">
			<input name="pwd" type="password" class="ggg" id="pwd" placeholder="PASSWORD"  >
			&nbsp;<input type="checkbox" name="checkbox" onClick="myFunction();" value="">			
			
				
				<input type="submit" value="Login" name="login">
				<div class="clearfix"></div>
		</form>
		
</div>
</div>
<script src="js/bootstrap.js"></script>
<script src="js/jquery.dcjqaccordion.2.7.js"></script>
<script src="js/scripts.js"></script>
<script src="js/jquery.slimscroll.js"></script>
<script src="js/jquery.nicescroll.js"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="js/jquery.scrollTo.js"></script>
</body>
</html>
<script>
function f1()
{
   if(form1.lid.value=="")
   {
    alert("Enter Login id");
	form1.lid.focus();
	return false;
   }
   else if(form1.pwd.value=="")
   {
   	alert("Enter Password");
	form1.pwd.focus();
	return false;
   }
}
</script>

<?php if(isset($_REQUEST['msg'])=="wrong") { ?>
<script>
alert("Login ID or Password Incorrect");
</script>
<?php } ?>


<script>
<?php if(isset($_REQUEST['msg5'])=="logout"){?>
alert("Logout Successfull...");
</script>
<?php } ?>

<?php if(isset($_REQUEST['msg2'])=="change"){?>
<script>
alert("Password Canged..Login With new password");
</script>
<?php } ?>

<?php if(isset($_REQUEST['msg4'])=="stop"){?>
<script>
alert("Please Login To access...");
</script>
<?php }?>


<script>
function myFunction() {
  var x = document.getElementById("pwd");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
