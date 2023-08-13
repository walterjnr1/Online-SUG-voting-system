<?php
session_start();
error_reporting(0);
include('connect.php');

     
$regNo = $_SESSION["VregNo"];
date_default_timezone_set('Africa/Lagos');
$current_date = date('Y-m-d ');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>View Presidential result</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link href="style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="css/topics.css" type="text/css" media="screen" charset="utf-8">
<link href="css/demo.css" rel="stylesheet" type="text/css" />
<link rel="icon" type="image/png" sizes="16x16" href="images/logo.jpg">

<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<script type="text/javascript" src="js/cufon-yui.js"></script>
<script type="text/javascript" src="js/arial.js"></script>
<script type="text/javascript" src="js/cuf_run.js"></script>
<script>
function myFunction() {
    window.print();
}
</script>
<style type="text/css">
<!--
.style2 {	color: #FF0000;
	font-family: "Times New Roman", Times, serif;
}
.style3 {
	color: #FFFFFF;
	font-weight: bold;
}
.buttondiv {margin-top: 10px;
}
.style32 {
	font-size: 16px;
	color: #FFFFFF;
}
.style29 {color: #FFFFFF}
.style34 {color: #FF0000;
	font-weight: bold;
	font-size: 22px;
}
.style35 {color: #FF0000;
	font-weight: bold;
	font-size: 18px;
}
.style36 {color: #0000FF; font-weight: bold; font-size: 24px; }
.style25 {font-size: 14; font-weight: bold; color: #000099; }
.style37 {
	font-size: 18px;
	font-weight: bold;
	color: #000000;
}
.style38 {font-size: 16px}
-->
</style>
</head>
<body>
<!-- START PAGE SOURCE -->
<div class="main">
  <div class="header_block">
    <div class="header_resize">
      <p align="right" class="style3"><a href="logout.php" class="style32"></a></p>
     <div class="menu_nav">
        <ul>
          <li class="active"><a href="index.php">Home</a></li>
          <li><a href="voterReg.php">Voter Registration </a></li>
          <li><a href="candReg.php">Candidate Registration</a></li>
          <li><a href="vote.php">Vote</a><a href="blog.html"></a></li>
          <li><a href="logout.php">Logout</a></li>
        </ul>
      </div>
      <div class="clr"></div>
    </div>
  </div>
  <div class="clr"></div>
  <div class="header">
    <div class="logo">
      <p class="style34">SECURED ONLINE VOTING  SYSTEM FOR SUG ELECTION USING REG NO. &amp; ACCESS CODE</p>
      <h1 class="style35">(A case Study of Foundation Polytechnic , Ikot Ekpene)</h1>
      <h1></h1>
      <h1>&nbsp;</h1>
    </div>
    <div class="clr"></div>
  </div>
  <div class="content">
    <div class="clr">
      <p align="center" class="style37">PRESIDENTIAL ELECTION RESULT </p>
      <table width="85%" align="center" class="table table-bordered table-striped" id="resultTable">
        <thead>
          <tr>
            <th width="3%" class="style36"><div align="center" class="style25">#</div></th>
            <th width="13%" class="style36"><div align="center" class="style25">Candidate ID</div></th>
            <th width="7%" class="style36"><div align="center" class="style25">Candidate Name</div></th>
            <th width="16%" class="style36"><div align="center" class="style25">VOTES</div></th>
          </tr>
        </thead>
        <tbody>
          <?php 
                                          $sql = "SELECT * FROM candidate order by candName ASC";
                                           $result = $conn->query($sql);
										$cnt=1;
                                           while($row = $result->fetch_assoc()) { 
										   ?>
          <tr class="gradeX">
            <td height="47"><div align="center" class="style38">
              <div align="center"><?php echo $cnt; ?></div>
            </div></td>
            <td><div align="center" class="style38">
              <div align="center"><?php echo $row['candID']; ?></div>
            </div></td>
            <td><div align="center" class="style38">
              <div align="center"><?php echo $row['candName']; ?></div>
            </div></td>
            <td><div align="center">
              <div align="center"><span class="style38"><?php echo $row['count']; ?></span></div></td>
          </tr>
          <?php $cnt=$cnt+1;} ?>
        </tbody>
        <tfoot>
        </tfoot>
      </table>
      <p>&nbsp;</p>
      <p align="center">&nbsp;</p>
      <form id="form1" name="form1" method="post" action="">
        <label>
          <div align="center">
            <input name="btnprint" type="submit" id="btnprint" value="Print Result Sheet" onclick="myFunction()" />
        </div>
        </label>
      </form>
    </div>
  </div>
  <div class="fbg">
    <div class="clr">cc</div>
  </div>
</div>
<div class="footer">
  <div class="footer_resize">
    <p class="lf"><span class="style29">
      <?php include('footer.php'); ?>
    </span><span class="style2">. </span></p>
    <div class="clr"></div>
    <p>&nbsp;</p>
  </div>
</div>
<!-- END PAGE SOURCE -->
<div align=center></div>
</body>
</html>