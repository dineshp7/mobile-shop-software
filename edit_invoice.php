<?php
session_start();
if(isset($_SESSION['m_a'])=="")
{
	header("location:index.php?msg4=stop");
	exit(0);
}
require_once("connect.php");
$u=$_REQUEST['edit'];
$q=mysqli_query($cc,"select * from invoice_tbl where bid='$u'")or die ("QF1");
$data=mysqli_fetch_array($q);
if(isset($_REQUEST['Submit2']))
{
	extract($_POST);
	mysqli_query($cc,"update invoice_tbl set product_name='$pn',selling_price='$pr',s_quantity='$sqty',sub_total='$subtot',discount='$dis',cgst='$cgst',sgst='$sgst',total_amount='$tot',paid_amount='$paid',remaining_amount='$rem',paid_method='$meth',customer_name='$cn',address='$add',mobile='$mob',bill_date='$bdt' where bid='$u'")or die ("QF2");
	header("location:view_invoice.php");
}
?>
<!DOCTYPE html><head>
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

<link rel="stylesheet" type="text/css" href="tcal.css" />
	<script type="text/javascript" src="tcal.js"></script> 
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
										<form id="form1" name="form1" method="post" action="">
      <table width="50%" border="1" align="center" class="table-hover table-bordered table-responsive">
        <tr>
          <td>Product Name </td>
          <td>:</td>
          <td><label>
            <input name="pn" type="text" id="pn"  value="<?php echo $data['product_name'];?>" autofocus placeholder="Product Name" onKeyPress="return (event.charCode > 64 && 
	event.charCode < 91) || (event.charCode > 96 && event.charCode < 123 || event.charCode==32) "  />
          </label></td>
        </tr>
        <tr>
          <td>Price</td>
          <td>:</td>
          <td><input name="pr" type="text" id="pr" placeholder="Price" value="<?php echo $data['selling_price'];?>" onKeyPress="return (event.charCode >= 48 && 
	event.charCode <= 57)" /></td>
        </tr>
        <tr>
          <td>Saling QTY </td>
          <td>:</td>
          <td><input name="sqty" type="text" id="sqty"  placeholder="Saling QTY" onBlur="return f2();" value="<?php echo $data['s_quantity'];?>" onKeyPress="return (event.charCode >= 48 && 
	event.charCode <= 57)"  /></td>
        </tr>
        <tr>
          <td>Sub Total </td>
          <td>:</td>
          <td><input name="subtot" type="text" id="subtot" placeholder="Sub Total	" readonly="" value="<?php echo $data['sub_total'];?>" onKeyPress="return (event.charCode >= 48 && 
	event.charCode <= 57)"  /></td>
        </tr>
        <tr>
          <td>Discount</td>
          <td>:</td>
          <td><input name="dis" type="text" id="dis" placeholder="Discount" value="<?php echo $data['discount'];?>" onKeyPress="return (event.charCode >= 48 && 
	event.charCode <= 57)" /></td>
        </tr> 
        <tr>
          <td>SGST </td>
          <td>:</td>
          <td><input name="sgst" type="text" id="sgst" size="15" placeholder="Sale Gst" value="<?php echo $data['cgst'];?>" onKeyPress="return (event.charCode >= 48 && 
	event.charCode <= 57)" />
            %</td>
        </tr>
        <tr>
          <td>CGST </td>
          <td>:</td>
          <td><input name="cgst" type="text" id="cgst" onBlur="return f3();" size="15" placeholder="Customer Gst" value="<?php echo $data['sgst'];?>" onKeyPress="return (event.charCode >= 48 && 
	event.charCode <= 57)"  />
            %</td>
        </tr>
        <tr>
          <td>Total Amount </td>
          <td>:</td>
          <td><label>
            <input name="tot" type="text" id="tot" placeholder="Total Amount"  value="<?php echo $data['total_amount'];?>" onKeyPress="return (event.charCode >= 48 && 
	event.charCode <= 57)" />
          </label></td>
        </tr>
        <tr>
          <td>Paid Amount </td>
          <td>:</td>
          <td><input name="paid" type="text" id="paid" placeholder="Paid Amount" onBlur="return f4();" value="<?php echo $data['paid_amount'];?>" onKeyPress="return (event.charCode >= 48 && 
	event.charCode <= 57)" /></td>
        </tr>
        <tr>
          <td>Remaining Amount </td>
          <td>:</td>
          <td><input name="rem" type="text" id="rem"  placeholder="Remaining Amount" value="<?php echo $data['remaining_amount'];?>" onKeyPress="return (event.charCode >= 48 && 
	event.charCode <= 57)" /></td>
        </tr>
        <tr>
          <td>Paid Method </td>
          <td>:</td>
          <td><select name="meth" id="meth">
              
              <option value="GPAY" <?php if($data['paid_method']=="GPAY"){?> selected="selected" <?php } ?>>GPAY</option>
              <option value="PAYTM" <?php if($data['paid_method']=="PAYTM"){?> selected="selected" <?php }?>>PAYTM</option>
              <option value="PHONEPAY" <?php if($data['paid_method']=="PHONEPAY"){?> selected="selected" <?php } ?>>PHONEPAY</option>
              <option value="CASE" <?php if($data['CASE']){?> selected="selected" <?php } ?>>CASE</option>
            </select>          </td>
        </tr>
        <tr>
          <td>Customer Name </td>
          <td>:</td>
          <td><input name="cn" type="text" id="cn" placeholder="Customer Name"  value="<?php echo $data['customer_name'];?>" onKeyPress="return (event.charCode > 64 && 
	event.charCode < 91) || (event.charCode > 96 && event.charCode < 123 || event.charCode==32) " /></td>
        </tr>
        <tr>
          <td>Address</td>
          <td>:</td>
          <td><textarea name="add" id="add" placeholder="Address"> <?php echo $data['address'];?></textarea></td>
        </tr>
        <tr>
          <td>Mobile</td>
          <td>:</td>
          <td><input name="mob" type="text" id="mob" placeholder="mobile"  value="<?php echo $data['mobile'];?>" onKeyPress="return (event.charCode >= 48 && 
	event.charCode <= 57)" /></td>
        </tr>
        <tr>
          <td>Bill Date </td>
          <td>:</td>
          <td><input type="text" name="bdt" class="tcal"  value="<?php echo $data['bill_date'];?>" onKeyPress="return (event.charCode >= 48 && 
	event.charCode <= 57)"  /></td>
        </tr>

        <tr>
          <td><label>
              <div align="right">
                <input type="reset" name="Reset" value="Reset" />
              </div>
            </div>
              </label></td>
          <td>&nbsp;</td>
          <td><label>
            <input type="submit" name="Submit2" value="Update" onClick="return f1();" />
          </label></td>
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
	
	if(form1.sqty.value=="")
	{
		alert("Enter sale qty");
		form1.sqty.focus();
		return false;
	}
	else if(form1.pr.value=="")
	{
		alert("Enter Price");
		form1.pr.focus();
		return false;
	}
	else if(form1.dis.value=="")
	{
		alert("Enter Discription");
		form1.dis.focus();
		return false;
	}
	else if(form1.pn.value=="")
	{
		alert("Enter Product Name");
		form1.pn.focus();
		return false;
	}
	else if(form1.pr.value=="")
	{
		alert("Enter Price");
		form1.pr.focus();
		return false;
	}
}
function f2()
{
	var p=Number(form1.pr.value);
	var q=Number(form1.sqty.value);
	var s=(p*q);
	form1.subtot.value=s;
}
function f3()
{
	var s=Number(form1.subtot.value);
	var sg=Number(form1.sgst.value);
	var cg=Number(form1.cgst.value);
	var d=Number(form1.dis.value);
	
	var tmp=(s-d);
	var s_rs=(tmp*sg)/100;
	var c_rs=(tmp*cg)/100;
	
	var mt=(tmp+s_rs+c_rs);
	form1.tot.value=mt;
}
function f4()
{
	var t=Number(form1.tot.value);
	var p=Number(form1.paid.value);
	
	var r=(t-p);
	form1.rem.value=r;
}
		
</script>
<?php if(isset($_REQUEST['msg'])=="nostock"){?>
<script>
alert("Stock Is not Availabe");
</script>
<?php } ?>