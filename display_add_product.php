<?php
session_start();
if(isset($_SESSION['m_a'])=="")
{
	header("location:index.php?msg4=stop");
	exit(0);
}
if(isset($_REQUEST['Submit']))
{
	require_once("connect.php");
	extract($_POST);
	foreach($a as $j)
	{
		mysqli_query($cc,"delete from product_tbl where pid=$j")or die ("QF");
	}
	header("location:display_add_product.php");
}
?>
<!DOCTYPE html>
<head>
<title>Title Here</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
 <!--FOR ZOOM-->
<link rel="stylesheet" href="css_zoom/dg-picture-zoom.css" />
	<script type="text/javascript" src="js_zoom/external/mootools-1.2.4-core-yc.js"></script>
	<script type="text/javascript" src="js_zoom/external/mootools-more.js"></script>
	<script type="text/javascript" src="js_zoom/dg-picture-zoom.js"></script>
	<script type="text/javascript" src="js_zoom/dg-picture-zoom-autoload.js"></script>
	 
<!--ZOOM OVER-->
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
									<h1 align="center"> View Product</h1>
										<div class="toolbar">
										<form id="form1" name="form1" method="post" action="">
  <table width="100%" border="1">
    <tr>
      <td><?php include("header.php");?></td>
    </tr>
    <tr>
      <td><table width="100%" border="1" class="table-hover table-bordered table-responsive">
        <tr bgcolor="#5d4b46">
          <td width="2%" height="66"><input type="checkbox" name="checkbox" value="checkbox" onClick="selectall(this);" /></td>
          <td width="5%">Sr.No</td>
          <td width="9%">Company Name </td>
          <td width="7%">Product Name </td>
          <td width="9%">Purchase Price </td>
          <td width="6%">Seling Price </td>
          <td width="8%">P Quentity </td>
          <td width="6%">Photo 1 </td>
          <td width="10%">Description</td>
          <td width="7%">Screen Size </td>
          <td width="8%">Blootuth Virsion </td>
          	<td width="6%">Garant</td>
          <td width="8%">Warrntey</td>
          <td colspan="2"><div align="center">Action</div></td>
          </tr>
		  <?php
		  $no=1;
		  require_once("connect.php");
		  $q=mysqli_query($cc,"select * from  product_tbl")or die ("QF");
		  while($data=mysqli_fetch_array($q))
		  {
		  ?>
        <tr>
          <td><input name="a[]" type="checkbox" id="a[]" value="<?php echo $data['pid'];?>" /></td>
          <td><?php echo $no;?></td>
          <td><?php echo $data['company_name'];?></td>
          <td><?php echo $data['product_name'];?></td>
          <td><?php echo $data['purchase_price'];?></td>
          <td><?php echo $data['selling_price'];?></td>
          <td><?php echo $data['p_quantity'];?></td>
          <td><img src="mphoto/<?php echo $data['photo_1'];?>?url=mphoto/<?php echo $data['photo_1'];?>" width="60" height="60" class="dg-picture-zoom" style="border-radius:10%"/></td>
          <td><?php echo $data['description'];?></td>
          <td><?php echo $data['screen_size'];?></td>
          <td><?php echo $data['blootuth_virsion'];?></td>
          <td><?php echo $data['garanty'];?></td>
          <td><?php echo $data['warentey'];?></td>
          <td width="5%"><a href="edit_view_product.php?edit=<?php echo $data['pid'];?>"><img src="edit .png" width="50" height="40"></a></td>
          <td width="4%"><a href="read_product.php?r=<?php echo $data['pid'];?>"><img src="more icon11.png" width="50" height="40"></a></td>
        </tr>
		  <?php
		  $no++;
		  }
		  ?>
      </table>
      <input type="submit" name="Submit" value="Delete" onClick="return f1();" /></td>
    </tr>
    <tr>
      <td height="22"><?php include("footer.php");?>	</td>
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
<script language="javascript">
function selectall(source) {
  checkboxes = document.getElementsByName('a[]');
  for(var i=0, n=checkboxes.length;i<n;i++) {
    checkboxes[i].checked = source.checked;
  }
}
</script>
<script>
function f1()
{
	var c=confirm("Are You Sore Delete?")
	if(c==false)
	return false;
}
	
</script>