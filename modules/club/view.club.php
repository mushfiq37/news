<?php




 include_once 'C:\wamp\www\2017_education-master\bao\class.clubbao.php';
include_once 'blade/view.club.blade.php';
//include_once 'blade/view.module.blade.php';
//include_once '/../../common/class.common.php';
//include_once 'blade/view.clubbao.php';
include_once 'C:\wamp\www\2017_education-master\util\class.util.php';
include_once '/../../modules/club/modules.css';


$connect = mysqli_connect("localhost","root","","cseku_wpl_2017_education");
if(isset($_POST["save"]))
{
	$ID =  Util::getGUID();
	$file = addslashes(file_get_contents($_FILES["Image"]["tmp_name"]));
	//$Club->setID(Util::getGUID());
     $Name=$_POST['txtName'];
     $Description=$_POST['txtDes'];
     $file = addslashes(file_get_contents($_FILES["Image"]["tmp_name"]));
     //$Club->setCoverPhoto($_DB->secureInput('$file'));
     $CreationDate=date("Y/m/d");
	// $_ClubBAO->createClub($Club);
	$query="INSERT INTO tbl_Club(ID,Name,CoverPhoto,Description,CreationDate) VALUES('$ID','$Name','$file','$Description','$CreationDate')";
	if(mysqli_query($connect,$query)){
		echo '<script> alert("inserted")</script>';
	}
}


?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Create Club</title>
		<link rel="stylesheet" href="style.css" type="text/css" />
	</head>

<body>
<center>
	<div id="header">
		<label>By : Kazi Masudul Alam</a></label>
	</div>

	<div id="form">
		<form method="post" enctype="multipart/form-data" >
			<table width="100%" border="1" cellpadding="15">
				<tr>
					<td><input type="text" name="txtName" placeholder="Club Name" value="<?php 
					if(isset($_GET['edit'])) echo $getROW->getName();  ?>" /></td>

				</tr>
				<tr>

					<td><input type="text" name="txtDes" placeholder="Description" value="<?php 
					if(isset($_GET['edit'])) echo $getROW->getDescription();  ?>" /></td>
				</tr>

				<tr>
					<td>
					 <label >Choose Cover Photo :</br></label>
					 </br>
					<input type="file" name="Image" id="Image" > 
					</td>
					</tr>
					<td>
						<?php
						if(isset($_GET['edit']))
						{
							?>
							<button type="submit" name="update">update</button>
							<?php
						}
						else
						{
							?>
							<button type="submit" name="save" >Create Club</button>
							
							<?php
						}
						?>
					</td>
				</tr>
				</table>
				</form>
<br />

	<table width="100%" border="1" cellpadding="15" align="center">
	<?php
	
	
	$Result = $_ClubBAO->getAllClub();

	//if DAO access is successful to load all the Positions then show them one by one
	if($Result->getIsSuccess()){

		$ClubList = $Result->getResultObject();
	?>
		<tr>
			<td>Club Name</td>
		</tr>
		<?php
		for($i = 0; $i < sizeof($ClubList); $i++) {
			$Club = $ClubList[$i];
			?>
		    <tr>
			    <td><?php echo $Club->getName(); ?></td>
			    <td><a href="?edit=<?php echo $Club->getID(); ?>" onclick="return confirm('sure to edit !'); " >edit</a></td>
			    <td><a href="?del=<?php echo $Club->getID(); ?>" onclick="return confirm('sure to delete !'); " >delete</a></td>
			    <td><a href="?add=<?php session_start(); 
			    $_SESSION['variable_name1'] = $Club->getID();
			    $_SESSION['variable_name2'] = $Club->getName();

			      ?>" onclick="return confirm('sure to add !'); " >add modules</a></td>
		    </tr>     
	    <?php

		}
//echo $_SESSION['myValue'];	
	}
	else{

		echo $Result->getResultObject(); //giving failure message
	}

	?>
	</table
						

				
	</div>
</center>

</body>
</html>