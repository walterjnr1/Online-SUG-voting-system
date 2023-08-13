<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Choose User</title>
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
.style30 {color: #FF0000;
	font-weight: bold;
	font-size: 22px;
}
.style30 {color: #FF0000;
	font-weight: bold;
	font-size: 18px;
}
.style31 {color: #000000}
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
    <table width="200" border="0" align="center">
      <tr>
        <td><div class="mainbar">
          <div class="article">
            <p>&nbsp;  </p>
            <table width="486" border="0" align="center">
              <tr>
                <td width="480" height="331"><div id="div-regForm">
                    <div class="form-title">Who Are you ? </div>
                    <table width="376" border="0" align="center">
                      <tr>
                        <td width="370"><p>&nbsp;</p>
                        <form id="login_form" name="form1" method="post" action="">
                            <table width="370" border="0">
                              <tr>
                                <td width="152"><div align="center" class="style31"><span class="style10 style31"><a href="login_vote.php">Voter</a> </span></div></td>
                                <td width="138"><span class="style31">
                                  <label>
                                  </span>
                                  <div align="center" class="style31"><a href="login_vote_2.php"><span class="style10">Candidate</span></a>
                                    </label>
                                  </div></td>
                              </tr>
                              <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                              </tr>
                              <tr>
                                <td>&nbsp;</td>
                                <td><p align="center"><a href="voterReg.php" class="style11"></a></p>                                  </td>
                              </tr>
                              <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                              </tr>
                            </table>
                        </form></td>
                      </tr>
                    </table>
                </div>
                    <br />
                    <br />
                  &nbsp;</td>
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
  <div class="footer_resize"><?php include('footer.php'); ?></div>
</div>
<!-- END PAGE SOURCE -->
<div align=center></div>
</body>
</html>