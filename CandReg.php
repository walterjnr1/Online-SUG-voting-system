<?php
session_start();
error_reporting(0);

include('connect.php');

 date_default_timezone_set('Africa/Lagos');
 $current_date = date('Y-m-d H:i:s');

if(isset($_POST["btnsubmit"]))
{

$candname = mysqli_real_escape_string($conn,$_POST['txtcandName']);
$candID = mysqli_real_escape_string($conn,$_POST['txtcandID']);
$regNo = mysqli_real_escape_string($conn,$_POST['txtregno']);
$accesscode = mysqli_real_escape_string($conn,$_POST['txtaccesscode']);
$sex = mysqli_real_escape_string($conn,$_POST['cmdsex']);
$maritalstatus = mysqli_real_escape_string($conn,$_POST['cmdmaritalstatus']);
$phone = mysqli_real_escape_string($conn,$_POST['txtphone']);
$DOB = mysqli_real_escape_string($conn,$_POST['txtDOB']);
$address = mysqli_real_escape_string($conn,$_POST['txtaddress']);
$phone = mysqli_real_escape_string($conn,$_POST['txtphone']);
$state = mysqli_real_escape_string($conn,$_POST['state']);
$lga = mysqli_real_escape_string($conn,$_POST['LocalGovt']);
$dept = mysqli_real_escape_string($conn,$_POST['txtdept']);
$faculty = mysqli_real_escape_string($conn,$_POST['cmdfaculty']);
$yearadmission = mysqli_real_escape_string($conn,$_POST['txtyearAdmission']);
$level = mysqli_real_escape_string($conn,$_POST['txtlevel']);
$post = mysqli_real_escape_string($conn,$_POST['txtpost']);
$pin = mysqli_real_escape_string($conn,$_POST['txtpin']);
$count=0;
$used='1';
$photo='uploads/default.jpg';

//check if Reg number already exist
$sql_u = "SELECT * FROM candidate WHERE regNo='$regNo'";
$res_u = mysqli_query($conn, $sql_u);
if (mysqli_num_rows($res_u) > 0) {
$msg_error = "Reg number already exist";

}else {

//check if PIN number is correct
$sql = "SELECT * FROM pin WHERE pin_num='$pin' and status=0";
$res = mysqli_query($conn, $sql);
if (mysqli_num_rows($res) == 0) {
$msg_error = "PIN Not Correct or Already in Used";

}else { 
	//check if PIN number is already used
$sql11 = "SELECT * FROM pin WHERE pin_num='$pin' and status='$used'";
$res11 = mysqli_query($conn, $sql11);
if (mysqli_num_rows($res11) > 0) {
$msg_error = "PIN Number Already In Used";
	
}else {	
	
//update PIN status
$sql1 = " update pin set status='1' where pin_num='$pin'";
if (mysqli_query($conn, $sql1)) {

$query_insert_user = "INSERT INTO candidate ( candName, candID , regNo, maritalStatus,sex, DOB, phone, address,lga, state, dept, faculty, yearadmission, level,post,pin,photo,count) VALUES ('$candname','$candID ', '$regNo', '$maritalstatus','$sex', '$DOB', '$phone', '$address','$lga', '$state', '$dept', '$faculty','$yearadmission', '$level','$post', '$pin','$photo','$count')";
 if ($conn->query($query_insert_user) === TRUE) {

$_SESSION['regNo']=$regNo;
$_SESSION['candName']=$candname;
$_SESSION['candID']=$candID;

                // Finish the page:
//$msg_success = "Candidate registered Successfully";
header('location:cand_pic.php');

           } else { // If it did not run OK.
     
$msg_error = "Problem Registering Candidate";
//header('location:voterReg.php');
}
}
}
}
}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script>
    
function showLocalGovt(str)
{
if (str=="")
  {
  document.getElementById("LocalGovt").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("LocalGovt").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","local_govt_db.php?state="+str,true);
xmlhttp.send();
}
</script>
<title>Candidate's Registration</title>
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
.style19 {font-size: 14px}
.style7 {color: #FF0000}
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
    .style27 {color: #FF0000;
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
          <li ><a href="index.php">Home</a></li>
          <li><a href="voterReg.php">Voter Registration </a></li>
          <li class="active"><a href="candReg.php">Candidate Registration</a><a href="Business_Name_availability.php"></a></li>
          <li><a href="vote.php">Vote</a><a href="blog.html"></a></li>
          <li><a href="selectResult.php">View Votes </a></li>
        </ul>
      </div>
      <div class="clr"></div>
    </div>
  </div>
  <div class="clr"></div>
  <div class="header">
    <div class="logo">
      <p class="style27">SECURED ONLINE VOTING  SYSTEM FOR SUG ELECTION USING REG NO. &amp; ACCESS CODE</p>
      <h1 class="style30">(A case Study of Foundation Polytechnic , Ikot Ekpene)</h1>
      <h1>&nbsp;</h1>
    </div>
  </div>
  <div class="content">
    <table width="200" border="0" align="center">
      <tr>
        <td><div class="mainbar">
          <div class="article">
            <h2>&nbsp;</h2>
            <table width="216" height="137" border="0" align="center">
              <tr>
                <td width="209"><form id="form1" name="form1" method="post" action="">
                  <table width="656" border="0" align="right">
                    <tr>
                      <th width="650" scope="col"><div align="center">
                          <table width="417" border="0" align="center">
                            <tr>
                              <td height="53"><div align="center">
							  
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
<?php } ?>
<p><h4><?php echo "<p> <font color=red font face='arial' size='3pt'>$msg_error</font> </p>"; ?></h4>  </p>
  <h4><?php echo "<p> <font color=green font face='arial' size='3pt'>$msg_success</font> </p>"; ?></h4>  </p>
							  
							  &nbsp;</div></td>
                            </tr>
                          </table>
                      </div></th>
                    </tr>
                    <tr>
                      <td height="236"><div id="div-regForm">
                          <div class="form-title">CANDIDATE'S REGISTRATION FORM</div>
                          <div class="form-sub-title"></div>
                          <table width="363" cellpadding="11" cellspacing="13">
                            <tbody>
                              <tr>
                                <td width="84"><span class="style19">
                                    <label for="fname"> </label>
                                    <label for="fname">
                                    </span>
                                    <div align="left" class="style19">CANDIDATE'S NAME </div>
                                  <span class="style19">
                                    </label>
                                  </span></td>
                                <td width="194"><div class="input-container">
                                    <input name="txtcandName" type="text" id="txtcandName" required/>
                                </div></td>
                              </tr>
                              <tr>
                                <td><span class="style19">
                                    <label for="lname"> </label>
                                    <label for="lname">
                                    </span>
                                    <div align="left" class="style19">CANDIDATE ID </div>
                                  <span class="style19">
                                    </label>
                                  </span></td>
                                <td><div class="input-container">
                                    <input name="txtcandID" readonly="readonly" id="txtcandID" type="text" value="<?php function generatePIN($digits = 6){ $i = 0; //counter
			$pin = ""; //our default pin is blank.
            while($i < $digits){
        //generate a random number between 0 and 9.
        $pin .= mt_rand(0, 9);
        $i++;
    }
    return $pin;
}
 
//If I want a 4-digit PIN code.
$appid = "CID/";
//$appid_end = "AKS".
$pin = generatePIN();
echo $appid.$pin;?>"" />
                                </div></td>
                              </tr>
							   <tr>
                                <td><span class="style19">
                                    <label for="lname"> </label>
                                    <label for="lname">
                                    </span>
                                    <div align="left" class="style19">REG NO </div>
                                  <span class="style19">
                                    </label>
                                  </span></td>
                                <td><div class="input-container">
                                    <input name="txtregno" id="txtregno" type="text" required/>
                                </div></td>
                              </tr>
							  <tr>
                                <td><span class="style19">
                                    <label for="label"> </label>
                                    <label for="label">
                                    </span>
                                    <div align="left" class="style19">SEX </div>
                                  <span class="style19">
                                    </label>
                                  </span></td>
                                <td><div class="input-container">
                                    <select name="cmdsex" size="1" id="cmdsex">
                                      <option value="MALE">MALE</option>
                                      <option value="FEMALE">FEMALE</option>
                                        </select>
                                </div></td>
                              </tr>
							   <tr>
                                <td><span class="style19">
                                    <label for="label"> </label>
                                    <label for="label">
                                    </span>
                                    <div align="left" class="style19">MARITAL STATUS </div>
                                  <span class="style19">
                                    </label>
                                  </span></td>
                                <td><div class="input-container">
                                    <select name="cmdmaritalstatus" size="1" id="cmdmaritalstatus">
                                      <option value="SINGLE">SINGLE</option>
                                      <option value="MARRIED">MARRIED</option>
									   <option value="WIDOW">WIDOW</option>
                                        </select>
                                </div></td>
                              </tr>
							  <tr>
                                <td><span class="style19">
                                    <label for="label"> </label>
                                    <label for="label">
                                    </span>
                                    <div align="left" class="style19">DATE OF BIRTH :</div>
                                    <span class="style19">
                                    </label>
                                  </span></td>
                                <td><div class="input-container">
                                  <input name="txtDOB" id="txtDOB" type="text" required/>
                                </div></td>
                              </tr>
                              <tr>
                                <td><span class="style19">
                                    <label for="email"> </label>
                                    <label for="email">
                                    </span>
                                    <div align="left" class="style19">PHONE:</div>
                                  <span class="style19">
                                    </label>
                                  </span></td>
                                <td><div class="input-container">
                                    <input name="txtphone" id="txtphone" type="text" required/>
                                </div></td>
                              </tr>
                       <tr>
                                <td><span class="style19">
                                    <label for="label"> </label>
                                    <label for="label">
                                    </span>
                                    <div align="left" class="style19">ADDRESS :</div>
                                    <span class="style19">
                                    </label>
                                  </span></td>
                                <td><div class="input-container">
                                  <input name="txtaddress" id="txtaddress" type="text" required/>
                                </div></td>
                              </tr>
							   
                              <tr>
                                <td><span class="style19">
                                      <label for="label">
                                    </span>
                                    <div align="left" class="style19">STATE :</div>
                                    <span class="style19">
                                    </label>
                                  </span></td>
                                <td>
								<div class="input-container">
 <select name="state" id="state" onchange="showLocalGovt(this.value)">
                                    <option value="">Select your State</option>
                                    <option value="Abia">Abia</option>
                                    <option value="Adamawa">Adamawa</option>
                                    <option value="Akwa Ibom">Akwa Ibom</option>
                                    <option value="Anambra">Anambra</option>
                                    <option value="Bauchi">Bauchi</option>
                                    <option value="Bayelsa">Bayelsa</option>
                                    <option value="Benue">Benue</option>
                                    <option value="Borno">Borno</option>
                                    <option value="Cross River">Cross River</option>
                                    <option value="Delta">Delta</option>
                                    <option value="Ebonyi">Ebonyi</option>
                                    <option value="Edo">Edo</option>
                                    <option value="Ekiti">Ekiti</option>
                                    <option value="Enugu">Enugu</option>
                                    <option value="FCT">FCT</option>
                                    <option value="Gombe">Gombe</option>
                                    <option value="Imo">Imo</option>
                                    <option value="Jigawa">Jigawa</option>
                                    <option value="Kaduna">Kaduna</option>
                                    <option value="Kano">Kano</option>
                                    <option value="Kastina">Kastina</option>
                                    <option value="Kebbi">Kebbi</option>
                                    <option value="Kogi">Kogi</option>
                                    <option value="Kwara">Kwara</option>
                                    <option value="Lagos">Lagos</option>
                                    <option value="Nasarawa">Nasarawa</option>
                                    <option value="Niger">Niger</option>
                                    <option value="Ogun">Ogun</option>
                                    <option value="Ondo">Ondo</option>
                                    <option value="Osun">Osun</option>
                                    <option value="Oyo">Oyo</option>
                                    <option value="Plateau">Plateau</option>
                                    <option value="Rivers">Rivers</option>
                                    <option value="Sokoto">Sokoto</option>
                                    <option value="Taraba">Taraba</option>
                                    <option value="Yobe">Yobe</option>
                                    <option value="Zamfara">Zamfara</option>
                                  </select>                                </div></td>
                              </tr>
							
							  
							  <tr>
                                <td><span class="style19">
                                      <label for="label">
                                    </span>
                                    <div align="left" class="style19">LGA :</div>
                                    <span class="style19">
                                    </label>
                                  </span></td>
                                <td>
								<div class="input-container">
<select name="LocalGovt" class="active" id="LocalGovt">
                                    <option>Select Your Local Government</option>
                                  </select>                                </div></td>
                              </tr>
							  
							  
							  
							  
                              <tr>
                              <tr>
                                <td><span class="style19">
                                    <label for="label"> </label>
                                    <label for="label">
                                    </span>
                                    <div align="left" class="style19">DEPARTMENT:</div>
                                    <span class="style19">
                                    </label>
                                  </span></td>
                                <td><div class="input-container">
                                  <input name="txtdept" id="txtdept" type="text" required/>
                                </div></td>
                              </tr>
                               <tr>
                                <td><span class="style19">
                                    <label for="label"> </label>
                                    <label for="label">
                                    </span>
                                    <div align="left" class="style19">FACULTY :</div>
                                    <span class="style19">
                                    </label>
                                  </span></td>
                                <td><div class="input-container">
                                  <select name="cmdfaculty" size="1" id="cmdfaculty">
                                    <option value="--Select Faculty --">--Select Faculty --</option>
                                    <option value="Engineering">Engineering</option>
                                    <option value="Building">Building</option>
                                  </select>
                                </div></td>
                              </tr>
                              
                              <tr>
                                <td><span class="style19">
                                    <label for="label"> </label>
                                    <label for="label">
                                    <div align="left" class="style19">YEAR OF ADMISSION</div>
                                  <span class="style19">
                                    </label>
                                  </span></td>
                                <td><span class="input-container">
                                  <input name="txtyearAdmission" id="txtyearAdmission" type="text" required/>
                                </span></td>
                              </tr>
                              <tr>
                                <td><span class="style19">
                                    <label for="label"> </label>
                                    <label for="label">
                                    </span>
                                    <div align="left" class="style19">LEVEL :</div>
                                    <span class="style19">
                                    </label>
                                  </span></td>
                                <td><div class="input-container">
                                  <input name="txtlevel" id="txtlevel" type="text" required/>
                                </div></td>
                              </tr>   
                               <tr>
                                <td><span class="style19">
                                    <label for="label"> </label>
                                    <label for="label">
                                    </span>
                                    <div align="left" class="style19">POST :</div>
                                    <span class="style19">
                                    </label>
                                  </span></td>
                                <td><div class="input-container">
                                  <input name="txtpost" readonly ="readonly" id="txtpost" type="text" value="President" />
                                </div></td>
                              </tr>    
                               <tr>
                                <td><span class="style19">
                                    <label for="label"> </label>
                                    <label for="label">
                                    </span>
                                    <div align="left" class="style19">PIN :</div>
                                    <span class="style19">
                                    </label>
                                  </span></td>
                                <td><div class="input-container">
                                  <input name="txtpin" id="txtpin" type="text"  required/>
                                </div></td>
                              </tr>                               
                              <tr>
                                <td><span class="style19"><span class="textright">
                                  <input name="updatepin" type="hidden" id="updatepin" value="used" />
                                  <input name="propic" id="dadded" type="hidden" value="uploads/default.jpg" />
                                </span></span></td>
                                <td><input name="btnsubmit" type="submit" class="greenButton" id="formsubmitted" value="Register" /></td>
                              </tr>
                            </tbody>
                          </table>
                      </div></td>
                    </tr>
                  </table>
                                </form>
                </td>
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
    <p class="lf"><span class="mainbar style3"><?php include('footer.php'); ?></span><span class="style2">. </span></p>
    <div class="clr"></div>
  </div>
</div>
<!-- END PAGE SOURCE -->
<div align=center></div>
</body>
</html>