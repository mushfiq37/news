<?php

include_once 'view.news.blade.php';
include_once '/../../common/class.common.php';

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<!--<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Term CRUD Operations</title>
		<link rel="stylesheet" href="style.css" type="text/css" />
		-->
	</head>

<body>
<center>
	<div id="header">
		<h1>CSE ONLINE NEWS PORTAL</h1>
		<label>By : Kazi Masudul Alam</a></label>
	</div>

	<div id="navigation">
	<!--<form action="index.php">-->
		<button class="btn home" onclick="window.location='index.php'">Home</button>
		<button class="btn sprts" name="Sports" onclick="window.location='sports.php'">Sports</button>
		<button class="btn allmn" name="Allumni" onclick="window.location='allumni.php'">Allumni</button>
		<button class="btn teachr" name="Teachers" onclick="window.location='teachers.php'">Teachers</button>
		<button class="btn notice" name="Notice" onclick="window.location='notice.php'">Notice</button>
		<button class="btn nwscrt" onclick="window.location='newNews.php'">News Create</button>
			
		
		
	</form>
		<form action="search.php" method="get">
			<table width="100%" border="1" cellpadding="5">
				<tr>
					<td><input type="text" name="txt" placeholder="keyword" autocomplete="on"> </td>
							
					<td><button type="submit" name="search">Search</button></td>
				</tr>
			</table>
		</form>
	</div>

	<div id="form">
		<form method="post" enctype="multipart/form-data">
			<table width="100%" border="1" cellpadding="20">
				<tr>
				
					<td>Title:<input type="text" name="txtTitle" placeholder="News Title" value="" /></td>
					</tr>
					<tr>
					
					<td>Description:<textarea name="txtDescription" cols="40" rows="4" placeholder="Description" value=""></textarea></td> 

					</tr>
					<tr>
					
					<td>Happening Date:<input type="date" name="txtDate" placeholder="" value="" /></td>
					</tr>
					<tr>
					
					<td>Tag:<input type="text" name="txtTag" placeholder="" value="" /></td>
					</tr>
					<tr>
					
					<td>Image:<input type="file" name="Image" id="Image" placeholder="" value="" /></td>
					</tr>
					
				</tr>
				<tr>
					<td>
						<button type="submit" onclick="window.location='index.php'" name="create">Create</button>
							
						
					</td>
				</tr>
			</table>
		</form>

<br />

</div>
</center>
</body>
</html>