<?php
session_start();
error_reporting(0);
include('connect.php');

if(isset($_POST['btnlogin']))
{


//Get Date
date_default_timezone_set('Africa/Lagos');
$current_date = date('Y-m-d h:i:s');


$candID = $_POST['txtcandID'];
$regno = $_POST['txtregNo'];

 $sql = "SELECT * FROM candidate WHERE regNo='".$regno."' and candID = '".$candID."'";
  $result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
// output data of each row
($row = mysqli_fetch_assoc($result));
$_SESSION["CregNo"] = $row['regNo'];
$_SESSION["candID"] = $row['candID'];


header("Location: vote_2.php"); 
}else { 

$msg_error = "Wrong Reg No or Candidate ID";
}
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Candidates' Login System</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="css/demo.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<script type="text/javascript" src="js/cufon-yui.js"></script>
<script type="text/javascript" src="js/arial.js"></script>
<script type="text/javascript" src="js/cuf_run.js"></script>
<link rel="icon" type="image/png" sizes="16x16" href="images/logo.jpg">
<style type="text/css">
<!--
.style1 {
	color: #FF0000;
	font-size: 24px;
}
.style2 {	color: #FF0000;
	font-family: "Times New Roman", Times, serif;
}
.style3 {
	color: #FFFFFF;
	font-weight: bold;
}
.buttondiv {margin-top: 10px;
}
.style10 {font-size: 14px; font-weight: bold; }
.style11 {color: #0000FF}
-->
</style>
<style type="text/css">
/* Box Style */

 .success, .warning, .errormsgbox, .validation {
	border: 1px solid;
	margin: 0 auto;
	padding:10px 5px 10px 50px;
	background-repeat: no-repeat;
	background-position: 10px center;
     font-weight:bold;
     width:450px;
     
}

.success {
   
	color: #4F8A10;
	background-color: #DFF2BF;
	background-image:url('images/success.png');
}
.warning {

	color: #9F6000;
	background-color: #FEEFB3;
	background-image: url('images/warning.png');
}
.errormsgbox {
 
	color: #D8000C;
	background-color: #FFBABA;
	background-image: url('images/error.png');
	
}
.validation {
 
	color: #D63301;
	background-color: #FFCCBA;
	background-image: url('images/error.png');
}



.elements {	padding:10px;
}
    .style27 {color: #FF0000}
.style29 {color: #FFFFFF}
.style30 {color: #FF0000;
	font-weight: bold;
	font-size: 22px;
}
.style30 {color: #FF0000;
	font-weight: bold;
	font-size: 18px;
}
</style>
</head>
<body>
<!-- START PAGE SOURCE -->
<div class="main">
  <div class="header_block">
    <div class="header_resize">
      <div class="search">
        <form method="get" id="search" action="#">
          <span>
          <input type="text" value="Search..." name="s" id="s" />
          <input name="searchsubmit" type="image" src="images/search.gif" value="Go" id="searchsubmit" class="btn"  />
          </span>
        </form>
        <div class="clr"></div>
      </div>
      <div class="menu_nav">
        <ul>
          <li class="active"><a href="index.php">Home</a></li>
          <li><a href="voterReg.php">Voter Registration </a></li>
          <li><a href="candReg.php">Candidate Registration</a></li>
          <li><a href="choose_login.php">Vote</a><a href="blog.html"></a></li>
          <li><a href="result.php">View Votes </a></li>
        </ul>
      </div>
      <div class="clr"></div>
    </div>
  </div>
  <div class="clr"></div>
  <div class="header">
    <div class="logo">
      <p class="style30">SECURED ONLINE VOTING  SYSTEM FOR SUG ELECTION USING REG NO. &amp; ACCESS CODE</p>
      <h1 class="style30">(A case Study of Foundation Polytechnic , Ikot Ekpene)</h1>
      <h1></h1>
      <h1>&nbsp;</h1>
    </div>
    <div class="clr"></div>
  </div>
  <div class="content">
    <table width="667" border="0" align="center">
      <tr>
        <td><div class="mainbar">
          <div class="article">
            <p align="center">&nbsp; </p>
            <table width="590" height="420" border="0" align="center">
              <tr>
                <td width="584" height="156">
				<?php if ($msg <> "") { ?>
  <style type="text/css">
<!--
.style1 {
	font-size: 12px;
	color: #FF0000;
}
-->
  </style>
  <div class="alert alert-dismissable alert-<?php echo $msgType; ?>">
    <button data-dismiss="alert" class="close" type="button">x</button>
    <p><?php echo $msg; ?></p>
  </div>
<?php } ?><?php echo "<p> <font color=red font face='arial' size='3pt'>$msg_error</font> </p>"; ?><?php echo "<p> <font color=green font face='arial' size='3pt'>$msg_success</font> </p>"; ?></p></td>
              </tr>
              <tr>
                <td height="81"><div id="div-regForm">
                  <div class="form-title">Login to Vote</div>
                  <table width="200" border="0" align="center">
                    <tr>
                      <td><form id="login_form" name="form1" method="post" action="">
                          <table width="333" border="0">
                            <tr>
                              <td width="90"><span class="style10">Reg No   : </span></td>
                              <td width="233"><input name="txtregNo" type="text" id="txtregNo" value=""></td>
                            </tr>
                            <tr>
                              <td><span class="style10">Cand ID:</span></td>
                              <td><input name="txtcandID" type="text" id="txtcandID" value=""></td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                              <td><p align="center"><a href="CandReg.php" class="style11">Register Here </a></p></td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                              <td><span class="buttondiv">
                                <input name="btnlogin" type="submit" id="submit" value="Login" style="margin-left:-10px; height:23px" />
                              </span></td>
                            </tr>
                          </table>
                      </form></td>
                    </tr>
                  </table>
                </div></td>
              </tr>
            </table>
            <h2>&nbsp;</h2>
            </div>
          </div></td>
      </tr>
    </table>
    <div class="clr"></div>
  </div>
  <div class="fbg">
    <div class="clr"></div>
  </div>
</div>
<div class="footer">
  <div class="footer_resize">
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
  <?php include('footer.php'); ?></div>
</div>
<!-- END PAGE SOURCE -->
<div align=center></div>
</body>
</html>