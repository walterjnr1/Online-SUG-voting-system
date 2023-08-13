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


$ID=$_GET['id'];

//get old count
$sqlcount = "select * from candidate where candID='$ID'"; 
$resultcount = $conn->query($sqlcount);
$rowcount = mysqli_fetch_array($resultcount);
$count = $rowcount['count'];
$candName = $rowcount['candName'];


//slect voters details
$sqlvoter = "select * from voter where regNo='$regNo'"; 
$resultvoter = $conn->query($sqlvoter);
$rowvoter = mysqli_fetch_array($resultvoter);
$voterName = $rowvoter['voterName'];

//check if voter has voted already
$sql11 = "SELECT * FROM voting WHERE voter_regNo ='$regNo'";
$res11 = mysqli_query($conn, $sql11);
if (mysqli_num_rows($res11) > 0) {
?>
									
<script>
alert('This Voter Already voted ');
window.location = "vote.php";

</script>

	<?php	

	
}else {	


$sql1 = " update candidate set count=('$count' + 1) where candID='$ID'";
   
if (mysqli_query($conn, $sql1)) {


//insert to vote and other details
$query_insert_user = "INSERT INTO voting ( candID,candName, voter_regNo, voterName,voteTime) VALUES ('$ID','$candName ', '$regNo', '$voterName','$current_date')";
 
if ($conn->query($query_insert_user) === TRUE) {
header('Location: result.php');

}
}
}
?>