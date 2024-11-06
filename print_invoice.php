<?php
require_once("connect.php");
extract($_POST);
$i=$_REQUEST['i'];
$qa=mysqli_query($cc,"select * from  invoice_tbl where bid=$i")or die ("QF");
$data=mysqli_fetch_array($qa);

?>
<!DOCTYPE html>
<head>
<title>Title Here</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<script language="javascript" type="text/javascript">
function print_page()
{
	var DocumentContainer = document.getElementById("reciept_detail");
	var WindowObject = window.open('', "PrintWindow", "width=1024,height=650,top=50,left=50,toolbars=no,scrollbars=yes,status=no,resizable=yes");
	
	WindowObject.document.writeln(DocumentContainer.innerHTML);
	WindowObject.document.close();
	WindowObject.focus();
	WindowObject.print();
	WindowObject.close();
}
</script>
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
								  <form name="form1" method="post" action="">
								     
									 <div id="reciept_detail" class="reciept_detail" style="height:500px">
								    <table width="100%" border="1" class="table-hover table-bordered table-responsive">
                                      <tr  bgcolor="#CCCCCC">
                                        <td colspan="3"><div align="center"><img src="mphoto/1fc344d9f132591bff030d8c6f54ffa2.jpg" width="263" height="68"></div></td>
                                      </tr>
                                      <tr  bgcolor="#db8071">
                                        <td colspan="3"><div align="center">
                                            <p>ABC SHOPE </p>
                                          <p>Address:</p>
                                        </div></td>
                                      </tr>
                                      <tr  bgcolor="#CCCCCC">
                                        <td>Customer Name: <?php echo $data['customer_name'];?></td>
                                        <td>Mobile No: <?php echo $data['mobile'];?> </td>
                                        <td>Bill Date: <?php echo $data['bill_date'];?> </td>
                                      </tr>
                                      <tr  bgcolor="#CCCCCC">
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>Bill No: <?php echo $data['bill_no'];?> </td>
                                      </tr>
                                      <tr bgcolor="#f0bcb4">
                                        <td colspan="3"><table width="50%" height="250" border="1" align="center">
                                            <tr>
                                              <td width="40%">Product</td>
                                              <td width="5%">:</td>
                                              <td width="55%"><?php echo $data['product_name'];?></td>
                                            </tr>
                                            <tr>
                                              <td>Price</td>
                                              <td>:</td>
                                              <td><?php echo $data['selling_price'];?></td>
                                            </tr>
                                            <tr>
                                              <td>Discount</td>
                                              <td>:</td>
                                              <td><?php echo $data['discount'];?></td>
                                            </tr>
                                            <tr>
                                              <td>SGST</td>
                                              <td>:</td>
                                              <td><?php echo $data['sgst'];?></td>
                                            </tr>
                                            <tr>
                                              <td>CGST</td>
                                              <td>:</td>
                                              <td><?php echo $data['cgst'];?></td>
                                            </tr>
                                            <tr>
                                              <td>Total Amount </td>
                                              <td>:</td>
                                              <td><?php echo $data['total_amount'];?></td>
                                            </tr>
                                            <tr>
                                              <td>Paid Amount </td>
                                              <td>:</td>
                                              <td><?php echo $data['paid_amount'];?></td>
                                            </tr>
                                            <tr>
                                              <td>Remainig Amount </td>
                                              <td>: </td>
                                              <td><?php echo $data['remaining_amount'];?></td>
                                            </tr>
                                          </table>
								    </div>
                                  </form>
                                        </td>
                                      </tr>
                                      <tr  bgcolor="#CCCCCC">
                                        <td colspan="3"><?php
										
										 $num=$data['paid_amount'];
										 
										 
										 
echo "<p align='left' style='color:black'>".ucwords(numberTowords("$num"))." Only </p>"; 


function numberTowords($num)
{ 
$ones = array( 
1 => "one", 
2 => "two", 
3 => "three", 
4 => "four", 
5 => "five", 
6 => "six", 
7 => "seven", 
8 => "eight", 
9 => "nine", 
10 => "ten", 
11 => "eleven", 
12 => "twelve", 
13 => "thirteen", 
14 => "fourteen", 
15 => "fifteen", 
16 => "sixteen", 
17 => "seventeen", 
18 => "eighteen", 
19 => "nineteen" 
); 
$tens = array( 
2 => "twenty", 
3 => "thirty", 
4 => "forty", 
5 => "fifty", 
6 => "sixty", 
7 => "seventy", 
8 => "eighty", 
9 => "ninety" 
); 
$hundreds = array( 
"hundred", 
"thousand", 
"million", 
"billion", 
"trillion", 
"quadrillion" 
); 

//limit t quadrillion 
$num = number_format($num,2,".",","); 
$num_arr = explode(".",$num); 
$wholenum = $num_arr[0]; 
$decnum = $num_arr[1]; 
$whole_arr = array_reverse(explode(",",$wholenum)); 
krsort($whole_arr); 
$rettxt = ""; 
foreach($whole_arr as $key => $i){ 
if($i < 20){ 
$rettxt .= $ones[$i]; 
}elseif($i < 100){ 
$rettxt .= $tens[substr($i,0,1)]; 
$rettxt .= " ".$ones[substr($i,1,1)]; 
}else{ 
$rettxt .= $ones[substr($i,0,1)]." ".$hundreds[0]; 
$rettxt .= " ".$tens[substr($i,1,1)]; 
$rettxt .= " ".$ones[substr($i,2,1)]; 
} 
if($key > 0){ 
$rettxt .= " ".$hundreds[$key]." "; 
} 
} 
if($decnum > 0){ 
$rettxt .= " and "; 
if($decnum < 20){ 
$rettxt .= $ones[$decnum]; 
}elseif($decnum < 100){ 
$rettxt .= $tens[substr($decnum,0,1)]; 
$rettxt .= " ".$ones[substr($decnum,1,1)]; 
} 
} 
return $rettxt; 
} 



										 
?>


</td>
                                      </tr>
                                      <tr  bgcolor="#CCCCCC">
                                        <td colspan="3">Thanks for Shoping </td>
                                      </tr>
                                    
                                    </table>
                                      <div style="width:50px; cursor:pointer;" align="center" class="button" onClick="return print_page();"> 
                                        <div align="center"><span class="button" style="width:50px; cursor:pointer;"><span class="button"  style="width:50px;  cursor:pointer;"><img src="print1.png"  width="50" height="40"></span></span></div>
                                      </div>                              
                                      </form>
								  <h1 align="center">	</h1>
										<div class="toolbar">										</div>
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
