<?php
session_start();
error_reporting(0);
include('connect.php');

if(strlen($_SESSION['VregNo'])=="")
    {   
    header("Location: choose_login.php"); 
    }
    else{
	}
      
$regNo = $_SESSION["VregNo"];


date_default_timezone_set('Africa/Lagos');
$current_date = date('Y-m-d ');

				
$sql = "select * from voter where regNo='$regNo'"; 
$result = $conn->query($sql);
$rowaccess = mysqli_fetch_array($result);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>VOTERS' VOTING PLATFORM</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="css/default.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="css/topics.css" type="text/css" media="screen" charset="utf-8">
<link rel="icon" type="image/png" sizes="16x16" href="images/logo.jpg">
 <script type="text/javascript">
		function confirmvote(candName){
if(confirm("ARE YOU SURE YOU WISH TO VOTE  " + " " + candName+ " " + " ?"))
{
return  true;
}
else {return false;
}
	 
}

</script>
<style type="text/css">
<!--
.style2 {color: #0000FF; font-weight: bold; font-size: 24px; }
.style3 {color: #FF0000; font-weight: bold; font-size: 24px; }
.style19 {font-size: 10px; color: #FF0000;}
.style25 {font-size: 14; font-weight: bold; color: #000099; }
-->
</style>
</head>
<body>
<div id="menu">
	<ul>
		<li> <a href="index.php"> |  Home  |</a></li>
				<li>
		  <a href="result.php">|  Result  |</a></li>
	
		<li>
		  <a href="logout.php"> |  Logout  |</a></li>
	</ul>
</div>
<div id="content">
	<div id="left">
    <p style="text-align:center; color:#FF0000;"><strong><marquee  behavior="scroll">
    <img src="images/logo.jpg" alt="" width="119" height="125" /> THIS E-VOTING SYSTEM IS FOR ELEGIBLE STUDENTS OF Foundation Polytechnic, Ikot Ekpene..
    </marquee></strong></p>
</div>
  <th height="41" colspan="2" scope="col"><h1><center>
   </center>
   
   </h1></th>
</div>
</div>
<div id="footer">
  <p class="style2"> PRESIDENTIAL ELECTION PLATFORM</p>
  <p class="style3">VOTER'S NAME : - <?php echo " <strong><font face='Verdana' size='5' color=red>".$rowaccess['voterName']." </font></strong>";  ?></p>
  <p class="style2">ACCESS CODE  : - <?php echo " <strong><font face='Verdana' size='5' color=red>".$rowaccess['accesscode']." </font></strong>";  ?>\REG NO. : - <?php echo " <strong><font face='Verdana' size='5' color=red>".$rowaccess['regNo']." </font></strong>";  ?></p>
  <p class="style2"><img src="<?php echo $rowaccess['photo'];?>" alt="" width="156" height="180" border="3" />&nbsp;</p>
  <p class="style2">  </p>
  <p class="style2">
  
  <table width="85%" align="center" class="table table-bordered table-striped" id="resultTable">
                   <thead>
                     <tr> <th width="3%" class="style2"><div align="center" class="style25">#</div></th>
                       <th width="13%" class="style2"><div align="center" class="style25">Candidate ID</div></th>
                       <th width="7%" class="style2"><div align="center" class="style25">Candidate Name</div></th>
				              <th width="8%" class="style2"><div align="center" class="style25">Photo</div></th>
                       <th width="16%" class="style2"><div align="center" class="style25">Action</div></th>
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
					  <td height="47"><div align="center"><?php echo $cnt; ?></div></td>
                       <td><div align="center"><?php echo $row['candID']; ?></div></td>
                       <td><div align="center"><?php echo $row['candName']; ?></div></td>
                    <td><div align="center"><span class="controls"><img src="<?php echo $row['photo'];?>"  width="53" height="41" border="2"/></span></div></td>
                       <td><div align="center"><span class="style6"><a href="vote_exec.php?id=<?php echo $row['candID'];?>" onClick="return confirmvote('<?php echo $row['candName']; ?>');">Vote Here</a>
                          
                          </span></div></td>
                     </tr>
                     <?php $cnt=$cnt+1;} ?>
                   </tbody>
                   <tfoot>
                   </tfoot>
                 </table>
</div>
                <!-- /.card-body -->
              </div></td>
            </tr>
          </table>
   </p>
  <p>&nbsp;</p>
  <p class="mainbar  style19"><?php include('footer.php'); ?></p>
</div>
</body>
</html>
