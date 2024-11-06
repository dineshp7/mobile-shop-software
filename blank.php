<?php
session_start();
if(isset($_SESSION['m_a'])=="")
{
	header("location:index.php?msg4=stop");
	exit(0);
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
									<h1 align="center">Edit View Categrory</h1>
										<div class="toolbar">
										<form id="form1" name="form1" method="post" action="" enctype="multipart/form-data">
      <table width="50%" border="1" align="center">
        <tr>
          <td colspan="3"><div align="center">Add Product -Update </div></td>
        </tr>
        <tr>
          <td>Company Name </td>
          <td>:</td>
          <td><input name="cn" type="text" id="cn" autofocus="autofocus" placeholder="Enter Company Name"  value="<?php echo $data['company_name'];?>"/></td>
        </tr>
        <tr>
          <td>Product Name </td>
          <td>:</td>
          <td><input name="pn" type="text" id="pn" placeholder="Product Name" value="<?php echo $data['product_name'];?>" /></td>
        </tr>
        <tr>
          <td>Network</td>
          <td>:</td>
          <td><input name="net" type="radio" value="4g" <?php if($data['network']=="4g"){?> checked="checked" <?php } ?> />
            4G
            <input name="net" type="radio" value="5g" <?php if($data['netwok']=="5g"){?> checked="checked" <?php } ?> />
            5G</td>
        </tr>
        <tr>
          <td>Color</td>
          <td>:</td>
          <td><input name="col" type="radio" value="black" <?php if($data['color']=="black"){?> checked="checked" <?php } ?> />
            Black
            <input name="col" type="radio" value="white" <?php if($data['color']=="white"){?> checked="checked" <?php } ?> />
            White</td>
        </tr>
        <tr>
          <td>Seriese</td>
          <td>:</td>
          <td><input name="sr" type="text" id="sr"  placeholder="Seriese" value="<?php echo $data['seriese'];?>"/></td>
        </tr>
        <tr>
          <td>Ram</td>
          <td>:</td>
          <td><input name="rm" type="text" id="rm" placeholder="Ram" value="<?php echo $data['ram'];?>"/></td>
        </tr>
        <tr>
          <td>Rom</td>
          <td>:</td>
          <td><input name="ro" type="text" id="ro" placeholder="Rom" value="<?php echo $data['rom'];?>" /></td>
        </tr>
        <tr>
          <td>Camera</td>
          <td>:</td>
          <td><input name="cm" type="text" id="cm" placeholder="Camera" value="<?php echo $data['camera'];?>" /></td>
        </tr>
        <tr>
          <td>Purchase_Price</td>
          <td>:</td>
          <td><input name="per" type="text" id="per" placeholder="Purchase Price" value="<?php echo $data['purchase_price'];?>" /></td>
        </tr>
        <tr>
          <td>Selling_Price</td>
          <td>:</td>
          <td><input name="sel" type="text" id="sel" placeholder="Selling Price" value="<?php echo $data['selling_price'];?>" /></td>
        </tr>
        <tr>
          <td>P_Quentity</td>
          <td>:</td>
          <td><input name="pq" type="text" id="pq" placeholder="P Quentity" value="<?php echo $data['p_quantity'];?>" /></td>
        </tr>
        <tr>
          <td>Bettery</td>
          <td>:</td>
          <td><input name="bt" type="text" id="bt" placeholder="Bettery" value="<?php echo $data['battery'];?>" /></td>
        </tr>
        <tr>
          <td>Processer</td>
          <td>:</td>
          <td><input name="ps" type="text" id="ps" placeholder="Processer" value="<?php echo $data['processer'];?>" /></td>
        </tr>
        <tr>
          <td>Bettery Backup </td>
          <td>:</td>
          <td><input name="beb" type="text" id="beb" placeholder="Bettery Backup" value="<?php echo $data['battery_backup'];?>"/></td>
        </tr>
        <tr>
          <td>Weight</td>
          <td>:</td>
          <td><input name="we" type="text" id="we" placeholder="Weight" value="<?php echo $data['weight'];?>" /></td>
        </tr>
        <tr>
          <td>Photo1</td>
          <td>:</td>
          <td><input name="ph1" type="file" id="ph1" />
            <img src="mphoto/<?php echo $data['photo_1'];?>" width="60" height="60" /></td>
        </tr>
        <tr>
          <td>Photo2</td>
          <td>:</td>
          <td><input name="ph2" type="file" id="ph2" />
            <img src="mphoto/<?php echo $data['photo_2'];?>" width="60" height="60" /></td>
        </tr>
        <tr>
          <td>Photo3</td>
          <td>:</td>
          <td><input name="ph3" type="file" id="ph3" />
            <img src="mphoto/<?php echo $data['photo_3'];?>" width="60" height="60" /></td>
        </tr>
        <tr>
          <td>Description</td>
          <td>:</td>
          <td><textarea name="des" id="des" placeholder="Description"><?php echo $data['description'];?></textarea></td>
        </tr>
        <tr>
          <td>Screen Size </td>
          <td>:</td>
          <td><input name="ss" type="text" id="ss" placeholder="Screen Size" value="<?php echo $data['screen_size'];?>" /></td>
        </tr>
        <tr>
          <td>Blootuth Virsion </td>
          <td>:</td>
          <td><input name="bv" type="text" id="bv" placeholder="Blootuth Virsion" value="<?php echo $data['blootuth_virsion'];?>" /></td>
        </tr>
        <tr>
          <td>Garant</td>
          <td>:</td>
          <td><textarea name="get" id="get" placeholder="Garant"><?php echo $data['garanty'];?></textarea></td>
        </tr>
        <tr>
          <td>Warentey</td>
          <td>:</td>
          <td><textarea name="wer" id="wer" placeholder="Warentey"><?php echo $data['warentey'];?></textarea></td>
        </tr>
        <tr>
          <td><div align="right">
              <input type="reset" name="Reset" value="Reset" />
          </div></td>
          <td>&nbsp;</td>
          <td><input type="submit" name="Submit" value="Update" onClick="return f1();" /></td>
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
