<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Login System</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="css/demo.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<script type="text/javascript" src="js/cufon-yui.js"></script>
<script type="text/javascript" src="js/arial.js"></script>
<script type="text/javascript" src="js/cuf_run.js"></script>
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
          <li><a href="vote.php">Vote</a><a href="blog.html"></a></li>
          <li></li>
        </ul>
      </div>
      <div class="clr"></div>
    </div>
  </div>
  <div class="clr"></div>
  <div class="header">
    <div class="logo">
      <h1><a href="#" class="style1">Computerization of Student Union Govt. Electoral System.... </a></h1>
      <p class="style27"><strong>(A case Study of Foundation Polytechnic , Ikot Ekpene)</strong></p>
    </div>
    <div class="clr"></div>
  </div>
  <div class="content">
    <table width="200" border="0" align="center">
      <tr>
        <td><div class="mainbar">
          <div class="article">
            <p>&nbsp;  <?php
include ('db_connection/database_connection_mysqli.php');
if (isset($_POST['formsubmitted'])) {
    // Initialize a session:
session_start();
    $error = array();//this aaray will store all error messages
  
     if (empty($_POST['txtregNo'])) {
        $error[] = 'Please Enter Your Registration No ';
    } else {
	$regNo = trim(mysql_escape_string($_POST['txtregNo']));
	
	 if (empty($_POST['txtvoterID'])) {
        $error[] = 'Please Enter Your Voter ID ';
    } else {
	$voterID = trim(mysql_escape_string($_POST['txtvoterID']));
	
    }    
    }
      if (empty($error))//if the array is empty , it means no error found
    { 
        $query_check_credentials = "SELECT * FROM voter WHERE (voterID ='$voterID' and regNo ='$regNo' )";
   
         $result_check_credentials = mysqli_query($dbc, $query_check_credentials);
        if(!$result_check_credentials){//If the QUery Failed 
            echo 'Query Failed ';
        }

        if (@mysqli_num_rows($result_check_credentials) == 1)//if Query is successfull 
        { // A match was made.
		session_regenerate_id();
          $admin = mysqli_fetch_array($result_check_credentials, MYSQLI_ASSOC);//Assign the result of this query to SESSION Global Variable
		 $_SESSION['SESS_regNo'] = $admin['regNo'];
		$_SESSION['SESS_voterID'] = $admin['voterID'];	
		$_SESSION['SESS_voterName'] = $admin['voterName'];
			session_write_close();
			
              header("Location: result.php");
               }else
        { 
          $msg_error= 'Either Your Voter ID or Registration Number is Incorrect';
        }

    }  else {
    
echo '<div class="errormsgbox"> <ol>';
        foreach ($error as $key => $values) {
            
            echo '	<li>'.$values.'</li>';
        }
        echo '</ol></div>';
  }
  
    if(isset($msg_error)){
        
        echo '<div class="warning">'.$msg_error.' </div>';
    }
    /// var_dump($error);
    mysqli_close($dbc);

} // End of the main Submit conditional.
?></p>
            <table width="486" border="0" align="center">
              <tr>
                <td width="480" height="331"><div id="div-regForm">
                    <div class="form-title">Login to View Result </div>
                    <table width="200" border="0" align="center">
                      <tr>
                        <td><form id="login_form" name="form1" method="post" action="">
                            <table width="370" border="0">
                              <tr>
                                <td width="90"><span class="style10">Reg No : </span></td>
                                <td width="200"><input name="txtregNo" type="text" id="txtregNo" value="" maxlength="20" /></td>
                              </tr>
                              <tr>
                                <td><span class="style10">Voter ID :</span></td>
                                <td><input name="txtvoterID" type="password" id="txtvoterID" value="" maxlength="20" /></td>
                              </tr>
                              <tr>
                                <td>&nbsp;</td>
                                <td><p align="center"><a href="voterReg.php" class="style11">Register Here </a></p>
                                  </td>
                              </tr>
                              <tr>
                                <td>&nbsp;</td>
                                <td><span class="buttondiv">
                                  <input name="formsubmitted" type="submit" id="submit" value="Login" style="margin-left:-10px; height:23px" />
                                </span></td>
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
    <div class="col c1">
      <h2><span>Image Gallery</span></h2>
      <a href="#"><img src="images/pic_1.jpg" width="58" height="58" alt="" /></a> <a href="#"><img src="images/pic_2.jpg" width="58" height="58" alt="" /></a> <a href="#"><img src="images/pic_3.jpg" width="58" height="58" alt="" /></a> <a href="#"><img src="images/pic_4.jpg" width="58" height="58" alt="" /></a> <a href="#"><img src="images/pic_5.jpg" width="58" height="58" alt="" /></a> <a href="#"><img src="images/pic_6.jpg" width="58" height="58" alt="" /></a> </div>
    <div class="clr"></div>
  </div>
</div>
<div class="footer">
  <div class="footer_resize"><span class="style29">&copy; 2018 Copyright. All Rights Reserved | Design by Anwanga-Obong Okon Inokon ,Reg No. - Akp/Asc/CSC/HND2016/0680  , Computer science dept, Akwa Ibom State Polytechnic , Ikot Osurua, Ikot Ekpene</span>
    <div class="clr"></div>
  </div></div>
<!-- END PAGE SOURCE -->
<div align=center></div>
</body>
</html>