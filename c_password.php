<?php
session_start();
$a=$_SESSION['m_a'];
require_once("connect.php");
$q=mysqli_query($cc,"select password from admin_tbl where aid=$a")or die ("QF1");
$data=mysqli_fetch_array($q);
$opwd=$data['password'];


extract($_POST);
if(isset($_REQUEST['chen']))
{
	$ecp1=md5($cpwd);
	
	if($opwd==$ecp1)
	{
		//update
		$ernp1=md5($npwd);
		
		mysqli_query($cc,"update admin_tbl set password='$ernp1' where aid=$a")or die ("QF2");
	header("location:logout.php?m=1");
	}
	else 
	{
		header("location:c_password.php?msg=wrong");
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
<link rel="stylesheet" href="css/morris.css" type="text/css"/>
<!-- calendar -->
<link rel="stylesheet" href="css/monthly.css">
<!-- //calendar -->
<!-- //font-awesome icons -->
<script src="js/jquery2.0.3.min.js"></script>
<script src="js/raphael-min.js"></script>
<script src="js/morris.js"></script>
</head>
<body>
<section id="container">
<!--header start-->
<header class="header fixed-top clearfix">
<!--logo start-->
<?php require_once("logo.php");?>
<!--logo end-->

<?php require_once("top.php");?>
</header>
<!--header end-->
<!--sidebar start-->
<?php require_once("menu.php");?>
<!--sidebar end-->
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<!-- //market-->
			
		<!-- //market-->
		<div class="row">
			<div class="panel-body">
				<div class="col-md-12 w3ls-graph">
					<!--agileinfo-grap-->
						<div class="agileinfo-grap">
							<div class="agileits-box">
								<header class="agileits-box-header clearfix">
									<h1 align="center">Change Password</h1>
										<div class="toolbar">
										<form id="form1" name="form1" method="post" action="" onSubmit="return f1();">
  <table width="100%" border="1" >
    <tr>
      <td><?php include("header.php");?></td>
    </tr>
    <tr>
      <td height="214"><table width="50%" border="1" align="center" class="table-hover table-bordered table-responsive">
        <tr>
          <td>Enter Current Password </td>
          <td>:</td>
          <td><input name="cpwd" type="text" id="cpwd" autofocus placeholder="Enter Current Password" /></td>
        </tr>
        <tr>
          <td>Enter New Password </td>
          <td>:</td>
          <td><label>
            <input name="npwd" type="text" id="npwd"  placeholder="New Password"/>
          </label></td>
        </tr>
        <tr>
          <td>Retype New Password </td>
          <td>:</td>
          <td><label>
            <input name="rpwd" type="text" id="rpwd" placeholder="Retype New Password" />
          </label></td>
        </tr>
        <tr>
          <td colspan="3"><label>
            <div align="center">
              <input name="chen" type="submit" id="chen" onClick="return f1();" value="Change" />
              </div>
          </label></td>
          </tr>
      </table></td>
    </tr>
    <tr>
      <td><?php include("footer.php");?></td>
    </tr>
  </table>
</form>
											
										</div>
								</header>
								 
							</div>
						</div>
	<!--//agileinfo-grap-->

				</div>
			</div>
		</div>
		<div class="agil-info-calendar">
		<!-- calendar -->
		
		<!-- //calendar -->
		 
			<div class="clearfix"> </div>
		</div>
			<!-- tasks -->
			 
		<!-- //tasks -->
		 
</section>
 <!-- footer -->
		  <?php require_once("footer.php");?>
  <!-- / footer -->
</section>
<!--main content end-->
</section>
<script src="js/bootstrap.js"></script>
<script src="js/jquery.dcjqaccordion.2.7.js"></script>
<script src="js/scripts.js"></script>
<script src="js/jquery.slimscroll.js"></script>
<script src="js/jquery.nicescroll.js"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="js/jquery.scrollTo.js"></script>
<!-- morris JavaScript -->	
<script>
	$(document).ready(function() {
		//BOX BUTTON SHOW AND CLOSE
	   jQuery('.small-graph-box').hover(function() {
		  jQuery(this).find('.box-button').fadeIn('fast');
	   }, function() {
		  jQuery(this).find('.box-button').fadeOut('fast');
	   });
	   jQuery('.small-graph-box .box-close').click(function() {
		  jQuery(this).closest('.small-graph-box').fadeOut(200);
		  return false;
	   });
	   
	    //CHARTS
	    function gd(year, day, month) {
			return new Date(year, month - 1, day).getTime();
		}
		
		graphArea2 = Morris.Area({
			element: 'hero-area',
			padding: 10,
        behaveLikeLine: true,
        gridEnabled: false,
        gridLineColor: '#dddddd',
        axes: true,
        resize: true,
        smooth:true,
        pointSize: 0,
        lineWidth: 0,
        fillOpacity:0.85,
			data: [
				{period: '2015 Q1', iphone: 2668, ipad: null, itouch: 2649},
				{period: '2015 Q2', iphone: 15780, ipad: 13799, itouch: 12051},
				{period: '2015 Q3', iphone: 12920, ipad: 10975, itouch: 9910},
				{period: '2015 Q4', iphone: 8770, ipad: 6600, itouch: 6695},
				{period: '2016 Q1', iphone: 10820, ipad: 10924, itouch: 12300},
				{period: '2016 Q2', iphone: 9680, ipad: 9010, itouch: 7891},
				{period: '2016 Q3', iphone: 4830, ipad: 3805, itouch: 1598},
				{period: '2016 Q4', iphone: 15083, ipad: 8977, itouch: 5185},
				{period: '2017 Q1', iphone: 10697, ipad: 4470, itouch: 2038},
			
			],
			lineColors:['#eb6f6f','#926383','#eb6f6f'],
			xkey: 'period',
            redraw: true,
            ykeys: ['iphone', 'ipad', 'itouch'],
            labels: ['All Visitors', 'Returning Visitors', 'Unique Visitors'],
			pointSize: 2,
			hideHover: 'auto',
			resize: true
		});
		
	   
	});
	</script>
<!-- calendar -->
	<script type="text/javascript" src="js/monthly.js"></script>
	<script type="text/javascript">
		$(window).load( function() {

			$('#mycalendar').monthly({
				mode: 'event',
				
			});

			$('#mycalendar2').monthly({
				mode: 'picker',
				target: '#mytarget',
				setWidth: '250px',
				startHidden: true,
				showTrigger: '#mytarget',
				stylePast: true,
				disablePast: true
			});

		switch(window.location.protocol) {
		case 'http:':
		case 'https:':
		// running on a server, should be good.
		break;
		case 'file:':
		alert('Just a heads-up, events will not work when run locally.');
		}

		});
	</script>
	<!-- //calendar -->
</body>
</html>
<script>
function f1()
{
	if(form1.cpwd.value=="")
	{
		alert("Enter  Current Password");
		form1.cpwd.focus();
		return false;
	}
	else if(form1.npwd.value=="")
	{
		alert("Enter New Password");
		form1.npwd.focus();
		return false;
	}
	else if(form1.rpwd.value=="")
	{
		alert("Enter Retype New Password");
		form1.rpwd.focus();
		return false;
	}
	if(form1.npwd.value!=form1.rpwd.value)
	{
		alert("New Password and Re-Type New Password Not Matched!");
		form1.npwd.value='';
		form1.rpwd.value='';
		form1.npwd.focus();
		return false;
	}
}
</script>

<?php if(isset($_REQUEST['msg'])=="wrong"){?>
<script>
alert("current Password is Incorrect..");
</script>
<?php } ?>
