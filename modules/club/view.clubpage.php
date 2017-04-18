<?php

include_once 'C:\wamp\www\2017_education-master\util\class.util.php';

include_once 'blade/view.clubpage.blade.php';
//include_once 'blade/view.module.blade.php';
include_once '/../../common/class.common.php';
include_once '/../../modules/club/modules.css';


$connect = mysqli_connect("localhost","root","","cseku_wpl_2017_education");



?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
	<script type="text/javascript">

function redirect() {
	window.location.href = "http://localhost/2017_education-master/modules/dash/view.user.php";

}

</script>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>CLUB</title>
		<link rel="stylesheet" href="style.css" type="text/css" />
	</head>

<body>
<center>
	<div id="header">
		<label>By : Kazi Masudul Alam</a></label>
	</div>

	<div id="form">
		
<br />

 <?php
		//if(isset($_POST["proceed"]))
//{		
		session_start();
		$x=$_SESSION['variable_name1'];

		//echo "no";
		$query = "SELECT * FROM tbl_club WHERE ID = '$x'";
		$result = mysqli_query($connect, $query);
		while($row1 = mysqli_fetch_array($result))
		{
			echo $row1['Name'];
			echo '
				<img src="data:image/jpeg;base64,'.base64_encode($row1['CoverPhoto']).'" height = "180" width = "600"/>
				';

			echo $row1['Description'];
		}
	//}
		?>
		
		<br>
		<center>
<table>
		<tr>
		<td>

<?php
//$q="SELECT COUNT(*) FROM table_name";
$query1 = "SELECT * FROM tbl_club_module LIMIT 1";
$result1 = mysqli_query($connect, $query1);
		while($row2 = mysqli_fetch_array($result1))
		{
			echo $row2['ModuleName'];
			

			//echo $row['Description'];
		}
	

?>
<input type="text" name="txtModuleName" placeholder="19.10.2017 : General Metting" style="height:100px;width:300px"/>
		</td>		

		<td>
			<td>

<?php
//$q="SELECT COUNT(*) FROM table_name";
$query2 = "SELECT * FROM tbl_club_module LIMIT 1 OFFSET 1";
$result2 = mysqli_query($connect, $query2);
		while($row3 = mysqli_fetch_array($result2))
		{
			echo $row3['ModuleName'];
			

			//echo $row['Description'];
		}
	

?>
<input type="text" name="txtModuleName" placeholder="Nothing to show"  style="height:100px;width:300px"/>
		</td>
		</td>		
</tr>
	</table>
	<table>
		<tr>
			<td>
				<?php
//$q="SELECT COUNT(*) FROM table_name";
$query3 = "SELECT * FROM tbl_club_module LIMIT 1 OFFSET 2";
$result3 = mysqli_query($connect, $query3);
		while($row4 = mysqli_fetch_array($result3))
		{
			echo $row4['ModuleName'];
			

			//echo $row['Description'];
		}
	

?>
<input type="text" name="txtModuleName" placeholder="Nothing to show" style="height:100px;width:300px"/>
			</td>
			<td>
				<?php
//$q="SELECT COUNT(*) FROM table_name";
$query4 = "SELECT * FROM tbl_club_module LIMIT 1 OFFSET 3";
$result4 = mysqli_query($connect, $query4);
		while($row4 = mysqli_fetch_array($result4))
		{
			echo $row4['ModuleName'];
			

			//echo $row['Description'];
		}
	

?>
<input type="text" name="txtModuleName" placeholder="Nothing to show" style="height:100px;width:300px"/>
			</td>
		</tr>
	</table>
	
	
	<input type="button" onclick="redirect()" value="Members">
	
	</center>			
	</div>
</center>
<div>
	
</div>

</body>
</html>