<?php
session_start();
error_reporting(0);
include 'header.php';
include('connect.php');



$sql = "select * from voter where regNo='".$_SESSION['VregNo']."'"; 
$result = $conn->query($sql);
$row = mysqli_fetch_array($result);
$photo=$row['photo'];


if(isset($_POST['btnupload'])){
$image= addslashes(file_get_contents($_FILES['image']['tmp_name']));
	$image_name= addslashes($_FILES['image']['name']);
	$image_size= getimagesize($_FILES['image']['tmp_name']);
	move_uploaded_file($_FILES["image"]["tmp_name"],"uploads/" . $_FILES["image"]["name"]);			
			$location="uploads/" . $_FILES["image"]["name"];

 $sql = " update voter set photo='$location' where regNo='".$_SESSION['VregNo']."'";
   if (mysqli_query($conn, $sql)) {

    ?>
									
<script>
alert('Photo has been Uploaded successfully ');
window.location = "voter_pic.php";

</script>

	<?php	
}
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo $_SESSION['SESS_candName'] ;?> </title>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="css/demo.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<script type="text/javascript" src="js/cufon-yui.js"></script>
<script type="text/javascript" src="js/arial.js"></script>
<script type="text/javascript" src="js/cuf_run.js"></script>
<script type="text/javascript" src="js/jquery-1.8.2.js"></script>
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
.style12 {	font-size: 24px;
	font-weight: bold;
}
.ed {border-style:solid;
border-width:thin;
border-color:#00CCFF;
padding:5px;
margin-bottom: 4px;
}
.style23 {color: #0000FF; font-weight: bold; font-size: 14px; }
.main .content table tr td .mainbar .article table tr td form table tr td table tr td {
	color: #400040;
}
.main .content table tr td .mainbar .article table tr td form table tr td table tr td {
	color: #00F;
}
.style27 {color: #FF0000}
.style30 {font-size: 18px}
.style31 {color: #000000}
.style32 {font-size: 18px; color: #000000; }
.style33 {
	font-size: 12px;
	color: #000000;
	font-weight: bold;
}
-->
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
          <li><a href="candReg.php">Candidate Registration</a><a href="Business_Name_availability.php"></a></li>
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
            <h2>&nbsp;</h2>
            <table width="399" height="137" border="0" align="center">
              <tr>
                <td width="393"><form  method="post"  enctype="multipart/form-data">
                  <table width="505" border="0" align="center">
                    <tr>
                      <th width="499" scope="col"><div align="center">
                          <table width="417" border="0" align="center">
                            <tr>
                              <td height="53"><div align="center"><span class="style12"> VOTER'S PHOTO  </span>&nbsp;</div></td>
                            </tr>
                          </table>
                      </div></th>
                    </tr>
                    <tr>
                      <td height="236"><table width="212" border="0" align="center">
                        <tr>
                          <td width="206" height="176"><div class="propic">
                              <div align="left"><img src="<?php echo $row['photo']?>"  width="159" height="145"/>                              </div>
                          </div></td>
                        </tr>
                        <tr>
                          <td><p align="center">&nbsp;</p>
                            <p align="center"><strong><span class="style30"> <span class="style31">NAME</span>:</span> <?php echo " <strong><font face='Verdana' size='3' color=blue>".$_SESSION['votername']." </font></strong>";  ?></strong></p>
                            <p align="center">&nbsp;                         </p></td>
                        </tr>
                        <tr>
                          <td><p align="center"><strong><span class="style32">REG NO.</span> :<span class="style23"><span class="propic"><?php echo " <strong><font face='Verdana' size='3' color=blue>".$_SESSION['VregNo']." </font></strong>";  ?></span></span></strong></p>
                            <p align="center">&nbsp;</p>
                            <p align="center"><strong><span class="style32">ACCESS CODE.</span>: <?php echo " <strong><font face='Verdana' size='3' color=blue>".$_SESSION['accesscode']." </font></strong>";  ?></strong></p>
                            <p align="center">&nbsp;</p>                            <p align="center">&nbsp;</p>                        </td>
                        </tr>
                        <tr>
                          <td><input name="image" type="file" id="image" /></td>
                        </tr>
                        <tr>
                          <td><label>
                            <a href="index.php" class="style33">Finish</a>
                            <input name="btnupload" type="submit" class="ed" id="upload" value="Upload image" />
                          </label></td>
                        </tr>
                      </table></td>
                    </tr>
                  </table>
                                </form>
                </td>
              </tr>
            </table>
            <p>
   
            </p>
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
    <p class="lf"><span class="mainbar style3"><?php include('footer.php'); ?></span><span class="style2">. </span></p>
    <div class="clr"></div>
  </div>
</div>
<!-- END PAGE SOURCE -->
<div align=center></div>
</body>
</html>