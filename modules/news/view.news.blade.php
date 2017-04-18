<?php


include_once '/../../util/class.util.php';
include_once '/../../bao/class.newsbao.php';


$_NewsBAO = new NewsBAO();
$_DB = DBUtil::getInstance();

 
if(isset($_GET['txt']))
{
	$Keyword=$_GET['txt'];

	$_NewsBAO->getSearchedNews($Keyword);
}




	
if(isset($_POST['create']))
{
	
	 $News = new News();	
	 $News->setID(Util::getGUID());
	 //$fileImage=addslashes(file_get_contents($_FILES['Image']['tmp_name']));
	 $target="image/".basename($_FILES['Image']['name']);
	 move_uploaded_file($_FILES['Image']['tmp_name'], $target);
	 $News->setImage($_DB->secureInput($target));
     $News->setTitle($_DB->secureInput($_POST['txtTitle']));
     //$fileDescription=addslashes(file_get_contents($_FILES["txtDescription"]["name"]));
     $News->setDescription($_DB->secureInput($_POST['txtDescription']));
     $News->setCreationDate($_DB->secureInput(date("Y/m/d")));
     $News->setHappeningDate($_DB->secureInput($_POST['txtDate']));
     $News->setTag($_DB->secureInput($_POST['txtTag']));
     $News->setIsVisible($_DB->secureInput("1"));
	 $_NewsBAO->createNews($News);	

			 
}
?>