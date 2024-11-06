<?php
session_start();
require_once("connect.php");
$a=$_SESSION['m_a'];
$qab=mysqli_query($cc,"select name,a_photo from  admin_tbl where aid=$a")or die ("QF");
$dataab=mysqli_fetch_array($qab);
?>
<div align="right">Last Login Date: 
<?php
require_once("connect.php");
$a1=$_SESSION['m_a'];
$q1=mysqli_query($cc,"select last_login_date from admin_tbl where aid='$a1'")or die ("QF1");
$data1=mysqli_fetch_array($q1);
echo $data1[0];
?>
</div>
<div class="top-nav clearfix">
    <!--search & user info start-->
    <ul class="nav pull-right top-menu">
        <li>
			<form class="input" name="form2" id="form2" method="post" action="searce_invoice.php"> 
            </form>
        </li>
        <!-- user login dropdown start-->
        <li class="dropdown">

            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <img src="admin_photo/<?php echo $dataab['a_photo'];?>" width="40" height="30" /><?php echo $dataab['name'];?><b class="caret"></b>            </a>
            <ul class="dropdown-menu extended logout">
                <li><a href="profile.php"><i class=" fa fa-suitcase"></i>Profile</a></li>
                <li><a href="c_password.php"><i class="fa fa-cog"></i> Change Password</a></li>
                <li><a href="logout.php"><i class="fa fa-key"></i> Log Out</a></li>
            </ul>
      </li>
        <!-- user login dropdown end -->
    </ul>
    <!--search & user info end-->
</div>

