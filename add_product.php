<?php
session_start();
if(isset($_SESSION['m_a'])=="")
{
	header("location:index.php?msg4=stop");
	exit(0);
}

require_once("connect.php");
if(isset($_REQUEST['Submit']))
{
	extract($_POST);
	$fn1=$_FILES['ph1']['name'];
	$fn2=$_FILES['ph2']['name'];
	$fn3=$_FILES['ph3']['name'];
	//for File Type
	$ft1=$_FILES['ph1']['type'];
	$ft2=$_FILES['ph2']['type'];
	$ft3=$_FILES['ph3']['type'];
	
	//file Size
	$fs1=$_FILES['ph1']['size'];
	$fs2=$_FILES['ph2']['size'];
	$fs3=$_FILES['ph3']['size'];
	
	if($fs1>2097152)
	{
		echo "upload File1 Min then 2 MB";
		die;
	}
	if($fs2>2097152)
	{
		echo "upload File2 Min then 2 MB";
		die;
	}
	if($fs3>2097152)
	{
		echo "upload File3 Min then 2 MB";
		die;
	}

	if($ft1!="image/bmp" && $ft1!="image/png" && $ft1!="image/jpeg" && $ft1!="image/jpg")
	{
		echo "Upload Valid File(image 1)";
		die;
	}
	if($ft2!="image/bmp" && $ft2!="image/png" && $ft2!="image/jpeg" && $ft2!="image/jpg")
	{
		echo "Upload Valid File(image 2)";
		die;
	}
	if($ft3!="image/bmp" && $ft3!="image/png" && $ft3!="image/jpeg" && $ft3!="image/jpg")
	{
		echo "Upload Valid File(image 3)";
		die;
	}
	

	
	$path="mphoto/";
	
	$npath1=$path.$fn1;
	$npath2=$path.$fn2;
	$npath3=$path.$fn3;

move_uploaded_file($_FILES['ph1']['tmp_name'],$npath1);
move_uploaded_file($_FILES['ph2']['tmp_name'],$npath2);
move_uploaded_file($_FILES['ph3']['tmp_name'],$npath3);
	
	//STOCK Insert /Update
	$qs=mysqli_query($cc,"select * from stock_tbl where company_name='$cn' and seriese='$sr'")or die ("QF Stock Check");
	if(mysqli_num_rows($qs))
	{
		//Stock update(+)
		$datas=mysqli_fetch_array($qs);
		$old_q=$datas['s_quantity'];
		$n_qty=$old_q+$pq;
		mysqli_query($cc,"update stock_tbl set s_quantity='$n_qty' where company_name='$cn' and seriese='$sr' ")or die ("QF Stock Update");
	}
	else
	{
		//insert stock
		mysqli_query($cc,"insert into stock_tbl (company_name,seriese,s_quantity)values('$cn','$sr','$pq')")or die ("QF Stock");
	}
	mysqli_query($cc,"insert into product_tbl (company_name,product_name,network,color,seriese,ram,rom,camera,purchase_price,selling_price,p_quantity,battery,processer,battery_backup,weight,photo_1,photo_2,photo_3,description,screen_size,blootuth_virsion,garanty,warentey)values('$cn','$pn','$net','$col','$sr','$rm','$ro','$cm','$per','$sel','$pq','$bt','$ps','$beb','$we','$fn1','$fn2','$fn3','$des','$ss','$bv','$get','$wer')")or die ("QF");
	header("location:display_add_product.php");
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
									<h1 align="center">ADD PRODUCT</h1>
										<div class="toolbar">
										<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
      <table width="50%" border="1" align="center" class="table-hover table-bordered table-responsive">
        <tr>
          <td> Select Category </td>
          <td>:</td>
          <td><select name="select">	
		  
            <option value="Select Category">Select Category</option>
          <?php
		  $q=mysqli_query($cc,"select * from man_cat_tbl order by cat_name")or die ("QF1");
		  while($data=mysqli_fetch_array($q))
		  {
		  ?>
		  <option value="<?php echo $data['cat_name'];?>"><?php echo $data['cat_name'];?></option>
		  <?php
		  }
		  ?>
		  
		  </select>          </td>
        </tr>
        <tr>
          <td>Company Name </td>
          <td>:</td>
          <td><input name="cn" type="text" id="cn" autofocus placeholder="Enter Company Name" onKeyPress="return (event.charCode > 64 && 
	event.charCode < 91) || (event.charCode > 96 && event.charCode < 123 || event.charCode==32) "  /></td>
        </tr>
        <tr>
          <td>Product Name </td>
          <td>:</td>
          <td><input name="pn" type="text" id="pn" placeholder="Product Name"  onkeypress="return (event.charCode > 64 && 
	event.charCode < 91) || (event.charCode > 96 && event.charCode < 123 || event.charCode==32) " /></td>
        </tr>
        <tr>
          <td>Network</td>
          <td>:</td>
          <td><input name="net" type="radio" value="4g" />
            4G 
            <input name="net" type="radio" value="5g" />
            5G</td>
        </tr>
        <tr>
          <td>Color</td>
          <td>:</td>
          <td><input name="col" type="radio" value="black" />
            Black 
            <input name="col" type="radio" value="white" />
            White</td>
        </tr>
        <tr>
          <td>Seriese</td>
          <td>:</td>
          <td><input name="sr" type="text" id="sr"  placeholder="Seriese"/></td>
        </tr>
        <tr>
          <td>Ram</td>
          <td>:</td>
          <td><input name="rm" type="text" id="rm" placeholder="Ram" /></td>
        </tr>
        <tr>
          <td>Rom</td>
          <td>:</td>
          <td><input name="ro" type="text" id="ro" placeholder="Rom" /></td>
        </tr>
        <tr>
          <td>Camera</td>
          <td>:</td>
          <td><input name="cm" type="text" id="cm" placeholder="Camera" /></td>
        </tr>
        <tr>
          <td>Purchase_Price</td>
          <td>:</td>
          <td><input name="per" type="text" id="per" placeholder="Purchase Price" onKeyPress="return (event.charCode >= 48 && 
	event.charCode <= 57)" /></td>
        </tr>
        <tr>
          <td>Selling_Price</td>
          <td>:</td>
          <td><input name="sel" type="text" id="sel" placeholder="Selling Price" onKeyPress="return (event.charCode >= 48 && 
	event.charCode <= 57)" /></td>
        </tr>
        <tr>
          <td>P_Quentity</td>
          <td>:</td>
          <td><input name="pq" type="text" id="pq" placeholder="P Quentity" onKeyPress="return (event.charCode >= 48 && 
	event.charCode <= 57)" /></td>
        </tr>
        <tr>
          <td>Bettery</td>
          <td>:</td>
          <td><input name="bt" type="text" id="bt" placeholder="Bettery" /></td>
        </tr>
        <tr>
          <td>Processer</td>
          <td>:</td>
          <td><input name="ps" type="text" id="ps" placeholder="Processer" /></td>
        </tr>
        <tr>
          <td>Bettery Backup </td>
          <td>:</td>
          <td><input name="beb" type="text" id="beb" placeholder="Bettery Backup"/></td>
        </tr>
        <tr>
          <td>Weight</td>
          <td>:</td>
          <td><input name="we" type="text" id="we" placeholder="Weight" /></td>
        </tr>
        <tr>
          <td>Photo1</td>
          <td>:</td>
          <td><input name="ph1" type="file" id="ph1" /></td>
        </tr>
        <tr>
          <td>Photo2</td>
          <td>:</td>
          <td><input name="ph2" type="file" id="ph2" /></td>
        </tr>
        <tr>
          <td>Photo3</td>
          <td>:</td>
          <td><input name="ph3" type="file" id="ph3" /></td>
        </tr>
        <tr>
          <td>Description</td>
          <td>:</td>
          <td><textarea name="des" id="des" placeholder="Description"></textarea></td>
        </tr>
        <tr>
          <td>Screen Size </td>
          <td>:</td>
          <td><input name="ss" type="text" id="ss" placeholder="Screen Size" /></td>
        </tr>
        <tr>
          <td>Blootuth Virsion </td>
          <td>:</td>
          <td><input name="bv" type="text" id="bv" placeholder="Blootuth Virsion" /></td>
        </tr>
        <tr>
          <td>Garant</td>
          <td>:</td>
          <td><textarea name="get" id="get" placeholder="Garant"></textarea></td>
        </tr>
        <tr>
          <td>Warentey</td>
          <td>:</td>
          <td><textarea name="wer" id="wer" placeholder="Warentey"></textarea></td>
        </tr>
        <tr>
          <td><div align="right">
            <input type="reset" name="Reset" value="Reset" />
          </div></td>
          <td>&nbsp;</td>
          <td><input type="submit" name="Submit" value="Submit" onClick="return f1();" /></td>
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
	if(form1.cn.value=="")
	{
		alert("Enter Company Name");
		form1.cn.focus();
		return false;
	}
	else if(form1.pn.value=="")
	{
		alert("Enter Product Name");
		form1.pn.focus();
		return false;
	}
	else if(form1.sr.value=="")
	{
		alert("Enter Seriese Number");
		form1.sr.focus();
		return false;
	}
	else if(form1.rm.value=="")
	{
		alert("Enter Ram");
		form1.rm.focus();
		return false;
	}
	else if(form1.ro.value=="")
	{
		alert("Enter Rom");
		form1.ro.focus();
		return false;
	}
	else if(form1.cm.value=="")
	{
		alert("Enter Camera");
		form1.cm.focus();
		return false;
	}
	else if(form1.per.value=="")
	{
		alert("Enter Perchase Price");
		form1.per.focus();
		return false;
	}
	else if(form1.sel.value=="")
	{
		alert("Enter Seling Price");
		form1.sel.focus();
		return false;
	}
	else if(form1.pq.value=="")
	{
		alert("Enter Perchase Quentity");
		form1.pq.focus();
		return false;
	}
	else if(form1.bt.value=="")
	{
		alert("Enter Bettery");
		form1.bt.focus();
		return false;
	}
	else if(form1.ps.value=="")
	{
		alert("Enter Proceser");
		form1.ps.focus();
		return false;
	}
	else if(form1.beb.value=="")
	{
		alert("Enter Bettery Bakup");
		form1.beb.focus();
		return false;
	}
	else if(form1.we.value=="")
	{
		alert("Enter Weight");
		form1.we.focus();
		return false;
	}
	else if(form1.ph1.value=="")
	{
		alert("Select Photo 1");
		form1.ph1.focus();
		return false;
	}
	else if(form1.ph2.value=="")
	{
		alert("Select Photo 2");
		form1.ph2.focus();
		return false;
	}
	else if(form1.ph3.value=="")
	{
		alert("Select Photo 3");
		form1.ph3.focus();
		return false;
	}
	else if(form1.des.value=="")
	{
		alert("Enter Description");
		form1.des.focus();
		return false;
	}
	else if(form1.ss.value=="")
	{
		alert("Enter Screen Size");
		form1.ss.focus();
		return false;
	}
	else if(form1.bv.value=="")
	{
		alert("Enter blootuth virsion");
		form1.bv.focus();
		return false;
	}
	else if(form1.get.value=="")
	{
		alert("Enter garent");
		form1.get.focus();
		return false;
	}
	else if(form1.wer.value=="")
	{
		alert("Enter warentey");
		form1.wer.focus();
		return false;
	}
	
}
	
</script>